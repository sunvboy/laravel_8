<?php

namespace App\Http\Controllers\menu\backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\CategoryProduct;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class MenuController extends Controller
{

    public function index(Request $request)
    {

        $menuitems = '';
        $desiredMenu = [];
        $id = $request->id;

        if (isset($id)) {
            if ($id != 'new') {
                $desiredMenu = Menu::where('id', $id)->first();
            } else {
                $desiredMenu = NULL;
            }
        } else {
            $desiredMenu = Menu::first();
        }
        if (isset($desiredMenu)) {
            $listMenu = MenuItem::where('alanguage', config('app.locale'))->where('menu_id', $desiredMenu->id)->where('parentid', 0)->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
            $menuitems = [];
            if (isset($listMenu)) {
                foreach ($listMenu as $v) {
                    $children = MenuItem::where('parentid', $v['id'])->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
                    if ($children->count()) {
                        foreach ($children as $k => $vv) {
                            $children3 = MenuItem::where('parentid', $vv['id'])->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
                            if ($children3->count()) {
                                $children[$k]['children'] = $children3;
                            }
                        }
                        $menuitems[] = ['id' => $v['id'], 'title' => $v['title'], 'name' => $v['name'], 'slug' => $v['slug'], 'target' => $v['target'], 'type' => $v['type'], 'children' => $children];
                    } else {
                        $menuitems[] = ['id' => $v['id'], 'title' => $v['title'], 'name' => $v['name'], 'slug' => $v['slug'], 'target' => $v['target'], 'type' => $v['type']];
                    }
                }
            }
        }
        $categories_product = CategoryProduct::where('alanguage', config('app.locale'))->get();
        $categories_article = CategoryArticle::where('alanguage', config('app.locale'))->get();
        $products = Product::where('alanguage', config('app.locale'))->get();
        $articles = Article::where('alanguage', config('app.locale'))->get();
        $menus = Menu::all();
        $module =  'menu';
        return view('menu.backend.index', compact('module', 'categories_product', 'categories_article', 'products', 'articles', 'menus', 'desiredMenu', 'menuitems'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:menus',
        ], [
            'title.required' => 'Tên menu là trường bắt buộc.',
            'title.unique' => 'Tên menu đã tồn tại.',
        ]);
        $validator->validate();

        $data = $request->all();
        $data['slug'] = slug($request->title);
        if (Menu::create($data)) {
            $newdata = Menu::orderby('id', 'DESC')->first();
            return redirect()->route("menus.index", ['id' => $newdata->id])->with('success', "Thêm mới menu thành công");
        } else {
            return redirect()->route('menus.index')->with('error', 'Thêm mới menu không thành công');
        }
    }
    public function addMenuItem(Request $request)
    {
        $data = $request->all();
        $menuid = $request->menuid;
        $module = $request->module;
        $ids = $request->ids;
        foreach ($ids as $id) {
            $title = DB::table($module)->where('id', $id)->select('title', 'slug')->first();
            $data['title'] =  $title->title;
            $data['slug'] =  $title->slug;
            $data['type'] = $module;
            $data['menu_id'] = $menuid;
            $data['updated_at'] = NULL;
            $data['alanguage'] = config('app.locale');
            MenuItem::create($data);
        }
    }
    public function addCustomLink(Request $request)
    {
        $menuid = $request->menuid;
        MenuItem::create([
            'title' => $request->link,
            'slug' => $request->url,
            'type' => 'custom',
            'menu_id' => $menuid,
            'updated_at' => NULL,
            'alanguage' => config('app.locale')

        ]);
    }

    public function updateMenu(Request $request)
    {
        $content = $request->data;
        foreach ($content[0] as $k => $v) {
            DB::table('menu_items')->where('alanguage', config('app.locale'))->where('id', $v['id'])->update(['order' => $k, 'parentid' => 0]);
            //cập nhập menu cha cấp 2
            if (!empty($v['children'])) {
                foreach ($v['children'][0] as $kc => $vc) {
                    DB::table('menu_items')->where('id', $vc['id'])->update(['parentid' => $v['id'], 'order' => $kc]);
                    //cập nhập menu cha cấp 3
                    if (!empty($vc['children'])) {
                        foreach ($vc['children'][0] as $kcc => $vcc) {
                            DB::table('menu_items')->where('id', $vcc['id'])->update(['parentid' => $vc['id'], 'order' => $kcc]);
                        }
                    }
                }
            }
        }
    }
    public function updateMenuItem(Request $request)
    {
        $data = $request->all();
        $item = MenuItem::findOrFail($request->id);
        $item->update($data);
        return redirect()->back();
    }

    public function deleteMenuItem($id)
    {
        $menuitem = MenuItem::findOrFail($id);
        $menuitem->delete();
        return redirect()->route('menus.index')->with('success', 'Xóa menu thành công');
    }
    public function destroy(Request $request)
    {
        MenuItem::where('menu_id', $request->id)->delete();
        Menu::findOrFail($request->id)->delete();
        return redirect()->route('menus.index')->with('success', 'Xóa menu thành công');
    }
}
