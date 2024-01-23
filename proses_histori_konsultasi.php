<?php
include 'config/koneksi.php';

$role = $_POST['role'];
$id_konsultasi = $_POST['id_konsultasi'];
$pesan = $_POST['pesan'];

if (isset($_POST['tambah'])) {

  // make query to insert data
  $query = "INSERT INTO `tb_histori_konsultasi` (`konsultasi_id`, `pesan`, `role`) VALUES ( '$id_konsultasi', '$pesan', '$role');";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    session_start();
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Berhasil mengirim pesan';

    header("Location: histori_konsultasi.php?id_konsultasi=$id_konsultasi");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: histori_konsultasi.php?id_konsultasi=$id_konsultasi");
  }
}
