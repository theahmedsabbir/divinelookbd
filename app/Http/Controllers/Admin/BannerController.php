<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
	public function __construct(){
		return $this->middleware('banner');
	}
    public function index($bannerType)
    {
    	// return $bannerType;
        $banners = Banner::orderBy('created_at', 'desc')
        				->where('type', $bannerType)
    					->get();
        return view('backend.banner.index', compact('banners', 'bannerType'));
    }

    public function create($bannerType)
    {
        $page = 'create';
        $banner = '';
        return view('backend.banner.create', compact('page', 'banner', 'bannerType'));
    }

    public function store(Request $request, $bannerType)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,jpeg,png,bmp,tiff'
        ]);

        $banner = new Banner();

        // validation for side-banner
        if ($bannerType == 'side-banner') {
        	if (Banner::where('type', 'side-banner')->count() >= 2) {
        		return redirect()->back()->withError('You have already uploaded 2 side banner. Please delete one.');
        	}
        }


        if ($request->file('image')){
            $image = Str::slug($banner->title) . time().'.'. $request->image->extension();
            $request->image->move('banner/', $image);
            $banner->image = $image;
        }

        $banner->info = $request->info;
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->button_text = $request->button_text;
        $banner->link = $request->link;
        $banner->priority = $request->priority;
        $banner->type = $bannerType;
        $banner->save();

        return redirect('admin/banner/' .$bannerType. '/index')->withSuccess($bannerType . ' has been successfully added.');
    }

    public function edit($bannerType,$id)
    {
        $page = 'edit';
        $banner = Banner::find(decrypt($id));

        if(!$banner){ return redirect()->back()->withError('Data not found');}

        return view('backend.banner.edit', compact('page', 'banner', 'bannerType'));
    }

    public function update(Request $request, $bannerType,$id)
    {
        $this->validate($request, [
            'image' => 'mimes:jpg,jpeg,png,bmp,tiff'
        ]);

        $banner = Banner::find(decrypt($id));

        if(!$banner){ return redirect()->back()->withError('Data not found');}


        if ($request->file('image')){
            if ($banner->image && file_exists('banner/'.$banner->image)){
                unlink('banner/'.$banner->image);
            }
            $image = Str::slug($banner->title) . time().'.'. $request->image->extension();
            $request->image->move('banner/', $image);
            $banner->image = $image;
        }

        $banner->info = $request->info;
        $banner->title = $request->title;
        $banner->sub_title = $request->sub_title;
        $banner->button_text = $request->button_text;
        $banner->link = $request->link;
        $banner->priority = $request->priority;
        $banner->type = $bannerType;
        $banner->save();

        return redirect('admin/banner/' .$bannerType. '/index')->withSuccess($bannerType . ' has been successfully updated.');
    }

    public function destroy($bannerType,$id)
    {

        $banner = Banner::find(decrypt($id));

        if(!$banner){ return redirect()->back()->withError('Data not found');}


        if ($banner->image && file_exists('banner/'.$banner->image)){
            unlink('banner/'.$banner->image);
        }

        $banner->delete();
        return redirect()->back()->withSuccess('Banner has been successfully deleted.');
    }
}
