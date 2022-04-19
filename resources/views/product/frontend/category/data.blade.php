<div class="row">
    @foreach($data as $v)
    <?php
    $getPrice = getPrice(array('price' => $v->price, 'price_sale' => $v->price_sale, 'price_contact' => $v->price_contact));
    $version = getBlockAttr($v['version_json']); ?>
    <div class="col-md-4">
        <div class="card card-home">
            <a href="<?php echo route('productFrontend.index', ['slug' => $v->slug, 'id' => $v->id]) ?>"><img class="card-img-top" src="{{$v->image}}" alt="Card image cap"></a>
            <div class="card-body">
                <h5 class="card-title">{{$v->title}}</h5>
                <div class="card-price">{{$getPrice['price_final']}}</div>
                <div class="version-product ">
                    @if(isset($version['version']))
                    @foreach($version['version'] as $ver)
                    <label>{{$ver->title}}</label>
                    <ul class="list-version">
                        @foreach($ver->child as $kchi=>$chi)
                        <li class="swatch-option" data-id="{{$chi->id}}">{{$chi->title}}</li>
                        @endforeach
                    </ul>
                    @endforeach
                    @endif
                </div>
                <div class="uk-flex uk-flex-middle uk-flex-space-between">
                    <div class="quantity" style="color:red;">
                        <button class="btn-card card-dec">
                            <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon ">
                                <polygon points="4.5 4.5 3.5 4.5 0 4.5 0 5.5 3.5 5.5 4.5 5.5 10 5.5 10 4.5"></polygon>
                            </svg>
                        </button>
                        <input class="fc-cart-update card-quantity" type="text" value="1" name="">
                        <button class="btn-card card-inc">
                            <svg enable-background="new 0 0 10 10" viewBox="0 0 10 10" x="0" y="0" class="shopee-svg-icon icon-plus-sign">
                                <polygon points="10 4.5 5.5 4.5 5.5 0 4.5 0 4.5 4.5 0 4.5 0 5.5 4.5 5.5 4.5 10 5.5 10 5.5 5.5 10 5.5"></polygon>
                            </svg>
                        </button>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-primary addtocart" data-id="<?php echo $v->id ?>" data-id-version="" data-title-version="" data-quantity="1" data-count-version="<?php echo isset($version['version']) ? count($version['version']) : 0 ?>" data-price="{{$getPrice['price_final_none_format']}}">Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="">
    <div class="col-xs-12">
        <div class="dataTables_paginate paging_bootstrap pull-right">
            {{$data->links()}}
        </div>
    </div>
</div>