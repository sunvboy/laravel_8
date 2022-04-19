<div class="row">
    @foreach($data as $v)

    <div class="col-md-4">
        <div class="card card-home">
            <a href="<?php echo route('articleFrontend.index', ['slug' => $v->slug, 'id' => $v->id]) ?>"><img class="card-img-top" src="{{$v->image}}" alt="Card image cap"></a>
            <div class="card-body">
                <h5 class="card-title">{{$v->title}}</h5>
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