<?php
include 'config/koneksi.php';

$id_pembuatan_perizinan = $_POST['id'];

if (isset($_POST['tambah'])) {
  // Mengatur direktori penyimpanan file
  $targetDir = "uploads/";

  // Mengatur informasi file pertama (foto_bukti_1)
  $path_parts1 = pathinfo($_FILES["foto_bukti_1"]["name"]);
  $extension1 = $path_parts1['extension'];
  $foto_bukti_1 = $targetDir . "foto_1" . time() . '.' . $extension1;

  // Mengatur informasi file kedua (foto_bukti_2)
  $path_parts2 = pathinfo($_FILES["foto_bukti_2"]["name"]);
  $extension2 = $path_parts2['extension'];
  $foto_bukti_2 = $targetDir . "foto_2" . time() . '.' . $extension2;

  $uploadOk = 1;
  // Memeriksa apakah file pertama adalah gambar (misalnya, format yang diizinkan adalah JPG, JPEG, PNG)
  $allowedExtensions = array("jpg", "jpeg", "png");
  $fileType1 = strtolower(pathinfo($foto_bukti_1, PATHINFO_EXTENSION));
  if (!in_array($fileType1, $allowedExtensions)) {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "File pertama yang diizinkan hanya berformat JPG, JPEG, atau PNG.";
    // Refresh halaman
    header("Location: monitoring.php");
    die;
    $uploadOk = 0;
  }

  // Memeriksa apakah file kedua adalah gambar (misalnya, format yang diizinkan adalah JPG, JPEG, PNG)
  $fileType2 = strtolower(pathinfo($foto_bukti_2, PATHINFO_EXTENSION));
  if (!in_array($fileType2, $allowedExtensions)) {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "File kedua yang diizinkan hanya berformat JPG, JPEG, atau PNG.";
    // Refresh halaman
    header("Location: monitoring.php");
    die;
    $uploadOk = 0;
  }

  // Memeriksa apakah file pertama sudah ada
  if (file_exists($foto_bukti_1)) {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "File pertama sudah ada.";
    // Refresh halaman
    header("Location: monitoring.php");
    die;
    $uploadOk = 0;
  }

  // Memeriksa apakah file kedua sudah ada
  if (file_exists($foto_bukti_2)) {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "File kedua sudah ada.";
    // Refresh halaman
    header("Location: monitoring.php");
    die;
    $uploadOk = 0;
  }

  // Memeriksa ukuran file pertama (maksimum 5MB)
  if ($_FILES["foto_bukti_1"]["size"] > 5000000) {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "Ukuran file pertama terlalu besar. Maksimum 5MB.";
    // Refresh halaman
    header("Location: monitoring.php");
    die;
    $uploadOk = 0;
  }

  // Memeriksa ukuran file kedua (maksimum 5MB)
  if ($_FILES["foto_bukti_2"]["size"] > 5000000) {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "Ukuran file kedua terlalu besar. Maksimum 5MB.";
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
    if (
      move_uploaded_file($_FILES["foto_bukti_1"]["tmp_name"], $foto_bukti_1) &&
      move_uploaded_file($_FILES["foto_bukti_2"]["tmp_name"], $foto_bukti_2)
    ) {

      $query = "UPDATE tb_pembuatan_perizinan SET foto_path_1 = '$foto_bukti_1', foto_path_2 = '$foto_bukti_2' WHERE id_pembuatan_perizinan = '$id_pembuatan_perizinan'";

      $result = mysqli_query($koneksi, $query);

      $querypp = "SELECT * FROM `tb_pembuatan_perizinan` WHERE id_pembuatan_perizinan = '$id_pembuatan_perizinan'";
      $resultpp = mysqli_query($koneksi, $querypp);
      $pp = mysqli_fetch_assoc($resultpp);

      $queryMasy = "SELECT * FROM `tb_masyarakat` WHERE id_masyarakat = '{$pp['masyarakat_id']}'";
      $resultMasy = mysqli_query($koneksi, $queryMasy);
      $masy = mysqli_fetch_assoc($resultMasy);

      $text = $masy['nama'] . ' menambahkan foto usaha';
      $text = ucwords($text);

      $queryX = "INSERT INTO `tb_histori_pembuatan_perizinan` (`pembuatan_perizinan_id`, `text`) VALUES ('$id_pembuatan_perizinan', '$text');";

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
