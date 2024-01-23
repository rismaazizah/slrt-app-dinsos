<?php
include '../config/koneksi.php';

$nik_nip = $_POST['nik_nip'];
$nama_pegawai = $_POST['nama_pegawai'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$jabatan = $_POST['jabatan'];
$tempat_tugas = $_POST['tempat_tugas'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

if (isset($_POST['tambah'])) {

  $password = md5($_POST['password']);
  $queryUser = "INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`) VALUES (NULL, '$username', '$password', 'pegawai');";

  $resultUser = mysqli_query($koneksi, $queryUser);

  if (!$resultUser) {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: pegawai.php?page=tambah");
    die;
  }

  $user_id = mysqli_insert_id($koneksi);

  $query = "INSERT INTO `tb_pegawai` (`id_pegawai`, `nik_nip`, `nama_pegawai`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `jabatan`, `tempat_tugas`, `no_hp`, `email`, `user_id`) VALUES (NULL, '$nik_nip', '$nama_pegawai', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$jabatan', '$tempat_tugas', '$no_hp', '$email', '$user_id' );";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil ditambahkan';

    header("Location: pegawai.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: pegawai.php?page=tambah");
  }
}

// make if block for update
if (isset($_POST['update'])) {
  $id_pegawai = $_POST['id_pegawai'];
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
    header("Location: pegawai.php?page=edit&id_pegawai=$id_pegawai");
    die;
  }

  $query = "UPDATE tb_pegawai SET nik_nip = '$nik_nip', nama_pegawai = '$nama_pegawai', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', agama = '$agama', alamat = '$alamat', jabatan = '$jabatan', tempat_tugas = '$tempat_tugas', no_hp = '$no_hp', email = '$email' WHERE id_pegawai = '$id_pegawai'";

  $result = mysqli_query($koneksi, $query);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil diperbarui';

    header("Location: pegawai.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: pegawai.php?page=edit&id_pegawai=$id_pegawai");
  }
}
