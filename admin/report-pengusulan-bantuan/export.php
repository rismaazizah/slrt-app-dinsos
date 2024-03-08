<?php

/**
 * Html2Pdf Library - example
 *
 * HTML => PDF converter
 * distributed under the OSL-3.0 License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2017 Laurent MINGUET
 */
require_once  '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
  ob_start();
?>

  <?php
  function tgl_indo($tanggal)
  {
    $bulan = array(
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
  }
  ?>

  <!DOCTYPE html>
  <html lang="eng">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
      .table {
        border-collapse: collapse;
        width: 100vw;

      }

      th,
      td {
        padding: 8px;

      }

      table.bordered th,
      table.bordered td {
        border: 1px solid black;
      }

      table.bordered th {
        text-align: center;
      }
    </style>

  </head>

  <body>

    <table class="table ">
      <colgroup>
        <col style="width: 10%">
        <col style="width: 80%">
        <col style="width: 10%">
      </colgroup>
      <tr>
        <td>
          <img src="../assets/img/banjar.png" height="60" alt="" class="gambar">
        </td>
        <td style="text-align: center ; padding: 20px 48px;">
          <span style="font-size: 20px;font-weight: bold; text-align: center ;">PEMERINTAH KABUPATEN BANJAR</span>
          <br>
          <span style="font-size: 14px;font-weight: bold; text-align: center ;">DINAS SOSIAL, PEMBERDDAYAAN PEREMPUAN,</span>
          <br>
          <span style="font-size: 14px;font-weight: bold; text-align: center ;">PERLINDUNGAN ANAK, PENGENDALIAN PENDUDUK</span>
          <br>
          <span style="font-size: 14px;font-weight: bold; text-align: center ;">DAN KELUARGA BERENCANA</span>
          <br>
          <span style="font-size: 12px;font-weight: lighter ;">Jl. Pendidikan Martapura 70614 Kalimantan Selatan Telp. (0511) 4721221,</span>
          <br>
          <span style="font-size: 12px;font-weight: lighter;">Website : <u>www.dinsosp3ap2kb.banjarkab.go.id</u> Email : dinsosp3ap2kb@banjarkab.go.id</span>
        </td>
        <td>
        </td>
      </tr>
    </table>

    <hr>


    <br>
    <h2 style="text-align: center;">Rekap Data Pengusulan Bantuan</h2>
    <br>

    <table class="table bordered">
      <colgroup>
        <col style="width: 5%" class="angka">
        <col style="width: 20%" class="angka">
        <col style="width: 15%" class="angka">
        <col style="width: 15%" class="angka">
        <col style="width: 15%" class="angka">
        <col style="width: 15%" class="angka">
        <col style="width: 15%" class="angka">
      </colgroup>
      <thead>
        <tr>
          <th>No</th>
          <th>Nomor Pengusulan</th>
          <th>Nama Pemohon</th>
          <th>Jenis Usulan</th>
          <th>Status</th>
          <th>Tanggal Pengajuan</th>
          <th>Kelengkapan Berkas</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once '../config/koneksi.php';
        $usulan_id = $_GET['usulan_id'];
        $no = 1;
        if ($usulan_id == 'semua') {
          $query = "SELECT * FROM tb_pengusulan_bantuan 
              JOIN tb_masyarakat ON tb_pengusulan_bantuan.masyarakat_id = tb_masyarakat.id_masyarakat
              JOIN tb_usulan ON tb_pengusulan_bantuan.usulan_id = tb_usulan.id_usulan
              ORDER BY tb_pengusulan_bantuan.id_pengusulan_bantuan DESC";
        } else {
          $query = "SELECT * FROM tb_pengusulan_bantuan 
              JOIN tb_masyarakat ON tb_pengusulan_bantuan.masyarakat_id = tb_masyarakat.id_masyarakat
              JOIN tb_usulan ON tb_pengusulan_bantuan.usulan_id = tb_usulan.id_usulan
              WHERE tb_pengusulan_bantuan.usulan_id = $usulan_id
              ORDER BY tb_pengusulan_bantuan.id_pengusulan_bantuan DESC";
        }
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nomor_pengusulan']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jenis_usulan']; ?></td>
            <td><?= $row['status']; ?></td>
            <td><?= tgl_indo($row['tgl_pengajuan']); ?></td>
            <td>
              <?php
              if ($row['kelengkapan_berkas'] == 0) {
                echo 'Belum Lengkap';
              } else {
                echo 'Sudah Lengkap';
              }
              ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <br>
    <br>
    <br>

    <?php
    // get current month and year
    $month = date('m');
    $year = date('Y');
    // make month to indonesian
    $bulan = array(
      '01' => 'Januari',
      '02' => 'Februari',
      '03' => 'Maret',
      '04' => 'April',
      '05' => 'Mei',
      '06' => 'Juni',
      '07' => 'Juli',
      '08' => 'Agustus',
      '09' => 'September',
      '10' => 'Oktober',
      '11' => 'November',
      '12' => 'Desember'
    );
    // make month to indonesian 
    $bulan_indo = $bulan[$month];
    // make year to indonesian
    ?>

    <table class="table">
      <colgroup>
        <col style="width: 60%" class="angka">
        <col style="width: 40%" class="angka">
      </colgroup>

      <tr style="text-align: center;">
        <td></td>
        <td>Martapura, <?= date('d') ?> <?= $bulan_indo ?> <?= $year ?> </td>
      </tr>
      <tr style="text-align: center;">
        <td></td>
        <td>Kepala Dinas Sosial P3AP2KB <br>
          Kabupaten Banjar,
        </td>
      </tr>
      <tr style="text-align: center;">
        <td></td>
        <td>
          <br><br><br><br>
        </td>
      </tr>
      <tr style="text-align: center;">
        <td></td>
        <td>
          Dian Marliana, S.STP., M.Si <br>
          Pembina Tingkat I <br>
          NIP. 19780312 199612 2 001
        </td>
      </tr>
    </table>


  </body>

  </html>

<?php

  $content = ob_get_clean();
  ob_clean();
  $html2pdf = new Html2Pdf('L', 'A4', 'fr');
  $html2pdf->pdf->SetDisplayMode('fullpage');
  $html2pdf->writeHTML($content);
  $html2pdf->output('example05.pdf');
} catch (Html2PdfException $e) {
  $html2pdf->clean();

  $formatter = new ExceptionFormatter($e);
  echo $formatter->getHtmlMessage();
}
?>