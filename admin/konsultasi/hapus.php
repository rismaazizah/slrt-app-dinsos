<?php
include '../config/koneksi.php';
$id_konsultasi = $_GET['id_konsultasi'];
// make deleete query
$query = "DELETE FROM tb_konsultasi WHERE id_konsultasi = '$id_konsultasi'";

$result = mysqli_query($koneksi, $query);
if ($result) {
  // make a success message with session
  $_SESSION['result'] = 'success';
  $_SESSION['message'] = 'Data berhasil dihapus';

  header("Location: konsultasi.php");
} else {
  // make a success message with session
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = mysqli_error($koneksi);
  //refresh page
  header("Location: konsultasi.php");
}
