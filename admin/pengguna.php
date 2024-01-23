<?php
include '../modules/header.php';
include '../config/is_admin.php';
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
    include 'pengguna/tampil.php';
    break;
  case 'tambah':
    include 'pengguna/tambah.php';
    break;
  case 'export':
    include 'pengguna/export.php';
    break;
  case 'edit':
    include 'pengguna/edit.php';
    break;
  case 'proses':
    include 'pengguna/proses.php';
    break;
  case 'hapus':
    include 'pengguna/hapus.php';
    break;

  default:
    # code...
    break;
}
?>

  <?php
  include '../modules/footer.php';
  ?>