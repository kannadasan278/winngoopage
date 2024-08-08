<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;

class SubCategoryController extends Controller
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
        if (is_null($this->user) || !$this->user->can('subcategories.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }

        $subCategories = SubCategory::with(['category'])->latest()->get();
        //return response()->json($subCategories);
        return view('backend.SubCategory.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('subcategories.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }
        $categories = Category::latest()->get();
        return view('backend.SubCategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryStoreRequest $request)
    {
        SubCategory::create([
            'category_id' => $request->input('category_id'),
            'subcategory_name_en' => $request->input('subcategory_name_en'),
            'subcategory_slug_en' => Str::slug($request->input('subcategory_name_en')),
        ]);

      Alert::success('Success', 'subCategory Created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
         if (is_null($this->user) || !$this->user->can('subcategories.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }
        $categories = Category::latest()->get();
        $subcategory = SubCategory::find($id);

        return view('backend.SubCategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryStoreRequest $request, $id)
    {

        //dd($request->all(), $id);
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->input('subcategory_name_en'),
            'subcategory_slug_en' => Str::slug($request->input('subcategory_name_en')),
        ]);

         Alert::success('Success', 'SubCategory updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          if (is_null($this->user) || !$this->user->can('subcategories.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        Alert::success('Success', 'Sub Category Deleted Successfully');

        return redirect()->route('admin.subcategories.index');
    }
}
