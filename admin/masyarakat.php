<?php
include '../modules/header.php';
include '../config/is_admin.php';
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
    include 'masyarakat/tampil.php';
    break;
  case 'tambah':
    include 'masyarakat/tambah.php';
    break;
  case 'export':
    include 'masyarakat/export.php';
    break;
  case 'edit':
    include 'masyarakat/edit.php';
    break;
  case 'detail':
    include 'masyarakat/detail.php';
    break;
  case 'proses':
    include 'masyarakat/proses.php';
    break;
  case 'import':
    include 'masyarakat/import.php';
    break;
  case 'hapus':
    include 'masyarakat/hapus.php';
    break;
  case 'pengajuan':
    include 'masyarakat/pengajuan.php';
    break;

  default:
    # code...
    break;
}
?>

  <?php
  include '../modules/footer.php';
  ?>