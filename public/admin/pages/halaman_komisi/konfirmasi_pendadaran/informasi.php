<?php
session_start();
include '../../koneksi.php';
$id = $_GET['id'];
$ahfa = $_SESSION['iduser'];
        $sql = mysqli_query($conn,"SELECT * FROM tb_kms WHERE id_komisi = '$ahfa'");
        $row = mysqli_fetch_assoc($sql);
if($_SESSION['level'] != "2") {
  header("location:../../examples/logout.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" type="/img" href="../../../dist/img/logounsoed.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fakultas Biologi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Fakultas</b> Biologi</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../../dist/img/logounsoed.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $row['nama']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../../dist/img/logounsoed.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $row['nama']; ?>
                 <small> Komisi </small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="../profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../../examples/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../../dist/img/logounsoed.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $row['nama']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i>Komisi</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="../index.php">
            <i class="glyphicon glyphicon-home"></i> <span>Beranda</span>
           <!--  <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li>
          <a href="konfirmasi.php">
            <i class="fa fa-clipboard"></i> <span>Konfirmasi Pendadaran</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
         <li>
          <a href="../jadwal_pendadaran/jadwal_pendadaran.php">
            <i class="fa fa-calendar"></i> <span>Jadwal Pendadaran</span>
           <!--  <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li class="header">KEAMANAN</li>
        <li><a href="../ubah_password.php?id=<?php echo $_SESSION['id'] ?>"><i class="glyphicon glyphicon-cog text-blue"></i> <span>Ubah Password</span></a></li>
        <li><a href="../../examples/logout.php"><i class="glyphicon glyphicon-certificate text-red"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengajuan
      </h1>
      <ol class="breadcrumb">
        <li><a href="../index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
        <li><a href="konfirmasi.php">Konfirmasi</a></li>
        <li class="active">Informasi Pengajuan</li>
      </ol>
    </section>

    <!-- Main content -->
      <section class="invoice">
       <?php
        $sql = mysqli_query($conn,"SELECT * FROM tb_mhs WHERE id_mahasiswa = '$id'");
        while($row = mysqli_fetch_array($sql)){
       ?>
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-user"></i>
            <?php echo $row['nama']; ?>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
      </div>
      
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th> Nama </th>
                <td><?php echo $row['nama'] ?></td>
                <td></td>
              </tr>
              <tr>
                <th> Nim </th>
                <td><?php echo $row['nim'] ?></td>
                <td></td>
              </tr>
              <tr>
                <th> Angkatan </th>
                <td><?php echo $row['angkatan'] ?></td>
                <td></td>
              </tr>
              <?php 
              $a = "SELECT *, tb_dsn.nama AS nama_dosen FROM tb_mhs JOIN tb_dsn ON tb_mhs.dosen_pembimbing = tb_dsn.id_dosen WHERE tb_mhs.id_mahasiswa = $id ";
              $b = mysqli_query($conn, $a);
              $c = mysqli_fetch_assoc($b);
              ?>
              <tr>
                <th> Dosen Pembimbing </th>
                <td><?php echo $c['nama_dosen'] ?></td>
                <td></td>
              </tr>
              <?php 
              $skripsi1 = $c['skripsi1'];
              $a = "SELECT *, tb_dsn.nama AS nama_dosen FROM tb_mhs JOIN tb_dsn ON tb_mhs.skripsi1 = tb_dsn.id_dosen WHERE tb_dsn.id_dosen = $skripsi1 ";
              $b = mysqli_query($conn, $a);
              $c = mysqli_fetch_assoc($b);
              ?>
              <tr>
                <th> Dosen Pembimbing Skripsi 1 </th>
                <td><?php echo $c['nama_dosen'] ?></td>
                <td></td>
              </tr>
              <?php 
              $skripsi2 = $c['skripsi2'];
              $a = "SELECT *, tb_dsn.nama AS nama_dosen FROM tb_mhs JOIN tb_dsn ON tb_mhs.skripsi2 = tb_dsn.id_dosen WHERE tb_dsn.id_dosen = $skripsi2 ";
              $b = mysqli_query($conn, $a);
              $c = mysqli_fetch_assoc($b);
              ?>
               <tr>
                <th> Dosen Pembimbing Skripsi 2 </th>
                <td><?php echo $c['nama_dosen'] ?></td>
                <td></td>
              </tr>
              <tr>
                <th> Transkip Nilai </th>
                <td><?php echo $row['file1']?></a></td>
                <td><a target="_blank" href="../../halaman_mahasiswa/pendaftaran_pendadaran/uploads/<?php echo $row['file1']?>" class="btn-xs btn-primary" style="margin-right: 10px;">Download</a></td>
              </tr>
              <tr>
                <th> Sertifikat Toefl </th>
                <td><?php echo $row['file2'] ?></td>
                <td><a target="_blank" href="../../halaman_mahasiswa/pendaftaran_pendadaran/uploads/<?php echo $row['file2']?>" class="btn-xs btn-primary" style="margin-right: 10px;">Download</a></td>
              </tr>
              <tr>
                <th> Lembar Ringkasan </th>
                <td><?php echo $row['file3'] ?></td>
                <td><a target="_blank" href="../../halaman_mahasiswa/pendaftaran_pendadaran/uploads/<?php echo $row['file3']?>" class="btn-xs btn-primary" style="margin-right: 10px;">Download</a></td>
              </tr>
              <tr>
                <th> Draf Skripsi </th>
                <td><?php echo $row['file4'] ?></td>
                <td><a target="_blank" href="../../halaman_mahasiswa/pendaftaran_pendadaran/uploads/<?php echo $row['file4']?>" class="btn-xs btn-primary" style="margin-right: 10px;">Download</a></td>
              </tr>
             <tr>
              <th> Data Alumni </th>
              <td><?php echo $row['file5'] ?></td>
              <td><a target="_blank" href="../../halaman_mahasiswa/pendaftaran_pendadaran/uploads/<?php echo $row['file5']?>" class="btn-xs btn-primary" style="margin-right: 10px;">Download</a></td>
            </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <div class="row no-print">
        <?php 
        if ($row['tahap'] != 3 ) {
         ?>
        
        <div class="col-xs-12 text-center">
          <a href="terima.php?id=<?php echo $id?>" class="btn btn-default" style="margin-right: 10px;">Terima</a>
          <a href="tidak.php?id=<?php echo $id ?>" class="btn btn-danger">Tidak</a>
        </div>
        <?php 
        } else {?> 
          <div class="col-xs-12 text-center">
          <a href="konfirmasi.php" class="btn btn-default" style="margin-right: 10px; text-align: center;">Kembali Ke Konfirmasi</a>
          </div>
          <?php 

        }
        ?>
      </div>
      <!-- /.row -->
      <!-- this row will not appear when printing -->
      <?php
        }
       ?>
    </section>
    <div class="clearfix"></div>
  </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 Fakultas Biologi Universitas Jenderal Soedirman <a href="#"></a>.</strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>