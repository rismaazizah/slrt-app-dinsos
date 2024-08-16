 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Rekap Data Konsultasi </h1>

   <div class="card card-body">
     <div class="row">
       <div class="col-12 d-flex justify-content-between">
         <!-- <a href="report-konsultasi.php?page=tambah" class="btn btn-primary">Tambah Data</a> -->
         <a href="report-konsultasi.php?page=export" class="btn btn-info" target="_blank">Print Data</a>
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
               <th>Masyarakat</th>
               <th>Perihal</th>
               <th>Status</th>
               <th style="width: 150px;" class="not-export-col">Aksi</th>
             </tr>
           </thead>
           <tbody>
             <?php
              include_once '../config/koneksi.php';
              $no = 1;
              $query = "SELECT * FROM tb_konsultasi 
              JOIN tb_masyarakat ON tb_konsultasi.masyarakat_id = tb_masyarakat.id_masyarakat";
              $result = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
               <tr>
                 <td><?= $no++; ?></td>
                 <td><?= $row['nama']; ?></td>
                 <td><?= $row['perihal']; ?></td>
                 <td>
                   <?php
                    $query2 = "SELECT * FROM tb_histori_konsultasi 
                    WHERE konsultasi_id = '{$row['id_konsultasi']}' AND role = 'kadis' ";
                    $result2 = mysqli_query($koneksi, $query2);
                    $row2 = mysqli_fetch_assoc($result2);

                    if ($row2 !== null) {
                      echo 'Sudah ditanggapi';
                    } else {
                      echo 'Belum ditanggapi';
                    }
                    ?>
                 </td>
                 <td class="not-export-col">
                   <?php
                    if (!isset($row['tanggapan'])) {
                    ?>
                     <a href="report-konsultasi.php?page=edit&id_konsultasi=<?= $row['id_konsultasi']; ?>" class="btn btn-info">
                       <i class="fa fa-eye" aria-hidden="true"></i>
                     </a>
                   <?php
                    }
                    ?>
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