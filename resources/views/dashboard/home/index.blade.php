@extends('dashboard.layout.dashboard')
@section('title')
<title>Quản trị website</title>
@endsection
@section('css-dashboard')
<!-- Morris chart -->
<link href="{{ asset('backend/css/morris/morris.css') }}" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="{{ asset('backend/css/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
<!-- fullCalendar -->
<link href="{{ asset('backend/css/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="{{ asset('backend/css/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />

<!-- bootstrap wysihtml5 - text editor -->
<link href="{{ asset('backend/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        150
                    </h3>
                    <p>
                        New Orders
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        53<sup style="font-size: 20px">%</sup>
                    </h3>
                    <p>
                        Bounce Rate
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        44
                    </h3>
                    <p>
                        User Registrations
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        65
                    </h3>
                    <p>
                        Unique Visitors
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->

    <!-- top row -->
    <div class="row">
        <div class="col-xs-12 connectedSortable">

        </div><!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
        <!-- Left col -->

    </div><!-- /.row (main row) -->

</section><!-- /.content -->
@endsection
@section('script-dashboard')
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- <script src="{{ asset('backend/js/plugins/morris/morris.min.js') }}" type="text/javascript"></script> -->
<!-- Sparkline -->
<script src="{{ asset('backend/js/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<!-- jvectormap -->
<script src="{{ asset('backend/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
<!-- fullCalendar -->
<script src="{{ asset('backend/js/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/js/plugins/jqueryKnob/jquery.knob.js') }}" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/js/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/js/AdminLTE/dashboard.js') }}" type="text/javascript"></script>
<!-- iCheck -->
<script src="{{ asset('backend/js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
@endsection