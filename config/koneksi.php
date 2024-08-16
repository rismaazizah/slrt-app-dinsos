<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "slrt-app";
session_start();
$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
  echo "Koneksi Gagal";
}
