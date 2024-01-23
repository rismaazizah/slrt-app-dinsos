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

  include_once '../config/koneksi.php';
  $id_pengusulan_bantuan = $_GET['id_pengusulan_bantuan'];
  $no = 1;
  $query = "SELECT * FROM tb_pengusulan_bantuan 
  JOIN tb_pegawai ON tb_pengusulan_bantuan.pegawai_id = tb_pegawai.id_pegawai
  JOIN tb_masyarakat ON tb_pengusulan_bantuan.masyarakat_id = tb_masyarakat.id_masyarakat
  JOIN tb_usulan ON tb_pengusulan_bantuan.usulan_id = tb_usulan.id_usulan
  WHERE tb_pengusulan_bantuan.id_pengusulan_bantuan = '$id_pengusulan_bantuan' ";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);
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
        font-size: 16px;
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


    <br>
    <h2 style="text-align: center;">Berita Acara Verifikasi Data</h2>
    <br>

    <table class="table">
      <tr>
        <th>Tanggal</th>
        <th>:</th>
        <td><?= date('d') ?> <?= $bulan_indo ?> <?= $year ?></td>
      </tr>
      <tr>
        <th>Nama Pendamping</th>
        <th>:</th>
        <td><?= $row['nama_pegawai'] ?></td>
      </tr>
      <tr>
        <th>Jabatan</th>
        <th>:</th>
        <td><?= $row['jabatan'] ?></td>
      </tr>
      <tr>
        <th>Tempat Tugas</th>
        <th>:</th>
        <td><?= $row['tempat_tugas'] ?></td>
      </tr>
    </table>

    <table class="table">
      <tr>
        <td>
          <p style="text-align: justify;font-size: 16px;line-height: 32px;">Warga yang didampingi</p>
        </td>
      </tr>
    </table>

    <table class="table" style="margin-top: 16px; margin-bottom: 16px;">
      <tr>
        <th>Nomor Pengusulan</th>
        <th>:</th>
        <td><?= $row['nomor_pengusulan'] ?></td>
      </tr>
      <tr>
        <th>Jenis Usulan</th>
        <th>:</th>
        <td><?= $row['jenis_usulan'] ?></td>
      </tr>
      <tr>
        <th>Tindak Lanjut</th>
        <th>:</th>
        <td>Akan diproses dengan membuatkan Surat Rekomendasi</td>
      </tr>
      <tr>
        <th>SKPD yang dilibatkan</th>
        <th>:</th>
        <td>Dinas Kesehatan Kabupaten Banjar</td>
      </tr>
      <tr>
        <th>Kelengkapan Berkas</th>
        <th>:</th>
        <td>
          <?php
          if ($row['kelengkapan_berkas'] == 0) {
          ?>
            <div class="badge badge-warning py-2 px-3">Belum Lengkap</div>
          <?php
          } else {
          ?>
            <div class="badge badge-success py-2 px-3">Sudah Lengkap</div>
          <?php
          }
          ?>
        </td>
      </tr>
      <!-- <tr>
        <th>Nama</th>
        <th>:</th>
        <td><?= $row['nama'] ?></td>
      </tr>
      <tr>
        <th>Tempat, Tanggal Lahir</th>
        <th>:</th>
        <td><?= $row['tempat_lahir'] . ', ' . tgl_indo($row['tanggal_lahir']); ?></td>
      </tr>
      <tr>
        <th>Alamat</th>
        <th>:</th>
        <td><?= $row['alamat'] . ' RT. ' . ($row['rt']) . ' RW. ' . ($row['rw']) . ', ' . ($row['desa']); ?></td>
      </tr>
      <tr>
        <th>Kecamatan</th>
        <th>:</th>
        <td><?= $row['kecamatan'] ?></td>
      </tr>
      <tr>
        <th>Nomor Telepon</th>
        <th>:</th>
        <td><?= $row['no_hp'] ?></td>
      </tr> -->
    </table>

    <table class="table">
      <tr>
        <td>
          <p style="text-align: justify;font-size: 16px;line-height: 32px;">
            Saya telah melakukan Verifikasi Faktual terhadap yang bersangkutan dan benar memang warga tidak mampu (miskin) dan layak dibantu.
          </p>
        </td>
      </tr>
    </table>

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
        <td>Yang Membuat,
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
          <?= $row['nama_pegawai'] ?> <br>
          <?= $row['jabatan'] ?><br>
        </td>
      </tr>
    </table>



  </body>

  </html>

<?php

  $content = ob_get_clean();
  ob_clean();
  $html2pdf = new Html2Pdf('P', 'A4', 'fr');
  $html2pdf->pdf->SetDisplayMode('fullpage');
  $html2pdf->writeHTML($content);
  $html2pdf->output('example05.pdf');
} catch (Html2PdfException $e) {
  $html2pdf->clean();

  $formatter = new ExceptionFormatter($e);
  echo $formatter->getHtmlMessage();
}
?>