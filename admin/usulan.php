<?php
include '../modules/header.php';
include '../config/is_admin.php';
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
    include 'usulan/tampil.php';
    break;
  case 'tambah':
    include 'usulan/tambah.php';
    break;
  case 'export':
    include 'usulan/export.php';
    break;
  case 'edit':
    include 'usulan/edit.php';
    break;
  case 'proses':
    include 'usulan/proses.php';
    break;
  case 'hapus':
    include 'usulan/hapus.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>