@extends('dashboard.layout.dashboard')

@section('title')
<title>403</title>
@endsection
@section('content')
<section class="content-header">
        <h1>
            403 Error Page
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">403 error</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="error-page">
            <h2 class="headline text-info"> 403</h2>
            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
                <p>
                    Bạn không có quyền truy cập vào chức năng này, quay lại <a href="{{route('admin.dashboard')}}">trang chủ</a>.
                </p>
               
            </div><!-- /.error-content -->
        </div><!-- /.error-page -->

    </section><!-- /.content -->
@endsection