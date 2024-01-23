 <title>Siswa</title>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Usulan  </h1>

   <div class="card card-body">
     <div class="row">
       <div class="col-12 d-flex justify-content-between">
         <a href="usulan.php?page=tambah" class="btn btn-primary">Tambah Data</a>
         <a href="usulan.php?page=export" class="btn btn-primary" target="_blank">Print Data</a>
       </div>
     </div>
   </div>

   <div class="card card-body mt-2">
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
         <table class="table table-bordered" id="mytable" style="width: 100%;">
           <thead>
             <tr>
               <th>No</th>
               <th>Jenis Usulan</th>
               <th>Kriteria</th>
               <th>Persyaratan</th>
               <th>Keterangan</th>
               <th style="width: 150px;" class="not-export-col">Aksi</th>
             </tr>
           </thead>
           <tbody>
             <?php
              include_once '../config/koneksi.php';
              $no = 1;
              $query = "SELECT * FROM tb_usulan ORDER BY id_usulan DESC";
              $result = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
               <tr>
                 <td><?= $no++; ?></td>
                 <td><?= $row['jenis_usulan']; ?></td>
                 <td><?= $row['kriteria']; ?></td>
                 <td><?= $row['persyaratan']; ?></td>
                 <td><?= $row['keterangan']; ?></td>
                 <td class="not-export-col">
                   <a href="usulan.php?page=edit&id_usulan=<?= $row['id_usulan']; ?>" class="btn btn-warning">Edit</a>
                   <a href="usulan.php?page=hapus&id_usulan=<?= $row['id_usulan']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data')">Hapus</a>
                 </td>
               </tr>
             <?php } ?>
           </tbody>
         </table>
       </div>
     </div>
   </div>

 </div>
 <!-- /.container-fluid -->