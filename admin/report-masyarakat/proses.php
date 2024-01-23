<?php
include '../config/koneksi.php';

$no_kk = $_POST['no_kk'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$rt = $_POST['rt'];
$rw = $_POST['rw'];
$desa = $_POST['desa'];
$kecamatan = $_POST['kecamatan'];
$kode_pos = $_POST['kode_pos'];
$status_hubungan = $_POST['status_hubungan'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['tambah'])) {

  $password = md5($_POST['password']);
  $queryUser = "INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`) VALUES (NULL, '$username', '$password', 'masyarakat');";

  $resultUser = mysqli_query($koneksi, $queryUser);

  if (!$resultUser) {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: masyarakat.php?page=tambah");
    die;
  }

  $user_id = mysqli_insert_id($koneksi);

  $query = "INSERT INTO tb_masyarakat (id_masyarakat, no_kk, nik, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, rt, rw, desa, kecamatan, kode_pos, status_hubungan, no_hp, email, user_id) VALUES (NULL, '$no_kk', '$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$rt', '$rw', '$desa', '$kecamatan', '$kode_pos', '$status_hubungan', '$no_hp', '$email', '$user_id' );";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil ditambahkan';

    header("Location: masyarakat.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = 'Data gagal ditambahkan';
    //refresh page
    header("Location: masyarakat.php?page=tambah");
  }
}

// make if block for update
if (isset($_POST['update'])) {
  $id_masyarakat = $_POST['id_masyarakat'];
  $user_id = $_POST['user_id'];

  if ($password != null) {
    $password = md5($_POST['password']);
    $queryUser = "UPDATE `tb_user` SET username = '$username', password = '$password' WHERE id_user = '$user_id'";
  } else {
    $queryUser = "UPDATE `tb_user` SET username = '$username' WHERE id_user = '$user_id'";
  }

  $resultUser = mysqli_query($koneksi, $queryUser);

  if (!$resultUser) {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: masyarakat.php?page=edit&id_masyarakat=$id_masyarakat");
    die;
  }

  $query = "UPDATE tb_masyarakat SET  no_kk = '$no_kk', nik = '$nik', nama = '$nama', agama = '$agama', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', rt = '$rt', rw = '$rw', alamat = '$alamat', desa = '$desa', kecamatan = '$kecamatan', kode_pos = '$kode_pos', jenis_kelamin = '$jenis_kelamin', no_hp = '$no_hp', email = '$email', status_hubungan = '$status_hubungan' WHERE id_masyarakat = '$id_masyarakat'";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil diperbarui';

    header("Location: masyarakat.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: masyarakat.php?page=edit&id_masyarakat=$id_masyarakat");
  }
}

