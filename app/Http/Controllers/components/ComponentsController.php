<?php

namespace App\Http\Controllers\components;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ComponentsController extends Controller
{
    public function getLocation(Request $request)
    {
        $param = $request->param;
        $getData = DB::table($param['table'])->where('provinceid', $param['parentid'])->orderBy('name', 'asc')->get();
        $temp = '';
        $temp = $temp . '<option value="0">' . $param['text'] . '</option>';
        if (isset($getData)) {
            foreach ($getData as  $val) {
                $temp = $temp . '<option value="' . $val->districtid . '">' . $val->name . '</option>';
            }
        }
        echo json_encode(array(
            'html' => $temp,
        ));
        die();
    }
    public function uploadImagesComment(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
        if ($request->delete) {
            if (file_exists(base_path() . $request->file)) {
                unlink(base_path() . $request->file);
            }
        } else {
            $request->validate([
                'file.*' => 'mimes:jpeg,jpg,png,gif'
            ]);
            if ($request->hasfile('file')) {
                foreach ($request->file('file') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(base_path() . '/upload/comment/', $name);
                    $imgData[] = $name;
                }
                $image_return  = trim('/upload/comment/' . $name);
                echo json_encode(array(
                    'html' => '<div class="write-review__image">
                    <img src="' . $image_return . '" alt="upload images">
                    <div class="write-review__image-close" data-file="' . $image_return . '">×</div>
                </div>',
                ));
                die();
            }
        }
    }
    public function language($language)
    {
        Session::put('language', $language);
        Session::save();
        return redirect()->back();
    }
}
