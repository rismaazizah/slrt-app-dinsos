<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Form Usulan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/banjar.png" rel="icon">
  <link href="assets/img/banjar.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/library/Arsha/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/library/Arsha/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/library/Arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/library/Arsha/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/library/Arsha/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/library/Arsha/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/library/Arsha/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/library/Arsha/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <?php
          session_start();
          if (isset($_SESSION['login']) && $_SESSION['login'] !== null) {
          ?>
            <li><a class="nav-link scrollto " href="index.php">Home</a></li>
            <li><a class="nav-link scrollto active" href="usulan.php">Usulan</a></li>
            <li><a class="nav-link scrollto" href="monitoring.php">Monitoring</a></li>
            <li><a class="nav-link scrollto " href="konsultasi.php">Konsultasi</a></li>
            <li><a class="nav-link scrollto" href="kunjungan.php">Kunjungan</a></li>
            <li class="getstarted scrollto dropdown"><a href="#"><span><?= ucfirst($_SESSION['username']) ?></span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="profil.php?page=tampil">Profil</a></li>
                <li><a href="config/logout.php">Logout</a></li>
                <!-- <li><a href="#" data-toggle="modal" data-target="#logoutModal">Logout</a></li> -->
            </li>
        </ul>
        </li>

      <?php
          } else {
      ?>
        <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
        <li><a class="nav-link scrollto" href="usulan.php">Usulan</a></li>
        <li><a class="getstarted scrollto" href="login.php">Login</a></li>
      <?php
          }
      ?>
      </ul>

      </nav><!-- .navbar -->

    </div>


  </header>
  <!-- End Header -->

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
  $harini = tgl_indo(date('Y-m-d'));
  if (!isset($_GET['usulan_id'])) {
    header("Location: pilih-usulan.php");
  } else {
    if ($_GET['usulan_id'] == null) {
      header("Location: pilih-usulan.php");
    } else {
      include_once 'config/koneksi.php';
      $usulan_id = $_GET['usulan_id'];
      // get data from database
      $query = "SELECT * FROM tb_usulan
          WHERE id_usulan = '$usulan_id'";
      $result = mysqli_query($koneksi, $query);
      $row = mysqli_fetch_assoc($result);

      if (isset($_SESSION['login'])) {
        $queryMasyarakat = "SELECT * FROM tb_masyarakat
            WHERE user_id = '{$_SESSION['id_user']}'";
        $resultMasyarakat = mysqli_query($koneksi, $queryMasyarakat);
        $rowMasyarakat = mysqli_fetch_assoc($resultMasyarakat);
      }
    }
  }
  ?>

  <main id="main" class="" style="min-height: 100vh;">
    <section id="breadcrumbs" class="breadcrumbs section-bg h-100 pb-5">
      <div class="container">
        <div class="row mt-5">

          <div class="col-7">
            <?php
            if (isset($_SESSION['result'])) {
              if ($_SESSION['result'] == 'success') {
            ?>
                <!-- Success -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?= $_SESSION['message'] ?></strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!-- Success -->
              <?php
              } else {
              ?>
                <!-- danger -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?= $_SESSION['message'] ?></strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!-- danger -->
            <?php
              }
              unset($_SESSION['result']);
              unset($_SESSION['message']);
            }
            ?>

          </div>

          <div class="col-7">
            <div class="card card-body">
              <h4 class="mb-5">
                <span class="fw-normal"> </span> <?= $row['jenis_usulan'] ?>
              </h4>

              <div class="d-flex justify-content-between">
                <h4 class="mb-4">
                  Isi Data
                </h4>
                <div>
                  <span>Tanggal Pengajuan</span>
                  <h6 id="tglx">
                    <?= $harini ?>
                  </h6>
                </div>
              </div>

              <form action="proses_usulan.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="usulan_id" value="<?= $row['id_usulan'] ?>">
                <input type="hidden" name="masyarakat_id" value="<?= $rowMasyarakat['id_masyarakat'] ?>">

                <div class="form-group mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" name="nama_pengusul" placeholder="Nama ...">
                </div>

                <div class="row mb-3">
                  <div class="col-6">
                    <div class="form-group ">
                      <label class="form-label">Nomor Kartu Keluarga</label>
                      <input type="text" class="form-control" name="kk_pengusul" placeholder="Nomor Kartu Keluarga ..." minlength="16" maxlength="16">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group ">
                      <label class="form-label">Nomor Induk Kependudukan</label>
                      <input type="text" class="form-control" name="nik_pengusul" placeholder="Nomor Induk Kependudukan ..." minlength="16" maxlength="16">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-label">Tempat lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir_pengusul" placeholder="Tempat lahir ...">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-label">Tanggal lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir_pengusul" placeholder="Tanggal lahir ...">
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="form-label">Jenis Kelamin</label>
                      <select name="jenis_kelamin_pengusul" class="form-select" required>
                        <option>Pilih ...</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>Agama</label>
                      <select name="agama_pengusul" class="form-select" required>
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

                <div class="form-group mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea name="alamat_pengusul" rows="4" class="form-control" placeholder=""></textarea>
                </div>

                <div class="row mb-3">
                  <div class="col-2">
                    <div class="form-group ">
                      <label class="form-label">RT</label>
                      <input type="text" class="form-control" name="rt_pengusul" placeholder="RT ..." maxlength="3">
                    </div>
                  </div>
                  <div class="col-2">
                    <div class="form-group ">
                      <label class="form-label">RW</label>
                      <input type="text" class="form-control" name="rw_pengusul" placeholder="RW ..." maxlength="3">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group ">
                      <label class="form-label">Kelurahan / Desa</label>
                      <input type="text" class="form-control" name="desa_pengusul" placeholder="Desa ...">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group ">
                      <label>Kecamatan</label>
                      <select name="kecamatan_pengusul" class="form-select" required>
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

                <div class="row mb-3">
                  <div class="col-6">
                    <div class="form-group ">
                      <label class="form-label">Kode Pos</label>
                      <input type="text" class="form-control" name="kode_pos_pengusul" placeholder="Kode Pos ...">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group ">
                      <label>Status Hubungan Dalam Keluarga</label>
                      <select name="status_hubungan_pengusul" class="form-select" required>
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


                <div class="row mb-3">
                  <div class="col-12">
                    <div class="form-group">
                      <label class="form-label">Berkas Persyaratan</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" onchange="updateFileName(this)" name="berkas">
                        <label class="custom-file-label" for="customFile">Pilih file</label>
                      </div>
                      <small class="form-text">
                        <span class="text-danger">*</span>
                        Silahkan upload file pdf, dengan semua persyaratan digabung jadi satu
                      </small>
                    </div>
                  </div>
                </div>

                <?php
                if (isset($_SESSION['login'])) {
                ?>
                  <button name="tambah" value="tambah" class="btn btn-info float-end mt-4">Daftar</button>
                <?php
                } else {
                ?>
                  <a class="btn btn-info float-end mt-4" href="login.php">Login</a>
                <?php
                }
                ?>


              </form>
            </div>
          </div>

          <div class="col-5">
            <div class="card card-body">
              <h5>Kriteria</h5>
              <?= $row['kriteria'] ?>
              <h5>Persyaratan</h5>
              <?= $row['persyaratan'] ?>
              <h5>Keterangan</h5>
              <?= $row['keterangan'] ?>
            </div>
          </div>

        </div>
      </div>
  </main>


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>S L R T - App</span></strong>. Dinas Sosial P3AP2KB Kabupaten Banjar
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/library/Arsha/assets/vendor/aos/aos.js"></script>
  <script src="assets/library/Arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/library/Arsha/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/library/Arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/library/Arsha/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/library/Arsha/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/library/Arsha/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/library/Arsha/assets/js/main.js"></script>

</body>

</html>