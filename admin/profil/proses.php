<?php
include_once '../config/koneksi.php';

$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = md5($_POST['password']);

if ($_POST['password'] != null) {
  $qry = "UPDATE tb_user SET username = '$username', password = '$password' WHERE id_user = '$id_user' ";
} else {
  $qry = "UPDATE tb_user SET username = '$username' WHERE id_user = '$id_user' ";
}

$result = mysqli_query($koneksi, $qry);

if ($result) {
  // make a success message with session
  $_SESSION['result'] = 'success';
  $_SESSION['message'] = 'Data berhasil diperbarui';

  header("Location: profil.php");
} else {
  // make a success message with session
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = mysqli_error($koneksi);
  //refresh page
  header("Location: profil.php");
}
