@extends('homepage.layout.home')
@section('content')
<div class="container">
    <div class="row">


        <h1>{{$detail->title}}</h1>
    </div>

</div>

@include('cart.common.style')
@include('cart.common.script')
@endsection