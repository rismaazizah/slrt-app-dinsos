 <?php
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
  include '../config/koneksi.php';
  // get id from url
  if (!isset($_GET['id_kunjungan'])) {
    header("Location: kunjungan.php");
  } else {
    $id_kunjungan = $_GET['id_kunjungan'];
    // get data from database
    $query = "SELECT * FROM tb_kunjungan AS k
    JOIN tb_masyarakat AS m ON k.masyarakat_id = m.id_masyarakat
    JOIN tb_pegawai AS p ON k.pegawai_id = p.id_pegawai
    ORDER BY k.id_kunjungan DESC";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
  }
  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Kunjungan </h1>

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
         <form action="kunjungan.php?page=proses" method="post">
           <input type="hidden" name="id_kunjungan" value="<?= $id_kunjungan ?>">
           <div class="row">
             <div class="col-6">
               <table class="table table-bordered">
                 <tr>
                   <th>Nama Masyarakat</th>
                   <td><?= $row['nama'] ?></td>
                 </tr>
                 <tr>
                   <th>Keperluan</th>
                   <td><?= $row['keperluan'] ?></td>
                 </tr>
                 <tr>
                   <th>Bertemu dengan</th>
                   <td><?= $row['nama_pegawai'] ?></td>
                 </tr>
                 <tr>
                   <th>Tanggal</th>
                   <td><?= tgl_indo($row['tanggal']) ?></td>
                 </tr>
               </table>
             </div>
             <div class="col-6">
               <div class="row">
                 <div class="col-12">
                   <div class="form-group">
                     <label>Status</label>
                     <select name="status" class="form-control" required>
                       <option>Pilih ...</option>
                       <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Menunggu Verifikasi</option>
                       <option value="Dibatalkan" <?= $row['status'] == 'Dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
                       <option value="Disetujui" <?= $row['status'] == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                     </select>
                   </div>
                 </div>
               </div>
               <div class="row">
                 <div class="col-12">
                   <div class="form-group">
                     <label>Keterangan</label>
                     <textarea name="keterangan" rows="4" class="form-control" required><?= $row['keterangan'] ?></textarea>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <button name="update" value="update" class="btn btn-primary float-right">Simpan</button>
         </form>
       </div>
     </div>
   </div>

 </div>

 <!-- /.container-fluid -->