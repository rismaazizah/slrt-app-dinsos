<?php
session_start();
if ($_SESSION['login']) {
  // header("Location: ../admin/dashboard.php");
  if ($_SESSION['role'] == 'admin') {
    header("Location: ../admin/dashboard.php");
    exit();
  } elseif ($_SESSION['role'] == 'pegawai') {
    include 'koneksi.php';
    $user_id = $_SESSION['id_user'];
    $query = "SELECT * FROM tb_pegawai WHERE user_id = '$user_id'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id_pegawai'] = $row['id_pegawai'];

    header("Location: ../pegawai/dashboard.php");
    exit();
  } elseif ($_SESSION['role'] == 'masyarakat') {
    include 'koneksi.php';
    $user_id = $_SESSION['id_user'];
    $query = "SELECT * FROM tb_masyarakat WHERE user_id = '$user_id'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    $nama = $row['nama'];
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Login Sebagai ' . $nama . '!';
    header("Location: ../index.php");
    exit();
  } else {
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = 'Username / Password tidak cocok!';
    //refresh page
    header("Location: ../login.php");
    exit();
  }
} else {
  header("Location: ../login.php");
  exit();
}
