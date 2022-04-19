@extends('homepage.layout.home')
@section('content')
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Expand at md</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('cart.index')}}">Giỏ hàng</a>
            </li>
            <li class="nav-item dropdown">
                <?php if (Auth::guard('customer')->user()) { ?>
                    <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo Auth::guard('customer')->user()->name ?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route('customer.dashboard')}}">Quản lý tài khoản</a>
                        <a class="dropdown-item" href="{{route('customer.logout')}}">Đăng xuất</a>
                    </div>
                <?php } else { ?>

                    <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Đăng nhập</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{route('customer.login',['redirect' => 'gio-hang'])}}">Đăng nhập</a>
                        <a class="dropdown-item" href="{{route('customer.register')}}">Đăng ký</a>
                    </div>
                <?php } ?>
            </li>
        </ul>
        <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search">
        </form>
    </div>
</nav>
<div class="container ">
    <div class="">
        <div class="list-featured-category grid grid-cols-6 gap-4 grid">
            @foreach($getProductCategory as $v)
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

        @foreach($getProduct as $v)
        <?php
        $getPrice = getPrice(array('price' => $v->price, 'price_sale' => $v->price_sale, 'price_contact' => $v->price_contact));
        $version = getBlockAttr($v['version_json']); ?>
        <div class="col-md-4">
            <div class="card card-home">
                <a href="<?php echo route('productFrontend.index', ['slug' => $v->slug, 'id' => $v->id]) ?>"><img class="card-img-top" src="{{$v->image}}" alt="Card image cap"></a>
                <div class="card-body">
                    <h5 class="card-title">{{$v->title}}</h5>
                    <div class="card-price">{{$getPrice['price_final']}}</div>
                    <div class="version-product">
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
</div>
<!-- Footer -->
<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">


        <!-- Section: Form -->
        <section class="">
            <form action="">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-auto">
                        <p class="pt-2">
                            <strong>Sign up for our newsletter</strong>
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-5 col-12">
                        <!-- Email input -->
                        <div class="form-outline form-white mb-4">
                            <input type="email" id="form5Example21" class="form-control" />
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-auto">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-outline-light mb-4">
                            Subscribe
                        </button>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </form>
        </section>
        <!-- Section: Form -->

        <!-- Section: Text -->
        <section class="mb-4">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                eum harum corrupti dicta, aliquam sequi voluptate quas.
            </p>
        </section>
        <!-- Section: Text -->

        <!-- Section: Links -->
        <section class="">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Link 4</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@include('cart.common.style')
@include('cart.common.script')
@endsection