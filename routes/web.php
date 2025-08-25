<?php

use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/category/product/{slug}/{id}', [FrontendController::class, 'categoryProduct']);
Route::get('/sub-category/product/{slug}/{id}', [FrontendController::class, 'subCategoryProduct']);
Route::get('/type-product/{type}', [FrontendController::class, 'typeProduct']);
Route::get('/product-details/{slug}', [FrontendController::class, 'detailProduct']);
Route::get('/product-details/add-to-cart/{p_id}', [FrontendController::class, 'detailAddToCart']);
Route::get('/product/add-to-cart/{p_id}', [FrontendController::class, 'productAddToCart']);


//Login Route........

Route::get('/admin/login', [AdminAuthController::class, 'loginForm'])->name('admin.login');
Route::get('/admin/logout', [AdminAuthController::class, 'logOutForm']);




Auth::routes();

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);

//Category Route..........

Route::get('/category/create', [CategoryController::class, 'categoryCreate']);
Route::post('/category/store', [CategoryController::class, 'categoryStore']);
Route::get('/category/list', [CategoryController::class, 'categoryList']);
Route::get('/category/edit/{id}', [CategoryController::class, 'categoryEdit']);
Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate']);
Route::get('/category/delete/{id}', [CategoryController::class, 'categoryDelete']);

//Sub Category Route..........

Route::get('/sub-category/create', [SubCategoryController::class, 'subCategoryCreate']);
Route::post('/sub-category/store', [SubCategoryController::class, 'subCategoryStore']);
Route::get('/sub-category/list', [SubCategoryController::class, 'subCategoryList']);
Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'subCategoryEdit']);
Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'subCategoryUpdate']);
Route::get('/sub-category/delete/{id}', [SubCategoryController::class, 'subCategoryDelete']);

//Product Route..........

Route::get('/product/create', [ProductController::class, 'productCreate']);
Route::post('/product/store', [ProductController::class, 'productStore']);
Route::get('/product/list', [ProductController::class, 'productList']);
Route::get('/product/edit/{id}', [ProductController::class, 'productEdit']);
Route::post('/product/update/{id}', [ProductController::class, 'productUpdate']);
Route::get('/product/delete/{id}', [ProductController::class, 'productDelete']);
Route::get('/product/color/delete/{id}', [ProductController::class, 'colorDelete']);
Route::get('/product/size/delete/{id}', [ProductController::class, 'sizeDelete']);
Route::get('/product/galleryimage/delete/{id}', [ProductController::class, 'galleryimageDelete']);