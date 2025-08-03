<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function subCategoryCreate()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.sub-category.create', compact('categories'));
    }

    public function subCategoryStore(Request $request)
    {
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->cat_id = $request->cat_id;

        $subCategory->save();
        return redirect('/sub-category/list');
    }
    public function subCategoryList()
    {
        $subCategories = SubCategory::with('category')->get();        
        return view('backend.sub-category.list', compact('subCategories'));
    }

    public function subCategoryEdit($id)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $subCategory = SubCategory::find($id);
        return view('backend.sub-category.edit', compact('categories', 'subCategory'));
    }

    public function subCategoryUpdate(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->cat_id = $request->cat_id;

        $subCategory->save();
        return redirect('/sub-category/list');
    }
    public function subCategoryDelete($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect()->back();
    }
}
