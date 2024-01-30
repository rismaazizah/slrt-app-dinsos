<?php
include '../config/koneksi.php';
$id_kunjungan = $_GET['id_kunjungan'];

$query = "DELETE FROM tb_kunjungan WHERE id_kunjungan = '$id_kunjungan'";

$result = mysqli_query($koneksi, $query);

if ($result) {
  // make a success message with session
  $_SESSION['result'] = 'success';
  $_SESSION['message'] = 'Data berhasil dihapus';

  header("Location: kunjungan.php");
} else {
  // make a success message with session
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = mysqli_error($koneksi);
  //refresh page
  header("Location: kunjungan.php");
}
