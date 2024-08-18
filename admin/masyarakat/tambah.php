 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Tambah Masyarakat</h1>

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
         <form action="masyarakat.php?page=proses" method="post" enctype="multipart/form-data">

           <div class="row">
             <div class="col-6">
               <div class="form-group">
                 <label>Nomor Kartu Keluarga</label>
                 <input type="text" class="form-control" name="kk" placeholder="Nomor Kartu Keluarga ..." minlength="16" maxlength="16" required>
               </div>
             </div>
             <div class="col-6">
               <div class="form-group">
                 <label>Nomor Induk Kependudukan</label>
                 <input type="text" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan ..." minlength="16" maxlength="16">
               </div>
             </div>
             <div class="col-6">
               <div class="form-group">
                 <label for="nama">Nama</label>
                 <input type="text" class="form-control" name="nama" placeholder="Nama ...">
               </div>
             </div>
             <div class="col-3">
               <div class="form-group">
                 <label>Tempat Lahir</label>
                 <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir ...">
               </div>
             </div>
             <div class="col-3">
               <div class="form-group">
                 <label>Tanggal Lahir</label>
                 <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tanggal lahir ...">
               </div>
             </div>

             <div class="col-3">
               <div class="form-group">
                <label>Jenis Kelamin</label>
                 <select name="jenis_kelamin" class="form-control select2" required>
                   <option value="">Pilih ...</option>
                   <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                 </select>
               </div>
             </div>

             <div class="col-3">
               <div class="form-group">
                 <label>Agama</label>
                 <select class="form-control select2" id="agama" name="agama">
                 <option value="">Pilih ...</option>
                   <option value="Islam">Islam</option>
                   <option value="Kristen">Kristen</option>
                   <option value="Hindu">Hindu</option>
                   <option value="Budha">Budha</option>
                   <option value="Konghucu">Konghucu</option>
                   <option value="Lainnya">Lainnya</option>
                 </select>
               </div>
             </div>

             <div class="col-6">
               <div class="form-group">
                 <label>Alamat</label>
                 <input type="text" class="form-control" id="alamat" name="alamat" required>
               </div>
             </div>

             <div class="col-3">
               <div class="form-group">
                 <label>RT</label>
                 <input type="text" class="form-control" name="rt" placeholder="RT ..." maxlength="3">
               </div>
             </div>
             <div class="col-3">
               <div class="form-group">
                 <label>RW</label>
                 <input type="text" class="form-control" name="rw" placeholder="RW ..." maxlength="3">
                </div>
              </div>
              
              <div class="col-6">
                <div class="form-group">
                  <label>Kelurahan / Desa</label>
                  <input type="text" class="form-control" name="desa" placeholder="Desa ...">
                </div>
              </div>

              <div class="col-6">
                <div class="form-group">
               <label>Kecamatan</label>
                    <select name="kecamatan" class="form-control select2" required>
                      <option>Pilih ...</option>
                      <option value="Kecamatan Aluh-Aluh">Kecamatan Aluh-Aluh</option>
                      <option value="Kecamatan Aranio">Kecamatan Aranio</option>
                      <option value="Kecamatan Astambul">Kecamatan Astambul</option>
                      <option value="Kecamatan Beruntung Baru">Kecamatan Beruntung Baru</option>
                      <option value="Kecamatan Cintapuri Darussalam">Kecamatan Cintapuri Darussalam</option>
                      <option value="Kecamatan Gambut">Kecamatan Gambut</option>
                      <option value="Kecamatan Karang Intan">Kecamatan Karang Intan</option>
                      <option value="Kecamatan Kertak Hanyar">Kecamatan Kertak Hanyar</option>
                      <option value="Kecamatan Martapura">Kecamatan Martapura</option>
                      <option value="Kecamatan Martapura Barat">Kecamatan Martapura Barat</option>
                      <option value="Kecamatan Martapura Timur">Kecamatan Martapura Timur</option>
                      <option value="Kecamatan Mataraman">Kecamatan Mataraman</option>
                      <option value="Kecamatan Paramasan">Kecamatan Paramasan</option>
                      <option value="Kecamatan Pengaron">Kecamatan Pengaron</option>
                      <option value="Kecamatan Sambung Makmur">Kecamatan Sambung Makmur</option>
                      <option value="Kecamatan Simpang Empat">Kecamatan Simpang Empat</option>
                      <option value="Kecamatan Sungai Pinang">Kecamatan Sungai Pinang</option>
                      <option value="Kecamatan Sungai Tabuk">Kecamatan Sungai Tabuk</option>
                      <option value="Kecamatan Tatah Makmur">Kecamatan Tatah Makmur</option>
                      <option value="Kecamatan Telaga Bauntung">Kecamatan Telaga Bauntung</option>
                    </select>
               </div>
             </div>

             <div class="col-3">
               <div class="form-group">
                 <label>Kode Pos</label>
                 <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos ...">
               </div>
             </div>

             <div class="col-3">
               <div class="form-group">
                 <label>Status Hubungan Dalam Keluarga</label>
                 <select class="form-control select2" id="status_hubungan" name="status_hubungan">
                   <option value="">Pilih ...</option>
                   <option value="Kepala Keluarga">Kepala Keluarga</option>
                   <option value="Suami">Suami</option>
                   <option value="Istri">Istri</option>
                   <option value="Anak">Anak</option>
                   <option value="Menantu">Menantu</option>
                   <option value="Orang Tua">Orang Tua</option>
                   <option value="Mertua">Mertua</option>
                   <option value="Famili Lain">Famili Lain</option>
                 </select>
               </div>
             </div>

             <div class="col-6">
               <div class="form-group">
                 <label>Nomor Telepon</label>
                 <input type="text" class="form-control" name="no_hp" placeholder="Nomor Telepon ...">
               </div>
             </div>
             <div class="col-6">
               <div class="form-group">
                 <label for="email">Email</label>
                 <input type="text" class="form-control" name="email" placeholder="Email ...">
               </div>
             </div>


             <div class="card card-body">
                    
                    <h4>Kredensial</h4>
                    <div class="row">  
                       <div class="col-6">
                         <div class="form-group">
                           <label>Username</label>
                           <input type="text" class="form-control" name="username" required placeholder="Username">
                         </div>
                       </div>
       
                       <div class="col-6">
                         <div class="form-group">
                           <label>Password</label>
                           <input type="password" class="form-control" name="password" required placeholder="Password">
                         </div>
                       </div>

                       <div class="col-6">
                         <div class="form-group">
                         <button name="tambah" value="tambah" class="btn btn-info ">Simpan</button>
                         </div>
                       </div>

       
                    </div>
                   </div>
                  </div>

           
         </form>
       </div>
     </div>
   </div>

 </div>
 <!-- /.container-fluid -->