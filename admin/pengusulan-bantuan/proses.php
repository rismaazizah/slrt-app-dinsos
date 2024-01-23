<?php
include '../config/koneksi.php';

$status = $_POST['status'];
$kelengkapan_berkas = $_POST['kelengkapan_berkas'];
$keterangan_verifikasi = $_POST['keterangan_verifikasi'];
$pegawai_id = $_POST['pegawai_id'];


// if (isset($_POST['tambah'])) {

//   $query = "INSERT INTO `tb_pengusulan_bantuan` (`id_pengusulan_bantuan`, `nama_pengusulan_bantuan`, `bidang`, `persyaratan`, `keterangan`) VALUES (NULL, '$nama_pengusulan_bantuan', '$bidang', '$persyaratan', '$keterangan' );";

//   $result = mysqli_query($koneksi, $query);

//   if ($result) {
//     // make a success message with session
//     $_SESSION['result'] = 'success';
//     $_SESSION['message'] = 'Data berhasil ditambahkan';

//     header("Location: pengusulan-bantuan.php");
//   } else {
//     // make a success message with session
//     $_SESSION['result'] = 'error';
//     $_SESSION['message'] = mysqli_error($koneksi);
//     //refresh page
//     header("Location: pengusulan-bantuan.php?page=tambah");
//   }
// }

// make if block for update
if (isset($_POST['update'])) {
  $id_pengusulan_bantuan = $_POST['id_pengusulan_bantuan'];

  $query = "UPDATE tb_pengusulan_bantuan SET keterangan_verifikasi = '$keterangan_verifikasi', status = '$status', kelengkapan_berkas = '$kelengkapan_berkas', pegawai_id = '$pegawai_id' WHERE id_pengusulan_bantuan = '$id_pengusulan_bantuan'";

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
