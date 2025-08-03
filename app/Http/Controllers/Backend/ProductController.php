<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function productCreate()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $subCategories = SubCategory::orderBy('name', 'asc')->get();
        return view('backend.product.create', compact('categories', 'subCategories'));
    }
    public function productStore(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->type = $request->type;
        if (isset($request->image)) {
            $imagename = Str::random(6) . '.product.' . $request->image->extension();
            $request->image->move('backend/images/product/', $imagename);
            $product->image = $imagename;
        }
        $product->code = $request->code;
        $product->qty = $request->qty;
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->buying_price = $request->buying_price;
        $product->reguler_price = $request->reguler_price;
        $product->discount_price = $request->discount_price;
        $product->description = strip_tags($request->description);
        $product->p_policy = strip_tags($request->p_policy);

        $product->save();

        //color save....

        if (isset($request->color_name) && $request->color_name[0] != null) {
            foreach ($request->color_name as $singalcolor) {
                $color = new Color();
                $color->color_name = $singalcolor;
                $color->slug = Str::slug($singalcolor);
                $color->p_id = $product->id;

                $color->save();
            }
        }
        //size save....

        if (isset($request->size_name) && $request->size_name[0] != null) {
            foreach ($request->size_name as $singalsize) {
                $size = new Size();
                $size->size_name = $singalsize;
                $size->slug = Str::slug($singalsize);
                $size->p_id = $product->id;
                $size->save();
            }
        }
        //Gallery Image save....

        if (isset($request->gal_image)) {
            foreach ($request->gal_image as $singaimage) {
                $galleryImage = new GalleryImage();
                $imagename = Str::random(6) . '.galleryimage.' . $singaimage->extension();
                $singaimage->move('backend/images/galleryimage/', $imagename);

                $galleryImage->gal_images = $imagename;
                $galleryImage->p_id = $product->id;
                $galleryImage->save();
            }
        }
        return redirect('/product/list');
    }

    public function productList()
    {
        $products = Product::with('category', 'subCategory')->get();
        return view('backend.product.list', compact('products'));
    }

    public function productEdit($id)
    {
        $product = Product::where('id', $id)->with('color', 'size', 'galleryImage')->first();
        $categories = Category::orderBy('name', 'asc')->get();
        $subCategories = SubCategory::orderBy('name', 'asc')->get();

        return view('backend.product.edit', compact('product', 'categories', 'subCategories'));
    }

    public function productUpdate(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->type = $request->type;
        if (isset($request->image)) {
            if ($product->image && file_exists('backend/images/product/' . $product->image)) {
                unlink('backend/images/product/' . $product->image);
            }
            $imagename = Str::random(6) . '.product.' . $request->image->extension();
            $request->image->move('backend/images/product/', $imagename);
            $product->image = $imagename;
        }
        $product->code = $request->code;
        $product->qty = $request->qty;
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->buying_price = $request->buying_price;
        $product->reguler_price = $request->reguler_price;
        $product->discount_price = $request->discount_price;
        $product->description = strip_tags($request->description);
        $product->p_policy = strip_tags($request->p_policy);

        $product->save();

        //color save....

        if (isset($request->color_name) && $request->color_name[0] != null) {
            $colors = Color::where('p_id', $product->id)->get();
            foreach ($colors as $color) {
                $color->delete();
            }
            foreach ($request->color_name as $singalcolor) {
                $color = new Color();
                $color->color_name = $singalcolor;
                $color->slug = Str::slug($singalcolor);
                $color->p_id = $product->id;

                $color->save();
            }
        }

        //size save....

        if (isset($request->size_name) && $request->size_name[0] != null) {
            $sizes = Size::where('p_id', $product->id)->get();
            foreach ($sizes as $size) {
                $size->delete();
            }
            foreach ($request->size_name as $singalsize) {
                $size = new Size();
                $size->size_name = $singalsize;
                $size->slug = Str::slug($singalsize);
                $size->p_id = $product->id;
                $size->save();
            }
        }
        //Gallery Image save....

        if (isset($request->gal_image)) {
            $galleryImage = GalleryImage::where('p_id', $product->id)->get();
            foreach ($galleryImage as $singalimage) {
                if ($singalimage->gal_images && file_exists('backend/images/galleryimage/' . $singalimage->gal_images)) {
                    unlink('backend/images/galleryimage/' . $singalimage->gal_images);
                }
                $singalimage->delete();
            }
            foreach ($request->gal_image as $singaimage) {
                $galleryImage = new GalleryImage();
                $imagename = Str::random(6) . '.galleryimage.' . $singaimage->extension();
                $singaimage->move('backend/images/galleryimage/', $imagename);

                $galleryImage->gal_images = $imagename;
                $galleryImage->p_id = $product->id;
                $galleryImage->save();
            }
        }
        return redirect('/product/list');
    }

    public function colorDelete($id)
    {
        $colors = Color::find($id);
        $colors->delete();
        return redirect()->back();
    }
    public function sizeDelete($id)
    {
        $sizes = Size::find($id);
        $sizes->delete();
        return redirect()->back();
    }

    public function galleryimageDelete($id)
    {
        $galimage = GalleryImage::find($id);
        if($galimage->gal_images && file_exists('backend/images/galleryimage/'.$galimage->gal_images)){
            unlink('backend/images/galleryimage/'.$galimage->gal_images);
        }
        $galimage->delete();
        return redirect()->back();
    }

    public function productDelete($id)
    {
        $product = Product::find($id);
        if ($product->image && file_exists('backend/images/product/' . $product->image)) {
            unlink('backend/images/product/' . $product->image);
        }

        $colors = Color::where('p_id', $product->id)->get();
        foreach ($colors as $color) {
            $color->delete();
        }

        $sizes = Size::where('p_id', $product->id)->get();
        foreach ($sizes as $size) {
            $size->delete();
        }
        $galleryImage = GalleryImage::where('p_id', $product->id)->get();
        foreach ($galleryImage as $singalimage) {
            if ($singalimage->gal_images && file_exists('backend/images/galleryimage/' . $singalimage->gal_images)) {
                unlink('backend/images/galleryimage/' . $singalimage->gal_images);
            }
            $singalimage->delete();
        }
        $product->delete();
        return redirect()->back();
    }
}
