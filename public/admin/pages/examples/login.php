<?php
include '../koneksi.php';
session_start();

if (isset($_POST['simpan'])) {
  $username = $_POST['user'];
  $password = $_POST['pass'];

  $login = mysqli_query($conn,"SELECT * FROM user_level WHERE username='$username' AND password='$password'");
  $cek = mysqli_num_rows($login);

  if($cek >0){

    $row = mysqli_fetch_assoc($login);
    $id_user = $row['id'];

    if ($row['level'] == "4") {
    $mhs = "SELECT * FROM tb_mhs WHERE user = $id_user";
    $hasilmhs = mysqli_query($conn, $mhs);

    $baris = mysqli_fetch_assoc($hasilmhs);

    $_SESSION['username'] = $user;
    $_SESSION['iduser'] = $baris['id_mahasiswa'];
    $_SESSION['level'] = "4";
    $_SESSION['id'] = $baris['user'];


    header("location:../halaman_mahasiswa/pendaftaran_pendadaran/pendaftaran.php");
  }
  else if ($row['level'] == "3") {
    $dsn = "SELECT * FROM tb_dsn WHERE user = $id_user";
    $hasildsn = mysqli_query($conn, $dsn);

    $baris = mysqli_fetch_assoc($hasildsn);

    $_SESSION['username'] = $user;
    $_SESSION['iduser'] = $baris['id_dosen'];
    $_SESSION['level'] = "3";
    $_SESSION['id'] = $baris['user'];

    header("location:../halaman_dosen/penjadwalan/penjadwalan_pendadaran.php");    
  }
  else if ($row['level'] == "2") {
    $kms = "SELECT * FROM tb_kms WHERE user = $id_user";
    $hasilkms = mysqli_query($conn, $kms);

    $baris = mysqli_fetch_assoc($hasilkms);

    $_SESSION['username'] = $user;
    $_SESSION['iduser'] = $baris['id_komisi'];
    $_SESSION['level'] = "2";
    $_SESSION['id'] = $baris['user'];

    header("location:../halaman_komisi/index.php"); 
  }
  else if ($row['level'] == "1") {
    $adm = "SELECT * FROM tb_adm WHERE user = $id_user";
    $hasiladm = mysqli_query($conn, $adm);

    $baris = mysqli_fetch_assoc($hasiladm);

    $_SESSION['username'] = $user;
    $_SESSION['iduser'] = $baris['id_admin'];
    $_SESSION['level'] = "1";
    $_SESSION['id'] = $baris['user'];

    header("location:../halaman_admin/adm/data_admin.php"); 
  }
  else{
    header("location:login.php?pesan=gagallogin");
  }
  }
else{
    header("location:login.php?pesan=gagallogin");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" type="image/png" href="../../dist/img/logounsoed.png">
  <title>Sipendar | Login</title>
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" style="background: url(../../dist/img/bg_login.png)no-repeat; background-size:cover; -webkit-background-size:cover; -moz-background-size:cover; -o-background-size:cover; -ms-background-size:cover; min-height:100%;">
  <header class="main-header">
    <!-- Logo -->
    <a class="logo">
      <!-- logo for regular state and mobile devices -->
      <img src="../../dist/img/logounsoed.png" style="width: 30px; margin-right: 5%;"><b>SIPENDAR</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    </nav>
  </header>
<div class="col-md-4" style="margin-left: 35%; margin-top:7%;">
  <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <img src="../../dist/img/logounsoed.png" style="width: 75px; margin-left: 40%;"><br>
          <h4 style="margin-top: 3%;" align="center"><b>FAKULTAS BIOLOGI<br>UNIVERSITAS JENDERAL SOEDIMAN</b></h4>
        </div>
            <!-- /.box-header -->
            <!-- form start -->
        <div class="login-box-body">
    <?php if (isset($_GET['pesan']) ) { ?>
    <p class="login-box-msg <?php if ($_GET['pesan'] == "gagallogin") {
      echo "text-red";
    } ?>">Kombinasi Username dan Password Anda Salah</p>
  <?php } ?>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="user" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="box-footer" style="text-align: center;">
            <button type="submit" name="simpan" class="btn btn-primary fa fa-arrow-circle-right">Sign In</button>
          </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
      </div>
          <!-- /.box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../bower_components/raphael/raphael.min.js"></script>
<script src="../../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
