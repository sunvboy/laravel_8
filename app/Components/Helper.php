<?php

namespace App\Components;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Helper
{
    //thêm vào bảng catalogue_relationship
    function catalogue_relation_ship($productid = 0, $catalogueid = 0, $tmp_catalogue = [], $module = '')
    {
        $_catalogue_relation_ship[] = array(
            'module' => $module,
            'moduleid' => $productid,
            'catalogueid' => $catalogueid,
            'created_at' => Carbon::now(),
        );
        if (isset($tmp_catalogue)) {
            foreach ($tmp_catalogue as $v) {
                $_catalogue_relation_ship[] = array(
                    'module' => $module,
                    'moduleid' => $productid,
                    'catalogueid' => $v,
                    'created_at' => Carbon::now(),
                );
            }
        }
        DB::table('catalogues_relationships')->insert($_catalogue_relation_ship);
    }
    //thêm vào bảng attribute_relationship
    function attribute_relation_ship($productid = 0, $attribute = [])
    {
        $_insert_attribute = [];
        if (isset($attribute) && is_array($attribute) && count($attribute) && $attribute != array('0' => 0)) {
            foreach ($attribute as $key => $val) {
                if (isset($val) && is_array($val) && count($val) && $val != array('0' => 0)) {
                    foreach ($val as $sub => $subs) {
                        $_insert_attribute[] = array(
                            'moduleid' => $productid,
                            'attrid' => $subs,
                            'created_at' => Carbon::now(),
                        );
                    }
                } else {
                    $_insert_attribute[] = array(
                        'moduleid' => $productid,
                        'attrid' => $val,
                        'created_at' => Carbon::now(),
                    );
                }
            }
            if (check_array($_insert_attribute)) {
                DB::table('attributes_relationships')->insert($_insert_attribute);
            }
        }
    }
    // thêm nhóm thuộc tính vào nhóm sản phẩm
    function updateAttridInProduct_catalogue($param = [])
    {

        $_catalogue_relation_ship[] = $param['catalogueid'];
        if (isset($param['tmp_catalogue'])) {
            foreach ($param['tmp_catalogue'] as $v) {
                $_catalogue_relation_ship[] = $v;
            }
        }

        if (!empty($param['attribute_catalogue']) && $param['attribute_catalogue'] != array(0 => 0)) {
            //foreach từng mảng danh mục sản phẩm
            if (isset($_catalogue_relation_ship)) {
                foreach ($_catalogue_relation_ship as $v) {
                    $product_catalogue = DB::table('category_products')->select('attrid')->where('id', '=', $v)->first();
                    $attrid_old = is(json_decode($product_catalogue->attrid, true));
                    foreach ($param['attribute_catalogue'] as $key => $cata) {
                        if (!empty($param['attribute'])) {
                            foreach ($param['attribute'] as $sub => $attr) {
                                if ($key == $sub) {
                                    $attrid_new[$cata] = $attr;
                                }
                            }
                        }
                    }
                    if (!empty($attrid_old)) {
                        foreach ($attrid_old as $cata_old => $attr_old) {
                            if (!empty($attr_old)) {
                                if (!empty($attrid_new) && check_array($attrid_new)) {
                                    foreach ($attrid_new as $cata_new => $attr_new) {
                                        if ($cata_old == $cata_new) {
                                            $attrid[$cata_old] = array_unique(array_merge($attr_new, $attr_old));
                                        }
                                        if ($cata_old != $cata_new) {
                                            $attrid[$cata_new] = (isset($attrid[$cata_new])) ? array_unique(array_merge($attr_new, $attrid[$cata_new])) : $attr_new;
                                            $attrid[$cata_old] = (isset($attrid[$cata_old])) ? array_unique(array_merge($attr_old, $attrid[$cata_old])) : $attr_old;
                                        }
                                    }
                                }
                            } else {
                                foreach ($param['attribute_catalogue'] as $key => $val) {
                                    foreach ($param['attribute'] as $sub => $subs) {
                                        if ($sub == $key) {
                                            $attrid[$val] = $subs;
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        foreach ($param['attribute_catalogue'] as $key => $val) {
                            foreach ($param['attribute'] as $sub => $subs) {
                                if ($sub == $key) {
                                    $attrid[$val] = $subs;
                                }
                            }
                        }
                    }
                    if (isset($attrid) && check_array($attrid)) {
                        $_update_attrid = array(
                            'attrid' => json_encode($attrid),
                        );
                        DB::table('category_products')->where('id', '=', $v)->update($_update_attrid);
                    }
                }
            }
        }
    }
    // thêm phiên bản sản phẩm
    function createProduct_version($param = [])
    {

        if (isset($param['title_version']) && is_array($param['title_version']) && count($param['title_version'])) {
            foreach ($param['title_version'] as $key => $val) {
                $ex = explode(":", $param['id_version'][$key]);
                $id_sort = array();

                foreach ($ex as $k => $row) {
                    $id_sort[$k] = $row;
                }
                array_multisort($id_sort, SORT_DESC, $ex);
                $_insert_version[] = array(
                    'productid' => $param['productid'],
                    'title_version' => $val,
                    'price_version' => (int)str_replace('.', '', $param['price_version'][$key]),
                    'code_version' => $param['code_version'][$key],
                    'id_version' => $param['id_version'][$key],
                    'id_sort' => json_encode($id_sort),
                    'status_version' => $param['status_version'][$key],
                    'created_at' => Carbon::now(),
                    'userid_created' => Auth::user()->id,
                );
            }
            if (!empty($_insert_version)) {
                DB::table('products_versions')->insert($_insert_version);
            }
        }
    }
    //thêm vào bảng table_relationship
    function _relation_ship($productid = 0, $moduleid = [], $table = '', $rowname = '', $module = '')
    {
        $_insert = [];
        if (isset($moduleid) && is_array($moduleid) && count($moduleid) && $moduleid != array('0' => 0)) {
            foreach ($moduleid as $val) {
                if (isset($val) && is_array($val) && count($val) && $val != array('0' => 0)) {
                    foreach ($val as $subs) {
                        $_insert[] = array(
                            'moduleid' => $productid,
                            $rowname => $subs,
                            'module' => $module,
                            'created_at' => Carbon::now(),
                            'userid_created' => Auth::user()->id,
                        );
                    }
                } else {
                    $_insert[] = array(
                        'moduleid' => $productid,
                        $rowname   => $val,
                        'module' => $module,
                        'created_at' => Carbon::now(),
                        'userid_created' => Auth::user()->id,
                    );
                }
            }
            if (check_array($_insert)) {
                DB::table($table . '_relationships')->insert($_insert);
            }
        }
    }
    //them khoang gia vao bang attributes
    function price_attributes($price = 0, $productid = 0)
    {
        $attributes = DB::table('attributes')->where('catalogueid', 1)->where('price_start', '<=', $price)->where('price_end', '>=', $price)->first();
        if (empty($attributes)) {
            $attributes = DB::table('attributes')->where('catalogueid', 1)->where('price_end', 0)->first();
        }
        if (!empty($attributes)) {
            DB::table('attributes_relationships')->insert(array(
                'moduleid' => $productid,
                'attrid' => $attributes->id,
                'created_at' => Carbon::now(),
            ));
        }
    }
}
