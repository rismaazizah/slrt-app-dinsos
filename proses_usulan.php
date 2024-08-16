<?php
include 'config/koneksi.php';

$masyarakat_id = $_POST['masyarakat_id'];
$usulan_id = $_POST['usulan_id'];
$nama_pengusul = $_POST['nama_pengusul'];
$kk_pengusul = $_POST['kk_pengusul'];
$nik_pengusul = $_POST['nik_pengusul'];
$jenis_kelamin_pengusul = $_POST['jenis_kelamin_pengusul'];
$agama_pengusul = $_POST['agama_pengusul'];
$tempat_lahir_pengusul = $_POST['tempat_lahir_pengusul'];
$tanggal_lahir_pengusul = $_POST['tanggal_lahir_pengusul'];

$lahir = new DateTime($tanggal_lahir_pengusul);
$today = new DateTime();
$umur = $today->diff($lahir)->y;
$umur_pengusul = $umur;
$rt_pengusul = $_POST['rt_pengusul'];
$rw_pengusul = $_POST['rw_pengusul'];
$desa_pengusul = $_POST['desa_pengusul'];
$kecamatan_pengusul = $_POST['kecamatan_pengusul'];
$kode_pos_pengusul = $_POST['kode_pos_pengusul'];
$status_hubungan_pengusul = $_POST['status_hubungan_pengusul'];
$alamat_pengusul = $_POST['alamat_pengusul'];
$harini = date('Y-m-d'); // Ubah format tanggal menjadi 'Y-m-d'
$tgl = date('d');
$bln = date('m');
$thn = date('Y');

// Fetch the user's email from the database based on masyarakat_id
$query = "SELECT email, nama FROM tb_masyarakat WHERE id_masyarakat = '$masyarakat_id'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$email = $row['email'];
$nama = $row['nama'];

include 'modules/mail/head2.php';
$mail->addAddress($email, $nama_pengusul); //email penerima
$mail->isHTML(true);
$mail->Subject = "Berhasil Mengajukan Usulan"; //subject
$mail->Body    = "
<p>Yth ".$nama.",</p>
<p>Permintaan Usulan dengan keterangan :</p>
<p>NIK                : ".$nik_pengusul."</p>
<p>Nama Lengkap       : ".$nama_pengusul."</p>
<p>Tanggal Pengajuan  : ".date('d-m-Y')."</p>
<p>Selamat, Anda Berhasil Mengajukan Usulan di Sistem Layanan dan Rujukan Terpadu Dinas Sosial P3AP2KB Kabupaten Banjar.</p>
<p>TERIMAKASIH TELAH MENGGUNAKAN SLRT DINAS SOSIAL P3AP2KB KABUPATEN BANJAR</p>"; //isi email
include 'modules/mail/foot.php';

if (isset($_POST['tambah'])) {
  // Mengatur direktori penyimpanan file
  $targetDir = "uploads/";
  $path_parts = pathinfo($_FILES["berkas"]["name"]);
  $extension = $path_parts['extension'];
  $berkas = $targetDir . $masyarakat_id . $usulan_id . time() . '.' . $extension;
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($berkas, PATHINFO_EXTENSION));

  // Memeriksa apakah file adalah PDF
  if ($fileType != "pdf") {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "File yang diizinkan hanya berformat PDF.";
    // Refresh halaman
    header("Location: form-usulan.php?usulan_id=$usulan_id");
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
    header("Location: form-usulan.php?usulan_id=$usulan_id");
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
    header("Location: form-usulan.php?usulan_id=$usulan_id");
    die;
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    // Jika gagal, buat pesan error dengan menggunakan session
    session_start();
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = "File tidak dapat diunggah.";
    // Refresh halaman
    header("Location: form-usulan.php?usulan_id=$usulan_id");
    die;
  } else {
    // Jika file lolos semua pemeriksaan, lakukan proses upload
    if (move_uploaded_file($_FILES["berkas"]["tmp_name"], $berkas)) {
      $queryCheckPengusulanBantuan = "SELECT * FROM `tb_pengusulan_bantuan` ORDER BY id_pengusulan_bantuan DESC LIMIT 1";
      $resultCheckPengusulanBantuan = mysqli_query($koneksi, $queryCheckPengusulanBantuan);
      $pp = mysqli_fetch_assoc($resultCheckPengusulanBantuan);
      if ($pp !== null) {
        $no = $pp['id_pengusulan_bantuan'] + 1;
      } else {
        $no = 1;
      }

      $nomor_pengusulan = $no .  $masyarakat_id .  $usulan_id .  $tgl .  $bln .  $thn;

      // Membuat query untuk memasukkan data ke database
      $query = "INSERT INTO `tb_pengusulan_bantuan` (`nomor_pengusulan`,`masyarakat_id`, `status`, `usulan_id`, `nama_pengusul`, `kk_pengusul`, `nik_pengusul`, `jenis_kelamin_pengusul`, `agama_pengusul`, `tempat_lahir_pengusul`, `tanggal_lahir_pengusul`, `alamat_pengusul`, `rt_pengusul`, `rw_pengusul`, `desa_pengusul`, `kecamatan_pengusul`, `kode_pos_pengusul`, `status_hubungan_pengusul`, `kelengkapan_berkas`, `tgl_pengajuan`, `file_berkas`, `umur_pengusul` ) VALUES ('$nomor_pengusulan', '$masyarakat_id', 'Pending', '$usulan_id', '$nama_pengusul', '$kk_pengusul', '$nik_pengusul', '$jenis_kelamin_pengusul', '$agama_pengusul', '$tempat_lahir_pengusul', '$tanggal_lahir_pengusul', '$alamat_pengusul', '$rt_pengusul', '$rw_pengusul', '$desa_pengusul', '$kecamatan_pengusul', '$kode_pos_pengusul', '$status_hubungan_pengusul', 0, '$harini', '$berkas', '$umur_pengusul' );";

      $result = mysqli_query($koneksi, $query);

      $lastInsertedId = mysqli_insert_id($koneksi);

      $queryMasy = "SELECT * FROM `tb_masyarakat` WHERE id_masyarakat = '$masyarakat_id'";
      $resultMasy = mysqli_query($koneksi, $queryMasy);
      $masy = mysqli_fetch_assoc($resultMasy);

      $text = $masy['nama'] . ' mengajukan pembuatan usulan';
      $text = ucwords($text);

      $queryX = "INSERT INTO `tb_histori_pengusulan_bantuan` (`pengusulan_bantuan_id`,`text`) VALUES ('$lastInsertedId', '$text');";

      $resultX = mysqli_query($koneksi, $queryX);

      if ($result) {
        // Jika berhasil, buat pesan sukses dengan menggunakan session
        $_SESSION['result'] = 'success';
        $_SESSION['nomormu'] = $nomor_pengusulan;
        $_SESSION['id_pengusulan_bantuan'] = $lastInsertedId;

        echo '<script>window.location.href = "sukses-daftar.php";</script>';
      } else {
        // Jika gagal, buat pesan error dengan menggunakan session
        $_SESSION['result'] = 'error';
        $_SESSION['message'] = mysqli_error($koneksi);
        // Refresh halaman
        header("Location: form-usulan.php?usulan_id=$usulan_id");
      }
    } else {
      echo "Terjadi kesalahan saat mengunggah file.";
    }
  }
}
