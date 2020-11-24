<?php 
session_start();
include '../../koneksi.php';
$id = $_GET['id'];
if($_SESSION['level'] != "2") {
  header("location:../../examples/logout.php");
  exit;
} 


  mysqli_query($conn, "UPDATE tb_mhs SET tahap = 2 WHERE id_mahasiswa = $id");
  header("location:konfirmasi.php");
 ?>