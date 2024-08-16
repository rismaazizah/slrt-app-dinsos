<?php
include '../modules/header.php';
include '../config/is_kadis.php';
?>

<title>Konsultasi</title>

<?php
// check page from url
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'tampil';
}
switch ($page) {
  case 'tampil':
    include 'report-konsultasi/tampil.php';
    break;
  case 'tambah':
    include 'report-konsultasi/tambah.php';
    break;
  case 'export':
    include 'report-konsultasi/export.php';
    break;
  case 'edit':
    include 'report-konsultasi/edit.php';
    break;
  case 'proses':
    include 'report-konsultasi/proses.php';
    break;
  case 'hapus':
    include 'report-konsultasi/hapus.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>