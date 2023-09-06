<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductAdd()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('admin.product.product_add', compact('categories', 'brands'));
     
    }
}
