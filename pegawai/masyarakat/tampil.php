<?php
include '../config/koneksi.php';
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
  <h1 class="h3 mb-4 text-gray-800">Masyarakat</h1>

  <!-- <div class="card card-body">
    <div class="row">
      <div class="col-12 d-flex justify-content-between">
        <a href="report-masyarakat.php?page=tambah" class="btn btn-info">Tambah Data</a>

        <div class="right">

          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
            Upload Excel
          </button>

          <a href="report-masyarakat.php?page=export" class="btn btn-info" target="_blank">Print Data</a>
        </div>
      </div>
    </div>
  </div> -->

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
      <div class="col-12">
        <table class="table table-bordered" id="mytable" style="width: 100%;">
          <thead>
            <tr>
              <th>No</th>
              <th>No KK</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Tempat, Tanggal Lahir</th>
              <th>Alamat Lengkap</th>
              <th>Kecamatan</th>
              <th>Nomor Telepon</th>
              <!-- <th style="width: 145px;" class="not-export-col">Aksi</th> -->
            </tr>
          </thead>
          <tbody>
            <?php
            include_once '../config/koneksi.php';
            $no = 1;
            $query = "SELECT * FROM tb_masyarakat 
            ORDER BY id_masyarakat DESC";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['no_kk']; ?></td>
                <td><?= $row['nik']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['tempat_lahir'] . ', ' . tgl_indo($row['tanggal_lahir']); ?></td>
                <td><?= $row['alamat'] . ' RT. ' . ($row['rt']) . ' RW. ' . ($row['rw']) . ', ' . ($row['desa']); ?></td>
                <td><?= $row['kecamatan']; ?></td>
                <td><?= $row['no_hp']; ?></td>
                <!-- <td class="not-export-col">
                  <a href="report-masyarakat.php?page=pengajuan&id_masyarakat=<?= $row['id_masyarakat']; ?>" class="btn btn-sm btn-secondary">Pengajuan</a>
                  <a href="report-masyarakat.php?page=edit&id_masyarakat=<?= $row['id_masyarakat']; ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="report-masyarakat.php?page=hapus&id_masyarakat=<?= $row['id_masyarakat']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data')">Hapus</a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Data Masyarakat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="report-masyarakat.php?page=import" method="post" enctype="multipart/form-data" id="import">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="fileExcel" name="file">
            <label class="custom-file-label" for="customFile">Pilih File Excel</label>
          </div>
        </form>
        <small class="form-text mt-2">
          <span class="text-danger">*</span>
          Harap isi format tanggal dengan format hh/bb/tttt
        </small>
        <a href="../assets/masyarakat-template.xlsx" class="badge badge-pill badge-success my-2">Download Template</a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" name="Submit" class="btn btn-success" form="import">Upload</button>
      </div>
    </div>
  </div>
</div>