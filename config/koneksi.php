<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "slrt-app";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
  echo "Koneksi Gagal";
}
