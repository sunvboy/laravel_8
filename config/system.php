<?php 
$data['homepage'] =  array(
    'label' => 'Thông tin chung',
    'description' => 'Cài đặt đầy đủ thông tin chung của website. Tên thương hiệu website. Logo của website và icon website trên tab trình duyệt',
    'value' => array(
        'brandname' => array('type' => 'text', 'label' => 'Tên thương hiệu'),
        'company' => array('type' => 'text', 'label' => 'Tên công ty'),
        'logo' => array('type' => 'images', 'label' => 'Logo'),
        'logomobile' => array('type' => 'images', 'label' => 'Logo mobile'),
        'logomobilemenu' => array('type' => 'images', 'label' => 'Logo menu mobile'),
        'logochild' => array('type' => 'images', 'label' => 'Logo child'),
        'favicon' => array('type' => 'images', 'label' => 'Favicon'),
        'footer' => array('type' => 'editor', 'label' => 'Thông tin footer'),
    ),
);
$data['contact'] =  array(
    'label' => 'Thông tin liên lạc',
    'description' => 'Cấu hình đầy đủ thông tin liên hệ giúp khách hàng dễ dàng tiếp cận với dịch vụ của bạn',
    'value' => array(
        'address' => array('type' => 'text', 'label' => 'Địa chỉ'),
        'hotline' => array('type' => 'text', 'label' => 'Hotline'),
        'phone' => array('type' => 'text', 'label' => 'Số điện thoại'),
        'email' => array('type' => 'text', 'label' => 'Email'),
        'lienhe' => array('type' => 'textarea', 'label' => 'Lý do liên hệ'),

    ),
);
$data['seo'] =  array(
    'label' => 'Cấu hình thẻ tiêu đề',

    'description' => 'Cài đặt đầy đủ Thẻ tiêu đề và thẻ mô tả giúp xác định cửa hàng của bạn xuất hiện trên công cụ tìm kiếm.',

    'value' => array(

        'meta_title' => array('type' => 'text', 'label' => 'Tiêu đề trang','extend' => ' trên 70 kí tự', 'class' => 'meta-title', 'id' => 'titleCount'),

        'meta_description' => array('type' => 'textarea', 'label' => 'Mô tả trang','extend' => ' trên 320 kí tự', 'class' => 'meta-description', 'id' => 'descriptionCount'),
        'meta_images' => array('type' => 'images', 'label' => 'Ảnh'),

    ),

);

$data['social'] =  array(
    'label' => 'Cấu hình mạng xã hội',
    'description' => 'Cài đặt đầy đủ Thẻ tiêu đề và thẻ mô tả giúp xác định cửa hàng của bạn xuất hiện trên công cụ tìm kiếm.',
    'value' => array(
        'facebook' => array('type' => 'text', 'label' => 'Facebook'),
//                'facebookm' => array('type' => 'text', 'label' => 'Facebook message'),
         'instagram' => array('type' => 'text', 'label' => 'Instagram'),
         'twitter' => array('type' => 'text', 'label' => 'Twitter'),
//                'google_plus' => array('type' => 'text', 'label' => 'Google plus'),
//                'pinterest' => array('type' => 'text', 'label' => 'Pinterest'),
        'youtube' => array('type' => 'text', 'label' => 'Youtube'),
//                'rss' => array('type' => 'text', 'label' => 'RSS'),
//                'skype' => array('type' => 'text', 'label' => 'Skype'),
       'zalo' => array('type' => 'text', 'label' => 'Số zalo'),
    ),
);

$data['script'] =  array(
    'label' => 'Script',
    'description' => '',
    'value' => array(
        'header' => array('type' => 'textarea', 'label' => 'Script header'),
        'footer' => array('type' => 'textarea', 'label' => 'Script footer'),

    ),
);

$data['title'] =  array(
    'label' => 'Tiêu đề',
    'description' => '',
    'value' => array(

        '1' => array('type' => 'text', 'label' => 'LInk tin tức'),
    ),

);



return $data;

