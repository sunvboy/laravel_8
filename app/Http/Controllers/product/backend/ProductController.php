<?php

namespace App\Http\Controllers\product\backend;

use App\Components\Nestedsetbie;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Components\Helper;

class ProductController extends Controller
{
    protected $Nestedsetbie;
    protected $Lang;
    public function __construct()
    {
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_products'));
        $this->Helper = new Helper();
    }
    public function index()
    {
        $module = 'product';
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        $data =  Product::where('alanguage', config('app.locale'))->orderBy('order', 'ASC')->orderBy('id', 'DESC')->paginate(env('APP_paginate'));
        $count =  Product::count();
        return view('product.backend.product.index', compact('data', 'module', 'htmlCatalogue'));
    }
    public function create()
    {
        $module = 'products';
        $dropdown = getFunctions();
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        $category_attribute = DB::table('category_attributes')
            ->select('id', 'title')
            ->where('id', '!=', 1)
            ->where('alanguage', config('app.locale'))
            ->get();
        //tag
        $getTags = [];
        if (old('tags')) {
            $getTags = old('tags');
        }
        $tags = relationships('\App\Models\Tag', $getTags);
        //end
        //brands
        $getBrands = [];
        if (old('brands')) {
            $getBrands = old('brands');
        }
        $brands = relationships('\App\Models\Brand', $getBrands);
        //end
        if (old('attribute')) {
            $attribute = old('attribute');
        }
        $attribute_json = [];
        if (!empty($attribute)) {
            foreach ($attribute as $key => $value) {
                if ($value == '') {
                    $attribute_json[$key] = '';
                } else {
                    // $attribute_json[$key]['json'] = base64_encode(json_encode($value));
                    $attributes =  DB::table('attributes')->orderBy('order', 'asc')->orderBy('id', 'desc')->whereIn('id', $value)->get();
                    $temp = [];
                    if (!empty($attributes)) {
                        foreach ($attributes as $val) {
                            $temp[] = array(
                                'id' => $val->id,
                                'text' => $val->title,
                            );
                        }
                    }
                    $attribute_json[$key] = $temp;
                }
            }
        }
        $htmlAttribute = $this->Nestedsetbie->DropdownCatalogue($category_attribute);
        return view('product.backend.product.create', compact('module', 'htmlCatalogue', 'htmlAttribute', 'tags', 'brands', 'attribute_json', 'dropdown'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:router',
            'code' => 'unique:products',
            'catalogueid' => 'required|gt:0',
        ], [
            'title.required' => 'Ti??u ????? l?? tr?????ng b???t bu???c.',
            'slug.required' => '???????ng d???n l?? tr?????ng b???t bu???c.',
            'slug.unique' => '???????ng d???n ???? t???n t???i.',
            'code.unique' => 'M?? s???n ph???m ???? t???n t???i.',
            'catalogueid.gt' => 'Danh m???c ch??nh l?? tr?????ng b???t bu???c.',
        ]);
        $this->submitProduct($request, 'create', 0);
        return redirect()->route('product.index')->with('success', "Th??m m???i s???n ph???m th??nh c??ng");
    }
    public function edit($id)
    {
        $module = 'products';
        $dropdown = getFunctions();
        $detail  = Product::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('product.index')->with('error', "S???n ph???m kh??ng t???n t???i");
        }
        $htmlCatalogue = $this->Nestedsetbie->dropdown();
        $category_attribute = DB::table('category_attributes')
            ->select('id', 'title')
            ->where('alanguage', config('app.locale'))
            ->where('id', '!=', 1)
            ->get();
        $htmlAttribute = $this->Nestedsetbie->DropdownCatalogue($category_attribute);
        //tags
        $getTags = [];
        if (old('tags')) {
            $getTags = old('tags');
        } else {
            foreach ($detail->tags as $k => $v) {
                $getTags[] = $v['tagid'];
            }
        }
        $tags = relationships('\App\Models\Tag', $getTags);
        //end tag
        //brands
        $getbrands = [];
        if (old('brands')) {
            $getbrands = old('brands');
        } else {
            foreach ($detail->brands as $k => $v) {
                $getbrands[] = $v['brandid'];
            }
        }
        $brands = relationships('\App\Models\Brand', $getbrands);
        //end brand
        //attr
        if (old('attribute')) {
            $attribute = old('attribute');
        } else {
            $version_json = json_decode(base64_decode($detail->version_json), true);
            $attribute = $version_json[2];
        }
        $attribute_json = [];
        if (!empty($attribute)) {
            foreach ($attribute as $key => $value) {
                if ($value == '') {
                    $attribute_json[$key] = '';
                } else {
                    // $attribute_json[$key]['json'] = base64_encode(json_encode($value));
                    $attributes =  DB::table('attributes')->orderBy('order', 'asc')->orderBy('id', 'desc')->whereIn('id', $value)->get();
                    $temp = [];
                    if (!empty($attributes)) {
                        foreach ($attributes as $val) {
                            $temp[] = array(
                                'id' => $val->id,
                                'text' => $val->title,
                            );
                        }
                    }
                    $attribute_json[$key] = $temp;
                }
            }
        }
        //end attr
        return view('product.backend.product.edit', compact('module', 'detail', 'htmlCatalogue', 'htmlAttribute', 'tags', 'brands', 'attribute_json', 'dropdown'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:router,slug,' . $id . ',moduleid',
            'code' => 'unique:products,code,' . $id . ',id',
            'catalogueid' => 'required|gt:0',
        ], [
            'title.required' => 'Ti??u ????? l?? tr?????ng b???t bu???c.',
            'slug.required' => '???????ng d???n l?? tr?????ng b???t bu???c.',
            'slug.unique' => '???????ng d???n ???? t???n t???i.',
            'code.unique' => 'M?? s???n ph???m ???? t???n t???i.',
            'catalogueid.gt' => 'Danh m???c ch??nh l?? tr?????ng b???t bu???c.',
        ]);
        $this->submitProduct($request, 'update', $id);
        return redirect()->route('product.index')->with('success', "C???p nh???p s???n ph???m th??nh c??ng");
    }
    public function destroy($id)
    {
        //
    }
    public function submitProduct($request = [], $action = '', $id = 0)
    {
        if ($action == 'create') {
            $time = 'created_at';
            $user = 'userid_created';
        } else {
            $time = 'updated_at';
            $user = 'userid_updated';
        }
        $catalogue = $request['catalogue'];
        $tmp_catalogue = [];
        if (isset($catalogue)) {
            foreach ($catalogue as $v) {
                if ($v != 0 && $v != $request['catalogueid']) {
                    $tmp_catalogue[] = $v;
                }
            }
        }
        //version
        $checkbox = isset($request['checkbox_val']) ? $request['checkbox_val'] : [];
        $attribute_catalogue = isset($request['attribute_catalogue']) ? $request['attribute_catalogue'] : [];
        $attribute = isset($request['attribute']) ? $request['attribute'] : [];
        $_data_product = [
            'title' => $request['title'],
            'slug' => $request['slug'],
            'description' => $request['description'],
            'code' => is($request['code']),
            'price' => isset($request['price']) ? str_replace('.', '', $request['price']) : 0,
            'price_sale' => str_replace('.', '', $request['price_sale']),
            'price_contact' => isset($request['price_contact']) ? $request['price_contact'] : 0,
            'image_json' =>  !empty($request['album']) ? json_encode($request['album']) : '',
            'catalogueid' => $request['catalogueid'],
            'catalogue' => json_encode($tmp_catalogue),
            'image' => isset($request['album']) ? $request['album'][0] : '',
            'meta_title' => $request['meta_title'],
            'meta_description' => $request['meta_description'],
            'publish' => $request['publish'],
            $user => Auth::user()->id,
            $time => Carbon::now(),
            'version_json' => base64_encode(json_encode(array($checkbox, $attribute_catalogue, $attribute))),
            'alanguage' => config('app.locale'),
        ];
        if ($action == 'create') {
            $id = Product::insertGetId($_data_product);
        } else {
            DB::table('products')->where('id', '=', $id)->update($_data_product);
        }
        if (!empty($id)) {
            //x??a khi c???p nh???p
            if ($action == 'update') {
                //x??a catalogue_relationship
                DB::table('catalogues_relationships')->where('moduleid', $id)->where('module', 'product')->delete();
                //x??a tags_relationship
                DB::table('tags_relationships')->where('moduleid', $id)->where('module', 'product')->delete();
                //x??a brands_relationship
                DB::table('brands_relationships')->where('moduleid', $id)->where('module', 'product')->delete();
                //x??a attribute_relationship
                DB::table('attributes_relationships')->where('moduleid', $id)->delete();
                //X??a  products_versions
                DB::table('products_versions')->where('productid', $id)->delete();
                //x??a router
                DB::table('router')->where('moduleid', $id)->where('module', 'products')->delete();
            }
            //th??m v??o b???ng catalogue_relationship
            $this->Helper->catalogue_relation_ship($id, $request['catalogueid'], $tmp_catalogue, 'product');
            //th??m v??o b???ng attribute_relationship
            $this->Helper->attribute_relation_ship($id, $attribute);
            // th??m nho??m thu????c ti??nh va??o nho??m sa??n ph????m
            $this->Helper->updateAttridInProduct_catalogue(array(
                'catalogueid' => $request['catalogueid'],
                'tmp_catalogue' => $tmp_catalogue,
                'attribute_catalogue' => $attribute_catalogue,
                'attribute' => $attribute,
            ));
            // th??m phi??n ba??n sa??n ph????m
            $this->Helper->createProduct_version(array(
                'id_version' => $request['id_version'],
                'title_version' => $request['title_version'],
                'price_version' => $request['price_version'],
                'code_version' => $request['code_version'],
                'status_version' => $request['status_version'],
                'productid' => $id,
            ));
            //th??m v??o b???ng brand_relationship
            $this->Helper->_relation_ship($id, $request['brands'], 'brands', 'brandid', 'product');
            //th??m v??o b???ng tag_relationship
            $this->Helper->_relation_ship($id, $request['tags'], 'tags', 'tagid', 'product');
            //th??m router
            DB::table('router')->insert([
                'moduleid' => $id,
                'module' => 'products',
                'slug' => $request['slug'],
                'created_at' => Carbon::now(),
            ]);
            //them khoang gia vao bang attributes
            $this->Helper->price_attributes((float)str_replace('.', '', $request['price']), $id);
        }
    }
    public function get_attrid(Request $request)
    {
        $catalogueid = $request->catalogueid;
        $detailCatalogue = DB::table('category_products')->select('id', 'attrid')->where('id', '=', $catalogueid)->first();
        $attribute_catalogue = getListAttr($detailCatalogue->attrid);
        $html = '';
        if (check_array($attribute_catalogue)) {
            foreach ($attribute_catalogue as $key => $val) {
                $html = $html . '<li class="catalogue m-b-xs" data-keyword = ' . $val['keyword_cata'] . '>';
                $html = $html . '<div class="m-l-sm m-b-xs" style="color:#2c3e50"><b>' . $key . '</b></div>';
                $html = $html . '<div class="row no-margins" >';
                if (check_array($val)) {
                    foreach ($val as $sub => $subs) {
                        if ($sub != 'keyword_cata') {
                            $html = $html . '<div class="col-sm-3">';
                            $html = $html . '<div class="uk-flex uk-flex-middle m-b-xs attr">';
                            $html = $html . '<input  class="checkbox-item filter" type="checkbox" name="attr[]" value="' . $sub . '">';
                            $html = $html . '<label for="" class="label-checkboxitem m-r"></label>';
                            $html = $html . $subs;
                            $html = $html . '</div>';
                            $html = $html . '</div>';
                        }
                    }
                }
                $html = $html . '</div>';
                $html = $html . '</li>';
            }
        }
        echo json_encode(array(
            'attribute_catalogue' => $html,
        ));
        die();
    }
    public function listproduct(Request $request)
    {
        // $query = '';
        // $json = '';
        $data =  Product::where('alanguage', config('app.locale'))->orderBy('order', 'ASC')->orderBy('id', 'DESC');
        //x??? l?? $keyword = $request->keyword;
        $keyword = $request->keyword;
        if (!empty($keyword)) {
            //$query = $query . 'AND (tb1.title LIKE \'%' . $keyword . '%\')';
            $data =  $data->where('products.title', 'like', '%' . $keyword . '%');
        }
        //x??? l?? danh m???c
        // $json .= 'JOIN `catalogues_relationships` as `tb3` ON `tb1`.`id` = `tb3`.`moduleid` AND `tb3`.`module` = "product" ';
        $data = $data->join('catalogues_relationships', 'products.id', '=', 'catalogues_relationships.moduleid')->where('catalogues_relationships.module', '=', 'product');
        if (!empty($request->catalogueid)) {
            // $query = $query . ' AND tb3.catalogueid IN' . ' (' . $request->catalogueid . ')';
            $data =  $data->where('catalogues_relationships.catalogueid', $request->catalogueid);
        }
        //x??? l?? kho???ng gi??
        $request->start_price = (int)str_replace('.', '', $request->start_price);
        $request->end_price = (int)str_replace('.', '', $request->end_price);
        if (isset($request->start_price) && !empty($request->end_price)) {
            $data =  $data->where('products.price', '>=', $request->start_price);
            $data =  $data->where('products.price', '<=', $request->end_price);
            // $query = $query . ' AND tb1.price >= ' . $request->start_price . ' AND tb1.price <= ' . $request->end_price . ' ';
        }
        //x??? l?? tags
        if (!empty($request->brand)) {
            // $json .= 'INNER JOIN `brands_relationships` as `brand` ON `tb1`.`id` = `brand`.`moduleid` AND `brand`.`module` ="product" ';
            // $query = $query . ' AND ( ';
            // foreach ($request->brand as $key => $value) {
            //     $query = $query . ' brand.brandid = ' . $value . ' OR ';
            // }
            // $query = substr($query, 0, strlen($query) - 3);
            // $query = $query . ' )';
            $data = $data->join('brands_relationships', 'products.id', '=', 'brands_relationships.moduleid')->where('brands_relationships.module', '=', 'product');
            $data =  $data->whereIn('brands_relationships.brandid', $request->brand);
        }
        //x??? l?? tags
        if (!empty($request->tag)) {
            // $json .= 'INNER JOIN `tags_relationships` as `tag2` ON `tb1`.`id` = `tag2`.`moduleid` AND `tag2`.`module` ="product" ';
            // $query = $query . ' AND ( ';
            // foreach ($request->tag as $key => $value) {
            //     $query = $query . ' tag2.tagid = ' . $value . ' OR ';
            // }
            // $query = substr($query, 0, strlen($query) - 3);
            // $query = $query . ' )';
            $data = $data->join('tags_relationships', 'products.id', '=', 'tags_relationships.moduleid')->where('tags_relationships.module', '=', 'product');
            $data =  $data->whereIn('tags_relationships.brandid', $request->brand);
        }
        //x??? l?? thu???c t??nh
        if (!empty($request->attr)) {
            $attr = explode(';', $request->attr);
            foreach ($attr as $key => $val) {
                if ($key % 2 == 0) {
                    if ($val != '') {
                        $attribute[$val][] = $attr[$key + 1];
                    }
                } else {
                    continue;
                }
            }
            $total = 0;
            $index = 100;
            foreach ($attribute as $key => $val) {
                // $query = $query . ' AND ( ';
                $total++;
                $index++;
                foreach ($val as $subs) {
                    $index = $index + $total;
                    // $query = $query . ' tb' . $index . '.attrid =  ' . $subs . ' OR ';
                    // $json .= ' INNER JOIN `attributes_relationships` as `tb'.$index.'` ON `tb1`.`id` = `tb'.$index.'`.`moduleid` ';
                    $data = $data->join('attributes_relationships as tb' . $index . '', 'products.id', '=', 'tb' . $index . '.moduleid');
                }
                $data =  $data->whereIn('tb' . $index . '.attrid', $val);
                // $query = substr($query, 0, strlen($query) - 3);
                // $query = $query . ' ) ';
            }
            // $query = $query . ' GROUP BY `tb102`.`moduleid`';
            $data =  $data->groupBy('tb102.moduleid');
        }
        $data =  $data->groupBy('catalogues_relationships.moduleid');
        // $query = substr($query, 4, strlen($query));
        //$SELECT = 'SELECT DISTINCT `tb1`.`id` FROM `products` as `tb1` '.$json.'  WHERE '.$query.'';
        //$count = DB::select($SELECT);
        $data =  $data->paginate(env('APP_paginate'));
        return view('product.backend.product.index.data', compact('data'))->render();
    }
}
