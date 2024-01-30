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
    include 'pegawai/tampil.php';
    break;
  case 'tambah':
    include 'pegawai/tambah.php';
    break;
  case 'edit':
    include 'pegawai/edit.php';
    break;
  case 'detail':
    include 'pegawai/detail.php';
    break;
  case 'proses':
    include 'pegawai/proses.php';
    break;
  case 'hapus':
    include 'pegawai/hapus.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>