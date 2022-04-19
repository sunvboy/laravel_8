<main class="category-product">
    <div class="container">

        <div class="row">
            <div class="col-md-12 category-view-bottom">
                <div class="list-featured-category">

                    @foreach($childCategory as $v)
                    <div class="list-featured-category__item">
                        <a href="{{route('productCategoryFrontend.index', ['slug' => $v->slug, 'id' => $v->id])}}" class="item">
                            <div class="img">
                                <img class="ls-is-cached" src="{{$v->icon}}" alt="{{$v->title}}">
                            </div>
                            <div class="name">
                                <span>{{$v->title}}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-12 category-view-top">
                <h1 class="page-title">
                    <span class="base">{{$detail->title}}</span>
                </h1>
                <div class="block filter">
                    <div class="block-title">
                        <div class="filter-title" style="margin-right: 10px;"><i class="ion-ios-list-outline"></i>Bộ lọc</div>
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo !empty(request()->get('sort')) ? config('product')['sort'][request()->get('sort')] : 'Sắp xếp'; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach(config('product')['sort'] as $k=>$v)
                                <a class="dropdown-item filter-sort" data-sort="{{$k}}" href="?sort={{$k}}">{{$v}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="filter-close" style="display: none;">
                            Đóng
                        </div>
                    </div>
                    <!--list filter product !-->
                    @include('product.frontend.category.filter')

                </div>
            </div>
            <div class="col-md-12" id="getListProduct">
                <!--list data product !-->
                @include('product.frontend.category.data')
            </div>

            <div class="col-md-12">
                @if(!empty($detail->description))
                <div class="category-excerpt hide">
                    <?php echo $detail->description; ?>
                </div>
                <a href="javascript:void(0)" class="description-show-more hide show-more"><span><i class="ion-plus-circled"></i>&nbsp;&nbsp;Xem thêm</span></a>
                <a href="javascript:void(0)" class="description-show-more hide hide-more" style="display: none;"><span><i class="ion-ios-minus"></i>&nbsp;&nbsp;Rút gọn</span></a>
                @endif
            </div>
        </div>
    </div>
</main>