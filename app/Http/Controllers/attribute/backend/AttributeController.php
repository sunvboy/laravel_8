<?php

namespace App\Http\Controllers\attribute\backend;

use App\Components\Nestedsetbie;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use function App\Components\myQuery;

class AttributeController extends Controller
{
    protected $Nestedsetbie;
    public function __construct()
    {
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_attributes'));
    }

    public function index(Request $request)
    {
        $module = 'attributes';
        $orderBy = [
            '0' => [
                'row' => 'order',
                'value' => 'asc',

            ], '1' => [
                'row' => 'id',
                'value' => 'desc',

            ]
        ];
        $data = queryHelper('\App\Models\Attribute', $orderBy, $request->keyword, $request->catalogueid);
        $htmlOption = $this->Nestedsetbie->dropdown();
        return view('attribute.backend.attribute.index', compact('data', 'module', 'htmlOption'));
    }

    public function create()
    {
        $module = 'attributes';
        $htmlOption = $this->Nestedsetbie->dropdown();
        return view('attribute.backend.attribute.create', compact('module', 'htmlOption'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:attributes,alanguage,' . config('app.locale') . '',
            'catalogueid' => 'required|gt:0',
        ], [
            'title.required' => 'Tên danh mục là trường bắt buộc.',
            'slug.required' => 'Đường dẫn danh mục là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn danh mục đã tồn tại.',
            'catalogueid.gt' => 'Danh mục là trường bắt buộc.',

        ]);

        $this->submitAttributes($request, 'create', 0);

        return redirect()->route('attribute.index')->with('success', "Thêm mới thuộc tính thành công");
    }

    public function edit($id)
    {
        $module = 'attributes';
        $detail  = Attribute::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('attribute.index')->with('error', "Thuộc tính không tồn tại");
        }
        $htmlOption = $this->Nestedsetbie->dropdown();
        return view('attribute.backend.attribute.edit', compact('detail', 'htmlOption', 'module'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:attributes,slug,' . $id . ',id,alanguage,' . config('app.locale') . '',
            'catalogueid' => 'required|gt:0',
        ], [
            'title.required' => 'Tên danh mục là trường bắt buộc.',
            'slug.required' => 'Đường dẫn danh mục là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn danh mục đã tồn tại.',
            'catalogueid.gt' => 'Danh mục là trường bắt buộc.',

        ]);

        $this->submitAttributes($request, 'update', $id);
        return redirect()->route('attribute.index')->with('success', "Cập nhập thuộc tính thành công");
    }


    public function destroy($id)
    {
    }

    public function submitAttributes($request = [], $action = '', $id = 0)
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
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'publish' => $request['publish'],
            'color' => $request['color'],
            'price_start' => str_replace('.', '', $request['price_start']),
            'price_end' => str_replace('.', '', $request['price_end']),
            $user => Auth::user()->id,
            $time => Carbon::now(),
            'alanguage' => config('app.locale'),
        ];
        if ($action == 'create') {
            $id = Attribute::insertGetId($_data);
        } else {
            DB::table('attributes')->where('id', '=', $id)->update($_data);
        }
    }
}
