<?php

namespace App\Http\Controllers\media\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Components\Helper;

use App\Components\Nestedsetbie;
use App\Models\CategoryMedia;
use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    protected $Nestedsetbie;
    protected $Helper;
    public function __construct()
    {
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_media'));
        $this->Helper = new Helper();
    }
    public function index(Request  $request)
    {
        $module = 'media';
        $data =  Media::where('alanguage', config('app.locale'))->orderBy('order', 'ASC')->orderBy('id', 'DESC');
        $keyword = $request->keyword;
        $catalogueid = $request->catalogueid;
        if (!empty($keyword)) {
            $data =  $data->where('title', 'like', '%' . $keyword . '%');
        }
        if (!empty($catalogueid)) {
            $data =  $data->where('catalogueid', $catalogueid);
        }
        $data =  $data->paginate(env('APP_paginate'));
        if (is($keyword)) {
            $data->appends(['keyword' => $keyword]);
        }
        if (is($catalogueid)) {
            $data->appends(['catalogueid' => $catalogueid]);
        }
        $htmlOption = $this->Nestedsetbie->dropdown();
        return view('media.backend.media.index', compact('data', 'module', 'htmlOption'));
    }


    public function create()
    {
        $module = 'media';
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        return view('media.backend.media.create', compact('module', 'htmlCatalogue'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:media',
            'catalogueid' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn bài viết là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn bài viết đã tồn tại.',
            'catalogueid.gt' => 'Danh mục là trường bắt buộc.',

        ]);
        $this->submitMedia($request, 'create', 0);
        return redirect()->route('media.index')->with('success', "Thêm mới sản phẩm thành công");
    }



    public function edit($id)
    {
        $module = 'media';
        $detail  = Media::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('media.index')->with('error', "Bài viết không tồn tại");
        }
        $htmlCatalogue = $this->Nestedsetbie->dropdown();

        return view('media.backend.media.edit', compact('module', 'detail', 'htmlCatalogue'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:media,slug,' . $id . ',id',
            'catalogueid' => 'required|gt:0',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',
            'catalogueid.gt' => 'Danh mục chính là trường bắt buộc.',
        ]);
        $this->submitMedia($request, 'update', $id);
        return redirect()->route('media.index')->with('success', "Cập nhập bài viết thành công");
    }

    public function submitMedia($request = [], $action = '', $id = 0)
    {
        if ($action == 'create') {
            $time = 'created_at';
            $user = 'userid_created';
        } else {
            $time = 'updated_at';
            $user = 'userid_updated';
        }

        $_data = [
            'title' => $request['title'],
            'slug' => $request['slug'],
            'catalogueid' => $request['catalogueid'],
            'image' => $request['image'],
            'description' => $request['description'],
            'video_type' => $request['video_type'],
            'video_link' => $request['video_link'],
            'video_iframe' => $request['video_iframe'],
            'image_json' =>  !empty($request['album']) ? json_encode($request['album']) : '',
            'catalogue' => "",
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'publish' => $request['publish'],
            $user => Auth::user()->id,
            $time => Carbon::now(),
            'alanguage' => config('app.locale'),

        ];
        if ($action == 'create') {
            $id = Media::insertGetId($_data);
        } else {
            DB::table('media')->where('id', '=', $id)->update($_data);
        }
    }
    public function get_select_type(Request $request)
    {

        $detail  = CategoryMedia::where('alanguage', config('app.locale'))->select('layoutid')->find($request->catalogueid);
        echo $detail->layoutid;
    }
}
