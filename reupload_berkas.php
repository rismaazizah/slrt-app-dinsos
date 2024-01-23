<?php
include 'config/koneksi.php';

$id_pengusulan_bantuan = $_POST['id'];

if (isset($_POST['tambah'])) {
  // Mengatur direktori penyimpanan file
  $targetDir = "uploads/";
  $path_parts = pathinfo($_FILES["berkas"]["name"]);
  $extension = $path_parts['extension'];
  $berkas = $targetDir . time() . '.' . $extension;
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($berkas, PATHINFO_EXTENSION));

  // Memeriksa apakah file adalah PDF
  if ($fileType != "pdf") {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "File yang diizinkan hanya berformat PDF.";
    // Refresh halaman
    header("Location: monitoring.php");
    die;
    $uploadOk = 0;
  }

  // Memeriksa apakah file sudah ada
  if (file_exists($berkas)) {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "File Sudah Ada.";
    // Refresh halaman
    header("Location: monitoring.php");
    die;
    $uploadOk = 0;
  }

  // Memeriksa ukuran file (maksimum 5MB)
  if ($_FILES["berkas"]["size"] > 5000000) {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "Ukuran file terlalu besar. Maksimum 5MB.";
    // Refresh halaman
    header("Location: monitoring.php");
    die;
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "File tidak dapat diunggah.";
    // Refresh halaman
    header("Location: monitoring.php");
    die;
  } else {
    // Jika file lolos semua pemeriksaan, lakukan proses upload
    if (move_uploaded_file($_FILES["berkas"]["tmp_name"], $berkas)) { 

      $status = 'Pending';
      $query = "UPDATE tb_pengusulan_bantuan SET status = '$status', berkas_pelengkap = '$berkas' WHERE id_pengusulan_bantuan = '$id_pengusulan_bantuan'";

      $result = mysqli_query($koneksi, $query);

      $querypp = "SELECT * FROM `tb_pengusulan_bantuan` WHERE id_pengusulan_bantuan = '$id_pengusulan_bantuan'";
      $resultpp = mysqli_query($koneksi, $querypp);
      $pp = mysqli_fetch_assoc($resultpp);

      $queryMasy = "SELECT * FROM `tb_masyarakat` WHERE id_masyarakat = '{$pp['masyarakat_id']}'";
      $resultMasy = mysqli_query($koneksi, $queryMasy);
      $masy = mysqli_fetch_assoc($resultMasy);

      $text = $masy['nama'] . ' memperbarui berkas';
      $text = ucwords($text);

      $queryX = "INSERT INTO `tb_histori_pengusulan_bantuan` (`pengusulan_bantuan_id`, `text`) VALUES ('$id_pengusulan_bantuan', '$text');";

      $resultX = mysqli_query($koneksi, $queryX);

      if ($result) {
        // Jika berhasil, buat pesan sukses dengan menggunakan session
        session_start();
        $_SESSION['result'] = 'success';
        $_SESSION['message'] = 'Berhasil Memperbarui Berkas';

        header("Location: monitoring.php");
      } else {
        // Jika gagal, buat pesan error dengan menggunakan session
        session_start();
        $_SESSION['result'] = 'error';
        $_SESSION['message'] = mysqli_error($koneksi);
        // Refresh halaman
        header("Location: monitoring.php");
      }
    } else {
      echo "Terjadi kesalahan saat mengunggah file.";
    }
  }
}
