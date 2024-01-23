<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Tambah Surat Keluar</h1>

  <div class="card card-body">
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
        <form action="surat-keluar.php?page=proses" method="post">

          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label>Nomor Surat</label>
                <input type="text" class="form-control" name="no_surat" required placeholder="Masukkan Nomor Surat ...">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required placeholder="Tanggal">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Perihal</label>
                <input type="text" class="form-control" name="perihal" required placeholder="Masukkan Perihal ...">
              </div>
            </div>

            <div class="col-6">
              <div class="form-group">
                <label>Tujuan</label>
                <input type="text" class="form-control" name="tujuan" required placeholder="Masukkan Tujuan ...">
              </div>
            </div>

          </div>

          <button name="tambah" value="tambah" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->