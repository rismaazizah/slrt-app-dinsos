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
            <li><a class="nav-link scrollto active" href="usulan.php">Usulan</a></li>
            <li><a class="nav-link scrollto" href="monitoring.php">Monitoring</a></li>
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


  </header><!-- End Header -->


  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="breadcrumbs" class="breadcrumbs section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

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

          <div class="container px-5 my-5">
            <div class="section-title">
              <h2>Usulan</h2>
            </div>

            <div class="row gx-5 justify-content-center">
              <div class="col-lg-11 col-xl-9 col-xxl-8">
                <!-- Skills Section-->
                <section>
                  <!-- Skillset Card-->
                  <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                      <!-- Professional skills list-->
                      <div class="mb-5">
                        <div class="d-flex align-items-center mb-4">
                          <div class="feature bg-info bg-gradient-info-to-secondary text-white rounded-3 me-3">
                            <i class="bx bx-layer"></i>
                          </div>
                          <h3 class="fw-bolder mb-0"><span class="text-gradient d-inline">Pilih Usulan</span></h3>
                        </div>
                        <div class="row row-cols-1 row-cols-md-3 mb-4">
                          <?php
                          include_once 'config/koneksi.php';
                          $query = "SELECT * FROM tb_usulan ORDER BY id_usulan DESC";
                          $result = mysqli_query($koneksi, $query);
                          while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                            <div class="col mb-4 ">
                              <a href="form-usulan.php?usulan_id=<?= $row['id_usulan'] ?>" style="text-decoration: none">
                                <div class="d-flex align-items-center justify-content-center text-center bg-light rounded-4 p-3 h-100">
                                  <?= $row['jenis_usulan'] ?>
                                </div>
                              </a>
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->


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