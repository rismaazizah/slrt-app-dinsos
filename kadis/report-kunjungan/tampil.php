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
  <h1 class="h3 mb-4 text-gray-800">Rekap Data Kunjungan</h1>

  <div class="card card-body">
    <div class="row">
      <div class="col-12 d-flex justify-content-between">
        <!-- <a href="report-kunjungan.php?page=tambah" class="btn btn-primary">Tambah Data</a> -->
        <a href="report-kunjungan.php?page=export" class="btn btn-info" target="_blank">Print Data</a>
      </div>
    </div>
  </div>

  <div class="card card-body mt-2">
    <div class="row">
      <div class="col-12">
        <form action="" method="GET">
          <input type="hidden" name="page" value="tampil">
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="start_date">Tanggal Awal</label>
              <input type="date" class="form-control" id="start_date" name="start_date" value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : '' ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="end_date">Tanggal Akhir</label>
              <input type="date" class="form-control" id="end_date" name="end_date" value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : '' ?>">
            </div>
            <div class="form-group col-md-3">
              <label for="status">Status</label>
              <select class="form-control" id="status" name="status">
                <option value="">Semua</option>
                <option value="Pending" <?= (isset($_GET['status']) && $_GET['status'] == 'Pending') ? 'selected' : '' ?>>Menunggu Verifikasi</option>
                <option value="Disetujui" <?= (isset($_GET['status']) && $_GET['status'] == 'Disetujui') ? 'selected' : '' ?>>Disetujui</option>
                <option value="Dibatalkan" <?= (isset($_GET['status']) && $_GET['status'] == 'Dibatalkan') ? 'selected' : '' ?>>Dibatalkan</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label>&nbsp;</label>
              <button type="submit" class="btn btn-primary btn-block">Filter</button>
            </div>
          </div>
        </form>
      </div>
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
      <div class="col-12">
        <?php if (isset($_GET['start_date']) || isset($_GET['end_date']) || isset($_GET['status'])): ?>
          <a href="?page=tampil" class="btn btn-secondary mb-3">Reset</a>
        <?php endif; ?>
        <table class="table table-bordered" id="mytable" style="width: 100%;">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Masyarakat</th>
              <th>Keperluan</th>
              <th>Bertemu dengan</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Status</th>
              <!-- <th style="width: 150px;" class="not-export-col">Aksi</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
            include_once '../config/koneksi.php';
            $no = 1;
            $query = "SELECT * FROM tb_kunjungan AS k
            JOIN tb_masyarakat AS m ON k.masyarakat_id = m.id_masyarakat
            JOIN tb_pegawai AS p ON k.pegawai_id = p.id_pegawai
            WHERE 1=1";

            if (isset($_GET['start_date']) && $_GET['start_date'] != '') {
              $query .= " AND k.tanggal >= '" . $_GET['start_date'] . "'";
            }
            if (isset($_GET['end_date']) && $_GET['end_date'] != '') {
              $query .= " AND k.tanggal <= '" . $_GET['end_date'] . "'";
            }
            if (isset($_GET['status']) && $_GET['status'] != '') {
              $query .= " AND k.status = '" . $_GET['status'] . "'";
            }

            $query .= " ORDER BY k.id_kunjungan DESC";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['keperluan']; ?></td>
                <td><?= $row['nama_pegawai']; ?></td>
                <td><?= tgl_indo($row['tanggal']); ?></td>
                <td><?= $row['keterangan']; ?></td>
                <td>
                  <?php
                  if ($row['status'] == 'Pending') {
                  ?>
                    <div class="badge badge-warning py-2 px-3">Menunggu Verifikasi</div>
                  <?php
                  } elseif (($row['status'] == 'Disetujui')) {
                  ?>
                    <div class="badge badge-success py-2 px-3">Disetujui</div>
                  <?php
                  } elseif (($row['status'] == 'Dibatalkan')) {
                  ?>
                    <div class="badge badge-danger py-2 px-3">Dibatalkan</div>
                  <?php
                  }
                  ?>
                </td>
                <!-- <td class="not-export-col">
                  <a href="report-kunjungan.php?page=edit&id_kunjungan=<?= $row['id_kunjungan']; ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="report-kunjungan.php?page=hapus&id_kunjungan=<?= $row['id_kunjungan']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data')">Hapus</a>
                </td> -->
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->