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
            <li><a class="nav-link scrollto" href="usulan.php">Usulan</a></li>
            <li><a class="nav-link scrollto" href="monitoring.php">Monitoring</a></li>
            <li><a class="nav-link scrollto active" href="konsultasi.php">Konsultasi</a></li>
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

  <!-- Navigation-->

  <main id="main" class="" style="height: 100vh;">
    <section id="breadcrumbs" class="breadcrumbs section-bg h-100">
      <div class="container" data-aos="fade-up">

        <div class="row mt-5">
          <div class="col-lg-12">
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
        </div>

        <?php
        if (isset($_SESSION['login'])) {
          include 'config/koneksi.php';
          $queryMasyarakat = "SELECT * FROM tb_masyarakat
          WHERE user_id = '{$_SESSION['id_user']}'";
          $resultMasyarakat = mysqli_query($koneksi, $queryMasyarakat);
          $rowMasyarakat = mysqli_fetch_assoc($resultMasyarakat);

          $queryKonsul = "SELECT * FROM tb_konsultasi
          WHERE masyarakat_id = '{$rowMasyarakat['id_masyarakat']}'";
          $resultKonsul = mysqli_query($koneksi, $queryKonsul);
        }
        ?>

        <div class="container my-5">
          <div class="section-title">
            <h2>Konsultasi</h2>
          </div>

          <div class="row gx-5 justify-content-center">


            <div class="col-8">
              <div class="card shadow border-0 rounded-4 card-body">
                <form action="proses_konsultasi.php" method="post">

                  <input type="hidden" name="masyarakat_id" value="<?= $rowMasyarakat['id_masyarakat'] ?>">

                  <table>
                    <tr>
                      <th>Nama</th>
                      <th>:</th>
                      <th><?= $rowMasyarakat['nama'] ?></th>
                    </tr>
                  </table>

                  <br>
                  <br>

                  <div class="form-group">
                    <label class="form-label">Perihal</label>
                    <textarea name="perihal" rows="8" class="form-control"></textarea>
                  </div>

                  <?php
                  if (isset($_SESSION['login'])) {
                  ?>
                    <button name="tambah" value="tambah" class="btn btn-primary float-end mt-4">Kirim</button>
                  <?php
                  } else {
                  ?>
                    <a class="btn btn-primary float-end mt-4" href="login.php">Login</a>
                  <?php
                  }
                  ?>
                </form>
              </div>
            </div>

            <div class="col-4">
              <div class="card shadow border-0 rounded-4 card-body mb-2" style="max-height: 500px;overflow-y: scroll;">
                <h6>List Konsultasi</h6>
                <hr>
                <?php
                while ($rowKonsul = mysqli_fetch_assoc($resultKonsul)) {
                ?>
                  <h4 class="d-flex justify-content-between"><?= $rowKonsul['perihal'] ?>
                    <a href="histori_konsultasi.php?id_konsultasi=<?= $rowKonsul['id_konsultasi'] ?>" class="btn btn-info">Detail</a>
                  </h4>
                  <hr>

                <?php
                }
                ?>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <!-- <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="col-lg-6">
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

<!-- </section> -->
<!-- End Contact Section -->


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