<?php
if (!function_exists('seoFrontend')) {
    function seoFrontend($detail = [], $route = '')
    {
        $seo = [];
        if (!empty($detail)) {
            $seo['meta_title'] =  !empty($detail['meta_title']) ? $detail['meta_title'] : $detail['title'];
            $seo['meta_description'] = !empty($detail['meta_description']) ? $detail['meta_description'] : cutnchar(strip_tags($detail['description']));
            $seo['meta_image'] = $detail['image'];
            $seo['canonical'] = $route;
        }
        return $seo;
    }
}
if (!function_exists('getFunctions')) {
    function getFunctions()
    {
        $data = [];
        $getFunctions = \App\Models\Modules::select('keyword')->where('publish', 0)->get()->pluck('keyword');
        if (!$getFunctions->isEmpty()) {

            foreach ($getFunctions as $v) {
                $data[] = $v;
            }
        }
        return $data;
    }
}
if (!function_exists('fcSystem')) {
    function fcSystem()
    {

        $system = \App\Models\General::get();
        if (isset($system)) {
            foreach ($system as $val) {
                $language = $val['content'];
                $fcSystem[$val['keyword']] = $language;
            }
        }
        // Illuminate\Support\Facades\Session::put('fcSystem',$fcSystem);
        // Illuminate\Support\Facades\Session::save();
        return $fcSystem;
    }
}


if (!function_exists('htmlAddress')) {
    function htmlAddress($data = [])
    {
        $html = '';
        if (isset($data)) {
            foreach ($data as $k => $v) {
                $html .= ' <li class="showroom-item loc_link result-item" data-brand="' . $v->title . '" data-address="' . $v->address . '" data-phone="' . $v->hotline . '" data-lat="' . $v->lat . '" data-long="' . $v->long . '">
                <div class="heading" style="display: flex">

                    <p class="name-label" style="flex: 1">
                        <strong>' . ($k + 1) . '. ' . $v->title . '</strong>
                    </p>
                </div>
                <div class="details">
                    <p class="address" style="flex:1"><em>' . $v->address . '</em>
                    </p>

                    <p class="button-desktop button-view hidden-xs">
                        <a href="javascript:void(0)" onclick="return false;">Tìm đường</a>
                        <a class="arrow-right"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                    </p>
                    <p class="button-mobile button-view visible-xs">
                        <a target="_blank" href="https://www.google.com/maps/dir//' . $v->lat . ',' . $v->long . '">Tìm đường</a>
                        <a class="arrow-right" target="_blank" href="https://www.google.com/maps/dir//' . $v->lat . ',' . $v->long . '"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                    </p>
                </div>
            </li>';
            }
        }
        return $html;
    }
}
if (!function_exists('htmlItemCart')) {
    function htmlItemCart($k = '', $item = [])
    {
        $html = '';
        if (isset($item)) {

            $slug = !empty($item['slug']) ? $item['slug'] : '';
            $options = !empty($item['options']) ? $item['options'] : '';
            $html .= '<tr class="cart_item" data-rowid="' . $k . '">
            <td class="product-remove">
                <a href="" class="remove">×</a>
            </td>
            <td class="product-thumbnail">
                <a href="' . url($slug) . '" target="_blank"><img width="247" height="247" src="' . $item['image'] . '" alt="' . $item['title'] . '"></a>
            </td>
            <td>
                <a href="' . url($slug) . '" target="_blank">' . $item['title'] . '<br>' . $options . '</a>
                <div class="show-for-small mobile-product-price">
                    <span class="mobile-product-price__qty">' . $item['quantity'] . ' x </span>
                    <span class="amount">' . number_format($item['price']) . ' VNĐ</span>
                </div>
            </td>
            <td class="product-price">
                <span class="amount">' . number_format($item['price']) . ' VNĐ</span>
            </td>
            <td class="product-quantity">
                <div class="quantity">
                    <input type="button" value="-" class="minus button is-form">
                    <label class="screen-reader-text">' . $item['title'] . '</label>
                    <input type="number" class="input-text qty card-quantity" min="0" max="" name="" value="' . $item['quantity'] . '" placeholder="">
                    <input type="button" value="+" class="plus button is-form">
                </div>
            </td>
            <td class="product-subtotal">
                <span class="amount">' . number_format($item['price'] * $item['quantity']) . ' VNĐ</span>
            </td>
        </tr>';
        }
        return $html;
    }
}
