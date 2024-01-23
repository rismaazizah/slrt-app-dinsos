<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profil</title>
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
            <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
            <li><a class="nav-link scrollto" href="usulan.php">Usulan</a></li>
            <li><a class="nav-link scrollto" href="monitoring.php">Monitoring</a></li>
            <li><a class="nav-link scrollto" href="konsultasi.php">Konsultasi</a></li>
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

  </header><!-- End Header -->

  <main id="main" class="" style="height: 100vh;">
    <section id="breadcrumbs" class="breadcrumbs section-bg h-100">
      <!-- Begin Page Content -->
      <div class="container">

        <?php
        include_once 'config/koneksi.php';
        $id_user = $_SESSION['id_user'];
        $qry = "SELECT * FROM tb_user WHERE id_user = '$id_user'";
        $result = mysqli_query($koneksi, $qry);
        $data = mysqli_fetch_assoc($result);
        ?>

        <!-- Page Heading -->
        <div class="container my-5">
          <div class="section-title">
            <h2>Edit Profil</h2>
          </div>

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
              <div class="card card-body">
                <form action="profil.php?page=proses" method="post">

                  <table class="table table-bordered">
                    <tr>
                      <label>Username</label>
                      <input type="text" class="form-control" id="username" name="username" required placeholder="Username" value="<?= $data['username'] ?>">
                    </tr>
                    <tr>
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                    </tr>
                  </table>
                  <div class="row">
                    <div class="col-12">
                      <button name="update" value="update" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- /.container-fluid -->
      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
      </button> -->

    </section><!-- End Breadcrumbs -->

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