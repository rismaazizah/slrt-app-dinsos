<?php
include 'config/koneksi.php';

// Periksa apakah masyarakat_id ada dalam query string
if (isset($_GET['id'])) {
    $masyarakat_id = $_GET['id'];

    // Mengambil data berkas terbaru dari database untuk masyarakat_id tertentu
    $query = "SELECT `file_berkas` FROM `tb_pengusulan_bantuan` 
              WHERE `masyarakat_id` = '$masyarakat_id'
              ORDER BY `tgl_pengajuan` DESC
              LIMIT 1";
    $result = mysqli_query($koneksi, $query);

    // Memeriksa apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $filePath = $row['file_berkas'];
        
        if (file_exists($filePath)) {
            // Langsung menampilkan berkas PDF
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            readfile($filePath);
        } else {
            echo "File tidak ditemukan.";
        }
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID masyarakat tidak ditemukan.";
}
?>
