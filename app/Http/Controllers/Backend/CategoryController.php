<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function categoryCreate()
    {
        return view('backend.Category.create');
    }

    public function categoryStore(Request $request)
    {
        $category = new Category;

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if(isset($request->image)){
            $imagename = Str::random(6).'.category.'.$request->image->extension();
            $request->image->move('backend/images/category/',$imagename);
            $category->image = $imagename;
        }

        $category->save();
        return redirect('/category/list');
    }

    public function categoryList()
    {
        $categories = Category::get();
        return view('backend.Category.list', compact('categories'));
    }

    public function categoryEdit($id)
    {
        $category = Category::find($id);
        return view('backend.Category.edit', compact('category'));
    }
    public function categoryUpdate(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        if(isset($request->image)){
            if($category->image && file_exists('backend/images/category/'.$category->image)){
                unlink('backend/images/category/'.$category->image);
            }
            $imagename = Str::random(6).'.category.'.$request->image->extension();
            $request->image->move('backend/images/category/',$imagename);
            $category->image = $imagename;
        }

        $category->save();
        return redirect('/category/list');
    }

    public function categoryDelete($id)
    {
        $category = Category::find($id);
        if($category->image && file_exists('backend/images/category/'.$category->image)){
                unlink('backend/images/category/'.$category->image);
            }
        $category->delete();
        return redirect()->back();
    }
}
