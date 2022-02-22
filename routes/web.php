<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCrontroller;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[FrontendController::class,'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('admin/logout',[HomeController::class,'logout'])->name('admin.logout');

//  start user role
Route::get('/deleteuser/{id}',[HomeController::class,'deleteuser']);
Route::get('/userrole',[RoleController::class,'roleuser']);
Route::post('/roleuser',[RoleController::class,'userrole']);
// end user role 
// start category rouots 
Route::prefix('category')->group(function(){

    Route::get('/create',[CategoryController::class,'create']);
    Route::post('/store',[CategoryController::class,'store']);
    Route::get('/index',[CategoryController::class,'index'])->name('category.index');
    
    Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('delete.category');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
    
    Route::post('/update/{id}',[CategoryController::class,'update'])->name('update.category');
    Route::get('/trush',[CategoryController::class,'deletedcategory'])->name('category.trush');
    Route::get('/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
    Route::get('/parmanentdelete/{id}',[CategoryController::class,'delete'])->name('category.parmanentdelete');
    

});
// ======================subcategory======================
Route::get('/subcategory/create',[SubcategoryController::class,'create'])->name('subcategory.create');
Route::post('/subcategory/store',[SubcategoryController::class,'store']);
Route::get('/subcategory/index',[SubcategoryController::class,'index'])->name('subcategory.index');
Route::get('/subcategory//delete/{id}',[SubcategoryController::class,'delete'])->name('delete.category');
Route::get('/subcategory/edit/{id}',[SubcategoryController::class,'edit']);
Route::post('/subcategory/update/{id}',[SubcategoryController::class,'update']);

// ======================subcategory end======================
Route::get('/product/create',[ProductCrontroller::class,'create'])->name('create.product');
Route::post('/product/store',[ProductCrontroller::class,'store'])->name('product.store');
Route::get('/product/index',[ProductCrontroller::class,'index'])->name('productview.index');



// ===========================product=================


Route::get('/user/dashboard',function(){
    return "use letter";
});
