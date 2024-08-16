<?php
include '../config/koneksi.php';

$status = $_POST['status'];
$kelengkapan_berkas = $_POST['kelengkapan_berkas'];
$keterangan_verifikasi = $_POST['keterangan_verifikasi'];
$pegawai_id = $_POST['pegawai_id'];
$jenis_rujukan = $_POST['jenis_rujukan'];

if (isset($_POST['update'])) {
  $id_pengusulan_bantuan = $_POST['id_pengusulan_bantuan'];

  $query = "UPDATE tb_pengusulan_bantuan SET keterangan_verifikasi = '$keterangan_verifikasi', status = '$status', kelengkapan_berkas = '$kelengkapan_berkas', pegawai_id = '$pegawai_id', jenis_rujukan = '$jenis_rujukan' WHERE id_pengusulan_bantuan = '$id_pengusulan_bantuan'";

  $result = mysqli_query($koneksi, $query);

  // Membuat Text Berdasarkan Status
  if ($status === 'Pending') {
    $text = 'admin memverifikasi permohonan pengusulan bantuan dengan status: Pending.';
  } elseif ($status === 'Ditolak') {
    $text = 'admin telah membatalkan permohonan pengusulan bantuan.';
  } elseif ($status === 'Diterima') {
    $text = 'admin telah menyelesaikan proses pengusulan bantuan.';
  } else {
    $text = 'Status tidak valid.';
  }

  // Menambahkan informasi kelengkapan berkas ke teks
  if ($kelengkapan_berkas == '1') {
    $text .= ' Dengan kelengkapan berkas telah terpenuhi.';
  } elseif ($kelengkapan_berkas == '0') {
    $text .= ' Dengan kelengkapan berkas belum lengkap.';
  } else {
    $text .= ' Dengan kelengkapan berkas tidak valid.';
  }

  // Menambahkan informasi jenis rujukan ke teks
  switch ($jenis_rujukan) {
    case '1':
      $text .= ' Jenis rujukan: Rumah Sakit';
      break;
    case '2':
      $text .= ' Jenis rujukan: Sekolah';
      break;
    case '3':
      $text .= ' Jenis rujukan: Kampus';
      break;
    case '4':
      $text .= ' Jenis rujukan: Badan Amil Zakat Nasional (BAZNAS)';
      break;
    case '5':
      $text .= ' Jenis rujukan: Badan Pengelolaan Keuangan dan Aset Daerah (BPKAD)';
      break;
    case '6':
      $text .= ' Jenis rujukan: Tidak Ada Rujukan';
      break;
    default:
      $text .= ' Jenis rujukan tidak valid';
  }

  $text = ucwords($text);

  $queryX = "INSERT INTO `tb_histori_pengusulan_bantuan` (`pengusulan_bantuan_id`,`text`) VALUES ('$id_pengusulan_bantuan', '$text');";

  $resultX = mysqli_query($koneksi, $queryX);

  if ($result) {
    // make a success message with session
    $_SESSION['result'] = 'success';
    $_SESSION['message'] = 'Data berhasil diperbarui';

    header("Location: pengusulan-bantuan.php");
  } else {
    // make a success message with session
    $_SESSION['result'] = 'error';
    $_SESSION['message'] = mysqli_error($koneksi);
    //refresh page
    header("Location: pengusulan-bantuan.php?page=edit&id_pengusulan_bantuan=" . $id_pengusulan_bantuan);
  }
}
