<?php

namespace App\Http\Controllers\address\backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\VNCity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class AddressController extends Controller
{

    public function index(Request $request)
    {
        $module = 'address';
        $orderBy = [
            '0' => [
                'row' => 'order',
                'value' => 'asc',

            ], '1' => [
                'row' => 'id',
                'value' => 'desc',

            ]
        ];
        $data = queryHelper('\App\Models\Address', $orderBy, $request->keyword);
        return view('address.backend.index', compact('data', 'module'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module = 'address';
        // foreach($data->LtsItem as $k=>$value) {
        //     DB::table('vn_city')->insert(['id' => $value->ID,'name' => $value->Title]);
        // }
        //$getCity = DB::table('vn_ward')->where('name','Chưa rõ')->delete();
        // foreach($getCity as $k=>$v){
        //     $curl = curl_init();
        //     curl_setopt_array($curl, array(
        //         CURLOPT_URL => 'https://thongtindoanhnghiep.co/api/district/'.$v->id.'/ward',
        //         CURLOPT_RETURNTRANSFER => true,
        //         CURLOPT_ENCODING => '',
        //         CURLOPT_MAXREDIRS => 10,
        //         CURLOPT_TIMEOUT => 0,
        //         CURLOPT_FOLLOWLOCATION => true,
        //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //         CURLOPT_CUSTOMREQUEST => 'GET',
        //     ));
        //     $response = curl_exec($curl);
        //     curl_close($curl);
        //     $data = json_decode($response);
        //     foreach($data as $k=>$value) {
        //         DB::table('vn_ward')->insert(['id' => $value->ID,'name' => $value->Title,'districtid' => $value->QuanHuyenID]);
        //     }
        // }
        //die;
        $getCity = DB::table('vn_province')->orderBy('name', 'asc')->get();
        $listCity[''] = 'Tỉnh/Thành Phố';
        if (isset($getCity)) {
            foreach ($getCity as $key => $val) {
                $listCity[$val->provinceid] = $val->name;
            }
        }
        return view('address.backend.create', compact('module', 'listCity'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'address' => 'required',
            'cityid' => 'required',
            'districtid' => 'required',

        ], [
            'title.required' => 'Tên cửa hàng là trường bắt buộc.',
            'address.required' => 'Địa chỉ là trường bắt buộc.',
            'cityid.required' => 'Tỉnh/Thành Phố là trường bắt buộc.',
            'districtid.required' => 'Quận/Huyện là trường bắt buộc.',
        ]);

        //api lấy tọa độ
        $data = curl_api('https://maps.googleapis.com/maps/api/geocode/json?address=' . slug($request->address) . '&key=AIzaSyBPYwKdcUYplwZuW9gSMfSB7naz42TcUE0');
        if (!empty($data->error_message)) {
            return redirect()->route('address.index')->with('error', $data->error_message);
        } else {
            if (!empty($data)) {
                $lat = $data->results[0]->geometry->location->lat;
                $long = $data->results[0]->geometry->location->lng;
            }
            $id = Address::insertGetId([
                'title' => $request->title,
                'image' => $request->image,
                'email' => $request->email,
                'hotline' => $request->hotline,
                'address' => $request->address,
                'cityid' => $request->cityid,
                'districtid' => $request->districtid,
                'lat' => $lat,
                'long' => $long,
                'publish' => $request->publish,
                'userid_created' => Auth::user()->id,
                'created_at' => Carbon::now(),
                'alanguage' => config('app.locale'),
            ]);
            if ($id > 0) {
                return redirect()->route('address.index')->with('success', "Thêm mới của hàng thành công");
            } else {
                return redirect()->route('address.index')->with('error', "Thêm mới của hàng không thành công");
            }
        }
    }

    public function edit($id)
    {
        $module = 'address';
        $detail  = Address::where('alanguage', config('app.locale'))->find($id);
        if (!isset($detail)) {
            return redirect()->route('address.index')->with('error', "Cửa hàng không tồn tại");
        }
        $getCity = DB::table('vn_province')->orderBy('name', 'asc')->get();
        $listCity[''] = 'Tỉnh/Thành Phố';
        if (isset($getCity)) {
            foreach ($getCity as $key => $val) {
                $listCity[$val->provinceid] = $val->name;
            }
        }
        return view('address.backend.edit', compact('detail', 'module', 'listCity'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'address' => 'required',
            'cityid' => 'required',
            'districtid' => 'required',

        ], [
            'title.required' => 'Tên cửa hàng là trường bắt buộc.',
            'address.required' => 'Địa chỉ là trường bắt buộc.',
            'cityid.required' => 'Tỉnh/Thành Phố là trường bắt buộc.',
            'districtid.required' => 'Quận/Huyện là trường bắt buộc.',
        ]);
        //api lấy tọa độ
        // $data = curl_api('https://maps.googleapis.com/maps/api/geocode/json?address='.slug($request->address).'&key=AIzaSyBPYwKdcUYplwZuW9gSMfSB7naz42TcUE0');
        // if(!empty($data->error_message)){
        //     return redirect()->route('address.index')->with('error',$data->error_message);
        // }else{
        //     if(!empty($data)){
        //         $lat = $data->results[0]->geometry->location->lat;
        //         $long = $data->results[0]->geometry->location->lng;
        //     }

        // }
        Address::find($id)->update([
            'title' => $request->title,
            'image' => $request->image,
            'email' => $request->email,
            'hotline' => $request->hotline,
            'address' => $request->address,
            'cityid' => $request->cityid,
            'districtid' => $request->districtid,
            'publish' => $request->publish,
            'userid_updated' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('address.index')->with('success', "Cập nhập cửa hàng thành công");
    }
}
