<?php

namespace App\Http\Controllers\tool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CrawlController extends Controller
{

    public function index()
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

            $htmlChild = file_get_html($a->href, false, stream_context_create($arrContextOptions));

            //Lấy tiêu đề sản phẩm

            $title = $htmlChild->find('h1.page-title span', 0)->innertext;


            //lấy giá sản phẩm

            $price = $htmlChild->find('.price-container span.price-wrapper', 0)->attr['data-price-amount'];


            //lấy mô tả sản phẩm

            $description = $htmlChild->find('.addition-info-content', 0)->outertext;



            // echo "<pre>";
            // var_dump($description);
            // die;

            //tạo đường dẫn sản phẩm

            // if (!file_exists('images/' . slug($title))) {
            //     mkdir('images/' . slug($title), 0777, true);
            // }

            //ảnh đại diện và albums ảnh

            $tmp_album = [];

            foreach ($htmlChild->find('.fotorama__img--full') as $img) {
                $link = $img->attr['src'];
                echo "<pre>";
                var_dump($link);
                die;
                $list = explode('/', $link);

                $k = 0;

                foreach ($list as $images) {

                    $k++;

                    if (count($list) == $k) {

                        // download_remote_file(url_get . $link, 'images/' . slug($title) . '/' . $images);

                        $tmp_album[] = 'images/' . slug($title) . '/' . $images;
                    }
                }
            }

            echo "<pre>";
            var_dump($tmp_album);
            die;



            //lấy .tabdetail.flexJus

            $content = '';

            foreach ($htmlChild->find('.tabdetail.flexJus span') as $v) {

                if ($v->attr['data-id'] != 'sosanh' && $v->attr['data-id'] != 'danhgia' && $v->attr['data-id'] != 'binhluan') {

                    //$content .="<h2>".$v->innertext."</h2>";

                    $content .= $htmlChild->find('#' . $v->attr['data-id'], 0);

                    foreach ($htmlChild->find('#' . $v->attr['data-id'] . ' img') as $img) {

                        if (!empty($img->attr['src'])) {

                            save_image($img->attr['src']);
                        } else {

                            save_image($img->attr['data-src']);
                        }
                    }
                }
            }

            /*echo '<h1 style="color: red">' . $tieudehH1 . '</h1>';

           echo '<h2 style="color: red">' . $xuatxu . '</h2>';

           echo "<h2 style='color: green'>$tieudehPrice</h2>";

           if (!empty($tieudehDescription)) {

               echo "<h2 style='color: green'>Mô tả sản phẩm: </h2>";

               echo $tieudehDescription;

           }

           */

            $contentI =  strReplaceAssoc($replaceQ, $content);

            $code = CodeRender('product');

            $this->Autoload_Model->_create(array(

                'table' => 'product',

                'data' => array(

                    'title' => htmlspecialchars_decode(html_entity_decode($tieudehH1)),

                    'slug' => slug(htmlspecialchars_decode(html_entity_decode($tieudehH1))),

                    'canonical' => slug($tieudehH1),

                    'description' => !empty($tieudehDescription) ? $tieudehDescription : '',

                    'content' => !empty($contentI) ? $contentI : '',

                    'price' => str_replace('.', '', $tieudehPrice),

                    'price_sale' => 0,

                    'code' => $code,

                    'alanguage' => $this->fclang,

                    'created' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),

                    'publish_time' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),

                    'userid_created' => 4,

                    'image' => is($tmp_album[0]),

                    'albums' => json_encode($tmp_album),

                    'catalogueid' => 87,

                    'image_json' => is(base64_encode(json_encode($tmp_album))),

                    'thuonghieu' => !empty($tmp_breadcrumb) ? $tmp_breadcrumb[$count_breadcrumb] : '',

                )

            ));
        }
    }
}
