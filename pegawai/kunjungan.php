<?php
include '../modules/header.php';
include '../config/is_pegawai.php';
?>

<title>Kunjungan</title>

<?php
// check page from url
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'tampil';
}
switch ($page) {
  case 'tampil':
    include 'kunjungan/tampil.php';
    break;
  case 'tambah':
    include 'kunjungan/tambah.php';
    break;
  case 'export':
    include 'kunjungan/export.php';
    break;
  case 'edit':
    include 'kunjungan/edit.php';
    break;
  case 'detail':
    include 'kunjungan/detail.php';
    break;
  case 'proses':
    include 'kunjungan/proses.php';
    break;
  case 'hapus':
    include 'kunjungan/hapus.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>