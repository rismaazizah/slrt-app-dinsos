<?php
  include '../config/koneksi.php';
  // get id from url
  if (!isset($_GET['id_masyarakat'])) {
    header("Location: masyarakat.php");
  } else {
    $id_masyarakat = $_GET['id_masyarakat'];
    // get data from database
    $query = "SELECT * FROM tb_masyarakat
    JOIN tb_user ON tb_user.id_user = tb_masyarakat.user_id 
    WHERE tb_masyarakat.id_masyarakat = '$id_masyarakat'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
  }

  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Edit Masyarakat</h1>

   <div class="card card-body">
     <div class="row">
       <div class="col-12">
         <form action="masyarakat.php?page=proses" method="post" enctype="multipart/form-data">
           <input type="hidden" name="id_masyarakat" value="<?= $id_masyarakat ?>">

           <div class="row">
             <div class="col-6">
               <div class="form-group">
                 <label>Nomor KK</label>
                 <input type="text" class="form-control" id="no_kk" name="no_kk" value="<?= $row['no_kk'] ?>"minlength="16" maxlength="16">
               </div>
             </div>
             <div class="col-6">
               <div class="form-group">
                 <label>NIK</label>
                 <input type="text" class="form-control" id="nik" name="nik" value="<?= $row['nik'] ?>"minlength="16" maxlength="16">
               </div>
             </div>
             <div class="col-6">
               <div class="form-group">
                 <label for="nama">Nama</label>
                 <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama'] ?>">
               </div>
             </div>
             <div class="col-3">
               <div class="form-group">
                 <label>Tempat Lahir</label>
                 <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $row['tempat_lahir'] ?>">
               </div>
             </div>
             <div class="col-3">
               <div class="form-group">
                 <label>Tanggal Lahir</label>
                 <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $row['tanggal_lahir'] ?>">
               </div>
             </div>

             <div class="col-6">
               <div class="form-group">
                 <label>Agama</label>
                 <select class="form-control" id="agama" name="agama">
                   <option value="">Pilih ...</option>
                   <option value="Islam" <?= $row['agama'] == 'Islam' ? 'selected' : '' ?>>Islam</option>
                   <option value="Kristen" <?= $row['agama'] == 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                   <option value="Hindu" <?= $row['agama'] == 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                   <option value="Budha" <?= $row['agama'] == 'Budha' ? 'selected' : '' ?>>Budha</option>
                   <option value="Konghucu" <?= $row['agama'] == 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                 </select>
               </div>
             </div>

             <div class="col-6">
               <div class="form-group">
                 <label>Alamat</label>
                 <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $row['alamat'] ?>">
               </div>
             </div>
             <div class="col-3">
               <div class="form-group">
                 <label>RT</label>
                 <input type="text" class="form-control" id="rt" name="rt" value="<?= $row['rt'] ?>">
               </div>
             </div>
             <div class="col-3">
               <div class="form-group">
                 <label>RW</label>
                 <input type="text" class="form-control" id="rw" name="rw" value="<?= $row['rw'] ?>">
               </div>
             </div>

             <div class="col-6">
               <div class="form-group">
                 <label>Kelurahan / Desa</label>
                 <input type="text" class="form-control" id="desa" name="desa" value="<?= $row['desa'] ?>">
                </div>
              </div>
             
              <div class="col-6">
                <div class="form-group">
                  <label>Kecamatan</label>
                  <select class="form-control select2" id="kecamatan" name="kecamatan">
                      <option>Pilih ...</option>
                      <option value="Kecamatan Aluh-Aluh" <?= $row['kecamatan'] == 'Kecamatan Aluh-Aluh' ? 'selected' : '' ?>>Kecamatan Aluh-Aluh</option>
                      <option value="Kecamatan Aranio" <?= $row['kecamatan'] == 'Kecamatan Aranio' ? 'selected' : '' ?>>Kecamatan Aranio</option>
                      <option value="Kecamatan Astambul" <?= $row['kecamatan'] == 'Kecamatan Astambul' ? 'selected' : '' ?>>Kecamatan Astambul</option>
                      <option value="Kecamatan Beruntung Baru" <?= $row['kecamatan'] == 'Kecamatan Beruntung Baru' ? 'selected' : '' ?>>Kecamatan Beruntung Baru</option>
                      <option value="Kecamatan Cintapuri Darussalam" <?= $row['kecamatan'] == 'Kecamatan Cintapuri Darussalam' ? 'selected' : '' ?>>Kecamatan Cintapuri Darussalam</option>
                      <option value="Kecamatan Gambut" <?= $row['kecamatan'] == 'Kecamatan Gambut' ? 'selected' : '' ?>>Kecamatan Gambut</option>
                      <option value="Kecamatan Karang Intan" <?= $row['kecamatan'] == 'Kecamatan Karang Intan' ? 'selected' : '' ?>>Kecamatan Karang Intan</option>
                      <option value="Kecamatan Kertak Hanyar" <?= $row['kecamatan'] == 'Kecamatan Kertak Hanyar' ? 'selected' : '' ?>>Kecamatan Kertak Hanyar</option>
                      <option value="Kecamatan Martapura" <?= $row['kecamatan'] == 'Kecamatan Martapura' ? 'selected' : '' ?>>Kecamatan Martapura</option>
                      <option value="Kecamatan Martapura Barat" <?= $row['kecamatan'] == 'Kecamatan Martapura Barat' ? 'selected' : '' ?>>Kecamatan Martapura Barat</option>
                      <option value="Kecamatan Martapura Timur" <?= $row['kecamatan'] == 'Kecamatan Martapura Timur' ? 'selected' : '' ?>>Kecamatan Martapura Timur</option>
                      <option value="Kecamatan Mataraman" <?= $row['kecamatan'] == 'Kecamatan Mataraman' ? 'selected' : '' ?>>Kecamatan Mataraman</option>
                      <option value="Kecamatan Paramasan" <?= $row['kecamatan'] == 'Kecamatan Paramasan' ? 'selected' : '' ?>>Kecamatan Paramasan</option>
                      <option value="Kecamatan Pengaron" <?= $row['kecamatan'] == 'Kecamatan Pengaron' ? 'selected' : '' ?>>Kecamatan Pengaron</option>
                      <option value="Kecamatan Sambung Makmur" <?= $row['kecamatan'] == 'Kecamatan Sambung Makmur' ? 'selected' : '' ?>>Kecamatan Sambung Makmur</option>
                      <option value="Kecamatan Simpang Empat" <?= $row['kecamatan'] == 'Kecamatan Simpang Empat' ? 'selected' : '' ?>>Kecamatan Simpang Empat</option>
                      <option value="Kecamatan Sungai Pinang" <?= $row['kecamatan'] == 'Kecamatan Sungai Pinang' ? 'selected' : '' ?>>Kecamatan Sungai Pinang</option>
                      <option value="Kecamatan Sungai Tabuk" <?= $row['kecamatan'] == 'Kecamatan Sungai Tabuk' ? 'selected' : '' ?>>Kecamatan Sungai Tabuk</option>
                      <option value="Kecamatan Tatah Makmur" <?= $row['kecamatan'] == 'Kecamatan Tatah Makmur' ? 'selected' : '' ?>>Kecamatan Tatah Makmur</option>
                      <option value="Kecamatan Telaga Bauntung" <?= $row['kecamatan'] == 'Kecamatan Telaga Bauntung' ? 'selected' : '' ?>>Kecamatan Telaga Bauntung</option>
                    </select>
                </div>
              </div>
              
             <div class="col-3">
               <div class="form-group">
                 <label>Kode Pos</label>
                 <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="<?= $row['kode_pos'] ?>">
               </div>
             </div>

             <div class="col-3">
               <div class="form-group">
                 <label>Status Hubungan Dalam Keluarga</label>
                 <select class="form-control" id="status_hubungan" name="status_hubungan">
                   <option value="">Pilih ...</option>
                   <option value="Kepala Keluarga" <?= $row['status_hubungan'] == 'Kepala Keluarga' ? 'selected' : '' ?>>Kepala Keluarga</option>
                   <option value="Suami" <?= $row['status_hubungan'] == 'Suami' ? 'selected' : '' ?>>Suami</option>
                   <option value="Istri" <?= $row['status_hubungan'] == 'Istri' ? 'selected' : '' ?>>Istri</option>
                   <option value="Anak" <?= $row['status_hubungan'] == 'Anak' ? 'selected' : '' ?>>Anak</option>
                   <option value="Menantu" <?= $row['status_hubungan'] == 'Menantu' ? 'selected' : '' ?>>Menantu</option>
                   <option value="Orang Tua" <?= $row['status_hubungan'] == 'Orang Tua' ? 'selected' : '' ?>>Orang Tua</option>
                   <option value="Mertua" <?= $row['status_hubungan'] == 'Mertua' ? 'selected' : '' ?>>Mertua</option>
                   <option value="Famili Lain" <?= $row['status_hubungan'] == 'Famili Lain' ? 'selected' : '' ?>>Famili Lain</option>
                 </select>
               </div>
             </div>

             <div class="col-6">
               <div class="form-group">
                 <label>Nomor Telepon</label>
                 <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $row['no_hp'] ?>">
               </div>
             </div>
             <div class="col-6">
               <div class="form-group">
                 <label>Email</label>
                 <input type="text" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">
               </div>
             </div>

           </div>

           <div class="card card-body">
            <h4>Kredensial</h4>
            <div class="row">
              <div class="col-6">
                <div class="from-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" required placeholder="Username" value="<?= $row['username'] ?>">
                </div>
              </div>

              <div class="col-6">
                <div class="from-group">
                  <label>Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password">
                      <span class="text-xs form-text">
                      <span class="text-danger">*</span>
                      Opsional</span>
                </div>
              </div>

              <div class="col-6">
                <div class="from-group">
                <button name="update" value="update" class="btn btn-info">Simpan</button>
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