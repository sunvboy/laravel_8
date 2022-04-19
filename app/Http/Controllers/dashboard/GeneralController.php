<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class GeneralController extends Controller
{
    public function general()
    {
        $tab = config('system');
        $general = General::latest()->get();
        $systems = [];
        foreach ($general as $key => $val) {



            if (config('app.locale') == 'en') {
                $language = $val['content_en'];
            } else {
                $language = $val['content'];
            }
            $systems[$val['keyword']] = $language;
        }
        $module = 'general';
        return view('general.general', compact('module', 'tab', 'systems'));
    }
    public function store(Request $request)
    {
        $config = $request->config;
        $_create = [];
        // General::truncate();
        if (isset($config) && is_array($config) && count($config)) {
            foreach ($config as $key => $val) {

                if (config('app.locale') == 'en') {
                    $language = 'content_en';
                } else {
                    $language = 'content';
                }
                $_create = array(
                    'keyword' => $key,
                    $language =>  !empty($val) ? $val : '',
                    'userid_created' => Auth::user()->id,
                    'created_at' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
                );
                $flag = $this->_Check($key);

                if ($flag == FALSE) {
                    $slide = DB::table('generals')->insert($_create);
                } else {
                    $slide = DB::table('generals')->where("keyword", $key)->update($_create);
                }
            }
        }

        return redirect()->route('general.general')->with('success', 'Cập nhập thành công');
    }
    public function _Check($keyword = '')
    {
        $result = General::where('keyword', $keyword)->get()->count();

        return (($result >= 1) ? TRUE : FALSE);
    }
}
