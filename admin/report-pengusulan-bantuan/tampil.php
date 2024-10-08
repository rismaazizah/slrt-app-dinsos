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
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Rekap Data Pengusulan Bantuan </h1>

  <div class="card card-body">
    <div class="row">
      <div class="col-12 d-flex justify-content-between">
        <!-- <a href="report-pengusulan-bantuan.php?page=tambah" class="btn btn-primary">Tambah Data</a> -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
          Print Data
        </button>
      </div>
    </div>
  </div>

  <div class="card card-body mt-2">
    <div class="row">
      <div class="col-12">
        <?php
        if (isset($_SESSION['result'])) {
          if ($_SESSION['result'] == 'success') {
        ?>
            <!-- Success -->
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong><?= $_SESSION['message'] ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- Success -->
          <?php
          } else {
          ?>
            <!-- danger -->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong><?= $_SESSION['message'] ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!-- danger -->
        <?php
          }
          unset($_SESSION['result']);
          unset($_SESSION['message']);
        }
        ?>

      </div>
      <div class="col-12 mb-3">
        <form id="filterForm" method="GET">
          <div class="form-row">
            <div class="col-md-3 mb-3">
              <label for="filterType">Filter By:</label>
              <select class="form-control" id="filterType" name="filterType">
                <option value="day">Hari</option>
                <option value="month">Bulan</option>
                <option value="year">Tahun</option>
              </select>
            </div>
            <div class="col-md-3 mb-3">
              <label for="filterValue">Value:</label>
              <input type="date" class="form-control" id="filterValue" name="filterValue">
            </div>
            <div class="col-md-2 mb-3">
              <label>&nbsp;</label>
              <button type="submit" class="btn btn-primary form-control">Filter</button>
            </div>
            <div class="col-md-2 mb-3">
              <label>&nbsp;</label>
              <a href="?page=tampil" class="btn btn-secondary form-control">Reset</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-12">
        <table class="table table-bordered" id="mytable" style="width: 100%;">
          <thead>
            <tr>
              <th>No</th>
              <th>Nomor Pengusulan</th>
              <th>Nama Pemohon</th>
              <th>Jenis Usulan</th>
              <th>Status</th>
              <th>Tanggal Pengajuan</th>
              <th>Kelengkapan Berkas</th>
              <th>Jenis Rujukan</th>
              <th>Surat Rekomendasi</th>
              <th>Petugas Verifikasi</th>
              <th>BAVD</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include_once '../config/koneksi.php';
            $no = 1;
            $query = "SELECT * FROM tb_pengusulan_bantuan 
              JOIN tb_masyarakat ON tb_pengusulan_bantuan.masyarakat_id = tb_masyarakat.id_masyarakat
              JOIN tb_usulan ON tb_pengusulan_bantuan.usulan_id = tb_usulan.id_usulan";

            // Apply filter if set
            if (isset($_GET['filterType']) && isset($_GET['filterValue']) && !empty($_GET['filterValue'])) {
              $filterType = $_GET['filterType'];
              $filterValue = $_GET['filterValue'];
              
              switch ($filterType) {
                case 'day':
                  $query .= " WHERE DATE(tb_pengusulan_bantuan.tgl_pengajuan) = '$filterValue'";
                  break;
                case 'month':
                  $month = date('m', strtotime($filterValue));
                  $year = date('Y', strtotime($filterValue));
                  $query .= " WHERE MONTH(tb_pengusulan_bantuan.tgl_pengajuan) = '$month' AND YEAR(tb_pengusulan_bantuan.tgl_pengajuan) = '$year'";
                  break;
                case 'year':
                  $query .= " WHERE YEAR(tb_pengusulan_bantuan.tgl_pengajuan) = '$filterValue'";
                  break;
              }
            }

            $query .= " ORDER BY tb_pengusulan_bantuan.id_pengusulan_bantuan DESC";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_assoc($result)) {
              $q = "SELECT * FROM tb_pegawai WHERE id_pegawai = '{$row['pegawai_id']}'";
              $res = mysqli_query($koneksi, $q);
              $p = mysqli_fetch_assoc($res);
            ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nomor_pengusulan']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td>
                  <?= $row['jenis_usulan']; ?>
                </td>
                <td>
                  <?php
                  if ($row['status'] == 'Pending') {
                  ?>
                    <div class="badge badge-warning py-2 px-3">Menunggu Verifikasi</div>
                  <?php
                  } elseif (($row['status'] == 'Diterima')) {
                  ?>
                    <div class="badge badge-success py-2 px-3">Diterima</div>
                  <?php
                  } elseif (($row['status'] == 'Ditolak')) {
                  ?>
                    <div class="badge badge-danger py-2 px-3">Ditolak</div>
                  <?php
                  }
                  ?>
                </td>
                <td><?= tgl_indo($row['tgl_pengajuan']); ?></td>
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
                <td>
                  <?php
                  if ($row['jenis_rujukan'] == '0' || $row['jenis_rujukan'] == '') {
                    echo '<div class="badge badge-warning py-2 px-3">Belum Ada Rujukan</div>';
                  } elseif ($row['jenis_rujukan'] == '1') {
                    echo '<div class="badge badge-success py-2 px-3">Rumah Sakit</div>';
                  } elseif ($row['jenis_rujukan'] == '2') {
                    echo '<div class="badge badge-success py-2 px-3">Sekolah</div>';
                  } elseif ($row['jenis_rujukan'] == '3') {
                    echo '<div class="badge badge-success py-2 px-3">Kampus</div>';
                  } elseif ($row['jenis_rujukan'] == '4') {
                    echo '<div class="badge badge-success py-2 px-3">Badan Amil Zakat Nasional (BAZNAS)</div>';
                  } elseif ($row['jenis_rujukan'] == '5') {
                    echo '<div class="badge badge-success py-2 px-3">Badan Pengelolaan Keuangan dan Aset Daerah (BPKAD)</div>';
                  } else {
                    echo '<div class="badge badge-success py-2 px-3">' . $row['jenis_rujukan'] . '</div>';
                  }
                  ?>
                </td>
                <td>
                  <?php
                  if ($row['status'] == 'Diterima' && $row['kelengkapan_berkas'] == 1) {
                  ?>
                    <a href="report-pengusulan-bantuan.php?page=exportSuren&id_pengusulan_bantuan=<?= $row['id_pengusulan_bantuan']; ?>" class="btn btn-info" target="_blank">Print</a>
                  <?php
                  }
                  ?>
                </td>

                <td>
                  <?= $p ? $p['nama_pegawai'] : '-' ?>
                </td>
                <td class="not-export-col">
                  <?php
                  if ($row['status'] == 'Diterima' && $row['kelengkapan_berkas'] == 1) {
                  ?>
                    <!-- <a href="report-pengusulan-bantuan.php?page=detail&id_pengusulan_bantuan=<?= $row['id_pengusulan_bantuan']; ?>" class="btn btn-success">Detail</a> -->
                  <?php
                  } else {
                  ?>
                    <!-- <a href="report-pengusulan-bantuan.php?page=edit&id_pengusulan_bantuan=<?= $row['id_pengusulan_bantuan']; ?>" class="btn btn-warning">Edit</a> -->
                  <?php
                  }
                  ?>

                  <?php
                  if ($row['status'] == 'Pending') {
                  ?>
                    <!-- <a href="report-pengusulan-bantuan.php?page=hapus&id_pengusulan_bantuan=<?= $row['id_pengusulan_bantuan']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data')">Hapus</a> -->
                  <?php
                  } elseif ($row['status'] == 'Diterima' && $row['kelengkapan_berkas'] == 1) {
                  ?>
                    <a href="report-pengusulan-bantuan.php?page=exportSingle&id_pengusulan_bantuan=<?= $row['id_pengusulan_bantuan']; ?>" class="btn btn-info" target="_blank">Print</a>
                  <?php
                  }
                  ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cetak Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="report-pengusulan-bantuan.php" method="get" id="export" target="_blank">
          <input type="hidden" name="page" value="export">
          <div class="form-group">
            <label>Pilih Pengusulan</label>
            <select name="usulan_id" class="form-control select2" required>
              <option value="semua">Semua</option>
              <?php
              $q = "SELECT * FROM tb_usulan";
              $res = mysqli_query($koneksi, $q);
              while ($p = mysqli_fetch_assoc($res)) {
              ?>
                <option value="<?= $p['id_usulan'] ?>"><?= $p['jenis_usulan'] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Pilih Kecamatan</label>
            <select name="kecamatan_pengusul" class="form-control select2" required>
              <option>Pilih ...</option>
              <option value="semua">Semua</option>
              <option value="Kecamatan Aluh-Aluh">Kecamatan Aluh-Aluh</option>
              <option value="Kecamatan Aranio">Kecamatan Aranio</option>
              <option value="Kecamatan Astambul">Kecamatan Astambul</option>
              <option value="Kecamatan Beruntung Baru">Kecamatan Beruntung Baru</option>
              <option value="Kecamatan Cintapuri Darussalam">Kecamatan Cintapuri Darussalam</option>
              <option value="Kecamatan Gambut">Kecamatan Gambut</option>
              <option value="Kecamatan Karang Intan">Kecamatan Karang Intan</option>
              <option value="Kecamatan Kertak Hanyar">Kecamatan Kertak Hanyar</option>
              <option value="Kecamatan Martapura">Kecamatan Martapura</option>
              <option value="Kecamatan Martapura Barat">Kecamatan Martapura Barat</option>
              <option value="Kecamatan Martapura Timur">Kecamatan Martapura Timur</option>
              <option value="Kecamatan Mataraman">Kecamatan Mataraman</option>
              <option value="Kecamatan Paramasan">Kecamatan Paramasan</option>
              <option value="Kecamatan Pengaron">Kecamatan Pengaron</option>
              <option value="Kecamatan Sambung Makmur">Kecamatan Sambung Makmur</option>
              <option value="Kecamatan Simpang Empat">Kecamatan Simpang Empat</option>
              <option value="Kecamatan Sungai Pinang">Kecamatan Sungai Pinang</option>
              <option value="Kecamatan Sungai Tabuk">Kecamatan Sungai Tabuk</option>
              <option value="Kecamatan Tatah Makmur">Kecamatan Tatah Makmur</option>
              <option value="Kecamatan Telaga Bauntung">Kecamatan Telaga Bauntung</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" form="export" class="btn btn-primary">Cetak</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var filterType = document.getElementById('filterType');
    var filterValue = document.getElementById('filterValue');

    filterType.addEventListener('change', function() {
        switch(this.value) {
            case 'day':
                filterValue.type = 'date';
                break;
            case 'month':
                filterValue.type = 'month';
                break;
            case 'year':
                filterValue.type = 'number';
                filterValue.min = '1900';
                filterValue.max = new Date().getFullYear().toString();
                break;
        }
    });
});
</script>