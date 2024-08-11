<?php
require_once '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    ob_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                width: 100%;
                margin: 0;
                padding: 0;
            }
            .table {
                border-collapse: collapse;
                width: 100%;
                margin: 0 auto;
            }
            td{
                padding: 18px;
            }
            th {
                padding: 67px;
            }
            table.bordered {
                width: 90%;
                margin: 0 auto;
                border-collapse: collapse;
            }
            table.bordered th, table.bordered td {
                border: 1px solid black;
                padding: 10px;
            }
            table.bordered th {
                text-align: center;
                font-weight: bold;
            }
            .center-content {
                text-align: center;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <table class="table">
            <colgroup>
                <col style="width: 10%">
                <col style="width: 80%">
                <col style="width: 10%">
            </colgroup>
            <tr>
                <td>
                    <img src="../assets/img/banjar.png" height="60" alt="" class="gambar">
                </td>
                <td style="text-align: center ; padding: 16px 48px;">
                    <span style="font-size: 16px;font-weight: bold; text-align: center ;">PEMERINTAH KABUPATEN BANJAR</span>
                    <br>
                    <span style="font-size: 20px;font-weight: bold; text-align: center ;">DINAS SOSIAL, PEMBERDDAYAAN PEREMPUAN,</span>
                    <br>
                    <span style="font-size: 20px;font-weight: bold; text-align: center ;">PERLINDUNGAN ANAK, PENGENDALIAN PENDUDUK</span>
                    <br>
                    <span style="font-size: 20px;font-weight: bold; text-align: center ;">DAN KELUARGA BERENCANA</span>
                    <br>
                    <span style="font-size: 12px;font-weight: lighter ;">Jl. Pendidikan Martapura 70614 Kalimantan Selatan Telp. (0511) 4721221,</span>
                    <br>
                    <span style="font-size: 12px;font-weight: lighter;">Website : <u>www.dinsosp3ap2kb.banjarkab.go.id</u> Email : dinsosp3ap2kb@banjarkab.go.id</span>
                </td>
                <td></td>
            </tr>
        </table>

        <hr>

        <h2 style="text-align: center; margin-top: 20px; margin-bottom: 20px;"><u>Laporan Nomor Pengusulan</u></h2>

        <div class="center-content">
            <table class="bordered">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 30%;">Nomor Pengusulan</th>
                        <th style="width: 30%;">Nama Pengusul</th>
                        <th style="width: 20%;">Tanggal Pengajuan</th>
                        <th style="width: 20%;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once '../config/koneksi.php';
                    $no = 1;
                    $query = "SELECT nomor_pengusulan, nama_pengusul, tgl_pengajuan, status FROM tb_pengusulan_bantuan ORDER BY tgl_pengajuan DESC";
                    $result = mysqli_query($koneksi, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td style="text-align: center;"><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nomor_pengusulan']); ?></td>
                            <td><?= htmlspecialchars($row['nama_pengusul']); ?></td>
                            <td style="text-align: center;"><?= date('d F Y', strtotime($row['tgl_pengajuan'])); ?></td>
                            <td style="text-align: center;"><?= htmlspecialchars($row['status']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <br>
        <br>

        <?php
        $month = date('m');
        $year = date('Y');
        $bulan = array(
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
            '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
            '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        );
        $bulan_indo = $bulan[$month];
        ?>

        <table class="table">
            <colgroup>
                <col style="width: 70%" class="angka">
                <col style="width: 30%" class="angka">
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
    $html2pdf->output('laporan_nomor_pengusulan.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
?>
