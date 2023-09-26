<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\IndexController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});
Route::middleware(['auth:admin'])->group(function () {


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'Profile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'EditProfile'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'StoreProfile'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'PasswordProfile'])->name('admin.change.password');
Route::post('/admin/change/update', [AdminProfileController::class, 'UpdatePasswordProfile'])->name('update.change.password');


});



//user all route

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);

    return view('dashboard', compact('user'));
})->name('dashboard');
Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/password', [IndexController::class, 'UserPassword'])->name('user.password');
Route::post('/user/password/store', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');



//Brand all route
Route::prefix('brand')->group(function () {
    Route::get('/view', [BrandController::class, 'BrandView'])->name('brand.view');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});
// Category all route
Route::prefix('category')->group(function () {
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('category.view');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
});
// subCategory all route
Route::prefix('subcategory')->group(function () {
    Route::get('/view', [SubCategoryController::class, 'SubCategoryView'])->name('subcategory.view');
    Route::post('/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('Subcategory.delete');
    //SubSubCategory all route
    Route::get('sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::get('sub/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    Route::get('sub-sub/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
    
    Route::post('sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
});
Route::prefix('product')->group(function () {
    Route::get('/add', [ProductController::class, 'ProductAdd'])->name('add-product');
    Route::post('/store', [ProductController::class, 'ProductStore'])->name('product-store');
    Route::get('/manage', [ProductController::class, 'ProductManage'])->name('manage-product');
    Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product-edit');
    Route::post('/update', [ProductController::class, 'ProductUpdate'])->name('product-update');
    Route::post('/update/img', [ProductController::class, 'ProductUpdateImage'])->name('product-update-image');
    Route::post('/update/thambnail', [ProductController::class, 'ProductUpdateThambnail'])->name('product-update-thambnail');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product-delete');
    Route::get('/inaction/{id}', [ProductController::class, 'ProductInAction'])->name('product-inaction');
    Route::get('/action/{id}', [ProductController::class, 'ProductAction'])->name('product-action');
    Route::get('/pro/delete/{id}', [ProductController::class, 'ProductProDelete'])->name('product-pro-delete');
});
Route::prefix('slider')->group(function () {
    Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider-store');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider-edit');
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider-update');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider-delete');
    Route::get('/inaction/{id}', [SliderController::class, 'SliderInAction'])->name('slider-inaction');
    Route::get('/action/{id}', [SliderController::class, 'SliderAction'])->name('slider-action');


});
// route All language
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/hindi', [LanguageController::class, 'Hindi'])->name('hindi.language');
// route All details
Route::get('product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
// Route all tags
Route::get('product/tag/{tag}', [IndexController::class, 'ProductTag']);
// subcategory wise data
Route::get('subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCategoryWiseData']);
//subsubcategory wise data
Route::get('subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCategoryWiseData']);