<?php

namespace App\Http\Controllers\article\frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug = "", $id = 0)
    {
        $detail = CategoryArticle::where('slug', $slug)->first();
        if (!isset($detail)) {
            return redirect()->route('homepage.index');
        }
        $data =  Article::join('catalogues_relationships', 'articles.id', '=', 'catalogues_relationships.moduleid')->where('catalogues_relationships.module', '=', 'article');;
        if (!empty($detail->id)) {
            $data =  $data->where('catalogues_relationships.catalogueid', $detail->id);
        }
        $data =  $data->paginate(env('APP_paginate'));
        $seo['canonical'] = route('articleFrontend.index', ['slug' => $slug, 'id' => $id]);
        $seo['meta_title'] =  !empty($detail['meta_title']) ? $detail['meta_title'] : $detail['title'];
        $seo['meta_description'] = !empty($detail['meta_description']) ? $detail['meta_description'] : cutnchar(strip_tags($detail->description));
        $seo['meta_image'] = $detail['image'];
        return view('article.frontend.category.index', compact('detail', 'seo', 'data'));
    }
}
