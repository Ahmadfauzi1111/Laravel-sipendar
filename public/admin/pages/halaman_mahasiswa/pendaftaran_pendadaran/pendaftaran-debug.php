<?php 
include '../../koneksi.php';

session_start();

$user = $_SESSION['iduser'];
        $sql = mysqli_query($conn,"SELECT * FROM tb_mhs WHERE id_mahasiswa = '$user'");
        $row = mysqli_fetch_assoc($sql);
if($_SESSION['level'] != "4") {
  header("location:../../examples/logout.php");
  exit;
} 
if(isset($_POST['save'])){
  $dp = $_POST['dp'];
  $skripsi1 = $_POST['skripsi1'];
  $skripsi2 = $_POST['skripsi2'];

  // File Pertama
  $nama = $_FILES['file1']['name'];
  $x = explode('.', $nama);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['file1']['tmp_name'];  
     
  move_uploaded_file($file_tmp, './uploads/'.$nama);

  // File Kedua
  $nama2 = $_FILES['file2']['name'];
  $x2 = explode('.', $nama2);
  $ekstensi2 = strtolower(end($x2));
  $file_tmp2 = $_FILES['file2']['tmp_name'];  
     
  move_uploaded_file($file_tmp2, './uploads/'.$nama2);

  // File Ketiga
  $nama3 = $_FILES['file3']['name'];
  $x3 = explode('.', $nama3);
  $ekstensi3 = strtolower(end($x3));
  $file_tmp3 = $_FILES['file3']['tmp_name'];  
     
  move_uploaded_file($file_tmp3, './uploads/'.$nama3);

  // File Keempat
  $nama4 = $_FILES['file4']['name'];
  $x4 = explode('.', $nama4);
  $ekstensi4 = strtolower(end($x4));
  $file_tmp4 = $_FILES['file4']['tmp_name'];  
     
  move_uploaded_file($file_tmp4, './uploads/'.$nama4);

  $nama5 = $_FILES['file5']['name'];
  $x5 = explode('.', $nama5);
  $ekstensi5 = strtolower(end($x5));
  $file_tmp5 = $_FILES['file5']['tmp_name'];  
     
  move_uploaded_file($file_tmp5, './uploads/'.$nama5);


  $query = mysqli_query($conn, "UPDATE tb_mhs SET dosen_pembimbing ='$dp', skripsi1 = '$skripsi1', skripsi2 = '$skripsi2', file1 = '$nama', file2 = '$nama2' , file3 = '$nama3', file4 = '$nama4', file5 = '$nama5', tahap = 1 WHERE id_mahasiswa = $user");
  if($query){
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
       <link rel="stylesheet" href="../../../bower_components/select2/dist/css/select2.min.css">
       <style type="text/css">
         .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px;
    margin-left: 15px;
    color: black; 
    font-size: 0.8em;

}
       </style>
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
                 <small> Mahasiswa </small>
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
          <a href="#"><i class="fa fa-circle text-success"></i>Mahasiswa</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="#">
            <i class="fa fa-clipboard"></i> <span>Pendaftaran Pendadaran</span>
           <!--  <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
        </li>
        <li>
          <a href="../penjadwalan/penjadwalan_pendadaran.php">
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
        Pendaftaran Pendadaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pendaftaran Pendadaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 col-md-offset-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border" style="text-align: center; padding: 0px;">
              <div class="box-title">
                <h3 class="color-palette" style="font-size: 25px;">Data Persyaratan Pendadaran </h3>
              </div>
            </div>
            <?php 
              $sql = "SELECT * FROM tb_mhs WHERE id_mahasiswa = $user";
              $query = mysqli_query($conn, $sql);
              $hasil = mysqli_fetch_assoc($query);

              if ($hasil['tahap'] == 0 || $hasil['tahap'] == 2) : ?>                
                <!-- nested if 1 start-->
                <?php if ($hasil['tahap'] == 2) { ?>

                  <div class="alert alert-info alert-dismissible">
                    <h4 style="text-align: center;">Status Pendadaran : Tidak Layak</h4>
                    <h5 style="text-align: center;">Data Pendadaran yang anda inputkan tidak memenuhi persyaratan silahkan perbaiki dan input kembali data anda.</h5>
                  </div>
                <?php } ?>
                <!-- nested if 1 ends -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                    <div class="col-md-11 col-md-offset-2"> 
                      <div class="form-group" style="margin-bottom: 2px;">
                      <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;">
                       <div class="pull-left image">
                      <img style="max-width: 70px;" src="../../../dist/img/Capture1.png" class="img-circle" alt="User Image">
                       </div>
                     <div class="pull-left info">
                      <label for="dp" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 1px;"> Dosen Pembimbing </label>
                      <br>
                      <select name="dp" class="form-control select2" data-placeholder="Pilih Dosen Pembimbing" required>
                                <option>
                          <?php 
                              $query = "SELECT * FROM tb_dsn ORDER BY nama";
                              $sql = mysqli_query($conn,$query);
                              while($row = mysqli_fetch_array($sql)){ 
                               ?>
                             <option value="<?php echo $row['id_dosen'] ?>">
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
                     </div>
                     <div class="form-group" style="margin-bottom: 2px;">
                      <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;">
                       <div class="pull-left image">
                      <img style="max-width: 70px;" src="../../../dist/img/Capture1.png" class="img-circle" alt="User Image">
                       </div>
                     <div class="pull-left info">
                      <label for="skripsi1" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 1px;"> Dosen Pembimbing Skripsi 1 </label>
                     <br>
                      <select name="skripsi1" class="form-control select2" data-placeholder="Pilih Dosen Pembimbing Skripsi 1" required>
                                <option>
                          <?php 
                              $query = "SELECT * FROM tb_dsn ORDER BY nama";
                              $sql = mysqli_query($conn,$query);
                              while($row = mysqli_fetch_array($sql)){ 
                               ?>
                             <option value="<?php echo $row['id_dosen'] ?>">
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
                     </div>
                     <div class="form-group" style="margin-bottom: 2px;">
                      <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;">
                       <div class="pull-left image">
                      <img style="max-width: 70px;" src="../../../dist/img/Capture1.png" class="img-circle" alt="User Image">
                       </div>
                     <div class="pull-left info">
                      <label for="skripsi2" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 1px;"> Dosen Pembimbing Skripsi 2 </label>
                      <br>
                      <select name="skripsi2" class="form-control select2" data-placeholder="Pilih Dosen Pembimbing Skripsi 2" required>
                                <option>
                          <?php 
                              $query = "SELECT * FROM tb_dsn ORDER BY nama";
                              $sql = mysqli_query($conn,$query);
                              while($row = mysqli_fetch_array($sql)){ 
                               ?>
                             <option value="<?php echo $row['id_dosen'] ?>">
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
                     </div>
                    <div class="form-group" style="margin-bottom: 2px;">
                      <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;">
                       <div class="pull-left image">
                      <img style="max-width: 70px;" src="../../../dist/img/Capture.png" class="img-circle" alt="User Image">
                       </div>
                     <div class="pull-left info">
                      <label for="file1" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 1px;"> Transkip Nilai </label>
                      <input name="file1" accept=".pdf" type="file" id="file" style="color: black; font-size: 0.8em; margin-left: 15px;" required >
                     </div>
                     </div>
                     </div>
                     <div class="form-group" style="margin-bottom:2px;">
                      <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;">
                      <div class="pull-left image">
                        <img style="max-width: 70px;" src="../../../dist/img/Capture.png" class="img-circle" alt="User Image">
                      </div>
                     <div class="pull-left info" style="color: black;">
                      <label for="file2" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 0px;"> Sertifikat Toefl </label>
                        <input name="file2" accept=".pdf" type="file" id="file" style="color: black; font-size: 0.8em; margin-left: 15px;" required >
                     </div>
                     </div>
                     </div>
                     <div class="form-group" style="margin-bottom:2px;">
                      <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;">
                       <div class="pull-left image">
                      <img style="max-width: 70px;" src="../../../dist/img/Capture.png" class="img-circle" alt="User Image">
                       </div>
                     <div class="pull-left info" style="color: black;">
                      <label for="file3" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 0px;"> Lembar Ringkasan </label>
                       <input name="file3" accept=".pdf" type="file" id="file" style="color: black; font-size: 0.8em; margin-left: 15px;" required >
                     </div>
                     </div>
                     </div>
                     <div class="form-group">
                      <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;" >
                       <div class="pull-left image">
                      <img style="max-width: 70px;" src="../../../dist/img/Capture.png" class="img-circle" alt="User Image">
                       </div>
                     <div class="pull-left info" style="color: black;">
                      <label for="file4" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 0px;"> Draf Skripsi </label>
                        <input name="file4" accept=".pdf" type="file" id="file" style="color: black; font-size: 0.8em; margin-left: 15px;" required >
                     </div>
                     </div>
                     </div>
                     <div class="form-group">
                      <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;" >
                       <div class="pull-left image">
                      <img style="max-width: 70px;" src="../../../dist/img/Capture.png" class="img-circle" alt="User Image">
                       </div>
                     <div class="pull-left info" style="color: black;">
                      <label for="file5" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 0px;"> Data Alumni </label>
                        <input name="file5" accept=".pdf" type="file" id="file" style="color: black; font-size: 0.8em; margin-left: 15px;" required >
                     </div>
                     </div>
                     </div>
                    </div>
                      
                    <!-- /.box-body -->
                    <div class="box-footer" style="text-align: center;">
                      <button type="submit" name="save" class="btn btn-primary">Upload</button>
                    </div>
                </form> 

              <?php endif; ?>
              <?php if($hasil['tahap'] == 3) : ?>
              <div class="alert alert-info alert-dismissible">
                <h4 style="text-align: center;">Status Pendadaran : Layak</h4>
                <h5 style="text-align: center;">Selamat anda dinyatakan layak menjalani pendadaran. Silahkan Tunggu Jadwal Pendadaran anda.</h5>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="col-md-11 col-md-offset-2"> 
                    <div class="form-group" style="margin-bottom: 2px;">
                      <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;">
                        <div class="pull-left image">
                          <img style="max-width: 70px;" src="../../../dist/img/Capture.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                          <label for="file" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 1px;"> Dosen Pembimbing </label><br>
                          <span style="color : black; margin-left: 15px;"> <?= $hasil['dosen_pembimbing']; ?> </span>
                          
                        </div>
                      </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 2px;">
                      <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;">
                        <div class="pull-left image">
                          <img style="max-width: 70px;" src="../../../dist/img/Capture.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                          <label for="file" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 1px;"> Transkip Nilai </label><br>
                          <a class="btn btn-default" target="_blank" href="uploads/<?php echo $hasil['file1']?>" style="color:black; margin-left: 15px;">Download</a>
                        </div>
                      </div>
                    </div>
                    <div class="form-group" style="margin-bottom:2px;">
                    <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;">
                    <div class="pull-left image">
                      <img style="max-width: 70px;" src="../../../dist/img/Capture.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info" style="color: black;">
                  <label for="file" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 0px;"> Sertifikat Toefl </label><br>
                   <a class="btn btn-default" target="_blank" href="uploads/<?php echo $hasil['file2']?>" style="color:black; margin-left: 15px;">Download</a>
                 </div>
                 </div>
                 </div>
                 <div class="form-group" style="margin-bottom:2px;">
                  <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;">
                   <div class="pull-left image">
                  <img style="max-width: 70px;" src="../../../dist/img/Capture.png" class="img-circle" alt="User Image">
                   </div>
                 <div class="pull-left info" style="color: black;">
                  <label for="file" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 0px;"> Lembar Ringkasan </label><br>
                   <a class="btn btn-default" target="_blank" href="uploads/<?php echo $hasil['file3']?>" style="color:black; margin-left: 15px;">Download</a>
                 </div>
                 </div>
                 </div>
                 <div class="form-group">
                  <div class="user-panel" style="padding: 0 0 010px; display: block; height: 75px;" >
                   <div class="pull-left image">
                  <img style="max-width: 70px;" src="../../../dist/img/Capture.png" class="img-circle" alt="User Image">
                   </div>
                 <div class="pull-left info" style="color: black;">
                  <label for="file" style="margin-left: 15px; color:#0081d8; font-size: 1.3em; margin-bottom: 0px;"> Draf Skripsi </label><br>
                    <a class="btn btn-default" target="_blank" href="uploads/<?php echo $hasil['file1']?>" style="color:black; margin-left: 15px;">Download</a>
                 </div>
                 </div>
                 </div>
                </div>
                  
                
                <div class="box-footer" style="text-align: center;">
                  <button type="submit" name="save" class="btn btn-primary">Upload</button>
                </div>
              </form> 
            <?php endif; ?>
            <?php 
             if ($hasil['tahap']== 1) : ?>
             <div class="alert alert-info alert-dismissible">
                <h4 style="text-align: center;">Status Pendadaran : Belum Dikonfirmasi</h4>
                <h5 style="text-align: center;">Silahkan Tunggu Konfirmasi dari Komisi.</h5>
              </div>
             <?php endif; ?>

           
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
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
<script src="../../../bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

      
    
    })
</script>
</body>
</html>
