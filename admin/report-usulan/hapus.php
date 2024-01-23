<?php
include '../config/koneksi.php';
$id_usulan = $_GET['id_usulan'];
// make deleete query
$query = "DELETE FROM tb_usulan WHERE id_usulan = '$id_usulan'";

$result = mysqli_query($koneksi, $query);
if ($result) {
  // make a success message with session
  $_SESSION['result'] = 'success';
  $_SESSION['message'] = 'Data berhasil dihapus';

  header("Location: usulan.php");
} else {
  // make a success message with session
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = mysqli_error($koneksi);
  //refresh page
  header("Location: usulan.php");
}
