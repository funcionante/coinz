<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    @include('app._head_scripts')

</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>COINZ</b></a>
        <p>@yield('title')</p>
</div>

    <div class="register-box-body">


        @include('errors._list')
        <br>
        @yield('content')

    </div><!-- /.form-box -->
    <br>
    <span>
    <a href="{{ action('PagesController@index') }}" class="btn btn-default" title="Página inicial"><span class="glyphicon glyphicon-home"></span></a>
    @yield('bottom')
    </span>
</div><!-- /.register-box -->

<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>