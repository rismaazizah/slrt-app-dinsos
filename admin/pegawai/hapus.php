<?php
include '../config/koneksi.php';
$id_pegawai = $_GET['id_pegawai'];
// make deleete query
$query = "DELETE FROM tb_pegawai WHERE id_pegawai = '$id_pegawai'";

$result = mysqli_query($koneksi, $query);
if ($result) {
  // make a success message with session
  $_SESSION['result'] = 'success';
  $_SESSION['message'] = 'Data berhasil dihapus';

  header("Location: pegawai.php");
} else {
  // make a success message with session
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = mysqli_error($koneksi);
  //refresh page
  header("Location: pegawai.php");
}
