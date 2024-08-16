<?php
include '../modules/header.php';
include '../config/is_kadis.php';
?>

<title>Pengguna</title>

<?php
// check page from url
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'tampil';
}
switch ($page) {
  case 'tampil':
    include 'report-pengguna/tampil.php';
    break;
  case 'tambah':
    include 'report-pengguna/tambah.php';
    break;
  case 'export':
    include 'report-pengguna/export.php';
    break;
  case 'edit':
    include 'report-pengguna/edit.php';
    break;
  case 'proses':
    include 'report-pengguna/proses.php';
    break;
  case 'hapus':
    include 'report-pengguna/hapus.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>