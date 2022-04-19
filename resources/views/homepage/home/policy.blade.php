@extends('homepage.layout.home')
@section('content')
<main class="bg-gray-50">
    <div class="container pt-4 mx-auto">
        <nav class="bg-grey-light rounded font-sans w-full">
            <ol class="list-reset flex text-blue-500">
                <li><a href="<?php echo url('') ?>" class="text-blue font-bold">Trang chủ</a></li>
                <li><span class="mx-2">/</span></li>
                <li>Chính sách</li>
            </ol>
        </nav>
        <div class="mt-4 flex items-start space-x-4">
            @include('customer/frontend/auth/common/sidebar')
            <div class="flex-1 overflow-x-hidden">
                <div class="flex-1 ml-4 p-6 bg-white shadow rounded-xl">
                    <h1 class="text-black text-[26px]">Chính sách</h1>
                    <div class="relative py-3">
                        <ul class="ul-tab flex items-center gap-5">
                            <li class="py-2 tab-one active flex-auto text-center"><a href="javascript:void(0)" onclick="tab('one')">Bảo hành, đổi trả</a></li>
                            <li class="py-2 tab-two flex-auto text-center"><a href="javascript:void(0)" onclick="tab('two')">Vận chuyển</a></li>
                            <li class="py-2 tab-three flex-auto text-center"><a href="javascript:void(0)" onclick="tab('three')">Thanh toán</a></li>
                            <li class="py-2 tab-four flex-auto text-center"><a href="javascript:void(0)" onclick="tab('four')">Bảng giá dịch vụ</a></li>
                        </ul>
                    </div>
                    <div id="tab-one" class="tab-box active">
                        <div class="px-4 py-6 space-y-4">
                            <div class="space-y-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[60px] w-[60px] text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <h2 class="text-h1 font-extrabold">Chính sách bảo hành, đổi trả</h2>
                            </div>
                            <div class="mt-6">
                                <h3 class="text-2xl font-bold">
                                    I. Chính sách đổi trả laptop chính hãng
                                </h3>
                                <h4 class="text-xl font-bold mt-4">
                                    Tháng đầu tiên kể từ thời điểm nhận máy thành công
                                </h4>
                                <div class="space-y-2 mt-2">
                                    <h6><span class="font-bold">Sản phẩm lỗi do nhà sản xuất:</span>
                                        1 ĐỔI 1
                                    </h6>
                                    <div class="space-y-2">
                                        <p>Sản phẩm cùng model, cùng màu, cùng dung lượng.</p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Trong tình huống sản phẩm đổi hết hàng, khách hàng có thể đổi sang
                                                một sản phẩm khác tương đương hoặc cao hơn về giá trị so với sản
                                                phẩm lỗi.
                                            </li>
                                        </ul>
                                        <p class="italic">Hoặc</p>
                                        <p>
                                            Khách hàng muốn trả sản phẩm: ThinkPro sẽ kiểm tra tình trạng máy và
                                            thông báo đến Khách hàng về giá trị thu lại sản phẩm ngay tại cửa
                                            hàng.
                                        </p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Chú ý:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Sản phẩm đổi trả phải giữ nguyên 100% ngoại hình ban đầu,
                                                        nguyên vỏ hộp, giấy tờ liên quan và đủ điều kiện bảo hành của
                                                        hãng
                                                    </li>
                                                    <li>Thân máy và màn hình máy không bị trầy xước</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6 class="font-bold">
                                        Sản phẩm không lỗi (đổi trả theo nhu cầu của khách hàng)
                                    </h6>
                                    <div class="space-y-2">
                                        <p>
                                            Khách hàng muốn đổi sang sản phẩm khác hoặc trả sản phẩm: ThinkPro
                                            sẽ kiểm tra tình trạng máy và thông báo đến Khách hàng về giá trị
                                            thu lại sản phẩm ngay tại cửa hàng.
                                        </p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Chú ý:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Sản phẩm đổi trả phải giữ nguyên 100% ngoại hình ban đầu,
                                                        nguyên vỏ hộp, giấy tờ liên quan và đủ điều kiện bảo hành của
                                                        hãng
                                                    </li>
                                                    <li>Thân máy và màn hình máy không bị trầy xước</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6 class="font-bold">Sản phẩm lỗi do người sử dụng</h6>
                                    <div class="space-y-2">
                                        <p>Không áp dụng đổi trả với sản phẩm:</p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Máy không còn giữ nguyên 100% hình dạng ban đầu, bao gồm: có dấu
                                                hiệu va chạm mạnh, cấn móp, bị vào nước...
                                            </li>
                                            <li>Không đủ điều kiện bảo hành theo chính sách của hãng.</li>
                                        </ul>
                                        <p>
                                            Trong trường hợp này, ThinkPro hỗ trợ chuyển sang trung tâm bảo hành
                                            và khách hàng chịu phí sửa chữa.
                                        </p>
                                    </div>
                                    <h6 class="font-bold">Lưu ý</h6>
                                    <div class="space-y-2">
                                        <ul class="list-disc italic space-y-1 px-6">
                                            <li>
                                                Phí đổi trả khác nếu có: ThinkPro sẽ kiểm tra tình trạng máy và
                                                thông báo đến khách hàng về mức phí phải thu ngay tại cửa hàng.
                                            </li>
                                            <li>
                                                Thời điểm bắt đầu tính bảo hành:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Nhận máy tại cửa hàng: Thời điểm bàn giao máy thành công
                                                    </li>
                                                    <li>
                                                        Vận chuyển tận nơi: Thời điểm nhận máy thành công từ đơn vị
                                                        vận chuyển
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="text-xl font-bold">
                                        Tháng 2 - 12 kể từ thời điểm nhận máy thành công
                                    </h4>
                                    <h6 class="font-bold">Sản phẩm lỗi do nhà sản xuất</h6>
                                    <div class="space-y-2">
                                        <p>GỬI MÁY ĐI BẢO HÀNH THEO QUI ĐỊNH CỦA HÃNG</p>
                                        <p>Hoặc</p>
                                        <p>
                                            Khách hàng muốn đổi sang sản phẩm khác hoặc trả sản phẩm: ThinkPro
                                            sẽ kiểm tra tình trạng máy và thông báo đến Khách hàng về giá trị
                                            thu lại sản phẩm ngay tại cửa hàng.
                                        </p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Chú ý:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Sản phẩm đổi trả phải giữ nguyên 100% ngoại hình ban đầu,
                                                        nguyên vỏ hộp, giấy tờ liên quan và đủ điều kiện bảo hành của
                                                        hãng
                                                    </li>
                                                    <li>Thân máy và màn hình máy không bị trầy xước</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6 class="font-bold">
                                        Sản phẩm không lỗi (đổi trả theo nhu cầu của khách hàng)
                                    </h6>
                                    <div class="space-y-2">
                                        <p>
                                            Khách hàng muốn đổi sang sản phẩm khác hoặc trả sản phẩm: ThinkPro
                                            sẽ kiểm tra tình trạng máy và thông báo đến Khách hàng về giá trị
                                            thu lại sản phẩm ngay tại cửa hàng.
                                        </p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Chú ý:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Sản phẩm đổi trả phải giữ nguyên 100% ngoại hình ban đầu,
                                                        nguyên vỏ hộp, giấy tờ liên quan và đủ điều kiện bảo hành của
                                                        hãng
                                                    </li>
                                                    <li>Thân máy và màn hình máy không bị trầy xước</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6 class="font-bold">Sản phẩm lỗi do người sử dụng</h6>
                                    <div class="space-y-2">
                                        <p>Không áp dụng đổi trả với sản phẩm:</p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Máy không còn giữ nguyên 100% hình dạng ban đầu, bao gồm: có dấu
                                                hiệu va chạm mạnh, cấn móp, bị vào nước...
                                            </li>
                                            <li>Không đủ điều kiện bảo hành theo chính sách của hãng.</li>
                                        </ul>
                                        <p>
                                            Trong trường hợp này, ThinkPro hỗ trợ chuyển sang trung tâm bảo hành
                                            và khách hàng chịu phí sửa chữa.
                                        </p>
                                    </div>
                                    <h6 class="font-bold">Lưu ý</h6>
                                    <div class="space-y-2">
                                        <ul class="list-disc italic space-y-1 px-6">
                                            <li>
                                                Phí đổi trả khác nếu có: ThinkPro sẽ kiểm tra tình trạng máy và
                                                thông báo đến khách hàng về mức phí phải thu ngay tại cửa hàng.
                                            </li>
                                            <li>
                                                Trong thời gian đợi bảo hành - sửa chữa, khách hàng sẽ được hỗ trợ
                                                miễn phí laptop khác để sử dụng.
                                            </li>
                                            <li>
                                                Thời điểm bắt đầu tính bảo hành:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Nhận máy tại cửa hàng: Thời điểm bàn giao máy thành công
                                                    </li>
                                                    <li>
                                                        Vận chuyển tận nơi: Thời điểm nhận máy thành công từ đơn vị
                                                        vận chuyển
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <h3 class="text-2xl font-bold">
                                    II. Chính sách đổi trả laptop nhập khẩu hoặc đã qua sử dụng
                                </h3>
                                <h4 class="text-xl font-bold mt-4">15 ngày đầu kể từ ngày mua</h4>
                                <div class="space-y-2 mt-2">
                                    <h6><span class="font-bold">Sản phẩm lỗi do nhà sản xuất:</span>
                                        1 ĐỔI 1
                                    </h6>
                                    <div class="space-y-2">
                                        <p>
                                            Miễn phí đổi sản phẩm tương đương: cùng model, cùng dung lượng, cùng
                                            thời gian bảo hành…
                                        </p>
                                        <p>
                                            Trường hợp không có sản phẩm tương đương, ThinkPro hoàn lại tiền
                                            100%
                                        </p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Chú ý:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Sản phẩm đổi trả phải giữ nguyên 100% ngoại hình ban đầu,
                                                        nguyên vỏ hộp, giấy tờ liên quan và đủ điều kiện bảo hành của
                                                        hãng
                                                    </li>
                                                    <li>Thân máy và màn hình máy không bị trầy xước</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6 class="font-bold">Sản phẩm không lỗi</h6>
                                    <div class="space-y-2">
                                        <p>Không áp dụng đổi trả</p>
                                    </div>
                                    <h6 class="font-bold">Sản phẩm lỗi do người sử dụng</h6>
                                    <div class="space-y-2">
                                        <p>Không áp dụng đổi trả với sản phẩm:</p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Máy không còn giữ nguyên 100% hình dạng ban đầu, bao gồm: có dấu
                                                hiệu va chạm mạnh, cấn móp, bị vào nước...
                                            </li>
                                            <li>Không đủ điều kiện bảo hành theo chính sách của hãng.</li>
                                        </ul>
                                        <p>
                                            Trong trường hợp này, ThinkPro hỗ trợ chuyển sang trung tâm bảo hành
                                            và khách hàng chịu phí sửa chữa.
                                        </p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Chú ý:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Sản phẩm đổi trả phải giữ nguyên 100% ngoại hình ban đầu,
                                                        nguyên vỏ hộp, giấy tờ liên quan và đủ điều kiện bảo hành của
                                                        hãng
                                                    </li>
                                                    <li>Thân máy và màn hình máy không bị trầy xước</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6 class="font-bold">Lưu ý</h6>
                                    <div class="space-y-2">
                                        <ul class="list-disc italic space-y-1 px-6">
                                            <li>
                                                Phí đổi trả khác nếu có: ThinkPro sẽ kiểm tra tình trạng máy và
                                                thông báo đến khách hàng về mức phí phải thu ngay tại cửa hàng.
                                            </li>
                                            <li>
                                                Thời điểm bắt đầu tính bảo hành:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Nhận máy tại cửa hàng: Thời điểm bàn giao máy thành công
                                                    </li>
                                                    <li>
                                                        Vận chuyển tận nơi: Thời điểm nhận máy thành công từ đơn vị
                                                        vận chuyển
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="text-xl font-bold">
                                        Từ ngày 16 tới tháng 12 kể từ ngày mua
                                    </h4>
                                    <h6 class="font-bold">Sản phẩm lỗi do nhà sản xuất</h6>
                                    <div class="space-y-2">
                                        <p>
                                            ThinkPro gửi máy đi bảo hành theo chính sách của hãng hoặc bảo hành
                                            của
                                            <a href="https://thinkpro.vn" target="_blank" class="underline text-gray-20">
                                                Thinkpro.vn
                                            </a>
                                        </p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Chú ý:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Sản phẩm đổi trả phải giữ nguyên 100% ngoại hình ban đầu,
                                                        nguyên vỏ hộp, giấy tờ liên quan và đủ điều kiện bảo hành của
                                                        hãng
                                                    </li>
                                                    <li>Thân máy và màn hình máy không bị trầy xước</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6 class="font-bold">Sản phẩm không lỗi</h6>
                                    <div class="space-y-2">
                                        <p>Không áp dụng đổi trả</p>
                                    </div>
                                    <h6 class="font-bold">Sản phẩm lỗi do người sử dụng</h6>
                                    <div class="space-y-2">
                                        <p>Không áp dụng đổi trả với sản phẩm:</p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Máy không còn giữ nguyên 100% hình dạng ban đầu, bao gồm: có dấu
                                                hiệu va chạm mạnh, cấn móp, bị vào nước...
                                            </li>
                                            <li>Không đủ điều kiện bảo hành theo chính sách của hãng.</li>
                                        </ul>
                                        <p>
                                            Trong trường hợp này, ThinkPro hỗ trợ chuyển sang trung tâm bảo hành
                                            và khách hàng chịu phí sửa chữa.
                                        </p>
                                        <ul class="list-disc space-y-1 px-6">
                                            <li>
                                                Chú ý:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Sản phẩm đổi trả phải giữ nguyên 100% ngoại hình ban đầu,
                                                        nguyên vỏ hộp, giấy tờ liên quan và đủ điều kiện bảo hành của
                                                        hãng
                                                    </li>
                                                    <li>Thân máy và màn hình máy không bị trầy xước</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6 class="font-bold">Lưu ý</h6>
                                    <div class="space-y-2">
                                        <ul class="list-disc italic space-y-1 px-6">
                                            <li>
                                                Phí đổi trả khác nếu có: ThinkPro sẽ kiểm tra tình trạng máy và
                                                thông báo đến khách hàng về mức phí phải thu ngay tại cửa hàng.
                                            </li>
                                            <li>
                                                Trong thời gian đợi bảo hành - sửa chữa, khách hàng sẽ được hỗ trợ
                                                miễn phí laptop khác để sử dụng.
                                            </li>
                                            <li>
                                                Thời điểm bắt đầu tính bảo hành:
                                                <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                    <li>
                                                        Nhận máy tại cửa hàng: Thời điểm bàn giao máy thành công
                                                    </li>
                                                    <li>
                                                        Vận chuyển tận nơi: Thời điểm nhận máy thành công từ đơn vị
                                                        vận chuyển
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <h3 class="text-2xl font-bold">III. Chính sách bảo hành phụ kiện</h3>
                                <div class="mt-2">
                                    <div class="bg-gray-50 flex">
                                        <div class="w-2/3 px-4 py-3">
                                            <h6 class="font-extrabold">Nội dung chính sách</h6>
                                        </div>
                                        <div class="w-1/3 px-4 py-3">
                                            <h6 class="font-extrabold">Điều kiện áp dụng</h6>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="w-2/3 px-4 py-3">
                                            <div class="font-bold">1. BẢO HÀNH CÓ CAM KẾT TRONG 12 THÁNG</div>
                                            <ul>
                                                <li>
                                                    - Chỉ áp dụng cho sản phẩm chính, KHÔNG áp dụng cho phụ kiện đi
                                                    kèm sản phẩm chính
                                                </li>
                                                <li>+ Đổi mới trong 15 ngày đầu tiên nếu có lỗi NSX</li>
                                                <li>
                                                    + Bảo hành trong vòng 15 ngày (tính từ ngày ThinkPro nhận sản
                                                    phẩm ở trạng thái lỗi và đến ngày gọi khách hàng ra lấy lại sản
                                                    phẩm đã bảo hành)
                                                </li>
                                                <li>
                                                    + Sản phẩm không bảo hành lại lần 2 trong 30 ngày kể từ ngày máy
                                                    được bảo hành xong.
                                                </li>
                                                <li>
                                                    + Nếu ThinkPro vi phạm cam kết (bảo hành quá 15 ngày hoặc phải
                                                    bảo hành lại sản phẩm lần nữa trong 30 ngày kể từ lần bảo hành
                                                    trước), Khách hàng được áp dụng phương thức
                                                    <strong>Đổi mới tức thì</strong>
                                                    hoặc
                                                    <strong>Hoàn tiền với mức phí giảm 50%.</strong>
                                                </li>
                                                <li class="mt-4">
                                                    *Từ tháng thứ 13 trở đi không áp dụng bảo hành cam kết, chỉ áp
                                                    dụng bảo hành hãng (nếu có)
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="w-1/3 px-4 py-3">
                                            Sản phẩm đủ điều kiện bảo hành của hãng
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 flex">
                                        <div class="w-2/3 px-4 py-3">
                                            <div class="font-bold">2. ĐỔI MỚI TỨC THÌ</div>
                                            <p>
                                                Sản phẩm hư gì thì đổi đó (cùng model, cùng dung lượng, cùng màu
                                                sắc...) đối với sản phẩm chính và đổi tương đương đối với phụ kiện
                                                đi kèm, cụ thể:
                                            </p>
                                            <p class="mt-4"><strong>2.1 Hư sản phẩm chính thì đổi sản phẩm chính mới:</strong>
                                                Tháng đầu tiên kể từ ngày mua: miễn phí. Tháng thứ 2 đến tháng thứ
                                                12: phí 10% giá trị hóa đơn/tháng.(VD: tháng thứ 2 phí 10%, tháng
                                                thứ 3 phí 20%...) Lưu ý: Nếu không có sản phẩm chính đổi cho Khách
                                                hàng thì áp dụng chính sách
                                                <strong>Bảo hành có cam kết</strong>
                                                hoặc
                                                <strong>Hoàn tiền với mức phí giảm 50%.</strong>
                                            </p>
                                            <p class="mt-4"><strong>
                                                    2.2 Hư phụ kiện đi kèm thì đổi phụ kiện có cùng công năng mà
                                                    ThinkPro đang kinh doanh:
                                                </strong>
                                                Phụ kiện đi kèm được đổi miễn phí trong vòng 12 tháng kể từ ngày
                                                mua sản phẩm chính bằng hàng phụ kiện ThinkPro đang kinh doanh mới
                                                với công năng tương đương. Lưu ý: Nếu không có phụ kiện tương
                                                đương hoặc Khách hàng không thích thì áp dụng bảo hành hãng
                                            </p>
                                            <p class="mt-4"><strong>2.3 Lỗi phần mềm</strong>
                                                không áp dụng, mà chỉ khắc phục lỗi phần mềm
                                            </p>
                                            <p class="mt-4"><strong>2.4 Trường hợp Khách hàng muốn đổi full box</strong>
                                                (nguyên thùng, nguyên hộp): ngoài việc áp dụng mức phí đổi trả tại
                                                Mục 2.1 thì Khách hàng sẽ trả thêm phí lấy full box tương đương
                                                20% giá trị hóa đơn.
                                            </p>
                                        </div>
                                        <div class="w-1/3 px-4 py-3">
                                            <p>
                                                Sản phẩm đổi trả phải giữ nguyên 100% hình dạng ban đầu và đủ điều
                                                kiện bảo hành của hãng.
                                            </p>
                                            <p class="mt-4">
                                                Sản phẩm chỉ dùng cho mục đích sử dụng cá nhân, không áp dụng việc
                                                sử dụng sản phẩm cho mục đích thương mại.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="w-2/3 px-4 py-3">
                                            <div class="font-bold">3. HOÀN TIỀN</div>
                                            <p>Áp dụng cho sản phẩm lỗi và không lỗi.</p>
                                            <ul>
                                                <li>- Tháng đầu tiên kể từ ngày mua: phí 20% giá trị hóa đơn</li>
                                                <li>
                                                    - Tháng thứ 2 đến tháng thứ 12: phí 10% giá trị hóa đơn/tháng
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="w-1/3 px-4 py-3">
                                            <p>
                                                Sản phẩm đổi trả phải giữ nguyên 100% hình dạng ban đầu và đủ điều
                                                kiện bảo hành của hãng.
                                            </p>
                                            <p class="mt-4">
                                                Sản phẩm chỉ dùng cho mục đích sử dụng cá nhân, không áp dụng việc
                                                sử dụng sản phẩm cho mục đích thương mại.
                                            </p>
                                            <p class="mt-4">Hoàn trả lại đầy đủ hộp, sạc, phụ kiện đi kèm.</p>
                                            <p class="mt-4">
                                                Hoàn trả toàn bộ hàng khuyến mãi. Nếu mất hàng khuyến mãi sẽ thu
                                                phí theo mức giá đã được công bố.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex bg-gray-50 rounded-xl p-4 mt-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <p>
                                    Nếu cần hỗ trợ thêm, đừng ngần ngại
                                    <a href="tel:1900633579" class="text-blue">Liên hệ bộ phận CSKH</a>
                                    bạn nhé!
                                </p>
                            </div>
                        </div>

                    </div>

                    <div id="tab-two" class="tab-box hidden">
                        <div class="px-4 py-6 space-y-6">
                            <div class="space-y-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[60px] w-[60px] text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                </svg>
                                <h2 class="text-h1 font-extrabold">Chính sách vận chuyển</h2>
                            </div>
                            <div class="mt-6">
                                <h3 class="text-2xl font-bold">I. Chính sách vận chuyển và giao nhận</h3>
                                <div class="space-y-2 mt-2">
                                    <p>ThinkPro hỗ trợ vận chuyển toàn quốc dưới 2 hình thức:</p>
                                    <ol class="list-decimal list-outside space-y-2 px-6">
                                        <li>
                                            Giao hàng tận nơi, thanh toán khi nhận hàng (COD)
                                            <ul class="list-disc space-y-2 px-6 mt-2">
                                                <li>
                                                    Đối với hình thức này bạn sẽ cần thanh toán 100% phí vận chuyển
                                                    phát sinh trong quá trình vận chuyển (Sẽ có thông báo trước khi
                                                    gửi hàng).
                                                    <ul class="px-6 space-y-1 mt-2" style="list-style-type: circle;">
                                                        <li>
                                                            ThinkPro sẽ hỗ trợ bạn phí thu hộ và bảo hiểm đơn hàng
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    ThinkPro có trách nhiệm hỗ trợ khách hàng trong toàn bộ quá
                                                    trình vận chuyển cho tới khi khách hàng nhận sản phẩm.
                                                </li>
                                                <li>
                                                    Đặt cọc
                                                    <ul class="px-6 space-y-1 mt-2" style="list-style-type: circle;">
                                                        <li>
                                                            Đối với đơn hàng dưới 10.000.000đ, bạn không cần đặt cọc
                                                        </li>
                                                        <li>
                                                            Đối với đơn hàng từ 10.000.000đ trở lên, bạn sẽ cần đặt cọc
                                                            theo hướng dẫn ở bước Thanh toán nếu đặt trên website hoặc
                                                            theo hướng dẫn của chuyên viên bán hàng nếu mua trực tiếp.
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            Giao hàng tận nơi, thanh toán trước 100%
                                            <ul class="list-disc space-y-2 px-6 mt-2">
                                                <li>
                                                    Đối với hình thức này Quý khách sẽ được
                                                    <strong>miễn phí vận chuyển</strong>
                                                    phát sinh trong quá trình giao hàng.
                                                    <ul class="px-6 space-y-1 mt-2" style="list-style-type: circle;">
                                                        <li>ThinkPro sẽ hỗ trợ bạn phí bảo hiểm đơn hàng</li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    ThinkPro có trách nhiệm hỗ trợ khách hàng trong toàn bộ quá
                                                    trình vận chuyển cho tới khi khách hàng nhận sản phẩm.
                                                </li>
                                                <li>
                                                    Đối với hình thức này quý khách hàng vui lòng thanh toán trước
                                                    100% giá trị đơn hàng.
                                                </li>
                                            </ul>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="mt-6">
                                <h3 class="text-2xl font-bold">II. Đối tác vận chuyển</h3>
                                <div class="space-y-2 mt-2">
                                    <ol class="list-decimal list-outside space-y-2 px-6">
                                        <li class="space-y-2">
                                            <p>
                                                Qua đơn vị chuyển phát: ThinkPro hỗ trợ gửi hàng qua các đơn vị
                                                chuyển phát uy tín hàng đầu như: vnpost, viettelpost, nhattin
                                                logitics… ThinkPro chịu trách nhiệm tới khi sản phẩm tới tay khách
                                                hàng (Khách hàng vui lòng kiểm tra sản phẩm khi nhận hàng).
                                            </p>
                                            <p>
                                                Trong trường hợp sản phẩm bị rơi vỡ, móp méo, trầy xước hoặc sản
                                                phẩm không đúng như thông tin ban đầu mà cửa hàng cung cấp tới Quý
                                                khách, Quý khách vui lòng không nhận hàng và thông báo lại với cửa
                                                hàng. Cửa hàng sẽ có trách nhiệm tự xử lý với bên vận chuyển để
                                                không ảnh hưởng tới quyền lợi của Khách hàng. Trường hợp sau khi
                                                đã nhận hàng mà sản phẩm có phát sinh những vấn đề trên (rơi vỡ,
                                                móp méo, trầy xước… hoặc tác động vật lý từ môi trường) cửa hàng
                                                sẽ không thể hỗ trợ Quý khách xử lý.
                                            </p>
                                        </li>
                                        <li class="space-y-2">
                                            <p>
                                                Nhà xe: ThinkPro không hỗ trợ vận chuyển qua nhà xe, trong trường
                                                hợp KH yêu cầu vận chuyển qua nhà xe thì nhà xe phải do khách hàng
                                                chỉ định và trong trường hợp phát sinh vấn đề trong quá trình vận
                                                chuyển cửa hàng không hỗ trợ xử lý.
                                            </p>
                                        </li>
                                        <li class="space-y-2">
                                            <p>
                                                Ship nội thành HN,HCM: ThinkPro hỗ trợ vận chuyển nội thành HN và
                                                TPHCM hoàn toàn miễn phí.
                                            </p>
                                        </li>
                                        <li class="space-y-2">
                                            <p>
                                                Ship ngoại thành HN, HCM: Nếu khách hàng thanh toán trước 100% sẽ
                                                được hỗ trợ miễn phí toàn bộ chi phí vận chuyển, Đối với các đơn
                                                hàng ở khu vực ngoại thành HN và TPHCM, cửa hàng hỗ trợ khách hàng
                                                giao hàng tại nhà có tính phí (5.000đ/1km).
                                            </p>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="mt-6">
                                <h3 class="text-2xl font-bold">III. Thời gian vận chuyển</h3>
                                <div class="space-y-2 mt-2">
                                    <ol class="list-decimal list-outside space-y-2 px-6">
                                        <li class="space-y-2">
                                            <p>
                                                Đối với các đơn hàng nội thành Hà Nội và TPHCM: ThinkPro hỗ trợ
                                                giao hàng trong vòng 1h với những sản phẩm đang có sẵn hàng tại
                                                cửa hàng. Đối với những sản phẩm không sẵn hàng/không sẵn tại khu
                                                vực khách hàng cần giao hàng ThinkPro sẽ có thông báo tới khách
                                                hàng về thời gian cụ thể giao hàng.
                                            </p>
                                        </li>
                                        <li class="space-y-2">
                                            <p>
                                                Đối với các đơn hàng ở các tỉnh: ThinkPro giao hàng thông qua các
                                                đơn vị vận chuyển trên toàn quốc, thời gian giao hàng thông thường
                                                từ 1-3 ngày tùy theo khu vực, trong dịp lễ/tết có thể thời gian
                                                vận chuyển có thể delay, ThinkPro sẽ thông báo cụ thể tới khách
                                                hàng sau khi gửi hàng.
                                            </p>
                                        </li>
                                        <li class="space-y-2">
                                            <p>
                                                Đối với các đơn hàng ngoại thành HN và TPHCM: Với những đơn hàng
                                                nằm ngoài khu vực nội thành , ThinkPro hỗ trợ giao hàng trong ngày
                                                nếu khách hàng đặt trước 12h00 sáng, đối với những đơn hàng đặt
                                                sau thời gian này ThinkPro sẽ chủ động liên hệ và hẹn lịch giao
                                                hàng cụ thể tới Quý khách hàng.
                                            </p>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="flex bg-gray-50 rounded-xl p-4 mt-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <p>
                                    Nếu cần hỗ trợ thêm, đừng ngần ngại
                                    <a href="tel:1900633579" class="text-blue">Liên hệ bộ phận CSKH</a>
                                    bạn nhé!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="tab-three" class="tab-box hidden">
                        <div class="px-4 py-6 min-h-screen">
                            <div class="space-y-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[60px] w-[60px] text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                <h2 class="text-h1 font-extrabold">Chính sách thanh toán</h2>
                            </div>
                            <div class="mt-6">
                                <h3 class="text-2xl font-bold">I. Thanh toán</h3>
                                <h3 class="text-2xl font-bold mt-4">
                                    Thanh toán trực tuyến trên thinkpro.vn
                                </h3>
                                <h4 class="text-xl font-bold mt-4">Thanh toán qua thẻ ATM nội địa</h4>
                                <div class="space-y-2 mt-2">
                                    <p>
                                        ThinkPro hỗ trợ mua hàng bằng thẻ ATM nội địa của 40 ngân hàng trong
                                        nước kết nối với cổng thanh toán VNPAY
                                    </p>
                                    <div><img src="/_nuxt/img/40-banks-vnpay.5260cc1.png" alt="vnpay banks support list" class="w-full"></div>
                                    <p>
                                        Hình thức thanh toán đơn giản, dễ sử dụng, trực quan và an toàn chỉ
                                        trong ba bước:
                                    </p>
                                    <ul class="list-disc px-6">
                                        <li>Nhập thông tin thẻ.</li>
                                        <li>Xác thực khách hàng.</li>
                                        <li>Thanh toán và nhận ngay kết quả.</li>
                                    </ul>
                                    <p>
                                        Ngoài ra, để thanh toán bằng thẻ ngân hàng nội địa, thẻ của bạn phải
                                        được đăng ký sử dụng tính năng thanh toán trực tuyến, hoặc ngân hàng
                                        điện tử của Ngân hàng.
                                    </p>
                                    <p>
                                        Giao dịch được ghi nhận là thành công khi bạn nhận được thông báo từ
                                        hệ thống cổng thanh toán trả về trạng thái “Giao dịch thành công” (đảm
                                        bảo số dư / hạn mức và xác thực khách hàng theo quy định sử dụng của
                                        thẻ).
                                    </p>
                                </div>
                                <h4 class="text-xl font-bold mt-4">
                                    Thanh toán qua thẻ Visa / Master / JCB / American Express / Union Pay
                                </h4>
                                <div class="space-y-2 mt-2">
                                    <p>
                                        Sau khi chọn hình thức thanh toán qua thẻ Visa / Master / JCB /
                                        American Express / Union Pay hệ thống chuyển sang giao diện thanh toán
                                        của VNPAY và hãy điền các thông tin theo hướng dẫn để hoàn tất việc
                                        đặt hàng.
                                    </p>
                                    <ul class="list-disc space-y-1 px-6">
                                        <li>
                                            ThinkPro cam kết hỗ trợ 100% phí thanh toán đối với thẻ ATM, Visa,
                                            MasterCard do Việt Nam phát hành
                                        </li>
                                        <li>Thu phí 2% đối với thẻ AMEX, JCB, Unionpay</li>
                                    </ul>
                                </div>
                                <h4 class="text-xl font-bold mt-4">Thanh toán qua VNPAY QR</h4>
                                <div class="space-y-2 mt-2">
                                    <p>
                                        Sau khi chọn hình thức thanh toán qua VNPAY QR, hệ thống chuyển sang
                                        giao diện thanh toán của VNPAY. Hãy mở App ngân hàng quét mã QR trên
                                        để hoàn tất việc đặt hàng.
                                    </p>
                                </div>
                                <h4 class="text-xl font-bold mt-4">Chuyển khoản</h4>
                                <div class="space-y-2 mt-2">
                                    <p>
                                        Chuyển khoản số tiền cần thanh toán vào một trong hai tài khoản sau
                                    </p>
                                    <ul class="list-disc space-y-2 px-6">
                                        <li><strong>Vietcombank</strong>
                                            - Ngân Hàng Ngoại Thương Việt Nam
                                            <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                <li>Chủ tài khoản: LE LAM LINH</li>
                                                <li>Số tài khoản: 0011004366653</li>
                                            </ul>
                                        </li>
                                        <li><strong>MB Bank</strong>
                                            - Ngân hàng Thương mại Cổ phần Quân đội
                                            <ul class="px-6 space-y-1" style="list-style-type: circle;">
                                                <li>Chủ tài khoản: LE LAM LINH</li>
                                                <li>Số tài khoản: 0045678456789</li>
                                            </ul>
                                        </li>
                                    </ul> <br>
                                    <p><strong>Nội dung chuyển khoản:</strong>
                                        ‘Tên khách hàng, Số điện thoại’
                                    </p>
                                    <ul class="list-disc space-y-2 px-6">
                                        <li>Ví dụ: ‘Nguyễn Văn A, 0912345678’</li>
                                    </ul> <br>
                                    <p class="font-bold">
                                        Bạn hãy chọn Dịch vụ chuyển tiền 24/7 để giao dịch được hoàn thành
                                        nhanh chóng.
                                    </p> <br>
                                    <p>Sau khi chuyển khoản thành công,</p>
                                    <ul class="list-disc space-y-2 px-6">
                                        <li>
                                            Nếu mua hàng online trên thinkpro.vn, bạn hãy ấn nút 'Đã chuyển'
                                            trong màn hình thanh toán
                                        </li>
                                        <li>
                                            Nếu mua hàng online trên thinkpro.vn, bạn hãy ấn nút 'Đã chuyển'
                                            trong màn hình thanh toán
                                        </li>
                                    </ul> <br>
                                    <p>
                                        Ngay sau khi nhận được xác nhận từ ngân hàng, ThinkPro sẽ thông báo
                                        tới bạn và tiến hành giao hàng theo thời gian đã thống nhất.
                                    </p>
                                </div>
                                <h3 class="text-2xl font-bold mt-6">
                                    Thanh toán quẹt thẻ ATM, Visa, MasterCard
                                </h3>
                                <h4 class="text-xl font-bold mt-4">Tại cửa hàng</h4>
                                <div class="space-y-2 mt-2">
                                    <p>
                                        Tất cả hệ thống cửa hàng ThinkPro đều hỗ trợ quẹt thẻ ATM, Visa,
                                        MasterCard
                                    </p>
                                    <ul class="list-disc space-y-2 px-6">
                                        <li>
                                            ThinkPro cam kết hỗ trợ 100% phí quẹt thẻ cho khách hàng đối với thẻ
                                            ATM, Visa, MasterCard do Việt Nam phát hành
                                        </li>
                                        <li>Thu phí 2% đối với thẻ AMEX, JCB, Unionpay</li>
                                    </ul>
                                </div>
                                <h4 class="text-xl font-bold mt-4">Tại nơi nhận hàng</h4>
                                <div class="space-y-2 mt-2">
                                    <p>
                                        Bạn hãy báo trước để chuyên viên bán hàng đem theo máy quẹt thẻ khi
                                        giao hàng
                                    </p>
                                </div>
                            </div>
                            <div class="mt-6">
                                <h3 class="text-h2 font-extrabold mb-2">II. Hoàn tiền</h3>
                                <div class="">
                                    <h6 class="font-black py-3">Thẻ ATM nội địa</h6>
                                    <div>
                                        <div class="bg-gray-50 flex justify-between text-body"><span class="w-1/4 px-4 py-3">Thời gian hoàn tiền</span> <span class="w-1/2 px-4 py-3">7 - 10 ngày làm việc (không tính Thứ 7, Chủ Nhật và Ngày lễ)</span></div>
                                        <div class="flex justify-between text-body"><span class="w-1/4 px-4 py-3">Hỗ trợ</span> <span class="w-1/2 px-4 py-3">Nếu qua 10 ngày không nhận được tiền, ThinkPro sẽ hỗ trợ liên hệ ngân hàng giải quyết.</span></div>
                                        <div class="bg-gray-50 flex justify-between text-body"><span class="w-1/4 px-4 py-3">Điều kiện</span> <span class="w-1/2 px-4 py-3">Đơn hàng thanh toán qua thẻ ATM nội địa</span></div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h6 class="font-black py-3">Thẻ tín dụng</h6>
                                    <div>
                                        <div class="bg-gray-50 flex justify-between text-body"><span class="w-1/4 px-4 py-3">Thời gian hoàn tiền</span> <span class="w-1/2 px-4 py-3">7 - 15 ngày làm việc (không tính Thứ 7, Chủ Nhật và Ngày lễ)</span></div>
                                        <div class="flex justify-between text-body"><span class="w-1/4 px-4 py-3">Hỗ trợ</span> <span class="w-1/2 px-4 py-3">Nếu qua 15 ngày không nhận được tiền, ThinkPro sẽ hỗ trợ liên hệ ngân hàng giải quyết.</span></div>
                                        <div class="bg-gray-50 flex justify-between text-body"><span class="w-1/4 px-4 py-3">Điều kiện</span> <span class="w-1/2 px-4 py-3">Đơn hàng thanh toán qua thẻ tín dụng/thẻ ghi nợ</span></div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h6 class="font-black py-3">VNPAY OR</h6>
                                    <div>
                                        <div class="bg-gray-50 flex justify-between text-body"><span class="w-1/4 px-4 py-3">Thời gian hoàn tiền</span> <span class="w-1/2 px-4 py-3">3 - 8 ngày làm việc (không tính Thứ 7, Chủ Nhật và Ngày lễ)</span></div>
                                        <div class="flex justify-between text-body"><span class="w-1/4 px-4 py-3">Hỗ trợ</span> <span class="w-1/2 px-4 py-3">Nếu qua 10 ngày không nhận được tiền, bạn hãy chủ động liên hệ ThinkPro để được hỗ trợ giải quyết.</span></div>
                                        <div class="bg-gray-50 flex justify-between text-body"><span class="w-1/4 px-4 py-3">Điều kiện</span> <span class="w-1/2 px-4 py-3">Đơn hàng thanh toán qua VNPAY QR</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex bg-gray-50 rounded-xl p-4 mt-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <p>
                                    Nếu cần hỗ trợ thêm, đừng ngần ngại
                                    <a href="tel:1900633579" class="text-blue">Liên hệ bộ phận CSKH</a>
                                    bạn nhé!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="tab-four" class="tab-box hidden">
                        <div class="py-6 min-h-screen">
                            <div class="space-y-4 px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-[60px] w-[60px] text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path>
                                </svg>

                                <h2 class="text-h1 font-extrabold">Bảng giá dịch vụ</h2>
                            </div>
                            <div class="px-4 mt-4">
                                <div class="flex flex-row justify-between items-center px-4 font-extrabold"><strong class="w-3/5 text-left py-3">Dịch vụ</strong> <strong class="w-2/5 text-left pl-4 py-3">Chi phí</strong></div>
                                <div class="flex flex-row justify-between items-start text-body px-4 bg-gray-50"><span class="w-3/5 text-left py-3">Vệ sinh Laptop thông thường</span> <span class="w-2/5 text-left pl-4 py-3">100,000 đ</span></div>
                                <div class="flex flex-row justify-between items-start text-body px-4"><span class="w-3/5 text-left py-3">Vệ sinh các dòng Laptop Business, Ultrabook cao cấp</span> <span class="w-2/5 text-left pl-4 py-3">150,000 đ</span></div>
                                <div class="flex flex-row justify-between items-start text-body px-4 bg-gray-50"><span class="w-3/5 text-left py-3">Vệ sinh các dòng Laptop Workstation</span> <span class="w-2/5 text-left pl-4 py-3">200,000 đ</span></div>
                                <div class="flex flex-row justify-between items-start text-body px-4"><span class="w-3/5 text-left py-3">Vệ sinh các dòng Laptop Gaming tầm trung</span> <span class="w-2/5 text-left pl-4 py-3">200,000 đ</span></div>
                                <div class="flex flex-row justify-between items-start text-body px-4 bg-gray-50"><span class="w-3/5 text-left py-3">Vệ sinh các dòng Laptop cao cấp (Razer, Alienware ...)</span> <span class="w-2/5 text-left pl-4 py-3">400,000 đ</span></div>
                                <div class="flex flex-row justify-between items-start text-body px-4"><span class="w-3/5 text-left py-3">Vệ sinh Laptop tại nhà (Chỉ hỗ trợ nội thành HN, TP.HCM)</span> <span class="w-2/5 text-left pl-4 py-3">Phí dịch vụ thông thường +100,000đ</span></div>
                                <div class="flex flex-row justify-between items-start text-body px-4 bg-gray-50"><span class="w-3/5 text-left py-3">Cài đặt Window, phần mềm cơ bản (tại Shop)</span> <span class="w-2/5 text-left pl-4 py-3">100,000 đ</span></div>
                                <div class="flex flex-row justify-between items-start text-body px-4"><span class="w-3/5 text-left py-3">Cân màn hình tại cửa hàng</span> <span class="w-2/5 text-left pl-4 py-3">100,000 đ</span></div>
                                <div class="flex flex-row justify-between items-start text-body px-4 bg-gray-50"><span class="w-3/5 text-left py-3">Cân màn hình tại nhà (Chỉ hỗ trợ nội thành HN, TP. HCM)</span> <span class="w-2/5 text-left pl-4 py-3">200,000 đ</span></div>
                            </div>
                            <div class="flex bg-gray-50 rounded-xl p-4 mt-6 mx-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <p>
                                    Nếu cần hỗ trợ thêm, đừng ngần ngại
                                    <a href="tel:1900633579" class="text-blue">Liên hệ bộ phận CSKH</a>
                                    bạn nhé!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@push('custom-scripts')
<script>
    function tab(e) {
        $('.ul-tab li').removeClass('active');
        $('.ul-tab li.tab-' + e).removeClass('hidden').addClass('active');
        $('.tab-box').removeClass('active').addClass('hidden');
        $('#tab-' + e).addClass('active').removeClass('hidden');
    }
</script>
<style type="text/css">
    .ul-tab .active {
        color: rgba(0, 101, 238, 1);
        border-bottom: 2px solid rgba(0, 101, 238, 1);
        font-weight: 700
    }
</style>
@endpush
@endsection