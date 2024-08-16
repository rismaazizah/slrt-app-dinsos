<?php
include '../modules/header.php';
include '../config/is_kadis.php';
?>

<title>Usulan</title>

<?php
// check page from url
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'tampil';
}
switch ($page) {
  case 'tampil':
    include 'report-usulan/tampil.php';
    break;
  case 'tambah':
    include 'report-usulan/tambah.php';
    break;
  case 'export':
    include 'report-usulan/export.php';
    break;
  case 'edit':
    include 'report-usulan/edit.php';
    break;
  case 'proses':
    include 'report-usulan/proses.php';
    break;
  case 'hapus':
    include 'report-usulan/hapus.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>