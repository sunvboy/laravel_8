<?php

namespace App\Http\Controllers\article\frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($slug = "", $id = 0)
    {
        $detail = Article::where('slug', $slug)->first();
        if (!isset($detail)) {
            return redirect()->route('homepage.index');
        }
        $seo['canonical'] = route('articleFrontend.index', ['slug' => $slug, 'id' => $id]);
        $seo['meta_title'] =  !empty($detail['meta_title']) ? $detail['meta_title'] : $detail['title'];
        $seo['meta_description'] = !empty($detail['meta_description']) ? $detail['meta_description'] : cutnchar(strip_tags($detail->description));
        $seo['meta_image'] = $detail['image'];
        return view('article.frontend.article.index', compact('detail', 'seo'));
    }
}
