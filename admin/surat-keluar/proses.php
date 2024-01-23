<?php
include '../config/koneksi.php';

$no_surat = $_POST['no_surat'];
$tanggal = $_POST['tanggal'];
$perihal = $_POST['perihal'];
$tujuan = $_POST['tujuan'];

if (isset($_POST['tambah'])) {
  $query = "INSERT INTO `tb_surat_keluar` (`id_surat`, `no_surat`, `tanggal`, `perihal`, `tujuan` ) VALUES (NULL, '$no_surat', '$tanggal', '$perihal', '$tujuan');";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil ditambahkan';

    header("Location: surat-keluar.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: surat-keluar.php?page=tambah");
  }
}

// make if block for update
if (isset($_POST['update'])) {
  $id_surat = $_POST['id_surat'];

  $query = "UPDATE tb_surat_keluar SET no_surat = '$no_surat', tanggal = '$tanggal', perihal = '$perihal', tujuan = '$tujuan' WHERE id_surat = '$id_surat'";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil diperbarui';

    header("Location: surat-keluar.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: surat-keluar.php?page=edit");
  }
}
