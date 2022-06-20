<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('backend.user.index', compact('users'));
    }

    public function create(){
        $page = 'create';
        return view('backend.user.create', compact('page'));
    }

    public function store(Request $request){
        // return $request->all();


        // validate
        $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:255|unique:users,phone',
            // 'password' => 'required|string|min:8|confirmed',
            'avatar' => 'mimes:jpg,jpeg,png,bmp,tiff|max:4096',

        ]);

        // save this user
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->division = $request->division;
        $user->password = Hash::make($request->password);
        $user->status = true;


        // upload image
        if($request->avatar){
            $avatar = $request->avatar;
            $avatarName = Str::slug($request->name) . time().'_'.'.'. $avatar->extension();
            $avatar->move('users', $avatarName );

            $user->avatar = $avatarName;
        }


        $user->save();


        return redirect('admin/user/index')->with('success', 'User successfully registered');

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
