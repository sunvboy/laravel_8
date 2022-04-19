<header class="md:block hidden">
    <div class="container py-4 mx-auto">
        <div class="flex items-center w-full space-x-6">
            <div class="flex-1 flex items-center space-x-6">
                <a href="/" aria-label="" class="logo link-active">
                    <img class="h-9" src="{{asset('frontend/images/Logo.png')}}" alt="" />
                </a>
                <div class="btn-group-catalog">
                    <div class="flex items-center hide_catalogue" style="display: none">
                        <button class="flex items-center justify-center rounded-full bg-gray-100 w-10 h-10 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="text-ui font-bold cursor-pointer">
                            Đóng menu
                        </div>
                    </div>
                    <div class="flex items-center show_catalogue">
                        <button class="flex items-center justify-center rounded-full bg-gray-100 w-10 h-10 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <div class="text-ui font-bold cursor-pointer">
                            Danh mục
                        </div>
                        <a href="/khuyen-mai" class="btn-promo ml-5 hover:text-blue-700 text-red-600">
                            Khuyến mại
                        </a>
                    </div>
                </div>
                <div class="flex-1">
                    <section class="section-input-search">
                        <div class="w-full">
                            <div class="">
                                <div class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-1/2 left-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="transform: translateY(-50%);">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    <input placeholder="Tên sản phẩm, nhu cầu, hãng" type="text" value="" class="bg-gray-200 rounded-full border w-full h-11 px-10 focus:outline-none focus:ring focus:ring-red-300 focus:rounded-full hover:outline-none hover:ring hover:ring-red-300 hover:rounded-full ovn_keyword" name="keyword">
                                    <button class="absolute right-1 rounded-full bg-red-600 h-9 w-32 text-white top-1/2 ovn_submit_search" style="transform: translateY(-50%);display: none">
                                        Tìm kiếm
                                    </button>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div>
                    <div class="t-tooltip">
                        <button class="flex items-center justify-center rounded-full bg-gray-100 h-10 px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span class="ml-2 text-base">0</span>
                        </button>
                    </div>
                </div>
                <div>
                    <div class="t-tooltip">
                        <button class="flex items-center justify-center rounded-full bg-gray-100 hover:bg-red-800 px-4 h-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="ml-2 text-base">Xây dựng cấu hình</span>
                        </button>
                    </div>
                </div>

                <div class="relative">
                    <button class="flex items-center justify-center rounded-full bg-gray-100 px-4 h-10 show_userInfo">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                    <div class="absolute right-0 top-14 hide_userInfo z-50" style="display: none">
                        <div class="flex flex-col overflow-hidden shadow-md bg-white rounded-xl">
                            <div class="items-center flex justify-between px-3 py-4">
                                <div class="text-2xl font-extrabold">Tài khoản</div>
                                <button class="hide_userInfo">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="overflow flex-1 ">
                                <div class="pt-2 pb-4 px-4 w-[408px] ovn_scroll">
                                    <div class="">
                                        <section class="flex items-center mb-1">
                                            <div class="border rounded-full h-[60px] w-[60px] overflow-hidden">
                                                <img alt="Thêm alt sau" src="{{asset('frontend/images/fallback-image.4d0336f.png')}}" class="blur-up h-full w-full t-img">
                                            </div>
                                            <div class="flex flex-col ml-3">
                                                <span class="font-extrabold text-[19px]">
                                                    Quyền
                                                </span>
                                                <a href="" class="font-bold text-xs text-red-600 hover:text-red-500">
                                                    Thêm số điện thoại
                                                </a>
                                            </div>
                                        </section>
                                        <div class="h-px bg-blue-gray-40 my-3"></div>
                                        <div class="">
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                    </svg>
                                                    <span>Thông tin tài khoản</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                                    </svg>
                                                    <span>Thông tin liên hệ & Sổ địa chỉ</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                                    </svg>
                                                    <span>Lịch sử mua hàng</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="h-px bg-blue-gray-40 my-3"></div>
                                        <section class="section-purchase-history">
                                            <div class="flex space-x-2 mt-2">
                                                <a href="" class="px-1 w-1/4 rounded-xl hover:bg-gray-40 hover:bg-gray-100 hover:rounded-xl">
                                                    <div class="flex flex-col items-center justify-between">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                        </svg>
                                                        <div class="mt-1 text-sm text-center">
                                                            <span class="block">Chờ</span>
                                                            <span class="font-bold mt-[2px] block">Thanh toán</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="" class="px-1 w-1/4 rounded-xl hover:bg-gray-40 hover:bg-gray-100 hover:rounded-xl">
                                                    <div class="flex flex-col items-center justify-between">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
                                                        </svg>
                                                        <div class="mt-1 text-sm text-center">
                                                            <span class="block">Có tại</span>
                                                            <span class="font-bold mt-[2px] block">Cửa hàng</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="" class="px-1 w-1/4 rounded-xl hover:bg-gray-40 hover:bg-gray-100 hover:rounded-xl">
                                                    <div class="flex flex-col items-center justify-between">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                                        </svg>
                                                        <div class="mt-1 text-sm text-center">
                                                            <span class="block">Đang</span>
                                                            <span class="font-bold mt-[2px] block">Vận chuyển</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="" class="px-1 w-1/4 rounded-xl hover:bg-gray-40 hover:bg-gray-100 hover:rounded-xl">
                                                    <div class="flex flex-col items-center justify-between">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                        </svg>
                                                        <div class="mt-1 text-sm text-center">
                                                            <span class="block">Chờ</span>
                                                            <span class="font-bold mt-[2px] block">Đánh giá</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </section>
                                        <div class="h-px bg-blue-gray-40 my-3"></div>
                                        <div class="">
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                                    </svg>
                                                    <span>Hệ thống cửa hàng</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                    </svg>
                                                    <span>Bảo hành, đổi trả</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                                    </svg>
                                                    <span>Vận chuyển, thanh toán</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                                    </svg>
                                                    <span>Bảng giá dịch vụ</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    <span>Gọi hotline 1900.63.3579</span>
                                                </div>
                                                <!---->
                                                <div class="t-list-item__arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="h-px bg-blue-gray-40 my-3"></div>
                                        <div class="">
                                            <a href="" class="flex justify-between items-center p-3 hover:bg-gray-100 hover:rounded-xl">
                                                <div class="flex space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                    </svg>
                                                    <span>Đăng xuất</span>
                                                </div>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<header class="md:hidden block">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between">
            <a href="/" aria-label="" class="logo link-active">
                <img class="h-9" src="{{asset('frontend/images/Logo.png')}}" alt="" />
            </a>
            <button class="h-[44px] w-[44px]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

            </button>

        </div>
    </div>
