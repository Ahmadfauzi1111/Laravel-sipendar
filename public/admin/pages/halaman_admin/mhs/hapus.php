<?php 
session_start();
include '../../koneksi.php';

$id = $_GET['id'];
if($_SESSION['level'] != "1") {
  header("location:../../examples/logout.php");
  exit;
} 
// echo $id;

$sql = "SELECT * FROM tb_mhs WHERE id_mahasiswa='$id'";
$ahmad = mysqli_query($conn, $sql);

$ariel = mysqli_fetch_assoc($ahmad);

// echo $ariel['nama'];
$adi = $ariel['user'];

$sql = "DELETE FROM tb_mhs WHERE id_mahasiswa = '$id'";
mysqli_query($conn, $sql);

$sql = "DELETE FROM user_level WHERE id='$adi'"; //perintah
$ahmad = mysqli_query($conn, $sql); // jalanin perintah

 header("location:data_mahasiswa.php");
 ?>