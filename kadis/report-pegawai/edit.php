<?php
include '../config/koneksi.php';
// get id from url
if (!isset($_GET['id_pegawai'])) {
  header("Location: pegawai.php");
} else {
  $id_pegawai = $_GET['id_pegawai'];
  // get data from database
  $query = "SELECT * FROM tb_pegawai
    JOIN tb_user ON tb_user.id_user = tb_pegawai.user_id 
    WHERE tb_pegawai.id_pegawai = '$id_pegawai'";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Edit Pegawai </h1>

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
      <div class="col-12">
        <form action="pegawai.php?page=proses" method="post">
          <input type="hidden" name="id_pegawai" value="<?= $id_pegawai ?>">
          <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">


          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>NIK / NIP</label>
                <input type="text" class="form-control" name="nik_nip" required placeholder="NIK / NIP" value="<?= $row['nik_nip'] ?>" minlength="16" maxlength="16">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="nama_pegawai">Nama</label>
                <input type="text" class="form-control" name="nama_pegawai" required placeholder="Nama Pegawai" value="<?= $row['nama_pegawai'] ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" required placeholder="Tempat Lahir" value="<?= $row['tempat_lahir'] ?>">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" required placeholder="Tanggal Lahir" value="<?= $row['tanggal_lahir'] ?>">
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control select2" id="jenis_kelamin" name="jenis_kelamin">
                  <option>Pilih ...</option>
                  <option value="Laki-laki" <?= $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                  <option value="Perempuan" <?= $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label>Agama</label>
                <select class="form-control select2" id="agama" name="agama">
                  <option value="">Pilih ...</option>
                  <option value="Islam" <?= $row['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                  <option value="Kristen" <?= $row['agama'] == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                  <option value="Hindu" <?= $row['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                  <option value="Budha" <?= $row['agama'] == 'Budha' ? 'selected' : '' ?>>Budha</option>
                  <option value="Konghucu" <?= $row['agama'] == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                  <option value="Lainnya" <?= $row['agama'] == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                </select>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control textarea" name="alamat" rows="6"><?= $row['alamat'] ?></textarea>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control select2" id="jabatan" name="jabatan">
                  <option>Pilih ...</option>
                  <option value="Petugas SLRT" <?= $row['jabatan'] == 'Petugas SLRT' ? 'selected' : '' ?>>Petugas SLRT</option>
                  <option value="Petugas Supervisor" <?= $row['jabatan'] == 'Petugas Supervisor' ? 'selected' : '' ?>>Petugas Supervisor</option>
                  <option value="Petugas Fasilitator" <?= $row['jabatan'] == 'Petugas Fasilitator' ? 'selected' : '' ?>>Petugas Fasilitator</option>
                </select>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label>Tempat Tugas</label>
                <select class="form-control select2" id="tempat_tugas" name="tempat_tugas">
                  <option>Pilih ...</option>
                  <option value="Kecamatan Aluh-Aluh" <?= $row['tempat_tugas'] == 'Kecamatan Aluh-Aluh' ? 'selected' : '' ?>>Kecamatan Aluh-Aluh</option>
                  <option value="Kecamatan Aranio" <?= $row['tempat_tugas'] == 'Kecamatan Aranio' ? 'selected' : '' ?>>Kecamatan Aranio</option>
                  <option value="Kecamatan Astambul" <?= $row['tempat_tugas'] == 'Kecamatan Astambul' ? 'selected' : '' ?>>Kecamatan Astambul</option>
                  <option value="Kecamatan Beruntung Baru" <?= $row['tempat_tugas'] == 'Kecamatan Beruntung Baru' ? 'selected' : '' ?>>Kecamatan Beruntung Baru</option>
                  <option value="Kecamatan Cintapuri Darussalam" <?= $row['tempat_tugas'] == 'Kecamatan Cintapuri Darussalam' ? 'selected' : '' ?>>Kecamatan Cintapuri Darussalam</option>
                  <option value="Kecamatan Gambut" <?= $row['tempat_tugas'] == 'Kecamatan Gambut' ? 'selected' : '' ?>>Kecamatan Gambut</option>
                  <option value="Kecamatan Karang Intan" <?= $row['tempat_tugas'] == 'Kecamatan Karang Intan' ? 'selected' : '' ?>>Kecamatan Karang Intan</option>
                  <option value="Kecamatan Kertak Hanyar" <?= $row['tempat_tugas'] == 'Kecamatan Kertak Hanyar' ? 'selected' : '' ?>>Kecamatan Kertak Hanyar</option>
                  <option value="Kecamatan Martapura" <?= $row['tempat_tugas'] == 'Kecamatan Martapura' ? 'selected' : '' ?>>Kecamatan Martapura</option>
                  <option value="Kecamatan Martapura Barat" <?= $row['tempat_tugas'] == 'Kecamatan Martapura Barat' ? 'selected' : '' ?>>Kecamatan Martapura Barat</option>
                  <option value="Kecamatan Martapura Timur" <?= $row['tempat_tugas'] == 'Kecamatan Martapura Timur' ? 'selected' : '' ?>>Kecamatan Martapura Timur</option>
                  <option value="Kecamatan Mataraman" <?= $row['tempat_tugas'] == 'Kecamatan Mataraman' ? 'selected' : '' ?>>Kecamatan Mataraman</option>
                  <option value="Kecamatan Paramasan" <?= $row['tempat_tugas'] == 'Kecamatan Paramasan' ? 'selected' : '' ?>>Kecamatan Paramasan</option>
                  <option value="Kecamatan Pengaron" <?= $row['tempat_tugas'] == 'Kecamatan Pengaron' ? 'selected' : '' ?>>Kecamatan Pengaron</option>
                  <option value="Kecamatan Sambung Makmur" <?= $row['tempat_tugas'] == 'Kecamatan Sambung Makmur' ? 'selected' : '' ?>>Kecamatan Sambung Makmur</option>
                  <option value="Kecamatan Simpang Empat" <?= $row['tempat_tugas'] == 'Kecamatan Simpang Empat' ? 'selected' : '' ?>>Kecamatan Simpang Empat</option>
                  <option value="Kecamatan Sungai Pinang" <?= $row['tempat_tugas'] == 'Kecamatan Sungai Pinang' ? 'selected' : '' ?>>Kecamatan Sungai Pinang</option>
                  <option value="Kecamatan Sungai Tabuk" <?= $row['tempat_tugas'] == 'Kecamatan Sungai Tabuk' ? 'selected' : '' ?>>Kecamatan Sungai Tabuk</option>
                  <option value="Kecamatan Tatah Makmur" <?= $row['tempat_tugas'] == 'Kecamatan Tatah Makmur' ? 'selected' : '' ?>>Kecamatan Tatah Makmur</option>
                  <option value="Kecamatan Telaga Bauntung" <?= $row['tempat_tugas'] == 'Kecamatan Telaga Bauntung' ? 'selected' : '' ?>>Kecamatan Telaga Bauntung</option>
                </select>
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" class="form-control" name="no_hp" required placeholder="Nomor Telepon" value="<?= $row['no_hp'] ?>">
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" required placeholder="Email" value="<?= $row['email'] ?>">
              </div>
            </div>

            <div class="card card-body">

              <h4>Kredensial</h4>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" required placeholder="Username" value="<?= $row['username'] ?>">
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="text-xs form-text">
                      <span class="text-danger">*</span>
                      Opsional</span>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <button name="update" value="update" class="btn btn-info">Simpan</button>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>

</div>

<!-- /.container-fluid -->