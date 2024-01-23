<?php
if ($_SESSION['role'] != 'pegawai') {
  header("Location: ../login.php");
  exit();
}
