<?php

if (!function_exists('removeutf8')) {
	function removeutf8($value = NULL)
	{
		$chars = array(
			'a'	=>	array('ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'ắ', 'ằ', 'ẳ', 'ẵ', 'ặ', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ', 'Ặ', 'á', 'à', 'ả', 'ã', 'ạ', 'â', 'ă', 'Á', 'À', 'Ả', 'Ã', 'Ạ', 'Â', 'Ă'),
			'e' =>	array('ế', 'ề', 'ể', 'ễ', 'ệ', 'Ế', 'Ề', 'Ể', 'Ễ', 'Ệ', 'é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê'),
			'i'	=>	array('í', 'ì', 'ỉ', 'ĩ', 'ị', 'Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị'),
			'o'	=>	array('ố', 'ồ', 'ổ', 'ỗ', 'ộ', 'Ố', 'Ồ', 'Ổ', 'Ô', 'Ộ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ơ', 'Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ơ'),
			'u'	=>	array('ứ', 'ừ', 'ử', 'ữ', 'ự', 'Ứ', 'Ừ', 'Ử', 'Ữ', 'Ự', 'ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư'),
			'y'	=>	array('ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ'),
			'd'	=>	array('đ', 'Đ'),
		);
		foreach ($chars as $key => $arr)
			foreach ($arr as $val)
				$value = str_replace($val, $key, $value);
		return $value;
	}
}

if (!function_exists('slug')) {
	function slug($value = NULL)
	{
		$value = removeutf8($value);
		$value = str_replace('-', ' ', trim($value));
		$value = preg_replace('/[^a-z0-9-]+/i', ' ', $value);
		$value = trim(preg_replace('/\s\s+/', ' ', $value));
		return strtolower(str_replace(' ', '-', trim($value)));
	}
}
if (!function_exists('CodeRender')) {
	function CodeRender($module = '')
	{
		switch ($module) {
			case "product":
				$lastRow = \App\Models\Product::orderBy('id', 'DESC')->first();
				break;
		}
		$lastId = (int)$lastRow['id'] + 1;
		$data = 'SP' . str_pad($lastId, 4, '0', STR_PAD_LEFT);
		return $data;
	}
}

