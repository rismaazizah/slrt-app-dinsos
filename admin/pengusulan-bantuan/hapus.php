<?php
include '../config/koneksi.php';
$id_pembuatan_perizinan = $_GET['id_pembuatan_perizinan'];
// make deleete query
$query = "DELETE FROM tb_pembuatan_perizinan WHERE id_pembuatan_perizinan = '$id_pembuatan_perizinan'";

$result = mysqli_query($koneksi, $query);
if ($result) {
  // make a success message with session
  $_SESSION['result'] = 'success';
  $_SESSION['message'] = 'Data berhasil dihapus';

  header("Location: pembuatan-izin.php");
} else {
  // make a success message with session
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = mysqli_error($koneksi);
  //refresh page
  header("Location: pembuatan-izin.php");
}
