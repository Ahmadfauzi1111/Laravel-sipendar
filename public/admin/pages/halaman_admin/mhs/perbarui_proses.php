<?php
  session_start();
  if($_SESSION['level'] != "1") {
  header("location:../../examples/logout.php");
  exit;
} 
  include '../../koneksi.php';

  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];
  $angkatan = $_POST['angkatan'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $alamat = $_POST['alamat'];

  echo $id;

  mysqli_query($conn,"UPDATE tb_mhs SET nama = '$nama', nim = '$nim' , angkatan = '$angkatan' , tanggal_lahir= '$tanggal_lahir' , jenis_kelamin = '$jenis_kelamin' , alamat = '$alamat' WHERE id_mahasiswa = $id");
  header("location:data_mahasiswa.php");
 ?>
