<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Halaman Daftar Masyarakat</title>

  <!-- Custom fonts for this template-->
  <link href="assets/library/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/library/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-8 col-12">

      <div class="row">
        <div class="col-12 mt-5">

          <?php
          session_start();
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

      <div class="card shadow border-0 rounded-4">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">

            <div class="col-lg-12 ">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Daftar Masyarakat</h1>
                </div>
                <form class="user" action="config/register_proses.php" method="POST">
                  <div class="form-group mb-2">
                    <label>Nomor Kartu Keluarga </label>
                    <input type="text" name="no_kk" class="form-control " required placeholder="Nomor Kartu Keluarga" minlength="16" maxlength="16">
                  </div>
                  <div class="form-group mb-2">
                    <label>Nomor Induk Kependudukan </label>
                    <input type="text" name="nik" class="form-control " required placeholder="Nomor Induk Kependudukan" minlength="16" maxlength="16">
                  </div>
                  <div class="form-group mb-2">
                    <label>Nama </label>
                    <input type="text" name="nama" class="form-control " required placeholder="Nama">
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group mb-2">
                        <label>Tempat Lahir </label>
                        <input type="text" name="tempat_lahir" class="form-control " required placeholder="Tempat Lahir">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group mb-2">
                        <label>Tanggal Lahir </label>
                        <input type="date" name="tanggal_lahir" class="form-control " required placeholder="Tanggal Lahir">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group mb-2">
                        <label>Jenis Kelamin </label>
                        <select name="jenis_kelamin" class="form-control ">
                          <option value="">Pilih ...</option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group mb-2">
                        <label>Agama </label>
                        <select name="agama" class="form-control " required>
                          <option value="">Pilih ...</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Konghucu">Konghucu</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-2">
                    <label>Alamat </label>
                    <textarea name="alamat" class="form-control" rows="4"></textarea>
                  </div>

                  <div class="row">
                    <div class="col-2">
                      <div class="form-group mb-2">
                        <label class="form-label">RT</label>
                        <input type="text" class="form-control " name="rt" placeholder="RT ..." maxlength="3">
                      </div>
                    </div>
                    <div class="col-2">
                      <div class="form-group mb-2">
                        <label class="form-label">RW</label>
                        <input type="text" class="form-control " name="rw" placeholder="RW ..." maxlength="3">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group mb-2">
                        <label class="form-label">Kelurahan / Desa</label>
                        <input type="text" class="form-control " name="desa" placeholder="Kelurahan / Desa ...">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group mb-2">
                        <label>Kecamatan</label>
                        <select name="kecamatan" class="form-control " required>
                          <option>Pilih ...</option>
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
                    </div>
                  </div>

                  <div class="row ">
                    <div class="col-6">
                      <div class="form-group mb-2">
                        <label class="form-label">Kode Pos</label>
                        <input type="text" class="form-control " name="kode_pos" placeholder="Kode Pos ...">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group mb-2">
                        <label>Status Hubungan Dalam Keluarga</label>
                        <select name="status_hubungan" class="form-control " required>
                          <option value="">Pilih ...</option>
                          <option value="Kepala Keluarga">Kepala Keluarga</option>
                          <option value="Suami">Suami</option>
                          <option value="Istri">Istri</option>
                          <option value="Anak">Anak</option>
                          <option value="Menantu">Menantu</option>
                          <option value="Orang Tua">Orang Tua</option>
                          <option value="Mertua">Mertua</option>
                          <option value="Famili Lain">Famili Lain</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row ">
                    <div class="col-6">
                      <div class="form-group mb-2">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control " name="no_hp" placeholder="Nomor Telepon ..." minlength="13" maxlength="13">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group mb-2">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control " name="email" placeholder="Email ...">
                      </div>
                    </div>
                  </div>


                  <hr>
                  <div class="form-group mb-2">
                    <label>Username </label>
                    <input type="text" name="username" class="form-control " required placeholder="Username ...">
                  </div>
                  <div class="form-group mb-2">
                    <label>Password </label>
                    <input type="password" name="password" class="form-control " required placeholder="Password ...">
                  </div>
                  <div class="d-flex w-100 justify-content-center align-content-center">
                    <button type="submit" class="btn btn-info btn-user w-100 text-center">Daftar</button>
                  </div>
                  <hr>
                  <div class="d-flex w-100 justify-content-center align-content-center mt-2">
                    <p class="small">
                      Sudah Punya Akun? Login <a href="login.php">Disini</a>
                    </p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/library/sbadmin/vendor/jquery/jquery.min.js"></script>
  <script src="assets/library/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/library/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/library/sbadmin/js/sb-admin-2.min.js"></script>

</body>

</html>