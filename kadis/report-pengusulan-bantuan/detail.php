 <title>Pegawai</title>

 <?php
  include '../config/koneksi.php';
  // get id from url
  if (!isset($_GET['id_pengusulan_bantuan'])) {
    header("Location: pembuatan-izin.php");
  } else {
    $id_pengusulan_bantuan = $_GET['id_pengusulan_bantuan'];
    // get data from database
    $query = "SELECT * FROM tb_pengusulan_bantuan
    JOIN tb_masyarakat ON tb_pengusulan_bantuan.masyarakat_id = tb_masyarakat.id_masyarakat
    JOIN tb_usulan ON tb_pengusulan_bantuan.usulan_id = tb_usulan.id_usulan
    WHERE tb_pengusulan_bantuan.id_pengusulan_bantuan = '$id_pengusulan_bantuan'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
  }

  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Pengusulan Bantuan</h1>

   <div class="row">
     <div class="col-8">
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
         </div>

         <h4 class="mb-4">Kelengkapan Data</h4>

         <table class="table table-bordered">
           <tr>
             <th style="width: 300px;">Nama Masyarakat</th>
             <td><?= $row['nama'] ?></td>
           </tr>
           <tr>
             <th style="width: 300px;">Jenis Usulan</th>
             <td><?= $row['jenis_usulan'] ?></td>
           </tr>
           <tr>
             <th style="width: 300px;">Status</th>
             <td><?= $row['status'] ?></td>
           </tr>
           <tr>
             <th style="width: 300px;">Kelengkapan Berkas</th>
             <td>
               <?php
                if ($row['status'] == '0') {
                  echo 'Belum Lengkap';
                } else {
                  echo 'Sudah Lengkap';
                }
                ?>
           </tr>
           <tr>
             <th style="width: 300px;">Berkas</th>
             <td>
               <a href="<?= '../' . $row['file_berkas'] ?>" class="btn btn-info form-control" target="_blank" style="width: 200px;">Lihat File</a>
             </td>
           </tr>
           <tr>
             <th style="width: 300px;">Keterangan</th>
             <td>
               <?= $row['keterangan_verifikasi'] ?>
             </td>
           </tr>
         </table>

         <?php
          // get data from database
          $queryHistori = "SELECT * FROM tb_histori_pengusulan_bantuan
          WHERE pengusulan_bantuan_id = '$id_pengusulan_bantuan'";
          $resultHistory = mysqli_query($koneksi, $queryHistori);
          ?>

         <h4 class="my-4">Histori</h4>
         <table class="table table-bordered">
           <?php
            $i = 1;
            while ($hist = mysqli_fetch_assoc($resultHistory)) {
            ?>

             <tr>
               <th><?= $i++ ?></th>
               <td><?= $hist['text'] ?></td>
               <td><?= date("j-m-Y - g:i A", strtotime($hist['date'])) ?></td>
             </tr>

           <?php
            }
            ?>

         </table>
       </div>
     </div>

     <div class="col-4">
       <div class="card card-body">
         <h5>Persyaratan</h5>
         <?= $row['persyaratan'] ?>
         <h5>Keterangan</h5>
         <?= $row['keterangan'] ?>
       </div>
     </div>
   </div>

 </div>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


 <script>
   tinymce.init({
     selector: '.textarea',
   });
 </script>
 <!-- /.container-fluid -->