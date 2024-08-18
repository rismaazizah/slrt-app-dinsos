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
  <header id="header" class="fixed-top ">
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" untuk mengakhiri sesi.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="config/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <div class="row mt-3">
    <div class="col-lg-12">
      <?php
      if (isset($_SESSION['result'])) {
        if ($_SESSION['result'] == 'success') {
          ?>
          <!-- Success -->
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <!-- Success -->
          <?php
        } else {
          ?>
          <!-- Error -->
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <!-- Error -->
          <?php
        }
        unset($_SESSION['result']);
        unset($_SESSION['message']);
      }
      ?>

    </div>
  </div>

</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h2>Selamat Datang di</h2>
        <h1>Sistem Layanan dan Rujukan Terpadu</h1>
        <div class="d-flex justify-content-center justify-content-lg-start">
          <a href="login.php" class="btn-get-started scrollto">Login</a>
          <a href="https://www.youtube.com/watch?v=vE4ouOgrj3A" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients section-bg">
    <div class="container">

      <div class="row" data-aos="zoom-in">

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/kemensos.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/1.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-4 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/banjar.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/logo.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/slrt-removebg-preview.png" class="img-fluid" alt="">
        </div>

      </div>

    </div>
  </section>
  <!-- End Cliens Section -->

  <!-- ======= Visi & Misi ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Visi & Misi
          <p>Banjar Manis</p>
        </h2>
      </div>

      <div class="row content">
        <div class="col-lg-6">
          <p>
            Terwujudnya Kabupaten Banjar Yang Maju, Mandiri dan Agamis.
          </p>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <ul>
            <li><i class="ri-check-line"></i> Peningkatan kualitas hidup dan kualitas sumber daya manusia.</li>
            <li><i class="ri-check-line"></i> Peningkatan ekonomi yang berkualitas berbasis kerakyatan dan pemerataan pembangunan daerah yang berkeadilan.</li>
            <li><i class="ri-check-line"></i> Pengelolaan lingkungan hidup yang berkelanjutan.</li>
            <li><i class="ri-check-line"></i> Penyelenggaraan kepemerintahan yang amanah, baik, bersih dan efektif.</li>
            <li><i class="ri-check-line"></i> Penguatan karakter masyarakat yang religius, berakhlak baik dan berkepribadian luhur,serta menciptakan kehidupan masyarakat yang tertib, aman, dan demokratis.</li>
          </ul>
        </div>
      </div>

    </div>
  </section>
  <!-- End Visi & Misi -->

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us section-bg">
    <div class="container-fluid" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

          <div class="content">
            <h3>Persyaratan-persyratan untuk <strong>Pengusulan Bantuan</strong></h3>
            <p>
              Jenis-jenis <b>Bantuan :</b>
            </p>
          </div>

          <div class="accordion-list">
            <ul>
              <li>
                <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Layanan Keterangan Terdaftar Data Terpadu Kesejahteraan Sosial Kementerian Sosial R.I (DTKS) <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                  <p>
                    <ul>
                      <li><i class="ri-check-line"></i> Terdata dalam Data Terpadu Kesejahteraan Sosial (DTKS) </li>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Tanda Penduduk</li>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Tanda Penduduk Kepala Keluarga</li>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Keluarga</li>
                      <li><i class="ri-check-line"></i> SSurat Keterangan Tidak Mampu yang ditanda tangani oleh Pambakal/Lurah dan diketahui Camat</li>
                      <li><i class="ri-check-line"></i> Foto Rumah (Depan, Samping dan Belakang)</li>
                    </ul>
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Layanan Rekomendasi Permohonan Bantuan Biaya Pendampingan <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    <ul>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Tanda Penduduk Pasien</li>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Tanda Penduduk Kepala Keluarga</li>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Tanda Penduduk Penanggung Jawab</li>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Keluarga</li>
                      <li><i class="ri-check-line"></i> Surat Rujukan atau Surat Kontrol Dari Puskesmas</li>
                      <li><i class="ri-check-line"></i> Surat Rawat Inap Dari Rumah Sakit</li>
                      <li><i class="ri-check-line"></i> Surat Keterangan Tidak Mampu yang ditanda tangani oleh Pambakal/Lurah dan diketahui Camat</li>
                      <li><i class="ri-check-line"></i> Foto Rumah (Depan, Belakang dan Samping)</li>
                      <li><i class="ri-check-line"></i> Materai 10.000 bagi Pasien yang tidak masuk dalam Data Terpadu Kesejahteraan Sosial (DTKS)</li>
                      <li><i class="ri-check-line"></i> Rincian Biaya</li>
                    </ul>
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Layanan Rekomendasi Permohonan Bantuan Sosial dan Ekonomi <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    <ul>
                      <li><i class="ri-check-line"></i> Rencana Anggaran Belanja</li>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Tanda Penduduk Kepala Keluarga</li>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Keluarga</li>
                      <li><i class="ri-check-line"></i> Surat Keterangan Kepemilikan Tanah</li>
                      <li><i class="ri-check-line"></i> Surat Keterangan Tidak Mampu yang ditanda tangani oleh Pambakal/Lurah dan diketahui Camat</li>
                      <li><i class="ri-check-line"></i> Foto Rumah (Depan, Samping dan Belakang)</li>
                    </ul>
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span>04</span> Layanan Rekomendasi Permohonan Bantuan Biaya/Berobat Aktivasi Jaminan Kesehatan APBD <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    <ul>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Tanda Penduduk Pasien</li>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Tanda Penduduk Kepala Keluarga</li>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Tanda Penduduk Penanggung Jawab</li>
                      <li><i class="ri-check-line"></i> Fotokopi Kartu Keluarga</li>
                      <li><i class="ri-check-line"></i> Surat Rujukan atau Surat Kontrol Dari Puskesmas</li>
                      <li><i class="ri-check-line"></i> Surat Rawat Inap Dari Rumah Sakit</li>
                      <li><i class="ri-check-line"></i> Surat Keterangan Tidak Mampu yang ditanda tangani oleh Pambakal/Lurah dan diketahui Camat</li>
                      <li><i class="ri-check-line"></i> Foto Rumah (Depan, Belakang dan Samping)</li>
                      <li><i class="ri-check-line"></i> Materai 10.000 bagi Pasien yang tidak masuk dalam Data Terpadu Kesejahteraan Sosial (DTKS)</li>
                    </ul>
                  </p>
                </div>
              </li>
            </ul>
          </div>

        </div>

        <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
      </div>

    </div>
  </section>
  <!-- End Why Us Section -->

  <!-- ======= Lokasi Kantor ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Lokasi Kantor Dinas Sosial P3AP2KB Kabupaten Banjar</h2>
      </div>

      <div class="row content">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.6807726752345!2d114.84979011475812!3d-3.4276805975050904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de68169336ea363%3A0xafaf2865febd23a3!2sDinas%20Sosial%20P3AP2KB!5e0!3m2!1sid!2sid!4v1690615458240!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

    </div>
  </section>
  <!-- End Lokasi Kantor -->


  <!-- ======= Lokasi Pelayanan Martapura ======= -->
  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Lokasi Mal Pelayanan Publik "Barokah" Kabupaten Banjar</h2>
      </div>

      <div class="row content">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2816.202271808434!2d114.84707632511012!3d-3.4203050315655172!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de681b99086b82f%3A0x52c339079ad7ff23!2sMal%20Pelayanan%20Publik%20%22Barokah%22%20Kabupaten%20Banjar!5e0!3m2!1sid!2sid!4v1690615822636!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

    </div>
  </section>

  <!-- ======= Lokasi Pelayanan Gambut ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Lokasi Plaza Pelayanan Publik Gambut</h2>
      </div>

      <div class="row content">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.5055241812337!2d114.6681802!3d-3.4072085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de69dcc715a750b%3A0x4ec5bc4f153cf7e7!2sPlaza%20Pelayanan%20Publik%20Gambut!5e0!3m2!1sid!2sid!4v1690615822636!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

  <!-- ======= Kritik dan Saran Section ======= -->
  <section id="krisar" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Kritik dan Saran</h2>
        <p>Sampaikan kritik dan saran Anda untuk membantu kami meningkatkan layanan</p>
      </div>
      <div class="row">
        <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
          <form method="post" action="process_krisar.php" style="width: 100%; padding: 30px; background: #fff; box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12); border-radius: 4px;">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="name" style="font-weight: 600; color: #37517e; margin-bottom: 10px;">Nama</label>
                <input type="text" name="name" class="form-control" id="name" required style="height: 44px; border-radius: 4px; box-shadow: none; font-size: 14px;">
              </div>
              <div class="form-group col-md-6">
                <label for="email" style="font-weight: 600; color: #37517e; margin-bottom: 10px;">Email</label>
                <input type="email" class="form-control" name="email" id="email" required style="height: 44px; border-radius: 4px; box-shadow: none; font-size: 14px;">
              </div>
            </div>
            <div class="form-group">
              <label for="message" style="font-weight: 600; color: #37517e; margin-bottom: 10px;">Pesan</label>
              <textarea class="form-control" name="message" rows="10" required style="padding: 12px 15px; border-radius: 4px; box-shadow: none; font-size: 14px;"></textarea>
            </div>
            <div class="text-center"><button type="submit" style="background: #28a745; border: 0; padding: 12px 34px; color: #fff; transition: 0.4s; border-radius: 50px; margin-top: 15px;">Kirim Pesan</button></div>
          </form>
        </div>
      </div>

    </div>
  </section>
  <!-- End Kritik dan Saran Section -->

    </div>
  </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="container footer-bottom clearfix">
    <div class="copyright">
      &copy; Copyright <strong><span>S L R T - App</span></strong>. Dinas Sosial P3AP2KB Kabupaten Banjar
    </div>
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