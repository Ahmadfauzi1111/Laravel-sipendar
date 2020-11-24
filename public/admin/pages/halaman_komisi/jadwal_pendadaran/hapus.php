<?php 
session_start();

include '../../koneksi.php';

$id = $_GET['id'];
if($_SESSION['level'] != "2") {
  header("location:../../examples/logout.php");
  exit;
} 



// echo $id;

$sql = "SELECT * FROM tb_jadwal WHERE id_jadwal='$id'";
$ahmad = mysqli_query($conn, $sql);

$ariel = mysqli_fetch_assoc($ahmad);

// echo $ariel['nama'];
$adi = $ariel['id_jadwal'];

$sql = "DELETE FROM tb_jadwal WHERE id_jadwal = '$adi'";
mysqli_query( $conn, $sql);


 header("location:jadwal_pendadaran.php");?>