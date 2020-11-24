<?php 
session_start();
include '../../koneksi.php';

$id = $_GET['id'];
// if($_SESSION['level'] != "1") {
//   header("location:../../examples/logout.php");
//   exit;
// } 
// echo $id;

$sql = "SELECT * FROM tb_ruangan WHERE id='$id'";
$ahmad = mysqli_query($conn, $sql);

$ariel = mysqli_fetch_assoc($ahmad);

// echo $ariel['nama'];
$adi = $ariel['id'];

$sql = "DELETE FROM tb_ruangan WHERE id = '$adi'";
mysqli_query( $conn, $sql);

 header("location:data_ruangan.php");?>

 ?>