<?php
session_start();
include 'config/koneksi.php';

if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'masyarakat' && $_SESSION['role'] != 'pegawai')) {
    echo '<script>
        alert("Anda harus login sebagai masyarakat atau pegawai untuk mengirim pesan.");
        window.location.href = "index.php";
    </script>';
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $pesan = $_POST['message'];
    $tanggal = date('Y-m-d H:i:s');

    $sql = "INSERT INTO kritik_saran (nama, email, pesan, tanggal) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssss", $nama, $email, $pesan, $tanggal);

    if ($stmt->execute()) {
        $_SESSION['result'] = 'success';
        $_SESSION['message'] = 'Kritik dan saran Anda telah berhasil dikirim.';
    } else {
        $_SESSION['result'] = 'error';
        $_SESSION['message'] = 'Terjadi kesalahan. Silakan coba lagi.';
    }

    $stmt->close();
    $koneksi->close();

    echo '<script>
        alert("' . $_SESSION['message'] . '");
        window.location.href = "index.php";
    </script>';
    exit();
}