</header>
<div class="ovn_catalog bg-white shadow border-t border-gray-100 animation-fade-in-down" style="display: none">
    <div class="ovn_dialog__overlay"></div>
    <div class="flex bg-white z-10 relative">
        <div class="flex container mx-auto">
            <div class="w-24">
                <div class="category-sidebar-wrapper ovn_scroll_bar">
                    <div class="ovn_category_item cursor-pointer text-center p-2 bg-gray-100 active">
                        <div class="h-[64px] w-[64px] mx-auto">
                            <div class="aspect-h-1 aspect-w-1">
                                <img alt="Laptop" class="blur-up " src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle%201461.png">
                            </div>
                        </div>
                        <span class="mt-1 block text-center text-xs font-bold">

                            Laptop

                        </span>
                    </div>
                    <div class="ovn_category_item cursor-pointer text-center p-2 bg-gray-100 ">
                        <div class="h-[64px] w-[64px] mx-auto">
                            <div class="aspect-h-1 aspect-w-1">
                                <img alt="Laptop" class="blur-up " src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-7.png">
                            </div>
                        </div>
                        <span class="mt-1 block text-center text-xs font-bold">

                            Màn hình

                        </span>
                    </div>


                    <div class="ovn_category_item cursor-pointer text-center p-2 bg-gray-100 ">
                        <div class="h-[64px] w-[64px] mx-auto">
                            <div class="aspect-h-1 aspect-w-1">
                                <img alt="Laptop" class="blur-up " src="https://media-api-beta.thinkpro.vn/media/core/categories/2022/3/15/arm-man-hinh-gia-tot-thinkpro.png">
                            </div>
                        </div>
                        <span class="mt-1 block text-center text-xs font-bold">

                            Arm màn hình

                        </span>
                    </div>
                    <div class="ovn_category_item cursor-pointer text-center p-2 bg-gray-100 ">
                        <div class="h-[64px] w-[64px] mx-auto">
                            <div class="aspect-h-1 aspect-w-1">
                                <img alt="Laptop" class="blur-up " src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-2.png">
                            </div>
                        </div>
                        <span class="mt-1 block text-center text-xs font-bold">

                            Chuột

                        </span>
                    </div>
                    <div class="ovn_category_item cursor-pointer text-center p-2 bg-gray-100 ">
                        <div class="h-[64px] w-[64px] mx-auto">
                            <div class="aspect-h-1 aspect-w-1">
                                <img alt="Laptop" class="blur-up " src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-3.png">
                            </div>
                        </div>
                        <span class="mt-1 block text-center text-xs font-bold">

                            Bàn phím

                        </span>
                    </div>
                    <div class="ovn_category_item cursor-pointer text-center p-2 bg-gray-100 ">
                        <div class="h-[64px] w-[64px] mx-auto">
                            <div class="aspect-h-1 aspect-w-1">
                                <img alt="Laptop" class="blur-up " src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-1 copy.png">
                            </div>
                        </div>
                        <span class="mt-1 block text-center text-xs font-bold">


                            Ghế công thái học


                        </span>
                    </div>

                </div>
            </div>
            <div class="flex-1 px-6 py-4">

                <div class="flex items-center space-x-3 divide-x divide-gray-30">
                    <a href="" class="text-4xl font-bold cursor-pointer hover:text-red-600">
                        Laptop
                    </a>
                    <a href="" class="text-ui font-bold underline pl-4 hover:text-red-600">
                        Tất cả
                        <span class="lowercase">Laptop</span>
                    </a>
                    <a href="" class="text-ui font-bold underline pl-4 hover:text-red-600">
                        Khuyến mại
                        <span class="lowercase">Laptop</span>
                    </a>
                </div>
                <div class="ovn_scroll_bar">
                    <div class="mt-4 grid grid-cols-4 gap-6 ">
                        <div class="section-brand">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    LG
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Gram
                                </a>
                            </div>
                        </div>
                        <div class="section-brand">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    AVITA
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Laptop
                                </a>
                            </div>
                        </div>
                        <div class="section-brand">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    GIGABYTE

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AERO series
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AORUS
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        GIGABYTE Gaming
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="section-brand">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    HUAWEI

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        MateBook
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    LG
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Gram
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    AVITA
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Laptop
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    GIGABYTE

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AERO series
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AORUS
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        GIGABYTE Gaming
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    HUAWEI

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        MateBook
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    LG
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Gram
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    AVITA
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Laptop
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    GIGABYTE

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AERO series
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AORUS
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        GIGABYTE Gaming
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    HUAWEI

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        MateBook
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    LG
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Gram
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    AVITA
                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                    Laptop
                                </a>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    GIGABYTE

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AERO series
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        AORUS
                                    </a><a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        GIGABYTE Gaming
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="section-brand border-t pt-6">
                            <div class="flex items-center">
                                <h3 class="font-bold text-red-600 mr-4 cursor-pointer hover:text-red-500">
                                    HUAWEI

                                </h3>
                                <a href="" class="flex items-center hover:text-red-500">
                                    <span class="text-ui mr-1">Tất cả</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            <div class="mt-2 flex flex-col space-y-2">
                                <div class="mt-2 flex flex-col space-y-2">
                                    <a href="" class="sub-brand p-3 font-bold rounded-2xl bg-gray-100 hover:bg-gray-50">
                                        MateBook
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>
<!-- start: navigation -->
<nav class="border-y py-1">
    <div class="container mx-auto">
        <div class="owl-carousel-catalogue owl-carousel owl-theme">
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]"><img alt="Laptop" src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461.png" class="blur-up t-img"></div> <span class="flex-1 whitespace-nowrap text-ui font-bold">Laptop</span>
            </div>
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]"><img alt="Màn hình" src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-7.png" class="blur-up t-img"></div> <span class="flex-1 whitespace-nowrap text-ui font-bold">Màn hình</span>
            </div>
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]"><img alt="Arm màn hình" src="https://media-api-beta.thinkpro.vn/media/core/categories/2022/3/15/arm-man-hinh-gia-tot-thinkpro.png" class="blur-up t-img"></div> <span class="flex-1 whitespace-nowrap text-ui font-bold">Arm màn hình</span>
            </div>
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]"><img alt="Chuột" src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-2.png" class="blur-up t-img"></div> <span class="flex-1 whitespace-nowrap text-ui font-bold">Chuột</span>
            </div>
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]"><img alt="Bàn phím" src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-3.png" class="blur-up t-img"></div> <span class="flex-1 whitespace-nowrap text-ui font-bold">Bàn phím</span>
            </div>
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]"><img alt="Ghế công thái học" src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-1 copy.png" class="blur-up t-img"></div> <span class="flex-1 whitespace-nowrap text-ui font-bold">Ghế công thái học</span>
            </div>
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]"><img alt="Bàn nâng hạ" src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461 copy.png" class="blur-up t-img"></div> <span class="flex-1 whitespace-nowrap text-ui font-bold">Bàn nâng hạ</span>
            </div>
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]"><img alt="Balo, Túi" src="https://media-api-beta.thinkpro.vn/media/core/categories/2022/1/14/balo-tui.png" class="blur-up t-img"></div> <span class="flex-1 whitespace-nowrap text-ui font-bold">Balo, Túi</span>
            </div>
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]"><img alt="Máy chơi game" src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-2 copy.png" class="blur-up t-img"></div> <span class="flex-1 whitespace-nowrap text-ui font-bold">Máy chơi game</span>
            </div>
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]"><img alt="Tai nghe" src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-4.png" class="blur-up t-img"></div> <span class="flex-1 whitespace-nowrap text-ui font-bold">Tai nghe</span>
            </div>
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]"><img alt="Loa" src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-5.png" class="blur-up t-img"></div> <span class="flex-1 whitespace-nowrap text-ui font-bold">Loa</span>
            </div>
            <div class="flex items-center space-x-2 justify-center hover:bg-gray-200 hover:rounded-lg w-full">
                <div class="w-[52px] h-[52px]">
                    <a href="" class=""><img alt="Cổng chuyển" data-src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-8.png" class="blur-up t-img lazyloaded" src="https://media-api-beta.thinkpro.vn/media/core/categories/2021/12/29/Rectangle 1461-8.png"> </a>
                </div>
                <span class="flex-1 whitespace-nowrap text-ui font-bold">Cổng chuyển</span>
            </div>
        </div>


    </div>
