<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('backend.user.index', compact('users'));
    }

    public function statusEdit($id, $status)
    {
    	// dd($status);
        $user = User::find(decrypt($id));

        if(!$user){ return redirect()->back()->withError('User not found');}

        if($status == 0){
        	$user->status = 1;
        }else{
        	$user->status = 0;
        }

        $user->save();

        return redirect('admin/user/index')->withSuccess('User updated successfully.');
    }
    
    public function edit($id)
    {
        $page = 'edit';
        $user = User::find($id);
        return view('backend.user.create', compact('page', 'user'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

        $user = User::find($id);
        if ($user == null){
            return redirect()->back()->withError('User has been empty.');
        }
        if (isset($request->image)){
            if ($user->image && file_exists('user/'.$user->image)){
                unlink('user/'.$user->image);
            }
            $updateUserImage = $request->name.'.'. $request->image->extension();
            $request->image->move('user/', $updateUserImage);
            $user->image = $updateUserImage;
        }
        $user->name = $request->name;
        $user->slug = str_replace(' ', '-', strtolower($request->name));
        $user->save();
        return redirect()->back()->withSuccess('User has been successfully updated.');
    }

    public function destroy($id)
    {
        $user = User::where('id', decrypt($id))->first();

        if ($user->avatar && file_exists('users/'.$user->avatar)){
            unlink('users/'.$user->avatar);
        }
        $user->delete();
        
        return redirect('admin/user/index')->withSuccess('User has been successfully deleted.');
    }
}
