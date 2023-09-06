<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));
    }
    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon'=>'required',

        ], [
            'category_name_en.required' => 'Input category Name English',
            'category_name_hin.required' => 'Input category Name Hindi',
        ]);
        category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon,

        ]);
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function CategoryEdit($id)
    {
        $category = Category::find($id);
        return view('backend.category.category_edit', compact('category'));


    }
    public function CategoryUpdate(Request $request){
        $category_id = $request->id;
        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon,

        ]);
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.view')->with($notification);
    }
    public function CategoryDelete($id){

         $category = Category::findOrFail($id);
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'danger',
        );
        return redirect()->back()->with($notification);

}
}