if (!function_exists('is')) {
	function is($data)
	{
		return (isset($data)) ? $data : '';
	}
}
if (!function_exists('check_array')) {
	function check_array($array)
	{
		if (isset($array)) {
			return true;
		} else {
			return false;
		}
	}
}
if (!function_exists('queryHelper')) {
	function queryHelper($module = '', $orderBy = [], $keyword = '', $catalogueid = '')
	{
		$data = $module::where('alanguage', config('app.locale'))->orderBy($orderBy[0]['row'], $orderBy[0]['value']);
		if (isset($orderBy)) {
			foreach ($orderBy as $k => $v) {
				if ($k > 0) {
					$data =  $data->orderBy($v['row'], $v['value']);
				}
			}
		}
		if (is($keyword)) {
			$data =  $data->where('title', 'like', '%' . $keyword . '%');
		}
		if (is($catalogueid)) {
			$data =  $data->where('catalogueid', '=', $catalogueid);
		}
		$data = $data->paginate(env('APP_paginate'));
		if (is($keyword)) {
			$data->appends(['keyword' => $keyword]);
		}
		if (is($catalogueid)) {
			$data->appends(['catalogueid' => $catalogueid]);
		}
		return $data;
	}
}
if (!function_exists('getListAttr')) {
	function getListAttr($attrid = '')
	{
		$attribute = [];
		// lấy ra danh sách thuộc tính
		$list_attrid = json_decode($attrid, true);
		//lay khoang gia
		$list_attr_catalogue_price = \App\Models\CategoryAttribute::select('id', 'title', 'slug')->where('slug', 'khoang-gia')->first();
		if ($list_attr_catalogue_price) {
			$list_attr_price = \App\Models\Attribute::select('id', 'title')->where('catalogueid', $list_attr_catalogue_price->id)->get();
			if ($list_attr_price) {
				$attribute[$list_attr_catalogue_price->title]['keyword_cata'] = $list_attr_catalogue_price->slug;
				foreach ($list_attr_price as $v) {
					$attribute[$list_attr_catalogue_price->title][$v->id] = $v->title;
				}
			}
		}
		if (isset($list_attrid)) {
			$list_attr_cata = \App\Models\CategoryAttribute::select('id', 'title', 'slug')->whereIn('id', array_keys($list_attrid))->where('slug', '!=', 'khoang-gia')->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
			$list_attribute = [];
			foreach ($list_attrid as $key => $value) {
				$list_attribute = array_merge($list_attribute, $value);
			}
			$list_attr = \App\Models\Attribute::select('id', 'title', 'catalogueid')->whereIn('id', $list_attribute)->get();
			foreach ($list_attrid as $key => $value) {
				foreach ($list_attr_cata as $subs) {
					//check khoảng giá
					foreach ($list_attr as  $items) {
						foreach ($value as $k) {
							if ($key == $subs['id'] && $k == $items['id'] &&  $items['catalogueid'] == $subs['id']) {
								$attribute[$subs['title']]['keyword_cata'] = $subs['slug'];
								$attribute[$subs['title']][$items['id']] = $items['title'];
							}
						}
					}
				}
			}
		}

		return $attribute;
	}
}
if (!function_exists('getBlockAttr')) {
	function getBlockAttr($version_json = '')
	{
		if (isset($version_json)) {
			$version = json_decode(base64_decode($version_json), true);
			if (isset($version) && is_array($version) && count($version)) {
				$list_attr = $version[2];
				$list_attr_cata = $version[1];
				$list_checked_version = $version[0];
				if (isset($list_attr_cata) && check_array($list_attr_cata)) {
					if (isset($list_checked_version) && check_array($list_checked_version)) {
						foreach ($list_checked_version as $key => $value) {
							foreach ($list_attr_cata as $sub => $subs) {
								if ($value == 1 && $key == $sub) {
									$list_cata_version[] = $subs;
									$list_cata_version = array_unique($list_cata_version);
								}
							}
						}
					}
				}
				if (isset($list_attr) && check_array($list_attr)) {
					$listAttrCata = \App\Models\CategoryAttribute::select('id', 'title', 'slug')->whereIn('id', $list_attr_cata)->get();
					$version_attr = [];
					foreach ($list_attr as $key => $value) {
						$version_attr = array_merge($version_attr, $value);
					}
					$listAttr = \App\Models\Attribute::select('id', 'title', 'catalogueid')->whereIn('id', $version_attr)->get();
					if (isset($listAttrCata) && check_array($listAttrCata)) {
						foreach ($listAttrCata as $keyCata => $valCata) {
							$child = [];
							foreach ($listAttr as $keyAttr => $valAttr) {
								$detailCata[$keyCata] = $valCata;
								if ($valAttr['catalogueid'] == $valCata['id']) {
									$child[] = $valAttr;
								}
							}
							$detailCata[$keyCata]['child'] = $child;
						}
					}
				}
				if (isset($list_attr_cata) && check_array($list_attr_cata)) {
					if (isset($list_cata_version) && check_array($list_cata_version) && isset($detailCata) && check_array($detailCata)) {
						foreach ($list_cata_version as $key => $value) {
							foreach ($detailCata as $sub => $subs) {
								if ($value == $subs['id']) {
									$data['version'][$sub] = $subs;
									unset($detailCata[$sub]);
								}
							}
							$data['attr'] = $detailCata;
						}
					}
				}
			}
		}
		return isset($data) ? $data : '';
	}
}
if (!function_exists('getPrice')) {
	function getPrice($param = [])
	{
		$price_old = 0;
		$price_final = 0;

		if (isset($param['price_contact']) && $param['price_contact'] == 1) {
			return array(
				'price_old' => '',
				'price_final' => 'Liên hệ',
				'percent' => '',
				'flag' => 1,
			);
		} else {

			if (isset($param['price_sale']) && $param['price_sale'] != '' && $param['price_sale'] > 0) {
				$price_old = $param['price'];
				$price_final = $param['price_sale'];
			}
			if (isset($param['price']) && $param['price_sale'] == 0) {
				$price_old = '';
				$price_final = $param['price'];
			}
			if ($price_final == $price_old) {
				$flag = 1;
			} else {
				$flag = 0;
			};
			if (!empty($price_final) && !empty($price_old)) {
				$percent = ($price_old - $price_final) * 100 / $price_old;
				if ($percent > 1) {
					$percent = round($percent);
				} else {
					$percent = round($percent, 1);
				}
				$percent = $percent . ' %';
			}
			return array(
				'price_old' => !empty($price_old > 0) ? number_format($price_old) . ' VNĐ' : '',
				'price_final' => !empty($price_final > 0) ? number_format($price_final) . ' VNĐ' : 'Liên hệ',
				'price_final_none_format' => !empty($price_final > 0) ? $price_final : 0,
				'percent' => isset($percent) ? $percent : '',
				'flag' => $flag,
			);
		}
	}
}
if (!function_exists('groupValue')) {

	function groupValue($old_arr = [], $sort)
	{
		$arr = array();
		foreach ($old_arr as $key => $item) {
			$arr[$item[$sort]][$key] = $item;
		}
		ksort($arr, SORT_NUMERIC);
		return $arr;
	}
}
if (!function_exists('curl_api')) {

	function curl_api($CURLOPT_URL = '')
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $CURLOPT_URL,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
		));
		$response = curl_exec($curl);
		curl_close($curl);
		$data = json_decode($response);
		return $data;
	}
}
if (!function_exists('convert_date')) {

	function convert_date($date = '')
	{
		$date = explode('/', $date);
		$data = trim($date[2]) . '-' . trim($date[0]) . '-' . trim($date[1]) . ' 00:00:00';
		return $data;
	}
}
if (!function_exists('cutnchar')) {
	function cutnchar($str = NULL, $n = 320)
	{
		if (strlen($str) < $n) return $str;
		$html = substr($str, 0, $n);
		$html = substr($html, 0, strrpos($html, ' '));
		return $html . '...';
	}
}

function execPostRequest($url, $data)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt(
		$ch,
		CURLOPT_HTTPHEADER,
		array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data)
		)
	);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	//execute post
	$result = curl_exec($ch);
	//close connection
	curl_close($ch);
	return $result;
}
if (!function_exists('relationships')) {
	function relationships($module = '', $array = [])
	{
		$data = $module::select('id', 'title')->whereIn('id', $array)->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
		$return = [];
		if (!empty($data)) {
			foreach ($data as $val) {
				$return[] = array(
					'id' => $val->id,
					'text' => $val->title,
				);
			}
		}
		return $return;
	}
}
if (!function_exists('array_group_by')) {
	function array_group_by(array $arr, callable $key_selector)

	{

		$result = array();

		foreach ($arr as $i) {

			$key = call_user_func($key_selector, $i);

			$result[$key][] = $i;
		}

		return $result;
	}
}
