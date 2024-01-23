<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Halaman Home</title>
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

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages ">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <?php
          session_start();
          if (isset($_SESSION['login']) && $_SESSION['login'] !== null) {
          ?>
            <li><a class="nav-link scrollto " href="index.php">Home</a></li>
            <li><a class="nav-link scrollto" href="usulan.php">Usulan</a></li>
            <li><a class="nav-link scrollto active" href="monitoring.php">Monitoring</a></li>
            <li><a class="nav-link scrollto" href="konsultasi.php">Konsultasi</a></li>
            <li><a class="nav-link scrollto" href="kunjungan.php">Kunjungan</a></li>
            <li class="getstarted scrollto dropdown"><a href="#"><span><?= ucfirst($_SESSION['username']) ?></span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="profil.php?page=tampil">Profil</a></li>
                <li><a href="config/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar')">Logout</a></li>
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



  </header><!-- End Header -->


  <main id="main" class="" style="min-height: 100vh;">
    <section id="breadcrumbs" class="breadcrumbs section-bg h-100 pb-5">


      <!-- Navigation-->
      <div class="container my-5">
        <div class="section-title">
          <h2>Monitoring Perizinan Anda</h2>
        </div>

        <div class="col-12">
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


        <div class="row gx-2 justify-content-center h-100 pb-5">

          <?php
          if (isset($_SESSION['login'])) {
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

            include 'config/koneksi.php';
            $queryMasyarakat = "SELECT * FROM tb_masyarakat
          WHERE user_id = '{$_SESSION['id_user']}'";
            $resultMasyarakat = mysqli_query($koneksi, $queryMasyarakat);
            $rowMasyarakat = mysqli_fetch_assoc($resultMasyarakat);

            $queryPP = "SELECT * FROM tb_pengusulan_bantuan
          JOIN tb_usulan ON tb_pengusulan_bantuan.usulan_id = tb_usulan.id_usulan
          WHERE tb_pengusulan_bantuan.masyarakat_id = '{$rowMasyarakat['id_masyarakat']}'";
            $resultPP = mysqli_query($koneksi, $queryPP);
          }
          ?>

          <?php
          while ($row = mysqli_fetch_assoc($resultPP)) {
          ?>
            <div class="col-md-4 mb-2">
              <div class="card shadow border-0 rounded-4 card-body" style="min-height: 20rem;">
                <table>
                  <tr>
                    <th style="width: 220px;">Nomor Pengusulan</th>
                    <th style="width: 50px;">:</th>
                    <td>
                      <?= $row['nomor_pengusulan'] ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="width: 220px;">Jenis Usulan</th>
                    <th style="width: 50px;">:</th>
                    <td>
                      <?= $row['jenis_usulan'] ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="width: 220px;">Tanggal Pengajuan</th>
                    <th style="width: 50px;">:</th>
                    <td>
                      <?= tgl_indo($row['tgl_pengajuan']); ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="width: 220px;">Kelengkapan Berkas</th>
                    <th style="width: 50px;">:</th>
                    <td>
                      <?php
                      if ($row['kelengkapan_berkas'] == 1) {
                      ?>
                        <div class="badge badge-success" style=" background: #00b400;"> Lengkap</div>
                      <?php
                      } elseif ($row['kelengkapan_berkas'] == 0) {
                      ?>
                        <div class="badge badge-danger" style="background: #dc3545;"> Belum Lengkap</div>
                      <?php
                      }
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="width: 220px;">Status</th>
                    <th style="width: 50px;">:</th>
                    <td>
                      <?php
                      if ($row['status'] == 'Diterima') {
                      ?>
                        <div class="badge badge-success" style=" background: #00b400;"> Diterima</div>
                      <?php
                      } elseif ($row['status'] == 'Pending') {
                      ?>
                        <div class="badge badge-warning" style=" background: #fff000;"> Belum Diverifikasi</div>
                      <?php
                      } elseif ($row['status'] == 'Ditolak') {
                      ?>
                        <div class="badge badge-danger" style="background: #dc3545;"> Ditolak</div>
                      <?php
                      }
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <th style="width: 220px;">Keterangan</th>
                    <th style="width: 50px;">:</th>
                    <td>
                      <?= $row['keterangan_verifikasi'] !== null && $row['keterangan_verifikasi'] !== "" ? $row['keterangan_verifikasi'] : '-' ?>
                    </td>
                  </tr>
                  <?php
                  if ($row['kelengkapan_berkas'] == '0') {
                  ?>
                    <tr>
                      <th colspan="3" class="py-4">Upload Ulang Berkas</th>
                    </tr>
                    <tr>
                      <td colspan="3" style="padding: 1rem 0;">
                        <form action="reupload_berkas.php" method="POST" enctype="multipart/form-data" id="reupload">
                          <input type="hidden" name="id" value="<?= $row['id_pengusulan_bantuan'] ?>">
                          <div class="form-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" onchange="updateFileName(this)" name="berkas">
                              <label class="custom-file-label" for="customFile">Pilih file</label>
                            </div>
                          </div>
                        </form>
                      </td>
                    </tr>
                  <?php



                  } elseif ($row['kelengkapan_berkas'] == '1') {
                  ?>
                    <tr>
                      <th style="width: 220px;">Kelengkapan Berkas</th>
                      <th style="width: 50px;">:</th>
                      <td>
                        <a href="<?= $row['file_berkas'] ?>" class="btn btn-info form-control" target="_blank" style="width: 200px;">Lihat File</a>
                      </td>
                    </tr>
                    <!-- <tr>
                      <td colspan="3" style="padding: 1rem 0;">
                        <form action="reupload_berkas.php" method="POST" enctype="multipart/form-data" id="reupload">
                          <input type="hidden" name="id" value="<?= $row['id_pengusulan_bantuan'] ?>">
                          <div class="form-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" onchange="updateFileName(this)" name="berkas">
                              <label class="custom-file-label" for="customFile">Pilih file</label>
                            </div>
                          </div>
                        </form>
                      </td>
                    </tr> -->
                  <?php
                  }
                  ?>
                </table>
                <div class="d-flex align-bottom justify-content-end mt-4" style="height: 100% !important;">
                  <?php
                  if ($row['status'] == 'Diterima') {

                  ?>
                    <div class="d-flex justify-content-end align-items-end gap-2">


                      <a href="exportDaftar.php?id_pengusulan_bantuan=<?= $row['id_pengusulan_bantuan'] ?>" class="btn btn-danger mr-2" target="_blank">
                        Download
                      </a>
                    </div>

                  <?php

                  } elseif ($row['kelengkapan_berkas'] == '0') {
                  ?>
                    <button name="tambah" value="tambah" class="btn btn-primary float-end mt-4" form="reupload">Kirim</button>
                  <?php
                  } ?>



                </div>
              </div>
            </div>
          <?php
          }
          ?>

        </div>
      </div>

      </selection>
  </main><!-- End #main -->

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