</nav>

<!-- fixed: mobile -->
<nav class="fixed flex bottom-0 left-0 z-50 border-t w-full bg-white md:hidden">
    <a href="" class="text-xs flex flex-1 flex-col items-center justify-center cursor-pointer my-1">
        <div class="h-8 flex items-center justify-center mb-1 relative w-[59px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
            </svg>
        </div>
        <div class="t-tabbar-item__text">
            Trang chủ
        </div>
    </a>
    <a href="javascript:void(0)" class="show_catalogue show_catalogue_mobile text-xs flex flex-1 flex-col items-center justify-center cursor-pointer my-1">
        <div class="h-8 flex items-center justify-center mb-1 relative w-[59px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </div>
        <div class="t-tabbar-item__text">
            Danh mục
        </div>
    </a>
    <a href="" class="text-xs flex flex-1 flex-col items-center justify-center cursor-pointer my-1">
        <div class="h-8 flex items-center justify-center mb-1 relative w-[59px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
            </svg>
        </div>
        <div class="t-tabbar-item__text">
            Khuyến mãi
        </div>
    </a>
    <a href="" class="text-xs flex flex-1 flex-col items-center justify-center cursor-pointer my-1">
        <div class="h-8 flex items-center justify-center mb-1 relative w-[59px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
        </div>
        <div class="t-tabbar-item__text">
            Giỏ hàng
        </div>
    </a>
    <a href="" class="text-xs flex flex-1 flex-col items-center justify-center cursor-pointer my-1">
        <div class="h-8 flex items-center justify-center mb-1 relative w-[59px]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
        </div>
        <div class="t-tabbar-item__text">
            Tài khoản
        </div>
    </a>
</nav>