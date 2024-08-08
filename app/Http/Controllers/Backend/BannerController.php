<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Alert;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('backend.cms.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('backend.cms.banners.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        'description' => 'nullable',
    ]);

    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('frontend/imgs/slider/'), $imageName);

    $banner = Banner::create([
        'title' => $request->title,
        'image_path' => 'frontend/imgs/slider/'.$imageName,
        'description' => $request->description,
    ]);

     Alert::success('Success', 'Banner Created successfully');
        return redirect()->back();
}




    public function show(Banner $banner)
    {
        return view('backend.cms.banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('backend.cms.banners.edit', compact('banner'));
    }

  public function update(Request $request, Banner $banner)
{
    $request->validate([
        'title' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        'description' => 'nullable',
    ]);

    if ($request->hasFile('image')) {
        Storage::delete($banner->image_path);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('frontend/imgs/slider/'), $imageName);
        $banner->image_path = 'frontend/imgs/slider/'.$imageName;
    }

    $banner->title = $request->title;
    $banner->description = $request->description;
    $banner->save();


     Alert::success('Success', 'Banner updated successfully');
        return redirect()->back();
}

    public function destroy(Banner $banner)
    {
        Storage::delete($banner->image_path);
        $banner->delete();

        Alert::success('Success', 'Banner deleted successfully.');
        return redirect()->back();
    }
}
