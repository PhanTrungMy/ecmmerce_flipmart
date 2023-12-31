<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_view', compact('subcategory', 'categories'));
    }
    public function SubCategoryStore(Request $request)
    {
        $request->validate(
            [
                'subcategory_name_en' => 'required|unique:sub_categories|max:255',
                'subcategory_name_hin' => 'required|unique:sub_categories|max:255',

            ],
            [
                'subcategory_name_en.required' => 'Input SubCategory English Name',
                'subcategory_name_hin.required' => 'Input SubCategory hinda Name',

            ]
        );
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '-', $request->subcategory_name_hin),
        ]);
        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit', compact('subcategory', 'categories'));
    }
    public function SubCategoryUpdate(Request $request)
    {
        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '-', $request->subcategory_name_hin),
        ]);
        $notification = array(
            'message' => 'SubCategory update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('subcategory.view')->with($notification);
    }
    public function SubCategoryDelete($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategory Delete Successfully',
            'alert-type' => 'danger',
        );
        return redirect()->back()->with($notification);
    }
    public function SubSubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.subcategory.sub_subcategory_view', compact('subsubcategory', 'categories'));
    }
    public function GetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_encode($subsubcat);
    }
    public function SubSubCategoryStore(Request $request)
    {
        $request->validate(
            [
                'subcategory_id' => 'required',
                'category_id' => 'required',
                'subsubcategory_name_en' => 'required',
                'subsubcategory_name_hin' => 'required',

            ],
            [
                'subcategory_id.required' => 'Select SubCategory Name',
                'subcategory_name_en.required' => 'Input SubCategory English Name',


            ]
        );
        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-', $request->subsubcategory_name_hin),
        ]);
        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SubSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('backend.subcategory.sub_subcategory_edit', compact('subsubcategory', 'categories', 'subcategories'));
    }
    public function SubSubCategoryUpdate(Request $request)
    {
        $subsubcat_id = $request->id;
        SubSubCategory::findOrFail($subsubcat_id)->update([

            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,

            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-', $request->subsubcategory_name_hin),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }
    public function SubSubCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub-SubCategory Delete Successfully',
            'alert-type' => 'danger',
        );
        return redirect()->back()->with($notification);
    }

}
