<?php
include '../modules/header.php';
include '../config/is_kadis.php';
?>

<title>Masyarakat</title>

<?php
// check page from url
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'tampil';
}
switch ($page) {
  case 'tampil':
    include 'report-masyarakat/tampil.php';
    break;
  case 'tambah':
    include 'report-masyarakat/tambah.php';
    break;
  case 'export':
    include 'report-masyarakat/export.php';
    break;
  case 'edit':
    include 'report-masyarakat/edit.php';
    break;
  case 'detail':
    include 'report-masyarakat/detail.php';
    break;
  case 'proses':
    include 'report-masyarakat/proses.php';
    break;
  case 'import':
    include 'report-masyarakat/import.php';
    break;
  case 'hapus':
    include 'report-masyarakat/hapus.php';
    break;
  case 'pengajuan':
    include 'report-masyarakat/pengajuan.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>