<?php
include '../config/koneksi.php';
$id_user = $_GET['id_user'];

// make deleete query
$query = "DELETE FROM tb_user WHERE id_user = '$id_user'";

$result = mysqli_query($koneksi, $query);
if ($result) {
  // make a success message with session
  $_SESSION['result'] = 'success';
  $_SESSION['message'] = 'Data berhasil dihapus';

  header("Location: pengguna.php");
} else {
  // make a success message with session
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = mysqli_error($koneksi);
  //refresh page
  header("Location: pengguna.php");
}
