<?php

namespace App\Http\Controllers\homepage;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $getArticle  = Article::where('alanguage', config('app.locale'))->get();
        $getProduct  = Product::where('alanguage', config('app.locale'))->get();
        $getProductCategory  = CategoryProduct::where('alanguage', config('app.locale'))->where('parentid', 0)->get();
        $seo['canonical'] = url('/');
        $seo['meta_title'] = fcSystem()['seo_meta_title'];
        $seo['meta_description'] = fcSystem()['seo_meta_description'];
        $seo['meta_image'] = fcSystem()['seo_meta_images'];
        return view('homepage.home.index', compact('seo', 'getArticle', 'getProduct', 'getProductCategory'));
    }
    public function policy()
    {

        $seo['canonical'] = url('/');
        $seo['meta_title'] = fcSystem()['seo_meta_title'];
        $seo['meta_description'] = fcSystem()['seo_meta_description'];
        $seo['meta_image'] = fcSystem()['seo_meta_images'];
        return view('homepage.home.policy', compact('seo'));
    }
}
