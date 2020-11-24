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
  $bidang_keahlian = $_POST ['bidang_keahlian'];
  $gmail = $_POST ['gmail'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $alamat = $_POST['alamat'];

  echo $id;

  mysqli_query($conn,"UPDATE tb_dsn SET nama = '$nama', nip = '$nip', bidang_keahlian = '$bidang_keahlian', gmail = '$gmail' , tanggal_lahir ='$tanggal_lahir', jenis_kelamin ='$jenis_kelamin', alamat ='$alamat' WHERE id_dosen = $id");
  header("location:data_dosen.php");
 ?>