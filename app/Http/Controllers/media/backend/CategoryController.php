<?php

namespace App\Http\Controllers\media\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Components\Nestedsetbie;
use App\Models\CategoryMedia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $Nestedsetbie;
    public function __construct()
    {

        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_media'));
    }
    public function index(Request $request)
    {

        $module = 'category_media';
        $orderBy = [
            '0' => [
                'row' => 'lft',
                'value' => 'asc',

            ]
        ];

        $data = queryHelper('\App\Models\CategoryMedia', $orderBy, $request->keyword);
        return view('media.backend.category.index', compact('data', 'module'));
    }

    public function create()
    {
        $module = 'category_media';
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        return view('media.backend.category.create', compact('module', 'htmlCatalogue'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'layoutid' => 'required',
            'slug' => 'required|unique:category_media',
        ], [
            'title.required' => 'Tên danh mục là trường bắt buộc.',
            'layoutid.required' => 'Loại thư viện là trường bắt buộc.',
            'slug.required' => 'Đường dẫn danh mục là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn danh mục đã tồn tại.',
        ]);

        $this->submitCategoryMedia($request, 'create', 0);

        return redirect()->route('mediaCategory.index')->with('success', "Thêm mới danh mục thành công");
    }




    public function edit($id)
    {
        $module = 'category_medias';
        $detail  = CategoryMedia::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('mediaCategory.index')->with('error', "Danh mục không tồn tại");
        }
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        return view('media.backend.category.edit', compact('detail', 'htmlCatalogue', 'module'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'layoutid' => 'required',
            'slug' => 'required|unique:category_media,slug,' . $id . ',id',
        ], [
            'title.required' => 'Tên danh mục là trường bắt buộc.',
            'layoutid.required' => 'Loại thư viện là trường bắt buộc.',
            'slug.required' => 'Đường dẫn danh mục là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn danh mục đã tồn tại.',
        ]);
        $this->submitCategoryMedia($request, 'update', $id);
        return redirect()->route('mediaCategory.index')->with('success', "Cập nhập danh mục thành công");
    }


    public function submitCategoryMedia($request = [], $action = '', $id = 0)
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
            'description' => $request['description'],
            'parentid' => !empty($request['parentid']) ? $request['parentid'] : 0,
            'image' => $request['image'],
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'publish' => $request['publish'],
            'layoutid' => $request['layoutid'],
            $user => Auth::user()->id,
            $time => Carbon::now(),
            'alanguage' => config('app.locale'),

        ];
        if ($action == 'create') {
            $id = CategoryMedia::insertGetId($_data);
        } else {
            DB::table('category_media')->where('id', '=', $id)->update($_data);
        }

        if (!empty($id)) {
            //xóa khi cập nhập
            // if ($action == 'update') {
            //     //xóa bảng router
            //     DB::table('router')->where('moduleid', $id)->where('module', 'category_media')->delete();
            // }
            //thêm router
            // DB::table('router')->insert([
            //     'moduleid' => $id,
            //     'module' => 'category_media',
            //     'slug' => $request['slug'],
            //     'created_at' => Carbon::now(),
            // ]);
            $this->Nestedsetbie->Get();
            $this->Nestedsetbie->Recursive(0, $this->Nestedsetbie->Set());
            $this->Nestedsetbie->Action();
        }
    }
}
