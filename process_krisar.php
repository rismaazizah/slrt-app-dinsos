<?php
session_start();
include 'config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $pesan = $_POST['message'];
    $tanggal = date('Y-m-d H:i:s');

    $sql = "INSERT INTO kritik_saran (nama, email, pesan, tanggal) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssss", $nama, $email, $pesan, $tanggal);

    if ($stmt->execute()) {
        $_SESSION['notification'] = [
            'type' => 'success',
            'message' => 'Kritik dan saran Anda telah berhasil dikirim.'
        ];
    } else {
        $_SESSION['notification'] = [
            'type' => 'error',
            'message' => 'Terjadi kesalahan. Silakan coba lagi.'
        ];
    }

    $stmt->close();
    $koneksi->close();

    // Redirect back to the form page
    header('Location: index.php');
    exit();
}