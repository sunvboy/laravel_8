@extends('homepage.layout.home')
@section('content')
<main class="pt-5 md:bg-gray-100 px-4 md:px-0">
    <div class="container mx-auto">
        <section class="section-hero">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                <div class="md:col-span-4">
                    <div class="owl-carousel-banner owl-carousel owl-theme">
                        <div class="item">
                            <a href="#">
                                <img class="rounded-2xl" src="https://media-api-beta.thinkpro.vn/media/core/banners/2022/3/3/PC ĐỒNG ĐỘ.png" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img class="rounded-2xl" src="https://media-api-beta.thinkpro.vn/media/core/banners/2022/2/16/image_2022-02-16_18-16-36 (2) copy.jpg" alt=""></a>
                        </div>

                    </div>
                </div>
                <div class="md:col-span-2 md:block hidden">
                    <section class="h-full flex flex-col justify-between">
                        <div class="px-4 pt-4 py-5 bg-white rounded-2xl text-black">
                            <h3 class="text-xl font-semibold">Miễn phí vận chuyển</h3>
                            <p class="text-sm mt-2">100% đơn hàng đều được miễn phí vận chuyển khi thanh toán trước.</p>
                        </div>
                        <div class="px-4 pt-4 py-5 bg-white rounded-2xl text-black">
                            <h3 class="text-xl font-semibold">Bảo hành tận tâm</h3>
                            <p class="text-sm mt-2">Bất kể giấy tờ thế nào, ThinkPro luôn cam kết sẽ hỗ trợ khách hàng tới cùng.</p>
                        </div>
                        <div class="px-4 pt-4 py-5 bg-white rounded-2xl text-black">
                            <h3 class="text-xl font-semibold">Đổi trả 1-1 hoặc hoàn tiền</h3>
                            <p class="text-sm mt-2">Nếu phát sinh lỗi hoặc bạn cảm thấy sản phẩm chưa đáp ứng được nhu cầu. </p>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <section class="mt-8">
            <h2 class="font-black text-lg md:text-2xl uppercase">Thương hiệu nổi bật</h2>
            <div class="mt-4">
                <div class="owl-carousel-brand owl-carousel owl-theme">
                    <?php for ($i = 1; $i <= 13; $i++) { ?>
                        <a href="" class="w-full float-left rounded-lg border h-20 flex bg-white">
                            <img class="m-auto" src="{{asset('frontend/images/'.$i.'.jpg')}}">
                        </a>
                    <?php } ?>
                </div>

            </div>
        </section>
        <section class="mt-8">
            <div class="flex flex-row items-center gap-5">
                <h2 class="font-black text-lg md:text-2xl flex-1 uppercase">LAPTOP, MÁY TÍNH XÁCH TAY</h2>
                <div class="flex hidden md:block">
                    <ul class="flex gap-5">
                        <li><a href="" class="hover:text-red-500">Laptop Acer</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop MSI</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Lenovo</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Acer</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Asus</a></li>
                    </ul>

                </div>
            </div>
            <div class="mt-4">
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    <div class="col-span-2 rounded-2xl shadow px-3 py-4 bg-white">
                        <div class="owl-carousel-product owl-carousel owl-theme">
                            <?php for ($i = 1; $i <= 4; $i++) { ?>
                                <a href="">
                                    <img class="h-[162px] md:h-[230px] object-contain" src="{{asset('frontend/images/p_'.$i.'.jpg')}}">
                                </a>
                            <?php } ?>
                        </div>
                        <div class="flex-1">

                            <h3 class="mt-1 text-body font-bold">Asus Zenbook Q408UG</h3>
                            <div class="mt-1">
                                <div>
                                    <span class="text-label text-gray-20">
                                        Từ
                                    </span>
                                    <span class="font-bold text-red-600">
                                        17.990.000
                                    </span>
                                </div>
                                <div class="text-ui">
                                    <span class="line-through">
                                        21.990.000
                                    </span>
                                    <span class="font-bold">
                                        -18%
                                    </span>
                                </div>
                            </div>

                            <div class="mt-2 flex items-center divide-x divide-space-x-2 gap-3">
                                <div class="flex items-center space-x-2">
                                    <span class="text-label text-gray-20 font-bold">Màu</span>
                                    <div class="w-4 h-4 rounded-sm bg-black border"></div>
                                    <div class="w-4 h-4 rounded-sm bg-white border"></div>
                                </div>
                                <span class="text-black text-sm font-bold pl-3">
                                    1 phiên bản
                                </span>
                            </div>
                            <!---->
                        </div>
                        <div class="border-t mt-2 pt-2">
                            <div class="flex items-center divide-x divide-space-x-2">
                                <!---->
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                    <span class="text-xs">Giảm giá</span>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <!---->
                    </div>
                    <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <div class="rounded-2xl shadow-lg  px-3 py-4 bg-white">

                            <div class="flex-1">
                                <a href="">
                                    <img class="h-[147px] md:h-[230px] object-contain" src="{{asset('frontend/images/p_1.jpg')}}">
                                </a>
                                <h3 class="mt-1 text-body font-bold">Asus Zenbook Q408UG</h3>
                                <div class="mt-1">
                                    <div>
                                        <span class="text-label text-gray-20">
                                            Từ
                                        </span>
                                        <span class="font-bold text-red-600">
                                            17.990.000
                                        </span>
                                    </div>
                                    <div class="text-ui">
                                        <span class="line-through">
                                            21.990.000
                                        </span>
                                        <span class="font-bold">
                                            -18%
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-2 flex items-center divide-x divide-space-x-2 gap-3">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-label text-gray-20 font-bold">Màu</span>
                                        <div class="w-4 h-4 rounded-sm bg-black border"></div>
                                        <div class="w-4 h-4 rounded-sm bg-white border"></div>
                                    </div>
                                    <span class="text-black text-sm font-bold pl-3 hidden md:block">
                                        1 phiên bản
                                    </span>
                                </div>
                                <!---->
                            </div>
                            <div class="border-t mt-2 pt-2">
                                <div class="flex items-center divide-x divide-space-x-2">
                                    <!---->
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                        </svg>
                                        <span class="text-xs">Giảm giá</span>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!---->
                        </div>
                    <?php } ?>
                </div>

            </div>

        </section>
        <section class="mt-8">
            <div class="flex flex-row items-center gap-5">
                <h2 class="font-black text-lg md:text-2xl flex-1 uppercase">LAPTOP, MÁY TÍNH XÁCH TAY</h2>
                <div class="flex hidden md:block">
                    <ul class="flex gap-5">
                        <li><a href="" class="hover:text-red-500">Laptop Acer</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop MSI</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Lenovo</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Acer</a></li>
                        <li><a href="" class="hover:text-red-500">Laptop Asus</a></li>
                    </ul>

                </div>
            </div>
            <div class="mt-4">
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    <div class="col-span-2 rounded-2xl shadow px-3 py-4 bg-white">
                        <div class="owl-carousel-product owl-carousel owl-theme">
                            <?php for ($i = 1; $i <= 4; $i++) { ?>
                                <a href="">
                                    <img class="h-[162px] md:h-[230px] object-contain" src="{{asset('frontend/images/p_'.$i.'.jpg')}}">
                                </a>
                            <?php } ?>
                        </div>
                        <div class="flex-1">

                            <h3 class="mt-1 text-body font-bold">Asus Zenbook Q408UG</h3>
                            <div class="mt-1">
                                <div>
                                    <span class="text-label text-gray-20">
                                        Từ
                                    </span>
                                    <span class="font-bold text-red-600">
                                        17.990.000
                                    </span>
                                </div>
                                <div class="text-ui">
                                    <span class="line-through">
                                        21.990.000
                                    </span>
                                    <span class="font-bold">
                                        -18%
                                    </span>
                                </div>
                            </div>

                            <div class="mt-2 flex items-center divide-x divide-space-x-2 gap-3">
                                <div class="flex items-center space-x-2">
                                    <span class="text-label text-gray-20 font-bold">Màu</span>
                                    <div class="w-4 h-4 rounded-sm bg-black border"></div>
                                    <div class="w-4 h-4 rounded-sm bg-white border"></div>
                                </div>
                                <span class="text-black text-sm font-bold pl-3">
                                    1 phiên bản
                                </span>
                            </div>
                            <!---->
                        </div>
                        <div class="border-t mt-2 pt-2">
                            <div class="flex items-center divide-x divide-space-x-2">
                                <!---->
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                    </svg>
                                    <span class="text-xs">Giảm giá</span>
                                </div>
                            </div>
                        </div>
                        <!---->
                        <!---->
                    </div>
                    <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <div class="rounded-2xl shadow-lg  px-3 py-4 bg-white">

                            <div class="flex-1">
                                <a href="">
                                    <img class="h-[147px] md:h-[230px] object-contain" src="{{asset('frontend/images/p_1.jpg')}}">
                                </a>
                                <h3 class="mt-1 text-body font-bold">Asus Zenbook Q408UG</h3>
                                <div class="mt-1">
                                    <div>
                                        <span class="text-label text-gray-20">
                                            Từ
                                        </span>
                                        <span class="font-bold text-red-600">
                                            17.990.000
                                        </span>
                                    </div>
                                    <div class="text-ui">
                                        <span class="line-through">
                                            21.990.000
                                        </span>
                                        <span class="font-bold">
                                            -18%
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-2 flex items-center divide-x divide-space-x-2 gap-3">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-label text-gray-20 font-bold">Màu</span>
                                        <div class="w-4 h-4 rounded-sm bg-black border"></div>
                                        <div class="w-4 h-4 rounded-sm bg-white border"></div>
                                    </div>
                                    <span class="text-black text-sm font-bold pl-3 hidden md:block">
                                        1 phiên bản
                                    </span>
                                </div>
                                <!---->
                            </div>
                            <div class="border-t mt-2 pt-2">
                                <div class="flex items-center divide-x divide-space-x-2">
                                    <!---->
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                        </svg>
                                        <span class="text-xs">Giảm giá</span>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <!---->
                        </div>
                    <?php } ?>
                </div>

            </div>

        </section>
        <section class="grid grid-cols-2 items-center mt-16 w-full md:gap-10 gap-4">
            <a href="" class="item bg-tint-blue-sky hover:ring-2 ring-blue p-3 md:p-7 rounded-2xl h-full">
                <div class="flex md:items-center text-blue-700 flex-col md:flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span class="text-lg md:text-2xl font-extrabold md:ml-3 flex-1">
                        Kinh nghiệm chọn laptop
                    </span>
                    <button class="next rounded-full text-white p-1 bg-blue-700 hover:ease-in duration-300 hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </div>
            </a>
            <a href="" class="item bg-tint-green hover:ring-2 ring-green p-3 md:p-7 rounded-2xl h-full">
                <div class="flex md:items-center text-dark-green text-green-800 flex-col md:flex-row">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-lg md:text-2xl font-extrabold md:ml-3 flex-1">
                        Review laptop
                    </span>
                    <button class="next rounded-full text-white p-1 bg-green-800 hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </div>
            </a>
        </section>
    </div>
</main>
<?php /*@include('cart.common.style')
@include('cart.common.script')*/ ?>
@endsection