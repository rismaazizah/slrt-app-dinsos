<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

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

    <li class="nav-item">
      <a class="nav-link" href="admin_usulan_list.php">
        <i class="fas fa-user"></i>
        <span>Daftar Usulan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

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

    <li class="nav-item">
      <a class="nav-link" href="report-kunjungan.php">
        <i class="fa fa-archive"></i>
        <span>Rekap Data Kunjungan</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="laporan_nomor_pengusulan.php">
        <i class="fa fa-archive"></i>
        <span>Rekap Data Laporan Antrian</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="admin_krisar.php">
        <i class="fa fa-comments"></i>
        <span>Kritik dan Saran</span></a>
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
  } elseif ($_SESSION['role'] == 'kadis') {
  ?>
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

    <li class="nav-item">
      <a class="nav-link" href="report-kunjungan.php">
        <i class="fa fa-archive"></i>
        <span>Rekap Data Kunjungan</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="laporan_nomor_pengusulan.php">
        <i class="fa fa-archive"></i>
        <span>Rekap Data Laporan Antrian</span></a>
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