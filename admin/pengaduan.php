<?php
include '../modules/header.php';
include '../config/is_admin.php';
?>

<title>Pengaduan</title>

<?php
// check page from url
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'tampil';
}
switch ($page) {
  case 'tampil':
    include 'pengaduan/tampil.php';
    break;
  case 'tambah':
    include 'pengaduan/tambah.php';
    break;
  case 'export':
    include 'pengaduan/export.php';
    break;
  case 'edit':
    include 'pengaduan/edit.php';
    break;
  case 'proses':
    include 'pengaduan/proses.php';
    break;
  case 'import':
    include 'pengaduan/import.php';
    break;
  case 'hapus':
    include 'pengaduan/hapus.php';
    break;

  default:
    # code...
    break;
}
?>

  <?php
  include '../modules/footer.php';
  ?>