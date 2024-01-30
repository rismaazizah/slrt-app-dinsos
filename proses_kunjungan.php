<?php
include 'config/koneksi.php';

$masyarakat_id = $_POST['masyarakat_id'];
$pegawai_id = $_POST['pegawai_id'];
$keperluan = $_POST['keperluan'];
$tanggal = $_POST['tanggal'];

if (isset($_POST['tambah'])) {

  // make query to insert data
  $query = "INSERT INTO `tb_kunjungan` (`masyarakat_id`, `keperluan`, `tanggal`, `status`, `pegawai_id`) VALUES ( '$masyarakat_id', '$keperluan', '$tanggal', 'Pending', '$pegawai_id');";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    session_start();
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Berhasil menambahkan jadwal kunjungan';

    header("Location: kunjungan.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: kunjungan.php");
  }
}
