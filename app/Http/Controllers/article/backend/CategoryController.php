<?php

namespace App\Http\Controllers\article\backend;

use App\Http\Controllers\Controller;
use App\Components\Nestedsetbie;
use App\Models\CategoryArticle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class CategoryController extends Controller
{
    protected $Nestedsetbie;
    public function __construct()
    {
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_articles'));
    }
    public function index(Request $request)
    {
        $module = 'category_articles';
        $orderBy = [
            '0' => [
                'row' => 'lft',
                'value' => 'asc',
            ]
        ];
        $data = queryHelper('\App\Models\CategoryArticle', $orderBy, $request->keyword);
        return view('article.backend.category.index', compact('data', 'module'));
    }
    public function create()
    {
        $module = 'category_articles';
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        return view('article.backend.category.create', compact('module', 'htmlCatalogue'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:router',
        ], [
            'title.required' => 'Tên danh mục là trường bắt buộc.',
            'slug.required' => 'Đường dẫn danh mục là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn danh mục đã tồn tại.',
        ]);
        $this->submitCategoryArticle($request, 'create', 0);
        return redirect()->route('articleCategory.index')->with('success', "Thêm mới danh mục thành công");
    }
    public function edit($id)
    {
        $module = 'category_articles';
        $detail  = CategoryArticle::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('articleCategory.index')->with('error', "Danh mục không tồn tại");
        }
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        return view('article.backend.category.edit', compact('detail', 'htmlCatalogue', 'module'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:router,slug,' . $id . ',moduleid',
        ], [
            'title.required' => 'Tên danh mục là trường bắt buộc.',
            'slug.required' => 'Đường dẫn danh mục là trường bắt buộc.',
            'slug.unique' => 'Đường dẫn danh mục đã tồn tại.',
        ]);
        $this->submitCategoryArticle($request, 'update', $id);
        return redirect()->route('articleCategory.index')->with('success', "Cập nhập danh mục thành công");
    }
    public function submitCategoryArticle($request = [], $action = '', $id = 0)
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
            'image_json' =>  !empty($request['album']) ? json_encode($request['album']) : '',
            'parentid' => !empty($request['parentid']) ? $request['parentid'] : 0,
            'image' => isset($request['album']) ? $request['album'][0] : '',
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'publish' => $request['publish'],
            $user => Auth::user()->id,
            $time => Carbon::now(),
            'alanguage' => config('app.locale'),
        ];
        if ($action == 'create') {
            $id = CategoryArticle::insertGetId($_data);
        } else {
            DB::table('category_articles')->where('id', '=', $id)->update($_data);
        }
        if (!empty($id)) {
            //xóa khi cập nhập
            if ($action == 'update') {
                //xóa bảng router
                DB::table('router')->where('moduleid', $id)->where('module', 'category_articles')->delete();
            }
            //thêm router
            DB::table('router')->insert([
                'moduleid' => $id,
                'module' => 'category_articles',
                'slug' => $request['slug'],
                'created_at' => Carbon::now(),
            ]);
            $this->Nestedsetbie->Get();
            $this->Nestedsetbie->Recursive(0, $this->Nestedsetbie->Set());
            $this->Nestedsetbie->Action();
        }
    }
}
