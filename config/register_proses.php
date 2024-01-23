<?php
include 'koneksi.php';

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

$password = md5($_POST['password']);
$queryUser = "INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`) VALUES (NULL, '$username', '$password', 'masyarakat');";

$resultUser = mysqli_query($koneksi, $queryUser);

if (!$resultUser) {
  // make a success message with session
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = mysqli_error($koneksi);
  //refresh page
  header("Location: ../register.php");
  die;
}

$user_id = mysqli_insert_id($koneksi);

$query = "INSERT INTO tb_masyarakat (id_masyarakat, no_kk, nik, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, rt, rw, desa, kecamatan, kode_pos, status_hubungan, no_hp, email, user_id) VALUES (NULL, '$no_kk', '$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$rt', '$rw', '$desa', '$kecamatan', '$kode_pos', '$status_hubungan', '$no_hp', '$email', '$user_id' );";

$result = mysqli_query($koneksi, $query);

if ($result) {
  // make a success message with session
  session_start();
  $_SESSION['result'] = 'success';
  $_SESSION['message'] = 'Berhasil Mendaftar! Silahkan Login';

  header("Location: ../login.php");
} else {
  // make a success message with session
  session_start();
  $_SESSION['result'] = 'error';
  $_SESSION['message'] = mysqli_error($koneksi);
  //refresh page
  header("Location: ../register.php");
}
