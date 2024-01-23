<?php
include '../config/koneksi.php';

$role = $_POST['role'];
$pesan = $_POST['pesan'];
// make if block for update
if (isset($_POST['update'])) {
  $id_konsultasi = $_POST['id_konsultasi'];
  // make query to insert data
  $query = "INSERT INTO `tb_histori_konsultasi` (`konsultasi_id`, `pesan`, `role`) VALUES ( '$id_konsultasi', '$pesan', '$role');";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Berhasil mengirim pesan';

    header("Location: konsultasi.php?page=edit&id_konsultasi=$id_konsultasi");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: konsultasi.php?page=edit&id_konsultasi=$id_konsultasi");
  }
}
