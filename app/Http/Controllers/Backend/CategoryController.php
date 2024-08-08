<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use App\Models\Icon;
use Alert;
use Illuminate\Support\Facades\File; // Import the File facade

class CategoryController extends Controller
{

        public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('categories.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }

        $categories = Category::latest()->get();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('categories.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        $icons = Icon::all(); // Retrieve all icons
        return view('backend.category.create',compact('icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'category_name_en' => 'required|string|max:255',
        'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_icon' => 'required|string|max:255',
    ]);

    //category image
    if ($request->hasFile('category_image')) {
    $categoryImage = $request->file('category_image');
    $imageName = time() . '.' . $categoryImage->getClientOriginalExtension();
    $uploadPath = 'upload/categories';
    $categoryImage->move(public_path($uploadPath), $imageName);
    }
        $uploadPath_banner = "";
        $catbanImage = "";
    //category banner image
    if ($request->hasFile('category_banner_image')) {
    $categoryBannerImage = $request->file('category_banner_image');
    $catbanImage = time() . '.' . $categoryBannerImage->getClientOriginalExtension();
    $uploadPath_banner = 'upload/categorybanner';
    $categoryBannerImage->move(public_path($uploadPath_banner), $catbanImage);
    }



    // Save category to database
    $category = new Category();
    $category->category_name_en = $request->category_name_en;
    $category->category_slug_en = Str::slug($request->input('category_slug_en'));
    $category->description = $request->description;
    $category->category_image =  $imageName;
    $category->category_banner_image =  $catbanImage;
    $category->category_icon = $request->category_icon;
    $category->save();
    Alert::success('Success', 'Category Created successfully');
        return redirect()->back();
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
         if (is_null($this->user) || !$this->user->can('categories.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }
         $icons = Icon::all();
        $category = Category::find($id);
        return view('backend.category.edit', compact('category','icons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
   public function update(CategoryStoreRequest $request, Category $category)
{
    // Validate and process category image upload
    if ($request->hasFile('category_image')) {
        // Delete old category image if it's not the default one
        if ($category->category_image != 'default.jpg') {
            $image_path = public_path('upload/categories/') . $category->category_image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        // Upload new category image
      $categoryImage = $request->file('category_image');
        $imageName = time() . '.' . $categoryImage->getClientOriginalExtension();
        $uploadPath = 'upload/categories';
        $categoryImage->move(public_path($uploadPath), $imageName);

        $category->update([
            'category_name_en' => $request->input('category_name_en'),
            'category_slug_en' => Str::slug($request->input('category_slug_en')),
            'description'    => $request->description,
            'category_icon' => $request->input('category_icon'),
            'category_image' => $imageName, // Update category image field with new image name
        ]);
    } elseif ($request->hasFile('category_banner_image')) {
        // Delete old category image if it's not the default one
        if ($category->category_banner_image != 'default.jpg') {
            $banner_path = public_path('upload/categorybanner/') . $category->category_banner_image;
            if (file_exists($banner_path)) {
                unlink($banner_path);
            }
        }

        // Upload new category image
      $categoryBannerImage = $request->file('category_banner_image');
    $catbanImage = time() . '.' . $categoryBannerImage->getClientOriginalExtension();
    $uploadPath_banner = 'upload/categorybanner';
    $categoryBannerImage->move(public_path($uploadPath_banner), $catbanImage);


        $category->update([
            'category_name_en' => $request->input('category_name_en'),
            'category_slug_en' => Str::slug($request->input('category_slug_en')),
            'description'    => $request->description,
            'category_icon' => $request->input('category_icon'),
            'category_banner_image' => $catbanImage, // Update category image field with new image name
        ]);
    } else {
        // Update category without changing images
        $category->update([
            'category_name_en' => $request->input('category_name_en'),
            'category_slug_en' => Str::slug($request->input('category_slug_en')),
            'description'    => $request->description,
            'category_icon' => $request->input('category_icon'),
            'category_image' => $category->category_image,
            'category_banner_image' => $category->category_banner_image,
        ]);
    }

    // Redirect back with a success message
 Alert::success('Success', 'Category Updated successfully');
 return redirect()->route('admin.categories.index');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
          if (is_null($this->user) || !$this->user->can('categories.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }
        $category = Category::find($id);
       // Delete category images if they exist
    if ($category->category_image) {
        $image_path = public_path('upload/categories/') . $category->category_image;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
    }
    if ($category->category_banner_image) {
        $banner_image_path = public_path('upload/categorybanner/') . $category->category_banner_image;
        if (File::exists($banner_image_path)) {
            File::delete($banner_image_path);
        }
    }
        $category->delete();
        Alert::success('Success', 'Category Deleted successfully');

        return redirect()->route('admin.categories.index');

    }
}
