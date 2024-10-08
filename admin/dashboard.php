<?php
include '../modules/header.php';
include '../config/is_admin.php';
include_once '../config/koneksi.php';
?>

<title>Dashboard</title>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Total Pegawai</div>
              <?php
              $query = "SELECT * FROM tb_pegawai";
              $result = mysqli_query($koneksi, $query);
              $nilai = mysqli_num_rows($result);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nilai ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-duotone fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Total Masyarakat</div>
              <?php
              $query = "SELECT * FROM tb_masyarakat";
              $result = mysqli_query($koneksi, $query);
              $nilai = mysqli_num_rows($result);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nilai ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-duotone fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Total Usulan</div>
              <?php
              $query = "SELECT * FROM tb_usulan";
              $result = mysqli_query($koneksi, $query);
              $nilai = mysqli_num_rows($result);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nilai ?></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-book fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Total Pengusulan Bantuan</div>
              <?php
              $query = "SELECT * FROM tb_pengusulan_bantuan";
              $result = mysqli_query($koneksi, $query);
              $nilai = mysqli_num_rows($result);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nilai ?></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-book fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="row">


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Total Konsultasi</div>
              <?php
              $query = "SELECT * FROM tb_konsultasi";
              $result = mysqli_query($koneksi, $query);
              $nilai = mysqli_num_rows($result);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nilai ?></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Total Kunjungan</div>
              <?php
              $query = "SELECT * FROM tb_kunjungan";
              $result = mysqli_query($koneksi, $query);
              $nilai = mysqli_num_rows($result);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nilai ?></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-child fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Total Pengguna</div>
              <?php
              $query = "SELECT * FROM tb_user";
              $result = mysqli_query($koneksi, $query);
              $nilai = mysqli_num_rows($result);
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nilai ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>


<!-- Accepted Services Card -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Layanan yang Diterima</div>
              <?php
              $query = "SELECT COUNT(*) as total FROM tb_pengusulan_bantuan WHERE status = 'diterima'";
              $result = mysqli_query($koneksi, $query);
              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $nilai = $row['total'];
              } else {
                $nilai = "Error: " . mysqli_error($koneksi);
              }
              ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nilai ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-check-circle fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    
 <!-- New Participant Registrations Card -->
    <<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Pendaftaran Peserta Baru</div>

              <!-- Form untuk memilih tanggal awal -->
              <form method="POST" action="">
                <label for="tanggal_mulai">Dari Tanggal:</label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" required>
                <button type="submit" class="btn btn-primary btn-sm">Tampilkan</button>
              </form>

              <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tanggal_mulai = $_POST['tanggal_mulai'];
                $tanggal_selesai = date("Y-m-d"); // Hari ini

                // Query untuk menghitung jumlah pendaftar dari tanggal yang dipilih hingga hari ini
                $query = "SELECT COUNT(*) as total FROM tb_user WHERE tanggal_daftar BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'";
                $result = mysqli_query($koneksi, $query);
                if ($result) {
                  $row = mysqli_fetch_assoc($result);
                  $nilai = $row['total'];
                  // Add print button if there are results
                  echo "<a href='cetak_pendaftaran.php?tanggal_mulai=$tanggal_mulai&tanggal_selesai=$tanggal_selesai' target='_blank' class='btn btn-success btn-sm mt-2'>Cetak Data</a>";
                } else {
                  $nilai = "Error: " . mysqli_error($koneksi);
                }
              } else {
                $nilai = "Pilih tanggal untuk melihat jumlah pendaftar";
              }
              ?>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nilai ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- /.container-fluid -->

<div class="row">
  <div class="col-8">
    <div class="card card-body">
      <canvas id="myBarChart"></canvas>
    </div>
  </div>
  <div class="col-4">
    <div class="card card-body">
      <canvas id="myPieChart"></canvas>
    </div>
  </div>
</div>

</div>

<?php
include '../modules/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
include_once '../config/koneksi.php';
$no = 1;
$query = "SELECT * FROM tb_pengusulan_bantuan";
$result = mysqli_query($koneksi, $query);
$jumlah_anak = 0;
$jumlah_lansia = 0;
$jumlah_dewasa = 0;
while ($row = mysqli_fetch_assoc($result)) {
  if ($row['umur_pengusul'] < 19) {
    $jumlah_anak += 1;
  }
  if ($row['umur_pengusul'] > 60) {
    $jumlah_lansia += 1;
  }
  if ($row['umur_pengusul'] < 60 && $row['umur_pengusul'] > 19) {
    $jumlah_dewasa += 1;
  }
} ?>

<?php
include_once '../config/koneksi.php';
$no = 1;
$query = "SELECT * FROM tb_usulan ORDER BY id_usulan DESC";
$result = mysqli_query($koneksi, $query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
  $querypp = "SELECT * FROM tb_pengusulan_bantuan WHERE usulan_id = '{$row['id_usulan']}' ";
  $resultpp = mysqli_query($koneksi, $querypp);
  unset($count);
  $count = 0;
  while ($pp = mysqli_fetch_assoc($resultpp)) {
    $count += 1;
  }
  $data[$row['id_usulan']] = [
    'jenis' => $row['jenis_usulan'],
    'jumlah' => $count
  ];
} ?>

<script>
  // Given array
  const inputData = <?php echo json_encode($data); ?>;
  // Extract data from the input array
  const labels = Object.values(inputData).map(item => item.jenis);
  const data = Object.values(inputData).map(item => item.jumlah);

  // Chart.js configuration
  const ctx = document.getElementById('myPieChart');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: labels,
      datasets: [{
        label: 'Jumlah Usulan',
        data: data,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const cto = document.getElementById('myBarChart');
  new Chart(cto, {
    type: 'bar',
    data: {
      labels: ['Anak', 'Dewasa', 'Lansia'],
      datasets: [{
        label: 'Grafik Usia Pengusul',
        data: [<?= $jumlah_anak ?>, <?= $jumlah_dewasa ?>, <?= $jumlah_lansia ?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>