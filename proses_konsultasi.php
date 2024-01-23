<?php
include 'config/koneksi.php';

$masyarakat_id = $_POST['masyarakat_id'];
$perihal = $_POST['perihal'];

$harini = date('Y-m-d');

if (isset($_POST['tambah'])) {

  // make query to insert data
  $query = "INSERT INTO `tb_konsultasi` (`masyarakat_id`, `perihal`) VALUES ( '$masyarakat_id', '$perihal');";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    session_start();
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Berhasil konsultasi! Harap Tunggu Balasan Dari Kami';

    header("Location: konsultasi.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: konsultasi.php");
  }
}
