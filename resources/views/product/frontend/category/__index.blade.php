@extends('homepage.layout.home')
@section('content')

<main class="py-8 bg-gray-50">
    <div class=" container mx-auto">
        <div class="rounded-xl overflow-hidden">
            <div class="w-full h-[200px] relative">
                <img alt="Màn hình" src="{{asset('frontend/images/man-hinh-pc.png')}}" class="blur-up object-cover w-full h-full">
                <h2 class="text-4xl font-black absolute left-6 top-1/2 text-white uppercase" style="transform: translateY(-50%)">Màn hình</h2>

            </div>
            <div class="px-6 py-4 bg-white float-left w-full">
                <h1 class="text-3xl font-bold">Màn hình</h1>
                <div class="mt-4">
                    <div class="px-2 py-3 float-left w-auto border-b-2 border-red-600 font-medium">
                        <span class="text-4 text-red-600">Tất cả Màn hình</span>
                        <span class="text-gray-600">13</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex space-x-4 relative pt-6 ">
            <div class=" w-[331px] side-left h-[100vh] sticky inset-0 overflow-auto ovn_scroll_bar_filter">
                <div class="flex items-center space-x-2 pb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    <span class="font-bold text-gray-600">Bộ lọc</span>

                </div>
                <div class="flex flex-col pb-6">
                    <div class="w-full py-4">
                        <div class="flex justify-between items-center ">
                            <h4 class="text-xl font-medium">Khoảng giá</h4>

                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4">


                    </div>

                </div>
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <div class="flex flex-col pb-6 <?php if ($i < 5) { ?>border-b<?php } ?>">
                        <div class="w-full py-4">
                            <div class="flex justify-between items-center ">
                                <h4 class="text-xl font-medium">Loại bàn phím</h4>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-4">
                            <label for="Keychron" class="px-4 py-2 text-center bg-white hover:bg-red-100 rounded-md cursor-pointer border">
                                <input id="Keychron" type="checkbox" value class="hidden">
                                <span class="">Keychron</span>
                            </label>
                            <label for="Keychron" class="px-4 py-2 text-center bg-white hover:bg-red-100 rounded-md cursor-pointer border">
                                <input id="Filco" type="checkbox" value class="hidden">
                                <span class="">Filco</span>
                            </label>
                            <label for="Keychron" class="px-4 py-2 text-center bg-white hover:bg-red-100 rounded-md cursor-pointer border">
                                <input id="Keychron" type="checkbox" value class="hidden">
                                <span class="">Keychron</span>
                            </label>
                            <label for="Keychron" class="px-4 py-2 text-center bg-white hover:bg-red-100 rounded-md cursor-pointer border">
                                <input id="Filco" type="checkbox" value class="hidden">
                                <span class="">Filco</span>
                            </label>
                            <label for="Keychron" class="px-4 py-2 text-center bg-white hover:bg-red-100 rounded-md cursor-pointer border">
                                <input id="Keychron" type="checkbox" value class="hidden">
                                <span class="">Keychron</span>
                            </label>
                            <label for="Keychron" class="px-4 py-2 text-center bg-white hover:bg-red-100 rounded-md cursor-pointer border">
                                <input id="Filco" type="checkbox" value class="hidden">
                                <span class="">Filco</span>
                            </label>
                        </div>

                    </div>

                <?php } ?>
            </div>
            <div class=" flex-1 pb-6">

                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute top-1/2 left-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="transform: translateY(-50%);">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input placeholder="Tìm kiếm trong" type="text" value="" class=" rounded-full border w-[421px] h-11 px-8 focus:outline-none focus:ring focus:ring-red-300 focus:rounded-full hover:outline-none hover:ring hover:ring-red-300 hover:rounded-full" name="keyword">
                </div>

                <section class="p-5 bg-red-50 rounded-2xl mt-6">
                    <h3 class="font-normal text-base">
                        Có
                        <strong>13</strong>
                        sản phẩm phù hợp với tiêu chí của bạn
                    </h3>
                    <div class="mt-2 t-flex-gap">
                        <div class="flex flex-wrap gap-4">
                            <span class="flex items-center p-2 rounded bg-red-100 ">
                                <span>
                                    Keychron
                                </span>
                                <!---->
                                <button class="w-[20px] ml-3 h-5 rounded-full flex justify-center bg-red-200 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </span>
                            <span class="flex items-center p-2 rounded bg-red-100 ">
                                <span>
                                    http://laravel-8.local/laptop-may-tinh-xach-tay-pc1
                                </span>
                                <!---->
                                <button class="w-[20px] ml-3 h-5 rounded-full flex justify-center bg-red-200 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </span>
                            <span class="flex items-center p-2 rounded bg-red-100 ">
                                <span>
                                    Keychron
                                </span>
                                <!---->
                                <button class="w-[20px] ml-3 h-5 rounded-full flex justify-center bg-red-200 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </span>
                            <span class="flex items-center p-2 rounded bg-red-100 ">
                                <span>
                                    Keychron
                                </span>
                                <!---->
                                <button class="w-[20px] ml-3 h-5 rounded-full flex justify-center bg-red-200 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </span>
                            <span class="flex items-center p-2 rounded bg-red-100 ">
                                <span>
                                    Keychron
                                </span>
                                <!---->
                                <button class="w-[20px] ml-3 h-5 rounded-full flex justify-center bg-red-200 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </span>
                            <span class="flex items-center p-2 rounded bg-red-100 ">
                                <span>
                                    http://laravel-8.local/laptop-may-tinh-xach-tay-pc1
                                </span>
                                <!---->
                                <button class="w-[20px] ml-3 h-5 rounded-full flex justify-center bg-red-200 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </span>
                            <span class="flex items-center p-2 rounded bg-red-100 ">
                                <span>
                                    Khoảng giá
                                </span>
                                <!---->
                                <button class="w-[20px] ml-3 h-5 rounded-full flex justify-center bg-red-200 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </span>
                            <span class="flex items-center p-2 rounded bg-red-100 ">
                                <span>
                                    Asus Zenbook Q408UG
                                </span>
                                <!---->
                                <button class="w-[20px] ml-3 h-5 rounded-full flex justify-center bg-red-200 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </div>
                </section>

                <div class="mt-4">
                    <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
                        <div class="col-span-3 rounded-2xl shadow px-3 py-4 bg-white">
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
                        <div class="col-span-3 rounded-2xl shadow px-3 py-4 bg-white">
                            <div class="owl-carousel-product owl-carousel owl-theme">
                                <?php for ($i = 1; $i <= 4; $i++) { ?>
                                    <a href="">
                                        <img class="h-[162px] md:h-[230px] object-contain" src="{{asset('frontend/images/p_'.$i.'.jpg')}}">
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="flex-1">

                                <h3 class="mt-1 text-body font-bold">Asus Zenbook Q408UG Asus Zenbook Q408UG Asus Zenbook Q408UGAsus Zenbook Q408UG </h3>
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
                        <div class="col-span-2 rounded-2xl shadow-lg  px-3 py-4 bg-white">
                            <div class="flex-1">
                                <a href="">
                                    <img class="h-[147px] md:h-[230px] object-contain mx-auto" src="{{asset('frontend/images/p_1.jpg')}}">
                                </a>
                                <h3 class="mt-1 text-body font-bold">Laptop Asus VivoBook M7600QC-L2077W (R5 5600H/16GB RAM/512GB SSD/16 Oled 2.8K/RTX3050 4GB/Win11/Đen)
                                </h3>
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
                        <?php for ($i = 1; $i <= 3; $i++) { ?>
                            <div class="col-span-2 rounded-2xl shadow-lg  px-3 py-4 bg-white">

                                <div class="flex-1">
                                    <a href="">
                                        <img class="h-[147px] md:h-[230px] object-contain mx-auto" src="{{asset('frontend/images/p_1.jpg')}}">
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

            </div>
        </div>



    </div>
</main>

<?php /*@include('product.frontend.category.head')*/ ?>
@endsection