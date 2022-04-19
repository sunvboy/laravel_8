<!DOCTYPE html>
<html class="bg-black">

<head>
    <meta charset="UTF-8">
    <title>Admin | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ asset('backend/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('backend/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="bg-black">

    <div class="form-box" id="login-box">
        <div class="header" style="text-transform: uppercase;">Quên mật khẩu</div>
        <form action="{{route('admin.reset-password')}}" method="post">
            @csrf
            <div class="body bg-gray">
                @if(session('success'))
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>Success!</b> {{session('success')}}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>Error!</b> {{session('error')}}
                </div>
                @endif
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" />
                </div>
            </div>
            <div class="footer">
                <button type="submit" class="btn bg-olive btn-block">Gửi</button>
            </div>
        </form>

    </div>


    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backend/js/bootstrap.min.js') }}" type="text/javascript"></script>

</body>

</html>