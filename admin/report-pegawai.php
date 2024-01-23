<?php
include '../modules/header.php';
include '../config/is_admin.php';
?>

<title>Pegawai</title>

<?php
// check page from url
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'tampil';
}
switch ($page) {
  case 'tampil':
    include 'report-pegawai/tampil.php';
    break;
  case 'tambah':
    include 'report-pegawai/tambah.php';
    break;
  case 'export':
    include 'report-pegawai/export.php';
    break;
  case 'edit':
    include 'report-pegawai/edit.php';
    break;
  case 'detail':
    include 'report-pegawai/detail.php';
    break;
  case 'proses':
    include 'report-pegawai/proses.php';
    break;
  case 'hapus':
    include 'report-pegawai/hapus.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>