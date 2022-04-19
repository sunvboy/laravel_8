<?php

namespace App\Providers;

use App\Policies\AddressPolicy;
use App\Policies\ArticlePolicy;
use App\Policies\CategoryAttributePolicy;
use App\Policies\CategoryProductPolicy;
use App\Policies\AttributePolicy;
use App\Policies\BrandPolicy;
use App\Policies\CategoryArticlePolicy;
use App\Policies\CategoryMediaPolicy;
use App\Policies\CommentPolicy;
use App\Policies\CouponPolicy;
use App\Policies\CustomerPolicy;
use App\Policies\MediaPolicy;
use App\Policies\MenuPolicy;
use App\Policies\OrderPolicy;
use App\Policies\PagePolicy;
use App\Policies\ProductPolicy;
use App\Policies\RolePolicy;
use App\Policies\TagPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->gateProductCategory();
        //thuộc tính
        $this->gateAttributeCategory();
        $this->gateAttribute();
        //sản phẩm
        $this->gateProductCategory();
        $this->gateProduct();
        //tag
        $this->gateTag();
        //brand
        $this->gateBrand();

        $this->gateRole();
        $this->gateUser();
        $this->gateArticleCategory();
        $this->gateArticle();
        $this->gateCoupon();
        $this->gatePage();
        $this->gateAddress();
        $this->gateMenu();
        $this->gateOrder();
        $this->gateComment();
        $this->gateCustomer();
        $this->gateMedia();
        $this->gateMediaCategory();
        // Gate::define('product_category_index', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.product_category.index'));
        // });
        // Gate::define('product_category_create', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.product_category.create'));
        // });
        // Gate::define('product_category_edit', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.product_category.edit'));
        // });
        // Gate::define('product_category_destroy', function ($user) {
        //     return $user->checkPermissionAccess(config('permissions.product_category.destroy'));
        // });


    }
    public function gateArticleCategory()
    {
        Gate::define('article_category_index', [CategoryArticlePolicy::class, 'index']);
        Gate::define('article_category_create', [CategoryArticlePolicy::class, 'create']);
        Gate::define('article_category_edit', [CategoryArticlePolicy::class, 'edit']);
        Gate::define('article_category_destroy', [CategoryArticlePolicy::class, 'destroy']);
    }
    public function gateArticle()
    {
        Gate::define('article_index', [ArticlePolicy::class, 'index']);
        Gate::define('article_create', [ArticlePolicy::class, 'create']);
        Gate::define('article_edit', [ArticlePolicy::class, 'edit']);
        Gate::define('article_destroy', [ArticlePolicy::class, 'destroy']);
    }
    public function gateAttributeCategory()
    {
        Gate::define('attribute_category_index', [CategoryAttributePolicy::class, 'index']);
        Gate::define('attribute_category_create', [CategoryAttributePolicy::class, 'create']);
        Gate::define('attribute_category_edit', [CategoryAttributePolicy::class, 'edit']);
        Gate::define('attribute_category_destroy', [CategoryAttributePolicy::class, 'destroy']);
    }
    public function gateAttribute()
    {
        Gate::define('attribute_index', [AttributePolicy::class, 'index']);
        Gate::define('attribute_create', [AttributePolicy::class, 'create']);
        Gate::define('attribute_edit', [AttributePolicy::class, 'edit']);
        Gate::define('attribute_destroy', [AttributePolicy::class, 'destroy']);
    }
    public function gateProductCategory()
    {
        Gate::define('product_category_index', [CategoryProductPolicy::class, 'index']);
        Gate::define('product_category_create', [CategoryProductPolicy::class, 'create']);
        Gate::define('product_category_edit', [CategoryProductPolicy::class, 'edit']);
        Gate::define('product_category_destroy', [CategoryProductPolicy::class, 'destroy']);
    }
    public function gateProduct()
    {
        Gate::define('product_index', [ProductPolicy::class, 'index']);
        Gate::define('product_create', [ProductPolicy::class, 'create']);
        Gate::define('product_edit', [ProductPolicy::class, 'edit']);
        Gate::define('product_destroy', [ProductPolicy::class, 'destroy']);
    }
    public function gateRole()
    {
        Gate::define('role_index', [RolePolicy::class, 'index']);
        Gate::define('role_create', [RolePolicy::class, 'create']);
        Gate::define('role_edit', [RolePolicy::class, 'edit']);
        Gate::define('role_destroy', [RolePolicy::class, 'destroy']);
    }
    public function gateUser()
    {
        Gate::define('user_index', [UserPolicy::class, 'index']);
        Gate::define('user_create', [UserPolicy::class, 'create']);
        Gate::define('user_edit', [UserPolicy::class, 'edit']);
        Gate::define('user_destroy', [UserPolicy::class, 'destroy']);
    }
    public function gateTag()
    {
        Gate::define('tag_index', [TagPolicy::class, 'index']);
        Gate::define('tag_create', [TagPolicy::class, 'create']);
        Gate::define('tag_edit', [TagPolicy::class, 'edit']);
        Gate::define('tag_destroy', [TagPolicy::class, 'destroy']);
    }
    public function gateBrand()
    {
        Gate::define('brand_index', [BrandPolicy::class, 'index']);
        Gate::define('brand_create', [BrandPolicy::class, 'create']);
        Gate::define('brand_edit', [BrandPolicy::class, 'edit']);
        Gate::define('brand_destroy', [BrandPolicy::class, 'destroy']);
    }
    public function gateCoupon()
    {
        Gate::define('coupon_index', [CouponPolicy::class, 'index']);
        Gate::define('coupon_create', [CouponPolicy::class, 'create']);
        Gate::define('coupon_edit', [CouponPolicy::class, 'edit']);
        Gate::define('coupon_destroy', [CouponPolicy::class, 'destroy']);
    }
    public function gatePage()
    {
        Gate::define('page_index', [PagePolicy::class, 'index']);
        Gate::define('page_create', [PagePolicy::class, 'create']);
        Gate::define('page_edit', [PagePolicy::class, 'edit']);
        Gate::define('page_destroy', [PagePolicy::class, 'destroy']);
    }
    public function gateAddress()
    {
        Gate::define('address_index', [AddressPolicy::class, 'index']);
        Gate::define('address_create', [AddressPolicy::class, 'create']);
        Gate::define('address_edit', [AddressPolicy::class, 'edit']);
        Gate::define('address_destroy', [AddressPolicy::class, 'destroy']);
    }
    public function gateMenu()
    {
        Gate::define('menu_index', [MenuPolicy::class, 'index']);
        Gate::define('menu_create', [MenuPolicy::class, 'create']);
        Gate::define('menu_edit', [MenuPolicy::class, 'edit']);
        Gate::define('menu_destroy', [MenuPolicy::class, 'destroy']);
    }
    public function gateOrder()
    {
        Gate::define('order_index', [OrderPolicy::class, 'index']);
        Gate::define('order_create', [OrderPolicy::class, 'create']);
        Gate::define('order_edit', [OrderPolicy::class, 'edit']);
        Gate::define('order_destroy', [OrderPolicy::class, 'destroy']);
    }
    public function gateComment()
    {
        Gate::define('comment_index', [CommentPolicy::class, 'index']);
        Gate::define('comment_create', [CommentPolicy::class, 'create']);
        Gate::define('comment_edit', [CommentPolicy::class, 'edit']);
        Gate::define('comment_destroy', [CommentPolicy::class, 'destroy']);
    }
    public function gateCustomer()
    {
        Gate::define('customer_index', [CustomerPolicy::class, 'index']);
        Gate::define('customer_create', [CustomerPolicy::class, 'create']);
        Gate::define('customer_edit', [CustomerPolicy::class, 'edit']);
        Gate::define('customer_destroy', [CustomerPolicy::class, 'destroy']);
    }
    public function gateMedia()
    {
        Gate::define('media_index', [MediaPolicy::class, 'index']);
        Gate::define('media_create', [MediaPolicy::class, 'create']);
        Gate::define('media_edit', [MediaPolicy::class, 'edit']);
        Gate::define('media_destroy', [MediaPolicy::class, 'destroy']);
    }
    public function gateMediaCategory()
    {
        Gate::define('media_category_index', [CategoryMediaPolicy::class, 'index']);
        Gate::define('media_category_create', [CategoryMediaPolicy::class, 'create']);
        Gate::define('media_category_edit', [CategoryMediaPolicy::class, 'edit']);
        Gate::define('media_category_destroy', [CategoryMediaPolicy::class, 'destroy']);
    }
}
