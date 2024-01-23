<?php
include '../modules/header.php';
include '../config/is_admin.php';
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
    include 'konsultasi/tampil.php';
    break;
  case 'tambah':
    include 'konsultasi/tambah.php';
    break;
  case 'export':
    include 'konsultasi/export.php';
    break;
  case 'edit':
    include 'konsultasi/edit.php';
    break;
  case 'proses':
    include 'konsultasi/proses.php';
    break;
  case 'hapus':
    include 'konsultasi/hapus.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>