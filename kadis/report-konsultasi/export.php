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
    <h2 style="text-align: center;">Rekap Data Konsultasi</h2>
    <br>

    <table class="table bordered">
      <colgroup>
        <col style="width: 2%" class="angka">
        <col style="width: 15%" class="angka">
        <col style="width: 30%" class="angka">
        <col style="width: 50%" class="angka">
      </colgroup>
      <thead>
        <tr>
          <th>No</th>
          <th>Masyarakat</th>
          <th>Perihal</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once '../config/koneksi.php';
        $no = 1;
        $query = "SELECT * FROM tb_konsultasi 
        JOIN tb_masyarakat ON tb_konsultasi.masyarakat_id = tb_masyarakat.id_masyarakat";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['perihal']; ?></td>
            <td>
              <?php
              $query2 = "SELECT * FROM tb_histori_konsultasi 
                    WHERE konsultasi_id = '{$row['id_konsultasi']}' AND role = 'kadis' ";
              $result2 = mysqli_query($koneksi, $query2);
              $row2 = mysqli_fetch_assoc($result2);

              if ($row2 !== null) {
                echo 'Sudah ditanggapi';
              } else {
                echo 'Belum ditanggapi';
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