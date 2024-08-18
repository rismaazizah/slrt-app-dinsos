<?php
require_once '../vendor/autoload.php';
include_once '../config/koneksi.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

// Get date range from URL parameters
$tanggal_mulai = isset($_GET['tanggal_mulai']) ? $_GET['tanggal_mulai'] : date('Y-m-d');
$tanggal_selesai = isset($_GET['tanggal_selesai']) ? $_GET['tanggal_selesai'] : date('Y-m-d');

try {
    ob_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                padding: 8px;
            }
            table.bordered th, table.bordered td {
                border: 1px solid black;
            }
            table.bordered th {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <table class="table">
            <colgroup>
                <col style="width: 20%">
                <col style="width: 65%">
                <col style="width: 15%">
            </colgroup>
            <tr>
                <td style="text-align: right; padding-right: 20px;">
                    <img src="../assets/img/banjar.png" height="110" alt="" class="gambar">
                </td>
                <td style="text-align: center; padding: 16px 48px;">
                    <span style="font-size: 16px;font-weight: bold; text-align: center ;">PEMERINTAH KABUPATEN BANJAR</span>
                    <br>
                    <span style="font-size: 20px;font-weight: bold; text-align: center ;">DINAS SOSIAL, PEMBERDAYAAN PEREMPUAN,</span>
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

        <br>
        <h2 style="text-align: center;"><u>Rekap Data Pendaftaran Peserta Baru</u></h2>
        <p style="text-align: center;">Periode: <?= date('d F Y', strtotime($tanggal_mulai)) ?> - <?= date('d F Y', strtotime($tanggal_selesai)) ?></p>
        <br>

        <table class="table bordered" style="width: 100%; margin: 0 auto;">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 30%;">Username</th>
                    <th style="width: 30%;">Status</th>
                    <th style="width: 35%;">Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = "SELECT username, role, tanggal_daftar FROM tb_user WHERE tanggal_daftar BETWEEN '$tanggal_mulai' AND '$tanggal_selesai' ORDER BY tanggal_daftar DESC";
                $result = mysqli_query($koneksi, $query);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['username']); ?></td>
                        <td><?= htmlspecialchars($row['role']); ?></td>
                        <td><?= date('d F Y', strtotime($row['tanggal_daftar'])); ?></td>
                    </tr>
                <?php 
                    }
                } else {
                    echo "<tr><td colspan='4' style='text-align: center;'>Error: " . mysqli_error($koneksi) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <br>
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
    $html2pdf->output('pendaftaran_peserta_baru.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
?>
