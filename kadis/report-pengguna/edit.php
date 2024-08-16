 <title>Pegawai</title>

 <?php
  include '../config/koneksi.php';
  // get id from url
  if (!isset($_GET['id_user'])) {
    header("Location: pengguna.php");
  } else {
    $id_user = $_GET['id_user'];
    // get data from database
    $query = "SELECT * FROM tb_user 
    WHERE tb_user.id_user = '$id_user'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
  }

  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Pengguna</h1>

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
         <form action="pengguna.php?page=proses" method="post">
           <input type="hidden" name="id_user" value="<?= $id_user ?>">

           <div class="row">
             <div class="col-6">
               <div class="form-group">
                 <label>Username</label>
                 <input type="text" class="form-control" id="username" name="username" required placeholder="Username" value="<?= $row['username'] ?>">
               </div>
             </div>
             <div class="col-6">
               <div class="form-group">
                 <label>Role</label>
                 <select class="form-control select2" name="role">
                   <option value="">Pilih</option>
                   <option value="admin" <?= $row['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                   <option value="pegawai" <?= $row['role'] == 'pegawai' ? 'selected' : '' ?>>Pegawai</option>
                   <option value="masyarakat" <?= $row['role'] == 'masyarakat' ? 'selected' : '' ?>>Masyarakat</option>
                   <option value="kadis" <?= $row['role'] == 'kadis' ? 'selected' : '' ?>>Kepala Dinas</option>
                 </select>
               </div>
             </div>
           </div>

           <div class=" row">
             <div class="col-6">
               <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
               </div>
             </div>
           </div>

           <button name="update" value="update" class="btn btn-primary">Simpan</button>
         </form>
       </div>
     </div>
   </div>

 </div>
 <!-- /.container-fluid -->