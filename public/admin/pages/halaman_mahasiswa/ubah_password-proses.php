<?php
  session_start();
  include '../koneksi.php';

  $id = $_POST['id'];
  $passwordlama = $_POST['passwordlama'];
  $passwordbaru = $_POST['passwordbaru'];
  $passwordbaru2 = $_POST['passwordbaru2'];

  echo $id;

  $pengguna = mysqli_query($conn, "SELECT * FROM user_level WHERE id = $id AND password = '$passwordlama'");
  $cekpassword = mysqli_num_rows($pengguna);

  if ($cekpassword == 0) {
    header("location:ubah_password.php?pesan=passwordlamasalah&id=$id");
  } elseif ($passwordbaru != $passwordbaru2) {
    header("location:ubah_password.php?pesan=passwordtidaksama&id=$id");
  } else {
    mysqli_query($conn,"UPDATE user_level SET password = '$passwordbaru' WHERE id = $id");
    header("location:index.php");
  }
 ?>
