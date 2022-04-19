<?php

namespace App\Http\Controllers\tag\backend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class TagController extends Controller
{

    public function index(Request $request)
    {
        $orderBy = [
            '0' => [
                'row' => 'order',
                'value' => 'asc',

            ], '1' => [
                'row' => 'id',
                'value' => 'desc',

            ]
        ];
        $data = queryHelper('\App\Models\Tag', $orderBy, $request->keyword);
        $module = 'tags';
        return view('tag.backend.tag.index', compact('data', 'module'));
    }

    public function create()
    {
        $module = 'tags';
        return view('tag.backend.tag.create', compact('module'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:tags',
            'slug' => 'required|unique:tags',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'title.unique' => 'Tiêu đề tag đã tồn tại.',
            'slug.required' => 'Đường dẫn tag là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn tag đã tồn tại.',

        ]);
        $validator->validate();

        Tag::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => !empty($request->description) ? $request->description : '',
            'image' => isset($request->image) ? $request->image : '',
            'meta_title' => !empty($request->meta_title) ? $request->meta_title : "",
            'meta_description' => !empty($request->meta_description) ? $request->meta_description : '',
            'publish' => $request->publish,
            'userid_created' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'alanguage' => config('app.locale'),
        ]);

        return redirect()->route('tag.index')->with('success', "Thêm mới tag thành công");
    }


    public function edit($id)
    {
        $module = 'tags';
        $detail  = Tag::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('tag.index')->with('error', "Tag không tồn tại");
        }
        return view('tag.backend.tag.edit', compact('module', 'detail'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:tags,slug,' . $id . ',id',
            'slug' => 'required|unique:tags,slug,' . $id . ',id',
        ], [
            'title.required' => 'Tên tag là trường bắt buộc.',
            'title.unique' => 'Tên tag đã tồn tại.',
            'slug.required' => 'Đường dẫn tag là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn tag đã tồn tại.',

        ]);
        $validator->validate();
        Tag::find($id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => !empty($request->description) ? $request->description : '',
            'image' => isset($request->image) ? $request->image : '',
            'meta_title' => !empty($request->meta_title) ? $request->meta_title : "",
            'meta_description' => !empty($request->meta_description) ? $request->meta_description : '',
            'publish' => $request->publish,
            'userid_updated' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('tag.index')->with('success', "Cập nhập tag thành công");
    }
}
