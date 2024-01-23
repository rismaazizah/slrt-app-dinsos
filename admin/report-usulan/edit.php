 <title>Pegawai</title>

 <?php
  include '../config/koneksi.php';
  // get id from url
  if (!isset($_GET['id_usulan'])) {
    header("Location: usulan.php");
  } else {
    $id_usulan = $_GET['id_usulan'];
    // get data from database
    $query = "SELECT * FROM tb_usulan
    WHERE tb_usulan.id_usulan = '$id_usulan'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
  }

  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Usulan</h1>

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
         <form action="usulan.php?page=proses" method="post">
           <input type="hidden" name="id_usulan" value="<?= $id_usulan ?>">

           <div class="row">
             <div class="col-12">
               <div class="form-group">
                 <label>Jenis Usulan</label>
                 <input type="text" class="form-control" name="jenis_usulan" required placeholder="Jenis Usulan" value="<?= $row['jenis_usulan'] ?>">
               </div>
             </div>
           </div>

           <div class="form-group">
             <label>Kriteria</label>
             <textarea class="form-control textarea" name="kriteria" rows="4"><?= $row['kriteria'] ?></textarea>
           </div>

           <div class="form-group">
             <label>Persyaratan</label>
             <textarea class="form-control textarea" name="persyaratan" rows="4"><?= $row['persyaratan'] ?></textarea>
           </div>

           <div class="form-group">
             <label>Keterangan</label>
             <textarea class="form-control textarea" name="keterangan" rows="4"><?= $row['keterangan'] ?></textarea>
           </div>

           <button name="update" value="update" class="btn btn-primary">Simpan</button>
         </form>
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