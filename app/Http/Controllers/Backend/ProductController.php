<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    public function ProductAdd()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.product_add', compact('categories', 'brands'));
    }
    public function ProductStore(Request $request)
    {

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' => $save_url,

            'status' => 1,
            'created_at' => Carbon::now(),

        ]);


        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        }

        ////////// Een Multiple Image Upload Start ///////////


        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    }
    public function ProductManage()
    {
        $products = Product::latest()->get();
        return view('admin.product.product_view', compact('products'));
    }
    public function ProductEdit($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();


        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::find($id);

        return view('admin.product.product_edit', compact('products', 'categories', 'brands', 'subcategory', 'subsubcategory', 'multiImgs'));
    }
    public function ProductUpdate(Request $request)
    {
        $products_id = $request->id;
        Product::findOrFail($products_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,


            'status' => 1,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Product Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    }
    public function ProductUpdateImage(Request $request)
    {
        $imgs = $request->multi_img;
        if (!is_null($imgs) && is_array($imgs)) {
        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::where('id', $id)->update([

                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        }
    } else {
        $notification = array(
            'message' => 'Product Update Image Successfully',
            'alert-type' => 'success'
        );
    }
        return redirect()->back()->with($notification);
    }
    public function ProductUpdateThambnail(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_image;
        if (file_exists($oldImage)) {
            unlink($oldImage);
        } else {
        }
        $image = $request->file('product_thambnail');
        $name_gens = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gens);
        $save_url = 'upload/products/thambnail/' . $name_gens;
        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Image Thumbnail Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function ProductDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    public function ProductInAction($id)
    {
        Product::findOrFail($id)->update([
            'status' => 0,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product In Action Successfully',
            'alert-type' => 'info'
        ); 
        return redirect()->back()->with($notification);
    }
    public function ProductAction($id)
    {
        Product::findOrFail($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product In Action Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function ProductProDelete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();
        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::findOrFail($img->id)->delete();
        }
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
