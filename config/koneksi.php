<?php

// Database connection parameters
$host = "localhost";
$user = "root";
$pass = "";
$db = "slrt-app";

// Start the session if it hasn't been started already
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Establish database connection
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$koneksi) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

// Set character set to UTF-8
mysqli_set_charset($koneksi, "utf8");
