<?php
session_start();
include '../../koneksi.php';
$id = $_SESSION['iduser'];
$sql = mysqli_query($conn,"SELECT * FROM tb_mhs WHERE id_mahasiswa = '$id'");
$row = mysqli_fetch_assoc($sql);
$clear = $row['nama'];
if($_SESSION['level'] != "4") {
header("location:../../examples/logout.php");
exit;
}
function shift($shift)
{
switch ($shift) {
case 'shift1':
return "Shift 1 Jam (7-8)";
break;
case 'shift2':
return "Shift 2 Jam (8-9)";
break;
case 'shift3':
return "Shift 3 Jam (9-10)";
break;
case 'shift4':
return "Shift 4 Jam (10-11)";
break;
case 'shift5':
return "Shift 5 Jam (11-12)";
break;
case 'shift6':
return "Shift 6 Jam (12-13)";
break;
case 'shift7':
return "Shift 7 Jam (13-14)";
break;
case 'shift8':
return "Shift 8 Jam (14-15)";
break;
default:
return "No Shift";
break;
}
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
                      <small> Mahasiswa </small>
                    </p>
                  </li>
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
            <a href="#"><i class="fa fa-circle text-success"></i>Mahasiswa</a>
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="../pendaftaran_pendadaran/pendaftaran.php">
              <i class="fa fa-clipboard"></i> <span>Pendaftaran Pendadaran</span>
              <!--  <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span> -->
            </a>
          </li>
          <li>
            <a href="#">
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
        Jadwal Pendadaran
        </h1>
        <ol class="breadcrumb">
          <li class="active">Jadwal Pendadaran</li>
        </ol>
      </section>
      <!-- Main content -->
      <?php
        $sql = mysqli_query($conn,"SELECT *, tb_mhs.tahap, tb_mhs.nama AS nama_mhs, tb_mhs.nim AS nim_mhs FROM tb_jadwal JOIN tb_mhs ON tb_jadwal.id_mahasiswa = tb_mhs.id_mahasiswa JOIN tb_ruangan ON tb_jadwal.id_ruang = tb_ruangan.id WHERE tb_mhs.id_mahasiswa = $id");
        $row = mysqli_fetch_array($sql);
        ?>
      <?php 
      if ($row['tahap']== 4): ?>
        <section class="content">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <div class="box-title">
                  <h2 class="page-header">
                  <i class="fa fa-user"></i>
                    <?php echo $row['nama_mhs']; ?>
                  </h2>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th> Nama </th>
                        <td><?php echo $row['nama_mhs'] ?></td>
                      </tr>
                      <tr>
                        <th> Nim </th>
                        <td><?php echo $row['nim_mhs'] ?></td>
                      </tr>
                      <tr>
                        <th> Angkatan </th>
                        <td><?php echo $row['angkatan'] ?></td>
                      </tr>
                      <tr>
                        <th> Jadwal </th>
                        <td><?php echo $row['nama'].", ".shift($row['shift']).", ".$row['tanggal']; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
            </div>
            
          </div>
          <!-- /.col -->
        </div>
        
        <!-- Table row -->
      </div>
    </section>
    <?php else: ?>
      <section class="content">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="box box-success">
                <div class="box-header with-border text-center">
                  <span class="label label-primary box-title"> <i class="glyphicon glyphicon-lock"></i> Hai <?php echo $clear; ?>
                  </span>
                </div>
                <div class="box-body text-center">
                  <h1>Jadwal Pendadaran anda belum tersedia</h1>
                  <p>Silahkan tunggu jadwal anda selagi komisi memproses pengajuan pendadaran anda.</p>
                <!-- /.box-body -->
              </div>
          </div>
        </div>
      </section>
      <?php endif ?>
      
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