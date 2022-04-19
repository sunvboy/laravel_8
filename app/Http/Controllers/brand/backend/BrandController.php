<?php

namespace App\Http\Controllers\brand\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class BrandController extends Controller
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
        $data = queryHelper('\App\Models\Brand', $orderBy, $request->keyword);
        $module = 'brands';
        return view('brand.backend.brand.index', compact('module', 'data', 'module'));
    }


    public function create()
    {
        $module = 'brands';

        return view('brand.backend.brand.create', compact('module'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:brands',
            'slug' => 'required|unique:brands',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',

        ]);

        Brand::create([
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

        return redirect()->route('brand.index')->with('success', "Thêm mới thương hiệu thành công");
    }



    public function edit($id)
    {
        $detail  = Brand::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('brand.index')->with('error', "Thương hiệu không tồn tại");
        }
        $module = 'brands';
        return view('brand.backend.brand.edit', compact('module', 'detail'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:brands,slug,' . $id . ',id',
            'slug' => 'required|unique:brands,slug,' . $id . ',id',
        ], [
            'title.required' => 'Tiêu đề là trường bắt buộc.',
            'title.unique' => 'Tiêu đề đã tồn tại.',
            'slug.required' => 'Đường dẫn là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn đã tồn tại.',

        ]);
        Brand::find($id)->update([
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

        return redirect()->route('brand.index')->with('success', "Cập nhập thương hiệu thành công");
    }
}
