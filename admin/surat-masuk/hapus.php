<?php
include '../config/koneksi.php';
$id_agenda = $_GET['id_agenda'];
// make deleete query
$query = "DELETE FROM tb_surat_masuk WHERE id_agenda = '$id_agenda'";

$result = mysqli_query($koneksi, $query);
if ($result) {
  // make a success message with session
  $_SESSION['result'] = 'success';
  $_SESSION['message'] = 'Data berhasil dihapus';

  header("Location: surat-masuk.php");
} else {
  // make a success message with session
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = mysqli_error($koneksi);
  //refresh page
  header("Location: surat-masuk.php");
}
