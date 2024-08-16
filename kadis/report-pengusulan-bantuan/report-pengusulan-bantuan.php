<?php
include '../modules/header.php';
include '../config/is_kadis.php';
?>

<title>Pengusulan Bantuan</title>

<?php
// check page from url
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'tampil';
}
switch ($page) {
  case 'tampil':
    include 'report-pengusulan-bantuan/tampil.php';
    break;
  case 'tambah':
    include 'report-pengusulan-bantuan/tambah.php';
    break;
  case 'export':
    include 'report-pengusulan-bantuan/export.php';
    break;
  case 'edit':
    include 'report-pengusulan-bantuan/edit.php';
    break;
  case 'detail':
    include 'report-pengusulan-bantuan/detail.php';
    break;
  case 'proses':
    include 'report-pengusulan-bantuan/proses.php';
    break;
  case 'hapus':
    include 'report-pengusulan-bantuan/hapus.php';
    break;
  case 'export':
    include 'report-pengusulan-bantuan/export.php';
    break;
  case 'exportSingle':
    include 'report-pengusulan-bantuan/exportSingle.php';
    break;
  case 'exportSuren':
    include 'report-pengusulan-bantuan/exportSuren.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>