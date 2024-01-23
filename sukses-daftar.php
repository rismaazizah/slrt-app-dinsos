<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" href="assets/img/banjar.png" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/library/bootstrap/css/bootstrap.min.css">

  <title>Sukses Daftar</title>
</head>

<body>

  <?php
  session_start();
  if ($_SESSION['result'] !== 'success') {
    header("Location: pilih-pengusulan.php");
  }
  unset($_SESSION['result']);
  unset($_SESSION['message']);
  ?>


  <main>
    <div class="container">
      <div class="row justify-content-center" style="margin-top: 5vh;">

        <div class="col-10">
          <div class="card card-body text-center">
            <nav class="border d-flex justify-content-center align-items-center gap-4" style="height: 5.25rem;">
              <img src="assets/img/banjar.png" alt="" style="height: 4rem;">
              <div>
                <h3>DINAS SOSIAL, PEMBERDDAYAAN PEREMPUAN, PERLINDUNGAN ANAK,
                  <br> PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA
                </h3>
              </div>
            </nav>

            <br>
            <h4>Pengusulan Telah Berhasil Ditambahkan</h4>
            <img src="assets/img/check.png" alt="" style="width: 300px; height: auto;" class="mx-auto my-5">
            <p>
              Silahkan Datang ke Kantor dengan Membawa Berkas Persyaratan Apabila Usulan Anda
              <br> Telah Diverifikasi Oleh Petugas Status Menjadi <b>"Diterima"</b>, Untuk Melanjutkan
              <br> Proses Selanjutnya. Jika Status Usulan <b>"Ditolak"</b> Atau Status Tetap <b>"Proses"</b>
              <br> Dalam Kurun Waktu 3 (tiga) Hari Kerja Setelah Pengusulan
              <br> Silahkan Hubungi di Nomor Pelayanan 0821-5383-4815 Untuk Keterangan Lebih Lanjut.
            </p>

            <p>
              Nomor pengusulan Anda Adalah <span class="font-weight: bold;"> "<?= $_SESSION['nomormu'] ?>"</span>
            </p>
            <p>
              Anda Bisa Melacak Status Pengusulan Anda Melalui Menu Lacak, <br> Simpan Baik - Baik Nomor Pengusulan Anda
            </p>
            <div>
              <a href="exportDaftar.php?id_pengusulan_bantuan=<?= $_SESSION['id_pengusulan_bantuan'] ?>" class="btn btn-success" target="_blank">
                Print Keterangan Pengusulan
              </a>
            </div>
            <p></p>
            <div>
              <a href="index.php" class="btn btn-info">
                Kembali ke Home
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

  <?php
  unset($_SESSION['nomormu']);
  unset($_SESSION['id_pengusulan_bantuan']);
  ?>
  <script src="assets/library/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>