<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="icon" type="image/png" href="/admin/dist/img/logounsoed.png">
    <title>Sipendar | Login</title>
    <link rel="stylesheet" href="/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/admin/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/admin/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/admin/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini"
    style="background: url(/admin/dist/img/bg_login.png)no-repeat; background-size:cover; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; -ms-background-size:cover; min-height:100%;">
    <header class="main-header">
        <!-- Logo -->
        <a class="logo">
            <!-- logo for regular state and mobile devices -->
            <img src="/admin/dist/img/logounsoed.png" style="width: 30px; margin-right: 5%;"><b>SIPENDAR</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
        </nav>
    </header>
    <div class="col-md-4" style="float:none;margin:auto; margin-top:100px;">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <img src="/admin/dist/img/logounsoed.png" style="width: 75px; margin-left: 40%;"><br>
                <h4 style="margin-top: 3%;" align="center"><b>FAKULTAS TEKNIK<br>UNIVERSITAS JENDERAL SOEDIMAN</b></h4>
                @if (session('errors'))
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
                @endif
                @if (session('custom-error'))
                <div class="alert alert-danger">
                        {{ session('custom-error') }}
                </div>
                @endif
                {{-- <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    {{ session('error') }} Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire
                    soul, like these sweet mornings of spring which I enjoy with my whole heart.
                  </div> --}}
                @if (session('statuslogout'))
                <div class="alert alert-danger">
                    {{ session('statuslogout') }}
                </div>
                @endif
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="login-box-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group has-feedback">
                        <label for="username"> </label>
                        <input id="username" type="text" class="form-control" name="username" placeholder="Username">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password"> </label>
                        <input id="password" type="password" class="form-control" name="password"
                            placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="box-footer" style="text-align: center;">
                            <button type="submit" name="simpan" class="btn btn-primary fa fa-arrow-circle-right"> Sign
                                In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
        </div>
        <!-- /.box -->

        <!-- jQuery 3 -->
        <script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Morris.js charts -->
        <script src="/admin/bower_components/raphael/raphael.min.js"></script>
        <script src="/admin/bower_components/morris.js/morris.min.js"></script>
        <!-- Sparkline -->
        <script src="/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="/admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="/admin/bower_components/moment/min/moment.min.js"></script>
        <script src="/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <!-- Slimscroll -->
        <script src="/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="/admin/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="/admin/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="/admin/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="/admin/dist/js/demo.js"></script>
</body>

</html>