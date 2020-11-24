<?php 
session_start();
include '../../koneksi.php';
$ahfa = $_SESSION['iduser'];
        $sql = mysqli_query($conn,"SELECT * FROM tb_kms WHERE id_komisi = '$ahfa'");
        $row = mysqli_fetch_assoc($sql);
if($_SESSION['level'] != "2") {
  header("location:../../examples/logout.php");
  exit;
}
if (isset($_GET['idruang'])) {
  $idruang = $_GET['idruang'];
} else {
  $idruang = 1;
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
  <!-- fullCalendar -->
  <link rel="stylesheet" href="../../../bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="../../../bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" type="text/css" href="cssJadwal.css" />
  <style type="text/css">
    table.seminar > tbody td {
    padding: 30px 5px 5px 5px;
    vertical-align: baseline;
    height: 100%;
    border: 1px solid #cce6f7;
    position: relative;
    user-select: none;
    cursor: default;
    width: 300px;
}
  </style>
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
              </li>
              <!-- Menu Footer-->
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
          <a href="../konfirmasi_pendadaran/konfirmasi.php">
            <i class="fa fa-clipboard"></i> <span>Konfirmasi Pendadaran</span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
         <li>
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Jadwal Pendadaran</span>
          </a>
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
        <li><a href="../index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
        <li class="active">Jadwal Pendadaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div class="content withmenu tableinside">
        <table class="seminar">
            <thead>
            <tr class="tabletitle">
                <td colspan="9">
                    Jadwal Seminar
                </td>
            </tr>
            <tr class="withtablefilter">
                <td colspan="11">
                    <form method="GET" action="" accept-charset="UTF-8">
                    <table class="tablefilter">
                        <tbody><tr>
                            <td><a href="buat_jadwal.php" class="btn btn bg-blue margin margin-bottom" style="margin-right: 20px;"><i class="fa fa-user-plus"></i> Tambah Jadwal</a></td>
                            <td class="filter">
                                <div class="field small">
                                    <label for="idruang" class="ion-flag"></label>
                                    <div class="styled-select">
                                        <select name="idruang" class="form-control"> 
                                          <option disabled>
                                            Pilih Ruangan
                                          </option>
                                          <?php 
                                          $query = "SELECT * FROM tb_ruangan";
                                          $sql = mysqli_query($conn,$query);
                                          while($row = mysqli_fetch_array($sql)){ 
                                           ?>
                                           <option <?php if (isset($_GET['idruang'])) {
                                             if ($_GET['idruang']== $row['id']) {
                                              print 'selected';
                                             }

                                           } ?> value="<?php echo $row['id'] ?>">
                                             <?php 
                                             echo $row['nama'];
                                              ?>
                                           </option>
                                           <?php 
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </td>
                            <td class="filter-btn">
                                <input class="btn btn-default small" type="submit" value="cari" style="background-color: blue; color: white;">
                            </td>
                        </tr>
                    </tbody></table>
                    </form>
                </td>
            </tr>
            <tr>
                <td class="center">Tanggal</td>
                <td class="center">SHIFT 1<span>(JAM 7-8)</span></td>
                <td class="center">SHIFT 2<span>(JAM 8-9)</span></td>
                <td class="center">SHIFT 3<span>(JAM 9-10)</span></td>
                <td class="center">SHIFT 4<span>(JAM 10-11)</span></td>
                <td class="center">SHIFT 5<span>(JAM 11-12)</span></td>
                <td class="center">SHIFT 6<span>(JAM 12-13)</span></td>
                <td class="center">SHIFT 7<span>(JAM 13-14)</span></td>
                <td class="center">SHIFT 8<span>(JAM 14-15)</span></td>
            </tr>
            </thead>
            <tbody> 
              <?php 
              for ($i=0; $i < 14 ; $i++) { 
               ?>
              <tr> 
                  <td class="center caption">
                  <?php
                    echo date('D',strtotime("+".$i." day"));
                   ?>
                  <span class="big">
                    <?php
                    echo date('d',strtotime("+".$i." day"));
                   ?>
                  </span>
                  <?php
                    echo date('M Y',strtotime("+".$i." day"));
                   ?>
                  </td>
                        <td class="center">
                          <?php
                            $query = "select * from tb_jadwal join tb_mhs on tb_jadwal.id_mahasiswa = tb_mhs.id_mahasiswa  HAVING tanggal='".date("Y-m-d",strtotime("+".$i." day"))."' and shift='shift1' and id_ruang = $idruang";
                            $sql = mysqli_query($conn,$query);
                            $row = mysqli_fetch_array($sql);
                            if(isset($row)){
                              echo $row['nama'];
                              ?>
                              <span style="font-size: 15px;">
                               <?php 
                               echo $row['nim'];
                               ?>
                              </span>  <?php 
                            }
                          ?>
                          <?php if(isset($row['nim'])){
                            echo '<a href=""><i class="glyphicon glypicon-edit"></i></a>';
                          } ?>
                          <?php if($row['nim']){
                            ?><a href="hapus.php?id=<?php echo $row['id_jadwal']?>"><i class="fa fa-trash"></i></a>
                            <?php
                          } ?>
                        </td>
                        <td class="center">
                          <?php
                            $query = "select * from tb_jadwal join tb_mhs on tb_jadwal.id_mahasiswa = tb_mhs.id_mahasiswa  HAVING tanggal='".date("Y-m-d",strtotime("+".$i." day"))."' and shift='shift2' and id_ruang = $idruang";
                            $sql = mysqli_query($conn,$query);
                            $row = mysqli_fetch_array($sql);
                            if(isset($row)){
                              echo $row['nama'];
                              ?>
                              <span style="font-size: 15px;">
                               <?php 
                               echo $row['nim'];
                               ?>
                              </span>  <?php 
                            }
                          ?>
                          <?php if($row['nim']){
                            ?><a href="hapus.php?id=<?php echo $row['id_jadwal']?>"><i class="fa fa-trash"></i></a>
                            <?php
                          } ?>
                        </td>
                        <td class="center">
                          <?php
                            $query = "select * from tb_jadwal join tb_mhs on tb_jadwal.id_mahasiswa = tb_mhs.id_mahasiswa  HAVING tanggal='".date("Y-m-d",strtotime("+".$i." day"))."' and shift='shift3' and id_ruang = $idruang";
                            $sql = mysqli_query($conn,$query);
                            $row = mysqli_fetch_array($sql);
                            if(isset($row)){
                              echo $row['nama'];
                              ?>
                              <span style="font-size: 15px;">
                               <?php 
                               echo $row['nim'];
                               ?>
                              </span>  <?php 
                            }
                          ?>
                          <?php if($row['nim']){
                            ?><a href="hapus.php?id=<?php echo $row['id_jadwal']?>"><i class="fa fa-trash"></i></a>
                            <?php
                          } ?>
                        </td>
                        <td class="center">
                          <?php
                            $query = "select * from tb_jadwal join tb_mhs on tb_jadwal.id_mahasiswa = tb_mhs.id_mahasiswa  HAVING tanggal='".date("Y-m-d",strtotime("+".$i." day"))."' and shift='shift4' and id_ruang = $idruang";
                            $sql = mysqli_query($conn,$query);
                            $row = mysqli_fetch_array($sql);
                            if(isset($row)){
                              echo $row['nama'];
                              ?>
                              <span style="font-size: 15px;">
                               <?php 
                               echo $row['nim'];
                               ?>
                              </span>  <?php 
                            }
                          ?>
                          <?php if($row['nim']){
                            ?><a href="hapus.php?id=<?php echo $row['id_jadwal']?>"><i class="fa fa-trash"></i></a>
                            <?php
                          } ?>
                        </td>
                        <td class="center">
                          <?php
                            $query = "select * from tb_jadwal join tb_mhs on tb_jadwal.id_mahasiswa = tb_mhs.id_mahasiswa  HAVING tanggal='".date("Y-m-d",strtotime("+".$i." day"))."' and shift='shift5' and id_ruang = $idruang";
                            $sql = mysqli_query($conn,$query);
                            $row = mysqli_fetch_array($sql);
                            if(isset($row)){
                              echo $row['nama'];
                              ?>
                              <span style="font-size: 15px;">
                               <?php 
                               echo $row['nim'];
                               ?>
                              </span>  <?php 
                            }
                          ?>
                          <?php if($row['nim']){
                            ?><a href="hapus.php?id=<?php echo $row['id_jadwal']?>"><i class="fa fa-trash"></i></a>
                            <?php
                          } ?>
                        </td>
                        <td class="center">
                          <?php
                            $query = "select * from tb_jadwal join tb_mhs on tb_jadwal.id_mahasiswa = tb_mhs.id_mahasiswa  HAVING tanggal='".date("Y-m-d",strtotime("+".$i." day"))."' and shift='shift6' and id_ruang = $idruang";
                            $sql = mysqli_query($conn,$query);
                            $row = mysqli_fetch_array($sql);
                            if(isset($row)){
                              echo $row['nama'];
                              ?>
                              <span style="font-size: 15px;">
                               <?php 
                               echo $row['nim'];
                               ?>
                              </span>  <?php 
                            }
                          ?>
                          <?php if($row['nim']){
                            ?><a href="hapus.php?id=<?php echo $row['id_jadwal']?>"><i class="fa fa-trash"></i></a>
                            <?php
                          } ?>
                        </td>
                        <td class="center">
                          <?php
                            $query = "select * from tb_jadwal join tb_mhs on tb_jadwal.id_mahasiswa = tb_mhs.id_mahasiswa  HAVING tanggal='".date("Y-m-d",strtotime("+".$i." day"))."' and shift='shift7' and id_ruang = $idruang";
                            $sql = mysqli_query($conn,$query);
                            $row = mysqli_fetch_array($sql);
                            if(isset($row)){
                              echo $row['nama'];
                              ?>
                              <span style="font-size: 15px;">
                               <?php 
                               echo $row['nim'];
                               ?>
                              </span>  <?php 
                            }
                          ?>
                          <?php if($row['nim']){
                            ?><a href="hapus.php?id=<?php echo $row['id_jadwal']?>"><i class="fa fa-trash"></i></a>
                            <?php
                          } ?>
                        </td>
                        <td class="center">
                          <?php
                            $query = "select * from tb_jadwal join tb_mhs on tb_jadwal.id_mahasiswa = tb_mhs.id_mahasiswa  HAVING tanggal='".date("Y-m-d",strtotime("+".$i." day"))."' and shift='shift8' and id_ruang = $idruang";
                            $sql = mysqli_query($conn,$query);
                            $row = mysqli_fetch_array($sql);
                            if(isset($row)){
                              echo $row['nama'];
                              ?>
                              <span style="font-size: 15px;">
                               <?php 
                               echo $row['nim'];
                               ?>
                              </span>  <?php 
                            }
                          ?>
                          <?php if($row['nim']){
                            ?><a href="hapus.php?id=<?php echo $row['id_jadwal']?>"><i class="fa fa-trash"></i></a>
                            <?php
                          } ?>
                        </td>
                    </tr>
                <tr> 
                <?php 
                }
                 ?>                                           
            </tbody>
        </table>
    </div>
      

    </section>
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
<script src="../../..//bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../dist/js/demo.js"></script>
<!-- fullCalendar -->
<script src="../../../bower_components/moment/moment.js"></script>
<script src="../../../bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>
