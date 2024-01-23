<?php
include '../modules/header.php';
include '../config/is_pegawai.php';
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
    include 'pengusulan-bantuan/tampil.php';
    break;
  case 'tambah':
    include 'pengusulan-bantuan/tambah.php';
    break;
  case 'export':
    include 'pengusulan-bantuan/export.php';
    break;
  case 'exportSingle':
    include 'pengusulan-bantuan/exportSingle.php';
    break;
  case 'edit':
    include 'pengusulan-bantuan/edit.php';
    break;
    case 'detail':
      include 'pengusulan-bantuan/detail.php';
      break;  
  case 'proses':
    include 'pengusulan-bantuan/proses.php';
    break;
  case 'hapus':
    include 'pengusulan-bantuan/hapus.php';
    break;
  case 'export':
    include 'pengusulan-bantuan/export.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
include '../modules/footer.php';
?>