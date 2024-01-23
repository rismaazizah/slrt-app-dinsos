<?php
// include '../modules/header.php';
// include '../config/is_admin.php';
// include '../config/is_pegawai.php';
// include '../config/is_masyarakat.php';
?>

<title>Profil</title>

<?php
// check page from url
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'tampil';
}
switch ($page) {
  case 'tampil':
    include 'profil/show.php';
    break;
  case 'proses':
    include 'profil/proses.php';
    break;
  case 'edit':
    include 'profil/edit.php';
    break;

  default:
    # code...
    break;
}
?>

<?php
// include '../modules/footer.php';
?>