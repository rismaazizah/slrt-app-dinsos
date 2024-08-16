<title>Pegawai</title>

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

 include '../config/koneksi.php';
 // get id from url
 if (!isset($_GET['id_pengusulan_bantuan'])) {
   header("Location: pengusulan_bantuan.php");
 } else {
   $id_pengusulan_bantuan = $_GET['id_pengusulan_bantuan'];
   // get data from database
   $query = "SELECT * FROM tb_pengusulan_bantuan
   JOIN tb_masyarakat ON tb_pengusulan_bantuan.masyarakat_id = tb_masyarakat.id_masyarakat
   JOIN tb_usulan ON tb_pengusulan_bantuan.usulan_id = tb_usulan.id_usulan
   WHERE tb_pengusulan_bantuan.id_pengusulan_bantuan = '$id_pengusulan_bantuan'";
   $result = mysqli_query($koneksi, $query);
   $row = mysqli_fetch_assoc($result);
 }

 ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Pengusulan Bantuan</h1>

  <div class="row">
    <div class="col-8">
      <div class="card card-body">
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
        </div>
        <form action="pengusulan-bantuan.php?page=proses" method="post">
          <input type="hidden" name="id_pengusulan_bantuan" value="<?= $id_pengusulan_bantuan ?>">
          <input type="hidden" name="pegawai_id" value="<?= $_SESSION['id_pegawai'] ?>">

          <table class="table table-bordered">
            <tr>
              <th style="width: 300px;">Nama Pemohon</th>
              <td><?= $row['nama'] ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Jenis Pengusulan</th>
              <td><?= $row['jenis_usulan'] ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Tanggal Pengajuan</th>
              <td><?= tgl_indo($row['tgl_pengajuan']); ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Nomor Kartu Keluarga</th>
              <td><?= $row['no_kk'] ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Nomor Induk Kependudukan</th>
              <td><?= $row['nik'] ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Tempat, Tanggal Lahir</th>
              <td><?= $row['tempat_lahir'] . ', ' . tgl_indo($row['tanggal_lahir']); ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Jenis Kelamin</th>
              <td><?= $row['jenis_kelamin'] ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Agama</th>
              <td><?= $row['agama'] ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Alamat</th>
              <td><?= $row['alamat'] . ' RT. ' . ($row['rt']) . ' RW. ' . ($row['rw']) . ', ' . ($row['desa']); ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Kecamatan</th>
              <td><?= $row['kecamatan'] ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Kode Pos</th>
              <td><?= $row['kode_pos'] ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Status Hubungan</th>
              <td><?= $row['status_hubungan'] ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Nomor Telepon</th>
              <td><?= $row['no_hp'] ?></td>
            </tr>
            <tr>
              <th style="width: 300px;">Email</th>
              <td><?= $row['email'] ?></td>
            </tr>

          </table>

          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control select2" required>
                  <option>Pilih ...</option>
                  <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                  <option value="Diterima" <?= $row['status'] == 'Diterima' ? 'selected' : '' ?>>Diterima</option>
                  <option value="Ditolak" <?= $row['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label>Kelengkapan Berkas</label>
                <select name="kelengkapan_berkas" class="form-control select2" required>
                  <option>Pilih ...</option>
                  <option value="0" <?= $row['kelengkapan_berkas'] == 0 ? 'selected' : '' ?>>Belum Lengkap</option>
                  <option value="1" <?= $row['kelengkapan_berkas'] == 1 ? 'selected' : '' ?>>Sudah Lengkap</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label>Jenis Rujukan</label>
                <select name="jenis_rujukan" class="form-control select2" required>
                  <option value="">Pilih ...</option>
                  <option value="1" <?= $row['jenis_rujukan'] == '1' ? 'selected' : '' ?>>Rumah Sakit</option>
                  <option value="2" <?= $row['jenis_rujukan'] == '2' ? 'selected' : '' ?>>Sekolah</option>
                  <option value="3" <?= $row['jenis_rujukan'] == '3' ? 'selected' : '' ?>>Kampus</option>
                  <option value="4" <?= $row['jenis_rujukan'] == '4' ? 'selected' : '' ?>>Badan Amil Zakat Nasional (BAZNAS)</option>
                  <option value="5" <?= $row['jenis_rujukan'] == '5' ? 'selected' : '' ?>>Badan Pengelolaan Keuangan dan Aset Daerah (BPKAD)</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label>Keterangan Verifikasi</label>
                <textarea class="form-control textarea" name="keterangan_verifikasi" rows="8"><?= $row['keterangan_verifikasi'] ?></textarea>
              </div>
            </div>
          </div>

          <button name="update" value="update" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>

    <div class="col-4">
      <div class="card card-body">
        <h5>Persyaratan</h5>
        <?= $row['persyaratan'] ?>
        <h5>Keterangan</h5>
        <?= $row['keterangan'] ?>
      </div>
    </div>
  </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
  tinymce.init({
    selector: '.textarea',
  });
</script>
<!-- /.container-fluid -->