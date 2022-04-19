<?php

use App\Http\Controllers\address\backend\AddressController;
use App\Http\Controllers\article\backend\ArticleController;
use App\Http\Controllers\article\backend\CategoryController as BackendCategoryController;
use App\Http\Controllers\attribute\backend\CategoryController as AttributeCategoryController;
use App\Http\Controllers\attribute\backend\AttributeController as AttributeController;
use App\Http\Controllers\brand\backend\BrandController;
use App\Http\Controllers\comment\backend\CommentController;
use App\Http\Controllers\components\ComponentsController;
use App\Http\Controllers\contact\backend\ContactController;
use App\Http\Controllers\coupon\CounponController;
use App\Http\Controllers\customer\backend\CustomerController;
use App\Http\Controllers\dashboard\AjaxController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\GeneralController;
use App\Http\Controllers\media\backend\CategoryController as MediaBackendCategoryController;
use App\Http\Controllers\media\backend\MediaController;
use App\Http\Controllers\menu\backend\MenuController;
use App\Http\Controllers\module\ModuleController;
use App\Http\Controllers\order\backend\OrderController;
use App\Http\Controllers\page\backend\PageController;
use App\Http\Controllers\product\backend\CategoryController;
use App\Http\Controllers\product\backend\ProductController;
use App\Http\Controllers\slide\backend\SlideController;
use App\Http\Controllers\tag\backend\TagController;
use App\Http\Controllers\tool\CrawlController;
use App\Http\Controllers\user\backend\AuthController;
use App\Http\Controllers\user\backend\PermissionController;
use App\Http\Controllers\user\backend\ResetPasswordController;
use App\Http\Controllers\user\backend\RolesController;
use App\Http\Controllers\user\backend\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => env('APP_ADMIN'), 'middleware' => ['guest:web']], function () {

    Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'store'])->name('admin.login-store');
    Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('admin.reset-password');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('admin.reset-password-store');
    Route::get('/reset-password-new', [ResetPasswordController::class, 'reset_password_new'])->name('admin.reset-password-new');
});
Route::group(['middleware' => 'locale'], function () {
    Route::group(['prefix' => env('APP_ADMIN'), 'middleware' => ['auth:web']], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        //ajax
        Route::post('/select2', [AjaxController::class, 'select2']);
        Route::post('/ajax-create', [AjaxController::class, 'ajax_create'])->name('ajax-create');
        Route::post('/ajax-delete', [AjaxController::class, 'ajax_delete']);
        Route::post('/ajax-delete-all', [AjaxController::class, 'ajax_delete_all']);
        Route::post('/ajax-order', [AjaxController::class, 'ajax_order']);
        Route::post('/publish-ajax', [AjaxController::class, 'ajax_publish']);
        Route::post('/get-select2', [AjaxController::class, 'get_select2']);
        Route::post('/pre-select2', [AjaxController::class, 'pre_select2']);
        //cấu hình hệ thống
        Route::get('/general', [GeneralController::class, 'general'])->name('general.general');
        Route::post('/general/store', [GeneralController::class, 'store'])->name('general.store');
        //auth
        Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::get('/my-profile', [AuthController::class, 'profile'])->name('admin.profile');
        Route::post('/my-profile/{id}', [AuthController::class, 'profile_store'])->name('admin.profile-store');
        Route::post('/my-password/{id}', [AuthController::class, 'profile_password'])->name('admin.profile-password');

        //module
        Route::get('/module', [ModuleController::class, 'index'])->name('module.index');


        //permission
        Route::group(['prefix' => '/permission'], function () {
            Route::get('/index', [PermissionController::class, 'index'])->name('permission.index');
            Route::get('/create', [PermissionController::class, 'create'])->name('permission.create');
            Route::post('/store', [PermissionController::class, 'store'])->name('permission.store');
        });
        //nhóm thành viên
        Route::group(['prefix' => '/roles'], function () {
            Route::get('/index', [RolesController::class, 'index'])->name('roles.index')->middleware('can:role_index');
            Route::get('/create', [RolesController::class, 'create'])->name('roles.create')->middleware('can:role_create');
            Route::post('/store', [RolesController::class, 'store'])->name('roles.store')->middleware('can:role_create');
            Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('roles.edit')->middleware('can:role_edit');
            Route::post('/update/{id}', [RolesController::class, 'update'])->name('roles.update')->middleware('can:role_edit');
            Route::get('/destroy/{id}', [RolesController::class, 'destroy'])->name('roles.destroy')->middleware('can:role_destroy');
        });
        //Thành viên quản trị
        Route::group(['prefix' => '/users'], function () {
            Route::get('/index', [UsersController::class, 'index'])->name('users.index')->middleware('can:user_index');
            Route::get('/create', [UsersController::class, 'create'])->name('users.create')->middleware('can:user_create');
            Route::post('/store', [UsersController::class, 'store'])->name('users.store')->middleware('can:user_create');
            Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit')->middleware('can:user_edit');
            Route::post('/update/{id}', [UsersController::class, 'update'])->name('users.update')->middleware('can:user_edit');
            Route::get('/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy')->middleware('can:role_destroy');
            Route::get('/reset-password', [UsersController::class, 'reset_password'])->name('users.reset-password')->middleware('can:user_edit');
        });
        //slide
        Route::group(['prefix' => '/slide'], function () {
            Route::get('/index', [SlideController::class, 'index'])->name('slide.index');
            Route::post('/store', [SlideController::class, 'store'])->name('slide.store');
            Route::post('/category_store', [SlideController::class, 'category_store'])->name('slide.category_store');
            Route::post('/update', [SlideController::class, 'update'])->name('slide.update');
        });

        //danh mục attribute
        Route::group(['prefix' => '/attribute-category'], function () {
            Route::get('/index', [AttributeCategoryController::class, 'index'])->name('attributeCategory.index')->middleware('can:attribute_category_index');
            Route::get('/create', [AttributeCategoryController::class, 'create'])->name('attributeCategory.create')->middleware('can:attribute_category_create');
            Route::post('/store', [AttributeCategoryController::class, 'store'])->name('attributeCategory.store');
            Route::get('/edit/{id}', [AttributeCategoryController::class, 'edit'])->name('attributeCategory.edit')->middleware('can:attribute_category_edit');
            Route::post('/update/{id}', [AttributeCategoryController::class, 'update'])->name('attributeCategory.update')->middleware('can:attribute_category_edit');
            Route::get('/destroy/{id}', [AttributeCategoryController::class, 'destroy'])->name('attributeCategory.destroy')->middleware('can:attribute_category_destroy');
        });

        //danh sách attribute
        Route::group(['prefix' => '/attribute'], function () {
            Route::get('/index', [AttributeController::class, 'index'])->name('attribute.index')->middleware('can:attribute_index');
            Route::get('/create', [AttributeController::class, 'create'])->name('attribute.create')->middleware('can:attribute_create');
            Route::post('/store', [AttributeController::class, 'store'])->name('attribute.store');
            Route::get('/edit/{id}', [AttributeController::class, 'edit'])->name('attribute.edit')->middleware('can:attribute_edit');
            Route::post('/update/{id}', [AttributeController::class, 'update'])->name('attribute.update')->middleware('can:attribute_edit');
            Route::get('/destroy/{id}', [AttributeController::class, 'destroy'])->name('attribute.destroy')->middleware('can:attribute_destroy');
            Route::post('/select2', [AttributeController::class, 'select2']);
        });

        //danh mục sản phẩm
        Route::group(['prefix' => '/product-category'], function () {
            Route::get('/index', [CategoryController::class, 'index'])->name('productCategory.index')->middleware('can:product_category_index');
            Route::get('/create', [CategoryController::class, 'create'])->name('productCategory.create')->middleware('can:product_category_create');
            Route::post('/store', [CategoryController::class, 'store'])->name('productCategory.store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('productCategory.edit')->middleware('can:product_category_edit');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('productCategory.update')->middleware('can:product_category_edit');
            Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('productCategory.destroy')->middleware('can:product_category_destroy');
        });
        //sản phẩm
        Route::group(['prefix' => '/product'], function () {
            Route::get('/index', [ProductController::class, 'index'])->name('product.index')->middleware('can:product_index');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create')->middleware('can:product_create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware('can:product_edit');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update')->middleware('can:product_edit');
            Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('can:product_destroy');

            Route::post('/get-attrid', [ProductController::class, 'get_attrid']);
            Route::get('/list-product', [ProductController::class, 'listproduct']);
            Route::get('/index/pagination', [ProductController::class, 'pagination'])->middleware('can:product_index');
        });
        //tag
        Route::group(['prefix' => '/tag'], function () {
            Route::get('/index', [TagController::class, 'index'])->name('tag.index')->middleware('can:tag_index');
            Route::get('/create', [TagController::class, 'create'])->name('tag.create')->middleware('can:tag_create');
            Route::post('/store', [TagController::class, 'store'])->name('tag.store');
            Route::get('/edit/{id}', [TagController::class, 'edit'])->name('tag.edit')->middleware('can:tag_edit');
            Route::post('/update/{id}', [TagController::class, 'update'])->name('tag.update')->middleware('can:tag_edit');
            Route::get('/destroy/{id}', [TagController::class, 'destroy'])->name('tag.destroy')->middleware('can:tag_destroy');
        });
        Route::group(['prefix' => '/brand'], function () {
            Route::get('/index', [BrandController::class, 'index'])->name('brand.index')->middleware('can:brand_index');
            Route::get('/create', [BrandController::class, 'create'])->name('brand.create')->middleware('can:brand_create');
            Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
            Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit')->middleware('can:brand_edit');
            Route::post('/update/{id}', [BrandController::class, 'update'])->name('brand.update')->middleware('can:brand_edit');
            Route::get('/destroy/{id}', [BrandController::class, 'destroy'])->name('brand.destroy')->middleware('can:brand_destroy');
        });
        Route::group(['prefix' => '/coupon'], function () {
            Route::get('/index', [CounponController::class, 'index'])->name('coupon.index')->middleware('can:coupon_index');
            Route::get('/create', [CounponController::class, 'create'])->name('coupon.create')->middleware('can:coupon_create');
            Route::post('/store', [CounponController::class, 'store'])->name('coupon.store');
            Route::get('/edit/{id}', [CounponController::class, 'edit'])->name('coupon.edit')->middleware('can:coupon_edit');
            Route::post('/update/{id}', [CounponController::class, 'update'])->name('coupon.update')->middleware('can:coupon_edit');
            Route::get('/destroy/{id}', [CounponController::class, 'destroy'])->name('coupon.destroy')->middleware('can:coupon_destroy');
        });
        //danh mục article
        Route::group(['prefix' => '/article-category'], function () {
            Route::get('/index', [BackendCategoryController::class, 'index'])->name('articleCategory.index')->middleware('can:article_category_index');
            Route::get('/create', [BackendCategoryController::class, 'create'])->name('articleCategory.create')->middleware('can:article_category_create');
            Route::post('/store', [BackendCategoryController::class, 'store'])->name('articleCategory.store');
            Route::get('/edit/{id}', [BackendCategoryController::class, 'edit'])->name('articleCategory.edit')->middleware('can:article_category_edit');
            Route::post('/update/{id}', [BackendCategoryController::class, 'update'])->name('articleCategory.update')->middleware('can:article_category_edit');
            Route::get('/destroy/{id}', [BackendCategoryController::class, 'destroy'])->name('articleCategory.destroy')->middleware('can:article_category_destroy');
        });

        //danh sách article
        Route::group(['prefix' => '/article'], function () {
            Route::get('/index', [ArticleController::class, 'index'])->name('article.index')->middleware('can:article_index');
            Route::get('/create', [ArticleController::class, 'create'])->name('article.create')->middleware('can:article_create');
            Route::post('/store', [ArticleController::class, 'store'])->name('article.store');
            Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit')->middleware('can:article_edit');
            Route::post('/update/{id}', [ArticleController::class, 'update'])->name('article.update')->middleware('can:article_edit');
            Route::get('/destroy/{id}', [ArticleController::class, 'destroy'])->name('article.destroy')->middleware('can:article_destroy');
            Route::post('/select2', [ArticleController::class, 'select2']);
        });
        //danh mục media
        Route::group(['prefix' => '/media-category'], function () {
            Route::get('/index', [MediaBackendCategoryController::class, 'index'])->name('mediaCategory.index')->middleware('can:media_category_index');
            Route::get('/create', [MediaBackendCategoryController::class, 'create'])->name('mediaCategory.create')->middleware('can:media_category_create');
            Route::post('/store', [MediaBackendCategoryController::class, 'store'])->name('mediaCategory.store');
            Route::get('/edit/{id}', [MediaBackendCategoryController::class, 'edit'])->name('mediaCategory.edit')->middleware('can:media_category_edit');
            Route::post('/update/{id}', [MediaBackendCategoryController::class, 'update'])->name('mediaCategory.update')->middleware('can:media_category_edit');
            Route::get('/destroy/{id}', [MediaBackendCategoryController::class, 'destroy'])->name('mediaCategory.destroy')->middleware('can:media_category_destroy');
        });

        //danh sách media
        Route::group(['prefix' => '/media'], function () {
            Route::get('/index', [MediaController::class, 'index'])->name('media.index')->middleware('can:media_index');
            Route::get('/create', [MediaController::class, 'create'])->name('media.create')->middleware('can:media_create');
            Route::post('/store', [MediaController::class, 'store'])->name('media.store');
            Route::get('/edit/{id}', [MediaController::class, 'edit'])->name('media.edit')->middleware('can:media_edit');
            Route::post('/update/{id}', [MediaController::class, 'update'])->name('media.update')->middleware('can:media_edit');
            Route::get('/destroy/{id}', [MediaController::class, 'destroy'])->name('media.destroy')->middleware('can:media_destroy');
            Route::post('/get-select-type', [MediaController::class, 'get_select_type']);
        });
        //liên hệ
        Route::group(['prefix' => '/contact'], function () {
            Route::get('/index', [ContactController::class, 'index'])->name('contact.index');
            Route::post('/index', [ContactController::class, 'store'])->name('contact.index_store');
        });
        //menu
        Route::group(['prefix' => '/menu'], function () {
            Route::get('index', [MenuController::class, 'index'])->name('menus.index')->middleware('can:menu_index');
            Route::post('store', [MenuController::class, 'store'])->name('menus.store');
            //nút "thêm vào menu"
            Route::get('add-menu-item', [MenuController::class, 'addMenuItem'])->name('addMenuItem')->middleware('can:menu_create');
            //nút Liên kết tự tạo => "thêm vào menu"
            Route::get('add-custom-link', [MenuController::class, 'addCustomLink'])->name('addCustomLink')->middleware('can:menu_create');
            //nút Lưu menu item
            Route::post('update-menu-item/{id}', [MenuController::class, 'updateMenuItem'])->name('update-menu-item')->middleware('can:menu_edit');
            //nút Xóa menu item
            Route::get('delete-menu-item/{id}', [MenuController::class, 'deleteMenuItem'])->name('delete-menu-item')->middleware('can:menu_edit');
            //nút LƯU MENU khi kéo thả
            Route::get('update-menu', [MenuController::class, 'updateMenu'])->name('update-menu')->middleware('can:menu_edit');
            //nút XÓA MENU
            Route::get('delete-menu/{id}', [MenuController::class, 'destroy'])->name('delete-menu')->middleware('can:menu_destroy');
        });


        //address
        Route::group(['prefix' => '/address'], function () {
            Route::get('index', [AddressController::class, 'index'])->name('address.index')->middleware('can:address_index');
            Route::get('create', [AddressController::class, 'create'])->name('address.create')->middleware('can:address_create');
            Route::post('create', [AddressController::class, 'store'])->name('address.store')->middleware('can:address_create');
            Route::get('edit/{id}', [AddressController::class, 'edit'])->name('address.edit')->middleware('can:address_edit');
            Route::post('update/{id}', [AddressController::class, 'update'])->name('address.update')->middleware('can:address_edit');
            Route::get('destroy', [AddressController::class, 'destroy'])->name('address.destroy')->middleware('can:address_destroy');
            Route::post('getLocation', [AddressController::class, 'getLocation'])->name('address.getLocation');
        });
        Route::group(['prefix' => '/page'], function () {
            Route::get('index', [PageController::class, 'index'])->name('page.index')->middleware('can:page_index');
            Route::get('create', [PageController::class, 'create'])->name('page.create')->middleware('can:page_create');
            Route::post('create', [PageController::class, 'store'])->name('page.store')->middleware('can:page_create');
            Route::get('edit/{id}', [PageController::class, 'edit'])->name('page.edit')->middleware('can:page_edit');
            Route::post('update/{id}', [PageController::class, 'update'])->name('page.update')->middleware('can:page_edit');
            Route::get('destroy', [PageController::class, 'destroy'])->name('page.destroy')->middleware('can:page_destroy');
        });
        //order
        Route::group(['prefix' => '/order'], function () {
            Route::get('index', [OrderController::class, 'index'])->name('order.index')->middleware('can:order_index');
            Route::get('edit/{id}', [OrderController::class, 'edit'])->name('order.edit')->middleware('can:order_edit');
            Route::post('update/{id}', [OrderController::class, 'update'])->name('order.update')->middleware('can:order_edit');
            Route::get('destroy', [OrderController::class, 'destroy'])->name('order.destroy')->middleware('can:order_destroy');
        });
        //comments
        Route::group(['prefix' => '/comment'], function () {
            Route::get('index', [CommentController::class, 'index'])->name('comment.index')->middleware('can:comment_index');
            Route::get('edit/{id}', [CommentController::class, 'edit'])->name('comment.edit')->middleware('can:comment_edit');
            Route::post('update/{id}', [CommentController::class, 'update'])->name('comment.update')->middleware('can:comment_edit');
            Route::get('destroy', [CommentController::class, 'destroy'])->name('comment.destroy')->middleware('can:comment_destroy');
        });
        //customer
        Route::group(['prefix' => '/customer'], function () {
            Route::get('index', [CustomerController::class, 'index'])->name('customer.index')->middleware('can:customer_index');
            Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit')->middleware('can:customer_edit');
            Route::post('update/{id}', [CustomerController::class, 'update'])->name('customer.update')->middleware('can:customer_edit');
            Route::get('destroy', [CustomerController::class, 'destroy'])->name('customer.destroy')->middleware('can:customer_destroy');
        });
    });
    Route::group(['prefix' => '/components'], function () {

        Route::post('getLocation', [ComponentsController::class, 'getLocation'])->name('components.getLocation');
        Route::post('upload-images-comment', [ComponentsController::class, 'uploadImagesComment'])->name('components.uploadImagesComment');
    });
    Route::get('language/{language}', [ComponentsController::class, 'language'])->name('components.language');
    Route::group(['prefix' => '/tool'], function () {

        Route::get('crawl_pd', [CrawlController::class, 'index_product_category'])->name('crawl.pd');
        Route::get('crawl_b', [CrawlController::class, 'index_brand'])->name('crawl.b');
    });
});
