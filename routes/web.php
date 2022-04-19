<?php

use App\Http\Controllers\article\frontend\ArticleController;
use App\Http\Controllers\article\frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\product\frontend\CategoryController;
use App\Http\Controllers\product\frontend\ProductController;
use Illuminate\Support\Facades\Route;

//chi tiết sản phẩm
Route::get('/{slug}-p{id}', [ProductController::class, 'index'])
    ->name('productFrontend.index')->where(['id' => '\d+'])->where(['slug' => '.+']);
//danh mục sản phẩm
Route::get('/{slug}-pc{id}', [CategoryController::class, 'index'])
    ->name('productCategoryFrontend.index')->where(['id' => '\d+'])->where(['slug' => '.+']);
//bài viết
Route::get('/{slug}-a{id}', [ArticleController::class, 'index'])
    ->name('articleFrontend.index')->where(['id' => '\d+'])->where(['slug' => '.+']);
//danh mục bài viết
Route::get('/{slug}-ac{id}', [FrontendCategoryController::class, 'index'])
    ->name('articleCategoryFrontend.index')->where(['id' => '\d+'])->where(['slug' => '.+']);
