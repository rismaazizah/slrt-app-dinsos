<?php
include '../config/koneksi.php';
$id_surat = $_GET['id_surat'];
// make deleete query
$query = "DELETE FROM tb_surat_keluar WHERE id_surat = '$id_surat'";

$result = mysqli_query($koneksi, $query);
if ($result) {
  // make a success message with session
  $_SESSION['result'] = 'success';
  $_SESSION['message'] = 'Data berhasil dihapus';

  header("Location: surat-keluar.php");
} else {
  // make a success message with session
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = mysqli_error($koneksi);
  //refresh page
  header("Location: surat-keluar.php");
}
