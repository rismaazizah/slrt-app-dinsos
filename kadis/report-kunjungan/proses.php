<?php
include '../config/koneksi.php';

$keterangan = $_POST['keterangan'];
$status = $_POST['status'];

if (isset($_POST['tambah'])) { 

  $query = "INSERT INTO `tb_kunjungan` (`id_kunjungan`, `nama_kunjungan`, `lokasi`, `tanggal`, `status`) VALUES (NULL, '$nama_kunjungan', '$lokasi', '$tanggal', '$status' );";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil ditambahkan';

    header("Location: kunjungan.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: kunjungan.php?page=tambah");
  }
}

// make if block for update
if (isset($_POST['update'])) {
  $id_kunjungan = $_POST['id_kunjungan'];

  $query = "UPDATE tb_kunjungan SET keterangan = '$keterangan', status = '$status' WHERE id_kunjungan = '$id_kunjungan'";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil diperbarui';

    header("Location: kunjungan.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: kunjungan.php?page=edit&id_kunjungan=$id_kunjungan");
  }
}
