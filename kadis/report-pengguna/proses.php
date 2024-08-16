<?php
include '../config/koneksi.php';

$role = $_POST['role'];
$username = $_POST['username'];
$password = md5($_POST['password']);

if (isset($_POST['tambah'])) {

  $queryAddUser = "INSERT INTO tb_user (`username`, `password`, `role`) VALUES ('$username', '$password', '$role')";

  $resultAddUser = mysqli_query($koneksi, $queryAddUser);

  if ($resultAddUser) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil ditambahkan';

    header("Location: pengguna.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: pengguna.php?page=tambah");
  }
}

// make if block for update
if (isset($_POST['update'])) {
  $id_user = $_POST['id_user'];

  if ($_POST['password'] != null) {
    $qry = "UPDATE tb_user SET username = '$username', role = '$role', password = '$password' WHERE id_user = '$id_user'";
  } else {
    $qry = "UPDATE tb_user SET username = '$username', role = '$role' WHERE id_user = '$id_user'";
  }

  $resultUser = mysqli_query($koneksi, $qry);

  if ($resultUser) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil diperbarui';

    header("Location: pengguna.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: pengguna.php?page=edit");
  }
}
