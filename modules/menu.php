<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex flex-column align-items-center justify-content-center" href="../config/cek_login.php" style="height: 120px;">
    <img src="../assets/img/logo.png" alt="" width="170px">

    <div class="sidebar-brand-text mx-3">
      <?= ucfirst($_SESSION['role']) ?>
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="../config/cek_login.php">
      <i class="fa fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <?php
  if ($_SESSION['role'] == 'admin') {
  ?>


    <!-- Heading -->
    <div class="sidebar-heading">
      Master Data
    </div>

    <li class="nav-item">
      <a class="nav-link" href="pegawai.php">
        <i class="fas fa-duotone fa-users"></i>
        <span>Pegawai</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="masyarakat.php">
        <i class="fas fa-duotone fa-users"></i>
        <span>Masyarakat</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="usulan.php">
        <i class="fa fa-book"></i>
        <span>Usulan</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pengusulan-bantuan.php">
        <i class="fa fa-book"></i>
        <span>Pengusulan Bantuan</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="konsultasi.php">
        <i class="fa fa-comments"></i>
        <span>Konsultasi</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="kunjungan.php">
        <i class="fa fa-child"></i>
        <span>Kunjungan</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pengguna.php">
        <i class="fas fa-user"></i>
        <span>Pengguna</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
      BUKU SURAT MENYURAT
    </div> -->

    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fa fa-envelope"></i>
        <span> Surat Menyurat</span>
      </a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="surat-masuk.php">Surat Pernyataan</a>
          <a class="collapse-item" href="surat-keluar.php">Surat Rekomendasi</a>
          <a class="collapse-item" href="surat-keluar.php">Surat Berita Acara Verifikasi <br>Data</a>
        </div>
      </div>
    </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <div class="sidebar-heading">
      Laporan
    </div>

    <li class="nav-item">
      <a class="nav-link" href="report-pegawai.php">
        <i class="fa fa-archive"></i>
        <span>Rekap Data Pegawai</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="report-masyarakat.php">
        <i class="fa fa-archive"></i>
        <span>Rekap Data Masyarakat</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="report-usulan.php">
        <i class="fa fa-archive"></i>
        <span>Rekap Data Usulan</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="report-pengusulan-bantuan.php">
        <i class="fa fa-archive"></i>
        <span>Rekap Data Pengusulan Bantuan</span></a>
    </li>

  <?php } elseif ($_SESSION['role'] == 'masyarakat') {
  ?>
    <!-- Heading -->
    <div class="sidebar-heading">
      Master Data
    </div>

    <li class="nav-item">
      <a class="nav-link" href="tamu.php">
        <i class="fas fa-duotone fa-users"></i>
        <span>Biodata</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="tamu.php">
        <i class="fas fa-duotone fa-users"></i>
        <span>Data Keluarga</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
      Pengaduan
    </div>

    <li class="nav-item">
      <a class="nav-link" href="tamu.php">
        <i class="fas fa-duotone fa-users"></i>
        <span>Buku Pengaduan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
      Usulan
    </div>

    <li class="nav-item">
      <a class="nav-link" href="tamu.php">
        <i class="fas fa-duotone fa-users"></i>
        <span>Permohonan BAGAMIS</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="tamu.php">
        <i class="fas fa-duotone fa-users"></i>
        <span>Permohonan KIS</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="tamu.php">
        <i class="fas fa-duotone fa-users"></i>
        <span>Permohonan Bantuan Berobat Sambang Lihum</span></a>
    </li>

    <!-- Heading -->
  <?php

  } elseif ($_SESSION['role'] == 'pegawai') {
  ?>
    <div class="sidebar-heading">
      Master Data
    </div>

    <li class="nav-item">
      <a class="nav-link" href="pegawai.php">
        <i class="fas fa-duotone fa-users"></i>
        <span>Pegawai</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="masyarakat.php">
        <i class="fas fa-duotone fa-users"></i>
        <span>Masyarakat</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="usulan.php">
        <i class="fa fa-book"></i>
        <span>Usulan</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pengusulan-bantuan.php">
        <i class="fa fa-book"></i>
        <span>Pengusulan Bantuan</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="kunjungan.php">
        <i class="fa fa-child"></i>
        <span>Kunjungan</span></a>
    </li>
  <?php
  } ?>





  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>