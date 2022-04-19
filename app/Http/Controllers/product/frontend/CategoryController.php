<?php

namespace App\Http\Controllers\product\frontend;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug = "", $id = 0)
    {
        $sort = '';
        if (!empty($_GET['sort'])) {
            $sort = $_GET['sort'];
        }
        $detail = CategoryProduct::where('slug', $slug)->first();
        if (!isset($detail)) {
            return redirect()->route('homepage.index');
        }
        $childCategory =  CategoryProduct::where('parentid', $detail->id)->get();
        //bộ lọc
        $attribute_catalogue = getListAttr($detail->attrid);
        //lấy danh sách sản phẩm
        $data =  Product::join('catalogues_relationships', 'products.id', '=', 'catalogues_relationships.moduleid')->where('catalogues_relationships.module', '=', 'product');;
        if (!empty($detail->id)) {
            $data =  $data->where('catalogues_relationships.catalogueid', $detail->id);
        }

        if (!empty($sort)) {
            $sort = explode('|', $sort);
            if (count($sort) == 2) {
                $data =  $data->orderBy($sort[0], $sort[1]);
            } else {
                return redirect()->route('productCategoryFrontend.index', ['slug' => $slug, 'id' => $id]);
            }
        } else {
            $data =  $data->orderBy('order', 'asc')->orderBy('id', 'desc');
        }
        $data =  $data->paginate(env('APP_paginate'));
        $seo['canonical'] = route('productCategoryFrontend.index', ['slug' => $slug, 'id' => $id]);
        $seo['meta_title'] =  !empty($detail['meta_title']) ? $detail['meta_title'] : $detail['title'];
        $seo['meta_description'] = !empty($detail['meta_description']) ? $detail['meta_description'] : cutnchar(strip_tags($detail->description));
        $seo['meta_image'] = $detail['image'];
        return view('product.frontend.category.index', compact('detail', 'seo', 'childCategory', 'data', 'attribute_catalogue'));
    }
    public function filter(Request $request)
    {

        $data =  Product::orderBy('order', 'ASC')->orderBy('id', 'DESC');

        $data = $data->join('catalogues_relationships', 'products.id', '=', 'catalogues_relationships.moduleid')->where('catalogues_relationships.module', '=', 'product');
        if (!empty($request->catalogueid)) {
            $data =  $data->where('catalogues_relationships.catalogueid', $request->catalogueid);
        }
        //xử lý khoảng giá
        $request->start_price = (int)str_replace('.', '', $request->start_price);
        $request->end_price = (int)str_replace('.', '', $request->end_price);

        if (isset($request->start_price) && !empty($request->end_price)) {
            $data =  $data->where('products.price', '>=', $request->start_price);
            $data =  $data->where('products.price', '<=', $request->end_price);
        }

        //xu ly sort
        if ($request->sort) {

            $sort = explode('|', $request->sort);
            if (count($sort) == 2) {
                $data =  $data->orderBy($sort[0], $sort[1]);
            } else {
                $data =  $data->orderBy('order', 'asc')->orderBy('id', 'desc');
            }
        } else {
            $data =  $data->orderBy('order', 'asc')->orderBy('id', 'desc');
        }
        //xử lý thuộc tính

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
                $total++;
                $index++;
                foreach ($val as $subs) {
                    $index = $index + $total;
                    $data = $data->join('attributes_relationships as tb' . $index . '', 'products.id', '=', 'tb' . $index . '.moduleid');
                }
                $data =  $data->whereIn('tb' . $index . '.attrid', $val);
            }
            $data =  $data->groupBy('tb102.moduleid');
        }
        $data =  $data->groupBy('catalogues_relationships.moduleid');

        $data =  $data->paginate(30);
        return view('product.frontend.category.data', compact('data'))->render();
    }
}
