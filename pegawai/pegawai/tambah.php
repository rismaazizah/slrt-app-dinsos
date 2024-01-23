<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Tambah Pegawai </h1>

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
        <form action="pegawai.php?page=proses" method="post">

        <div class="row">
             <div class="col-6">
               <div class="form-group">
                 <label>NIK / NIP</label>
                 <input type="text" class="form-control" name="nik_nip" placeholder="NIK / NIP ..." minlength="16" maxlength="16">
               </div>
             </div>
             <div class="col-6">
               <div class="form-group">
                 <label for="nama_pegawai">Nama</label>
                 <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required>
               </div>
             </div>
             <div class="col-6">
               <div class="form-group">
                 <label>Tempat Lahir</label>
                 <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
               </div>
             </div>
             <div class="col-6">
               <div class="form-group">
                 <label>Tanggal Lahir</label>
                 <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
               </div>
             </div>

             <div class="col-6">
             <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control select2" id="jenis_kelamin" name="jenis_kelamin">
                      <option>Pilih ...</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
             </div>

             <div class="col-6">
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

            <div class="col-12">
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control textarea" name="alamat" rows="6"></textarea>
              </div>
            </div>

             <div class="col-6">
             <div class="form-group">
                    <label>Jabatan</label>
                    <select class="form-control select2" id="jabatan" name="jabatan">
                      <option>Pilih ...</option>
                      <option value="Petugas SLRT">Petugas SLRT</option>
                      <option value="Petugas Supervisor">Petugas Supervisor</option>
                      <option value="Petugas Fasilitator">Petugas Fasilitator</option>
                    </select>
                  </div>
             </div>

             <div class="col-6">
                  <div class="form-group">
                    <label>Tempat Tugas</label>
                    <select class="form-control select2" id="tempat_tugas" name="tempat_tugas">
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

             <div class="col-6">
               <div class="form-group">
                 <label>Nomor Telepon</label>
                 <input type="text" class="form-control" id="no_hp" name="no_hp" required>
               </div>
             </div>

             <div class="col-6">
               <div class="form-group">
                 <label>Email</label>
                 <input type="text" class="form-control" id="email" name="email" required>
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
                         <button name="tambah" value="tambah" class="btn btn-info">Simpan</button>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" integrity="sha512-tofxIFo8lTkPN/ggZgV89daDZkgh1DunsMYBq41usfs3HbxMRVHWFAjSi/MXrT+Vw5XElng9vAfMmOWdLg0YbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- <script>
  tinymce.init({
    selector: '.textarea',
  });
</script> -->

<!-- /.container-fluid -->