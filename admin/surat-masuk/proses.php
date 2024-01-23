<?php
include '../config/koneksi.php';

$asal_surat = $_POST['asal_surat'];
$no_surat = $_POST['no_surat'];
$tanggal_surat = $_POST['tanggal_surat'];
$tanggal_surat_diterima = $_POST['tanggal_surat_diterima'];
$id_divisi = $_POST['id_divisi'];
$disposisi = $_POST['disposisi'];

if (isset($_POST['tambah'])) {
  $query = "INSERT INTO `tb_surat_masuk` (`id_agenda`, `asal_surat`, `no_surat`, `tanggal_surat`, `tanggal_surat_diterima`, `id_divisi`, `disposisi`) VALUES (NULL, '$asal_surat', '$no_surat', '$tanggal_surat', '$tanggal_surat_diterima', '$id_divisi', '$disposisi');";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil ditambahkan';

    header("Location: surat-masuk.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: surat-masuk.php?page=tambah");
  }
}

// make if block for update
if (isset($_POST['update'])) {
  $id_agenda = $_POST['id_agenda'];

  $query = "UPDATE tb_surat_masuk SET asal_surat = '$asal_surat', id_divisi = '$id_divisi', no_surat = '$no_surat', tanggal_surat = '$tanggal_surat', tanggal_surat_diterima = '$tanggal_surat_diterima', disposisi = '$disposisi' WHERE id_agenda = '$id_agenda'";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil diperbarui';

    header("Location: surat-masuk.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: surat-masuk.php?page=edit");
  }
}
