<?php

namespace App\Http\Controllers\article\backend;

use App\Components\Nestedsetbie;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Components\Helper;
use App\Models\Tag;

class ArticleController extends Controller
{
    protected $Nestedsetbie;
    protected $Helper;
    public function __construct()
    {
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_articles'));
        $this->Helper = new Helper();
    }
    public function index(Request $request)
    {
        $module = 'articles';
        $data =  Article::where('alanguage', config('app.locale'))->orderBy('order', 'ASC')->orderBy('id', 'DESC');
        $keyword = $request->keyword;
        $catalogueid = $request->catalogueid;
        if (!empty($keyword)) {
            $data =  $data->where('articles.title', 'like', '%' . $keyword . '%');
        }
        $data = $data->join('catalogues_relationships', 'articles.id', '=', 'catalogues_relationships.moduleid')->where('catalogues_relationships.module', '=', 'article');
        if (!empty($catalogueid)) {
            $data =  $data->where('catalogues_relationships.catalogueid', $catalogueid);
        }
        $data =  $data->groupBy('catalogues_relationships.moduleid');
        $data =  $data->paginate(env('APP_paginate'));
        if (is($keyword)) {
            $data->appends(['keyword' => $keyword]);
        }
        if (is($catalogueid)) {
            $data->appends(['catalogueid' => $catalogueid]);
        }
        $htmlOption = $this->Nestedsetbie->dropdown();
        return view('article.backend.article.index', compact('data', 'module', 'htmlOption'));
    }
    public function create()
    {
        $dropdown = getFunctions();
        $module = 'articles';
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        //tags
        $getTags = [];
        if (old('tags')) {
            $getTags = old('tags');
        }
        $tags = relationships('\App\Models\Tag', $getTags);
        //end tag
        return view('article.backend.article.create', compact('module', 'htmlCatalogue', 'tags', 'dropdown'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:router',
            'catalogueid' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn bài viết là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn bài viết đã tồn tại.',
            'catalogueid.gt' => 'Danh mục là trường bắt buộc.',
        ]);
        $this->submitArticle($request, 'create', 0);
        return redirect()->route('article.index')->with('success', "Thêm mới sản phẩm thành công");
    }
    public function edit($id)
    {
        $dropdown = getFunctions();
        $module = 'articles';
        $detail  = Article::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('article.index')->with('error', "Bài viết không tồn tại");
        }
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        //tags
        $getTags = [];
        if (old('tags')) {
            $getTags = old('tags');
        } else {
            foreach ($detail->tags as $k => $v) {
                $getTags[] = $v['tagid'];
            }
        }
        $tags = relationships('\App\Models\Tag', $getTags);
        //end tag
        return view('article.backend.article.edit', compact('module', 'detail', 'htmlCatalogue', 'tags', 'dropdown'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:router,slug,' . $id . ',moduleid',
            'catalogueid' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',
            'catalogueid.gt' => 'Danh mục chính là trường bắt buộc.',
        ]);
        $this->submitArticle($request, 'update', $id);
        return redirect()->route('article.index')->with('success', "Cập nhập bài viết thành công");
    }
    public function submitArticle($request = [], $action = '', $id = 0)
    {
        if ($action == 'create') {
            $time = 'created_at';
            $user = 'userid_created';
        } else {
            $time = 'updated_at';
            $user = 'userid_updated';
        }
        $catalogue = $request['catalogue'];
        $tmp_catalogue = [];
        if (isset($catalogue)) {
            foreach ($catalogue as $v) {
                if ($v != 0 && $v != $request['catalogueid']) {
                    $tmp_catalogue[] = $v;
                }
            }
        }
        $_data = [
            'title' => $request['title'],
            'slug' => $request['slug'],
            'catalogueid' => $request['catalogueid'],
            'image' => $request['image'],
            'description' => $request['description'],
            'content' => $request['content'],
            'catalogue' => json_encode($tmp_catalogue),
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'publish' => $request['publish'],
            $user => Auth::user()->id,
            $time => Carbon::now(),
            'alanguage' => config('app.locale'),
        ];
        if ($action == 'create') {
            $id = Article::insertGetId($_data);
        } else {
            DB::table('articles')->where('id', '=', $id)->update($_data);
        }
        if (!empty($id)) {
            //xóa khi cập nhập
            if ($action == 'update') {
                //xóa catalogue_relationship
                DB::table('catalogues_relationships')->where('moduleid', $id)->where('module', 'article')->delete();
                //xóa tags_relationship
                DB::table('tags_relationships')->where('moduleid', $id)->where('module', 'article')->delete();
                //xóa bảng router
                DB::table('router')->where('moduleid', $id)->where('module', 'article')->delete();
            }
            //thêm vào bảng catalogue_relationship
            $this->Helper->catalogue_relation_ship($id, $request['catalogueid'], $tmp_catalogue, 'article');
            //thêm tag
            $this->Helper->_relation_ship($id, $request['tags'], 'tags', 'tagid', 'articles');
            //thêm router
            DB::table('router')->insert([
                'moduleid' => $id,
                'module' => 'articles',
                'slug' => $request['slug'],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
