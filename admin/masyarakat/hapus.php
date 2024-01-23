<?php
include '../config/koneksi.php';
$id_masyarakat = $_GET['id_masyarakat'];
// make deleete query

$query = "DELETE FROM tb_masyarakat WHERE id_masyarakat = '$id_masyarakat'";

$result = mysqli_query($koneksi, $query);
if ($result) {
  // make a success message with session
  $_SESSION['result'] = 'success';
  $_SESSION['message'] = 'Data berhasil dihapus';

  header("Location: masyarakat.php");
} else {
  // make a success message with session
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = 'Data gagal dihapus';
  //refresh page
  header("Location: masyarakat.php?page=tambah");
}
