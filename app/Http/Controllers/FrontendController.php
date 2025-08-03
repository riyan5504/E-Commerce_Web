<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::with('subCategory')->orderBy('name', 'asc')->get();                 
        $hotProducts = Product::where('type', 'hot')->orderBy('id', 'desc')->paginate(10);
        $newProducts = Product::where('type', 'new')->orderBy('id', 'desc')->paginate(10);
        $regulerProducts = Product::where('type', 'reguler')->orderBy('id', 'desc')->paginate(10);
        $discountProducts = Product::where('type', 'discount')->orderBy('id', 'desc')->paginate(10);
        
        return view('frontend.index', compact('categories', 'hotProducts', 'newProducts', 'regulerProducts', 'discountProducts'));
    }
    public function categoryProduct($slug, $id)
    {
        $category = Category::find($id);
        $products = Product::where('cat_id', $id)->get();
        $productCount = Product::where('cat_id', $id)->count();
        return view('frontend.category-product', compact('category', 'products', 'productCount'));
    }
    public function subCategoryProduct($slug, $id)
    {
        $subcategory = SubCategory::find($id);
        $products = Product::where('sub_cat_id', $id)->get();
        $productCount = Product::where('sub_cat_id', $id)->count();
        return view('frontend.sub-catrgory-product', compact('subcategory', 'products', 'productCount'));
    }
    public function typeProduct($type)
    {
        $products = Product::where('type', $type)->get();
        $productCount = Product::where('type', $type)->count();
        return view('frontend.type-product', compact('type', 'products', 'productCount'));
    }
    public function detailProduct($slug)
    {
        $product = Product::where('slug', $slug)->with('color', 'size', 'galleryImage')->first();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('frontend.product-details', compact('product', 'categories'));
    }
}
