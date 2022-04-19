<?php

namespace App\Http\Controllers\page\backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function index(Request $request)
    {
        $orderBy = [
            '0' => [
                'row' => 'id',
                'value' => 'desc',

            ], '1' => [
                'row' => 'title',
                'value' => 'asc',

            ]
        ];
        $data = queryHelper('\App\Models\Page', $orderBy, $request->keyword);
        $module = 'page';
        return view('page.backend.index', compact('module', 'data', 'module'));
    }

    public function create()
    {
        $module = 'page';
        return view('page.backend.create', compact('module'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:pages',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
        ]);
        Page::create([
            'title' => $request->title,
            'page' => $request->page,
            'description' => !empty($request->description) ? $request->description : '',
            'image' => isset($request->image) ? $request->image : '',
            'meta_title' => !empty($request->meta_title) ? $request->meta_title : "",
            'meta_description' => !empty($request->meta_description) ? $request->meta_description : '',
            'publish' => $request->publish,
            'userid_created' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'alanguage' => config('app.locale'),
        ]);

        return redirect()->route('page.index')->with('success', "Thêm mới page thành công");
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $module = 'page';
        $detail  = Page::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('page.index')->with('error', "Trang không tồn tại");
        }
        return view('page.backend.edit', compact('module', 'detail'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:pages,title,' . $id . ',id',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
        ]);
        Page::find($id)->update([
            'title' => $request->title,
            'page' => $request->page,
            'description' => !empty($request->description) ? $request->description : '',
            'image' => isset($request->image) ? $request->image : '',
            'meta_title' => !empty($request->meta_title) ? $request->meta_title : "",
            'meta_description' => !empty($request->meta_description) ? $request->meta_description : '',
            'publish' => $request->publish,
            'created_at' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('page.index')->with('success', "Cập nhập page thành công");
    }
}
