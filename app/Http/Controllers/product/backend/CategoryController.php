<?php

namespace App\Http\Controllers\product\backend;

use App\Components\Nestedsetbie;
use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Carbon\Carbon;
use View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class CategoryController extends Controller
{
    protected $Nestedsetbie;
    public function __construct()
    {

        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_products'));
        // $this->load->library(array('configbie'));
        // $this->load->library('nestedsetbie', array('table' => 'product_catalogue'));
        //View::share( 'Nestedsetbie', $this->Nestedsetbie );

    }
    public function index(Request $request)
    {
        $module = 'category_products';
        $orderBy = [
            '0' => [
                'row' => 'lft',
                'value' => 'asc',

            ],
        ];
        $data = queryHelper('\App\Models\CategoryProduct', $orderBy, $request->keyword);
        return view('product.backend.category.index', compact('data', 'module'));
    }


    public function create()
    {
        $module = 'category_products';
        $htmlOption = $this->Nestedsetbie->dropdown();
        return view('product.backend.category.create', compact('module', 'htmlOption'));
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
        $this->submitCategoryProduct($request, 'create', 0);
        return redirect()->route('productCategory.index')->with('success', "Thêm mới danh mục thành công");
    }

    public function edit($id)
    {
        $module = 'category_products';
        $detail  = CategoryProduct::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('productCategory.index')->with('error', "Danh mục sản phẩm không tồn tại");
        }
        $htmlOption = $this->Nestedsetbie->dropdown();
        return view('product.backend.category.edit', compact('detail', 'htmlOption', 'module'));
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
        $this->submitCategoryProduct($request, 'update', $id);

        return redirect()->route('productCategory.index')->with('success', "Cập nhập danh mục thành công");
    }

    public function submitCategoryProduct($request = [], $action = '', $id = 0)
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
            'image_json' =>  json_encode($request['album']),
            'parentid' => !empty($request['parentid']) ? $request['parentid'] : 0,
            'image' => isset($request['album']) ? $request['album'][0] : '',
            'icon' => isset($request['icon']) ? $request['icon'] : '',
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'publish' => $request['publish'],
            $user => Auth::user()->id,
            $time => Carbon::now(),
            'alanguage' => config('app.locale'),
        ];
        if ($action == 'create') {
            $id = CategoryProduct::insertGetId($_data);
        } else {
            DB::table('category_products')->where('id', '=', $id)->update($_data);
        }
        if (!empty($id)) {
            //xóa khi cập nhập
            if ($action == 'update') {
                //xóa bảng router
                DB::table('router')->where('moduleid', $id)->where('module', 'category_products')->delete();
            }
            //thêm router
            DB::table('router')->insert([
                'moduleid' => $id,
                'module' => 'category_products',
                'slug' => $request['slug'],
                'created_at' => Carbon::now(),
            ]);

            $this->Nestedsetbie->Get();
            $this->Nestedsetbie->Recursive(0, $this->Nestedsetbie->Set());
            $this->Nestedsetbie->Action();
        }
    }
    public function getCatalogue($parent_id = '')
    {
        $data = CategoryProduct::all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->catalogueRecusive($parent_id);
        return $htmlOption;
    }
}
