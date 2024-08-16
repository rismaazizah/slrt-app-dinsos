<?php
include '../modules/header.php';
include '../config/is_kadis.php';
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
    include 'report-kunjungan/tampil.php';
    break;
  case 'tambah':
    include 'report-kunjungan/tambah.php';
    break;
  case 'export':
    include 'report-kunjungan/export.php';
    break;
  case 'edit':
    include 'report-kunjungan/edit.php';
    break;
  case 'detail':
    include 'report-kunjungan/detail.php';
    break;
  case 'proses':
    include 'report-kunjungan/proses.php';
    break;
  case 'hapus':
    include 'report-kunjungan/hapus.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>