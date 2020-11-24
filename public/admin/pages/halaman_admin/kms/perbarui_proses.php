<?php
  session_start();
  if($_SESSION['level'] != "1") {
  header("location:../../examples/logout.php");
  exit;
} 
  include '../../koneksi.php';

  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $nip = $_POST['nip'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $alamat = $_POST['alamat'];

  echo $id;

  mysqli_query($conn,"UPDATE tb_kms SET nama = '$nama', nip = '$nip' , tanggal_lahir= '$tanggal_lahir' , jenis_kelamin = '$jenis_kelamin' , alamat = '$alamat' WHERE id_komisi = $id");
  header("location:data_komisi.php");
 ?>
