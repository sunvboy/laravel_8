<?php

namespace App\Http\Controllers\tool;

use App\Components\Nestedsetbie;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CategoryProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrawlController extends Controller
{
    protected $Nestedsetbie;
    public function __construct()
    {
        $this->Nestedsetbie = new Nestedsetbie(array('table' => 'category_products'));
    }
    protected function download_remote_file($url, $img)
    {
        $url = $url;
        $destination = $img;
        $fp = fopen($destination, 'w+');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
    public function index_product_category()
    {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $replaceQ = array(
            'https://bepnamduong.vn/' => '',
            'Xem thêm tổng quan' => '',
            'Xem thêm thông số kĩ thuật' => '',
            'Xem thêm đặc điểm nổi bật' => '',
        );
        //lấy danh mục
        $html = file_get_html('https://www.anphatpc.com.vn/', false, stream_context_create($arrContextOptions));
        //lấy tất cả đường dẫn đến chi tiết
        $tieude = $html->find('.header-menu-holder .item  > a');
        // foreach ($tieude as $a) {
        //     echo $a->href;
        //     echo "<br>";
        //     echo $a->find('span.title', 0)->innertext;
        //     echo "<br>";
        //     echo $a->find('span.title', 0)->innertext;
        //     echo "<br>";
        // }
        // die;
        foreach ($tieude as $a) {
            $htmlChild = file_get_html('https://www.anphatpc.com.vn' . $a->href, false, stream_context_create($arrContextOptions));
            //Lấy tiêu đề sản phẩm
            $link = $htmlChild->find('meta[property=og:image]', 0)->content;
            $list = explode('/', $link);
            $k = 0;
            foreach ($list as $images) {
                $k++;
                if (count($list) == $k) {
                    $base_path = 'upload/images/danh-muc-san-pham/' . $images;
                    $this->download_remote_file($link, base_path($base_path));
                }
            }
            $id = CategoryProduct::insertGetId(array(
                'title' => $a->find('span.title', 0)->innertext,
                'slug' => slug($a->find('span.title', 0)->innertext),
                'description' => '',
                'image_json' => '',
                'parentid' => 0,
                'image' => '',
                'icon' => $base_path,
                'meta_title' => $htmlChild->find('title', 0)->innertext,
                'meta_description' => $htmlChild->find('meta[name=description]', 0)->content,
                'publish' => 0,
                'userid_created' =>  Auth::user()->id,
                'created_at' => Carbon::now(),
                'alanguage' => config('app.locale'),
            ));
            if (!empty($id)) {
                $this->Nestedsetbie->Get();
                $this->Nestedsetbie->Recursive(0, $this->Nestedsetbie->Set());
                $this->Nestedsetbie->Action();
            }
        }
        die;
    }
    public function index_brand()
    {
        $arrContextOptions = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
            ),
        );
        $replaceQ = array(
            'https://bepnamduong.vn/' => '',
            'Xem thêm tổng quan' => '',
            'Xem thêm thông số kĩ thuật' => '',
            'Xem thêm đặc điểm nổi bật' => '',
        );
        //lấy danh mục
        $html = file_get_html('https://www.hanoicomputer.vn/brand', false, stream_context_create($arrContextOptions));
        //lấy tất cả đường dẫn đến chi tiết
        $tieude = $html->find('.brand-item .list-unstyled li a');
        // foreach ($tieude as $a) {
        //     echo $a->href;
        //     echo "<br>";
        //     echo $a->find('img', 0)->src;
        //     // echo "<br>";
        //     // echo $a->find('span.title', 0)->innertext;
        //     echo "<br>";
        //     echo "<br>";
        //     echo "<br>";
        // }
        // die;
        foreach ($tieude as $a) {
            $title = explode('/', $a->href);
            $title = ucwords($title[2]);

            $htmlChild = file_get_html('https://www.hanoicomputer.vn' . $a->href, false, stream_context_create($arrContextOptions));
            foreach ($a->find('img') as $img) {
                $link = $img->attr['src'];
                $list = explode('/', $link);
                $k = 0;
                foreach ($list as $images) {
                    $k++;
                    if (count($list) == $k) {
                        $base_path = 'upload/images/brand/' . $images;
                        $this->download_remote_file('https://www.hanoicomputer.vn' . $link, base_path($base_path));
                    }
                }
            }
            $id = Brand::insertGetId(array(
                'title' => $title,
                'slug' => slug($title),
                'description' => '',
                'image' => isset($base_path) ? $base_path : '',
                'meta_title' => $htmlChild->find('title', 0)->innertext,
                'meta_description' => $htmlChild->find('meta[name=description]', 0)->content,
                'publish' => 0,
                'userid_created' =>  Auth::user()->id,
                'created_at' => Carbon::now(),
                'alanguage' => config('app.locale'),
            ));
        }
        die;
    }
}
