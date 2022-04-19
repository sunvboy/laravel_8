<?php

namespace App\Http\Controllers\attribute\backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryAttribute;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Carbon\Carbon;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $module = 'category_attributes';
        $orderBy = [
            '0' => [
                'row' => 'order',
                'value' => 'asc',

            ], '1' => [
                'row' => 'id',
                'value' => 'desc',

            ]
        ];
        $data = queryHelper('\App\Models\CategoryAttribute', $orderBy, $request->keyword);
        return view('attribute.backend.category.index', compact('data', 'module'));
    }


    public function create()
    {
        $module = 'category_attributes';
        return view('attribute.backend.category.create', compact('module'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required|unique:category_attributes',
        ], [
            'title.required' => 'Tên danh mục là trường bắt buộc.',
            'slug.required' => 'Đường dẫn danh mục là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn danh mục đã tồn tại.',
        ]);
        $validator->validate();

        CategoryAttribute::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => isset($request->image) ? $request->image : '',
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'publish' => $request->publish,
            'userid_created' => Auth::user()->id,
            'created_at' => Carbon::now(),
            'alanguage' => config('app.locale'),
        ]);

        return redirect()->route('attributeCategory.index')->with('success', "Thêm mới nhóm thuộc tính thành công");
    }

    public function edit($id)
    {
        $module = 'category_attributes';
        $detail  = CategoryAttribute::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('attributeCategory.index')->with('error', "Nhóm thuộc tính không tồn tại");
        }
        return view('attribute.backend.category.edit', compact('detail', 'module'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:category_attributes,slug,' . $id . ',id',
        ], [
            'title.required' => 'Tên danh mục là trường bắt buộc.',
            'slug.required' => 'Đường dẫn danh mục là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn danh mục đã tồn tại.',
        ]);
        CategoryAttribute::find($id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => isset($request->image) ? $request->image : '',
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'publish' => $request->publish,
            'userid_updated' => Auth::user()->id,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('attributeCategory.index')->with('success', "Cập nhập nhóm thuộc tính thành công");
    }
}
