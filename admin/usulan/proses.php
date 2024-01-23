<?php
include '../config/koneksi.php';

$jenis_usulan = $_POST['jenis_usulan'];
$kriteria = $_POST['kriteria'];
$persyaratan = $_POST['persyaratan'];
$keterangan = $_POST['keterangan'];

if (isset($_POST['tambah'])) {

  $query = "INSERT INTO `tb_usulan` (`id_usulan`, `jenis_usulan`, `kriteria`, `persyaratan`, `keterangan`) VALUES (NULL, '$jenis_usulan','$kriteria', '$persyaratan', '$keterangan' );";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil ditambahkan';

    header("Location: usulan.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: usulan.php?page=tambah");
  }
}

// make if block for update
if (isset($_POST['update'])) {
  $id_usulan = $_POST['id_usulan'];

  $query = "UPDATE tb_usulan SET jenis_usulan = '$jenis_usulan', kriteria = '$kriteria', persyaratan = '$persyaratan', keterangan = '$keterangan' WHERE id_usulan = '$id_usulan'";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil diperbarui';

    header("Location: usulan.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: usulan.php?page=edit");
  }
}
