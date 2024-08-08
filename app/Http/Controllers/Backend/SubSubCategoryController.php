<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubSubCategoryStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;


class SubSubCategoryController extends Controller
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
        if (is_null($this->user) || !$this->user->can('subsubcategories.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }
        $subsubCategories = SubSubCategory::with(['category','subcategory'])->latest()->get();
        return view('backend.SubSubCategory.index', compact('subsubCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if (is_null($this->user) || !$this->user->can('subsubcategories.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        $categories = Category::with('subcategory')->latest()->get();
        //dd($categories);
        return view('backend.SubSubCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubSubCategoryStoreRequest $request)
    {
        // dd($request->all());
        SubSubCategory::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->input('subsubcategory_name_en'),
            'subsubcategory_slug_en' => Str::slug($request->input('subsubcategory_name_en')),
        ]);

        Alert::success('Success', 'Sub-Sub Category Created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if (is_null($this->user) || !$this->user->can('subsubcategories.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }
        $subsubCategory = SubSubCategory::findOrFail($id);
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.SubSubCategory.edit', compact('categories','subcategories','subsubCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubSubCategoryStoreRequest $request, $id)
    {
        $subsubCategory = SubSubCategory::findOrFail($id);
        $subsubCategory->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->input('subsubcategory_name_en'),
            'subsubcategory_slug_en' => Str::slug($request->input('subsubcategory_name_en')),
        ]);
        Alert::success('Success', 'Sub Sub Category Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if (is_null($this->user) || !$this->user->can('subsubcategories.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }
        $subsubCategory = SubSubCategory::findOrFail($id);
        $subsubCategory->delete();
         Alert::success('Success', 'Sub Sub Category Deleted Successfully');

        return redirect()->route('admin.subsubcategories.index');
    }

    public function getSubCategory($category_id)
    {
        $subCategory = SubCategory::where('category_id','=', $category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subCategory);
    }

    public function getSubSubCategory($subcategory_id)
    {
        $subsubCategory = SubSubCategory::where('subcategory_id', '=', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_encode($subsubCategory);
    }
}
