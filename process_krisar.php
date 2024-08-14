<?php
session_start();
include 'config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pesan = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    $tanggal = date('Y-m-d H:i:s');

    if ($nama && $email && $pesan) {
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
    } else {
        $_SESSION['notification'] = [
            'type' => 'error',
            'message' => 'Data tidak valid. Silakan coba lagi.'
        ];
    }

    $koneksi->close();

    // Redirect back to the form page
    echo "<script>document.location='index.php'</script>";
    exit();
}