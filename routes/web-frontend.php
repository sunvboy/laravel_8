<?php

use App\Http\Controllers\address\frontend\AddressController;
use App\Http\Controllers\article\frontend\ArticleController;
use App\Http\Controllers\article\frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\comment\frontend\CommentController;
use App\Http\Controllers\contact\frontend\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\customer\frontend\CustomerController;
use App\Http\Controllers\homepage\HomeController;
use App\Http\Controllers\order\frontend\OrderController;
use App\Http\Controllers\product\frontend\CartController;
use App\Http\Controllers\product\frontend\CategoryController;
use App\Http\Controllers\product\frontend\ProductController;
use Clockwork\Request\Request;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [HomeController::class, 'index'])->name('homepage.index');
Route::get('/lien-he', [ContactController::class, 'get']);
Route::post('/lien-he', [ContactController::class, 'post']);
//hệ thống cửa hàng
Route::group(['prefix' => '/he-thong-cua-hang'], function () {
    Route::get('/', [AddressController::class, 'index'])->name('addressFrontend.index');
    Route::post('getLocation-store', [AddressController::class, 'getLocationFrontend'])->name('addressFrontend.getLocation');
});
//login
Route::group(['prefix' => 'thanh-vien', 'middleware' => ['guest:customer']], function () {
    Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
    Route::post('/login', [CustomerController::class, 'store'])->name('customer.login-store');
    Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
    Route::post('/register', [CustomerController::class, 'register_store'])->name('customer.register-store');
    //login social
    Route::get('/login/redirect/{provider}', [CustomerController::class, 'redirect'])->name('customer.redirect');
    Route::get('/login/callback/{provider}', [CustomerController::class, 'callback'])->name('customer.callback');
    Route::get('/reset-password', [CustomerController::class, 'reset_password'])->name('customer.reset-password');
    Route::post('/reset-password', [CustomerController::class, 'reset_password_store'])->name('customer.reset-password-store');
    Route::get('/reset-password-new', [CustomerController::class, 'reset_password_new'])->name('customer.reset-password-new');
});

Route::group(['prefix' => 'thanh-vien', 'middleware' => ['auth:customer']], function () {
    Route::get('/thong-tin-tai-khoan', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/thong-tin-lien-he', [CustomerController::class, 'address'])->name('customer.address');
    Route::get('/quan-ly-don-hang', [CustomerController::class, 'orders'])->name('customer.orders');
    Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
});
Route::get('/chinh-sach', [HomeController::class, 'policy'])->name('homepage.policy');

//ajax
Route::group(['prefix' => 'gio-hang'], function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::get('/thanh-toan', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/thanh-toan-thanh-cong/{id}', [CartController::class, 'success'])->name('cart.success');

    Route::get('get-version-product', [CartController::class, 'getversion'])->name('cart.getversion');
    Route::get('addtocart', [CartController::class, 'addtocart'])->name('cart.addtocart');
    Route::get('updatecart', [CartController::class, 'updatecart'])->name('cart.updatecart');
    Route::get('removecart', [CartController::class, 'removecart'])->name('cart.removecart');
    Route::get('addcounpon', [CartController::class, 'addcounpon'])->name('cart.addcounpon');
    Route::get('deletecoupon', [CartController::class, 'deletecoupon'])->name('cart.deletecoupon');
});
Route::group(['prefix' => 'order'], function () {
    Route::post('/', [OrderController::class, 'order'])->name('cart.order');
    Route::get('momo-result', [OrderController::class, 'momo_result'])->name('momo.result');
    Route::get('momo-ipn', [OrderController::class, 'momo_ipn'])->name('momo.ipn');
    Route::get('vnpay-result', [OrderController::class, 'vnpay_result'])->name('vnpay.result');
});
Route::group(['prefix' => 'comment'], function () {
    Route::post('/post-comment', [CommentController::class, 'postCmt'])->name('commentFrontend.post')->middleware('auth:customer');
    Route::post('/reply-comment', [CommentController::class, 'reply_comment'])->name('replyComment.post')->middleware('auth:customer');
});

Route::group(['prefix' => 'comment'], function () {
    Route::post('/get-list-comment', [ProductController::class, 'getListComment'])->name('getListComment.frontend');
});
Route::post('/danh-muc-san-pham/filter', [CategoryController::class, 'filter'])->name('productCategoryFrontend.filter');
