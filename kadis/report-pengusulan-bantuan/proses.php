<?php
include '../config/koneksi.php';

$status = $_POST['status'];
$kelengkapan_berkas = $_POST['kelengkapan_berkas'];
$keterangan_verifikasi = $_POST['keterangan_verifikasi'];
$pegawai_id = $_POST['pegawai_id'];
$jenis_rujukan = $_POST['jenis_rujukan'];

if (isset($_POST['update'])) {
  $id_pengusulan_bantuan = $_POST['id_pengusulan_bantuan'];

  $query = "UPDATE tb_pengusulan_bantuan SET 
            keterangan_verifikasi = '$keterangan_verifikasi', 
            status = '$status', 
            kelengkapan_berkas = '$kelengkapan_berkas', 
            pegawai_id = '$pegawai_id',
            jenis_rujukan = '$jenis_rujukan' 
            WHERE id_pengusulan_bantuan = '$id_pengusulan_bantuan'";

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
  $rujukan_text = '';
  switch ($jenis_rujukan) {
    case '0': $rujukan_text = 'Menunggu Verifikasi'; break;
    case '1': $rujukan_text = 'Rumah Sakit'; break;
    case '2': $rujukan_text = 'Sekolah'; break;
    case '3': $rujukan_text = 'Kampus'; break;
    case '4': $rujukan_text = 'Badan Amil Zakat Nasional (BAZNAS)'; break;
    case '5': $rujukan_text = 'Badan Pengelolaan Keuangan dan Aset Daerah (BPKAD)'; break;
    case '6': $rujukan_text = 'Tidak Ada Rujukan'; break;
    default: $rujukan_text = 'Jenis rujukan tidak valid';
  }
  $text .= ' Jenis rujukan: ' . $rujukan_text . '.';

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
    header("Location: pengusulan-bantuan.php?page=edit");
  }
}
