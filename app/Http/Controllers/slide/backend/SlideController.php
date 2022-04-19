<?php

namespace App\Http\Controllers\slide\backend;

use App\Http\Controllers\Controller;
use App\Models\CategorySlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Slide;

class SlideController extends Controller
{

    public function index()
    {
        $module = 'slide';
        $slideGroup = CategorySlide::latest()->paginate(20);
        return view('slide.backend.index', compact('module', 'slideGroup'));
    }


    public function create()
    {
    }
    public function store(Request $request)
    {
        $object = $request->object;
        $catalogueid =  $request->catalogueid;
        if (isset($object['src']) && is_array($object['src']) && count($object['src'])) {
            foreach ($object['src'] as $key => $val) {
                $_insert[] = array(
                    'src' => $val,
                    'title' => !empty($object['title'][$key]) ? $object['title'][$key] : '',
                    'link' => !empty($object['link'][$key]) ? $object['link'][$key] : '',
                    'order' => !empty($object['order'][$key]) ? $object['order'][$key] : 0,
                    'description' => !empty($object['description'][$key]) ? $object['description'][$key] : "",
                    'catalogueid' => $catalogueid,
                    'created_at' => Carbon::now(),
                    'userid_created' => Auth::user()->id,
                    'alanguage' => config('app.locale'),
                );
            }
        }
        $slide = DB::table('slides')->insert($_insert);
        return response()->json([
            'code' => 200,
        ], 200);
    }
    public function category_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'keyword' => 'required|unique:category_slides',
        ], [
            'title.required' => 'Bạn bắt buộc phải nhập vào ô Tên nhóm Slide',
            'keyword.required' => 'Bạn bắt buộc phải nhập vào ô Từ khóa',
            'keyword.unique' => 'Từ khóa đã tồn tại',

        ]);
        $validator->validate();
        $categoryslidesID  = DB::table('category_slides')->insertGetId([
            'title' => $request->title,
            'keyword' => $request->keyword,
            'userid_created' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        return response()->json([
            'code' => 200,
            'html' => '<li>
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <a href="" class="slide-catalogue" data-id="' . $categoryslidesID . '"><i class="fa fa-picture-o"></i>' . $request->title . '</a>
                <a type="button" class="slide-group-delete ajax-delete" data-title="Lưu ý: Dữ liệu sẽ không thể khôi phục. Hãy chắc chắn rằng bạn muốn thực hiện hành động này!" data-module="category_slides" data-id="' . $categoryslidesID . '" style="color:#676a6c;"> Xóa</a>
            </div>
        </li>'
        ], 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $post = $request->data;
        $_update = [];
        if (isset($post) && is_array($post) && count($post)) {
            foreach ($post as $val) {
                $_update[$val['name']] = $val['value'];
            }
        }
        $update = DB::table('slides')->where('alanguage', config('app.locale'))->where('id', $_update['id'])->update($_update);
        return response()->json([
            'code' => 200,
            'src' => $_update['src'],
            'title' => $_update['title'],
            'description' => $_update['description'],
            'link' => $_update['link'],
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
