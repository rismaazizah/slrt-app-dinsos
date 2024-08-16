 <?php
  include '../config/koneksi.php';
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
  // get id from url
  if (!isset($_GET['id_masyarakat'])) {
    header("Location: masyarakat.php");
  } else {
    $id_masyarakat = $_GET['id_masyarakat'];
    // get data from database
    $query = "SELECT * FROM tb_masyarakat
    WHERE tb_masyarakat.id_masyarakat = '$id_masyarakat'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
  }

  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Pengajuan Usulan</h1>

   <div class="card card-body">
     <div class="row">

       <div class="col-12">
         <h4 class="my-4">
           Data pemohon
         </h4>

         <table class="table table-bordered">
           <tr>
             <th style="width: 300px;">Nomor Kartu Keluarga</th>
             <td><?= $row['no_kk'] ?></td>
           </tr>
           <tr>
             <th style="width: 300px;">Nomor Induk Kependudukan</th>
             <td><?= $row['nik'] ?></td>
           </tr>
           <tr>
             <th style="width: 300px;">Nama</th>
             <td><?= $row['nama'] ?></td>
           </tr>
           <tr>
             <th style="width: 300px;">Tempat, Tanggal Lahir</th>
             <td><?= $row['tempat_lahir'] . ', ' . tgl_indo($row['tanggal_lahir']) ?> </td>
           </tr>
           <tr>
             <th style="width: 300px;">Jenis Kelamin</th>
             <td><?= $row['jenis_kelamin'] ?></td>
           </tr>
           <tr>
             <th style="width: 300px;">Agama</th>
             <td><?= $row['agama'] ?></td>
           </tr>
           <tr>
             <th style="width: 300px;">Alamat Lengkap</th>
             <td><?= $row['alamat'] . ' RT. ' . ($row['rt']) . ' RW. ' . ($row['rw']) . ', ' . ($row['desa']) . ', ' . ($row['kecamatan']) . ', ' . ($row['kode_pos']) ?></td>
           </tr>
           <tr>
             <th style="width: 300px;">Nomor Telepon</th>
             <td><?= $row['no_hp'] ?></td>
           </tr>
           <tr>
             <th style="width: 300px;">Email</th>
             <td><?= $row['email'] ?></td>
           </tr>
         </table>
         <h4 class="my-4">
           Usulan yang diajukan
         </h4>
         <table class="table table-bordered" style="width: 100%;">
           <thead>
             <tr>
               <th>No</th>
               <th>Jenis Usulan</th>
               <th>Nomor Pengusulan</th>
               <th>No KK</th>
               <th>NIK</th>
               <th>Status</th>
               <th>Kelengkapan Berkas</th>
               <th>Tanggal Pengajuan</th>
               <!-- <th style="width: 150px;" class="not-export-col">Aksi</th> -->
             </tr>
           </thead>
           <tbody>
             <?php
              include_once '../config/koneksi.php';
              $no = 1;
              $query = "SELECT * FROM tb_pengusulan_bantuan 
              JOIN tb_usulan ON tb_pengusulan_bantuan.usulan_id = tb_usulan.id_usulan
              JOIN tb_masyarakat ON tb_pengusulan_bantuan.masyarakat_id = tb_masyarakat.id_masyarakat
              WHERE masyarakat_id = '$id_masyarakat'  ";
              $result = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
               <tr>
                 <td><?= $no++; ?></td>
                 <td><?= $row['jenis_usulan']; ?></td>
                 <td><?= $row['nomor_pengusulan']; ?></td>
                 <td><?= $row['no_kk']; ?></td>
                 <td><?= $row['nik']; ?></td>
                 <td><?= $row['status']; ?></td>
                 <td><?= tgl_indo($row['tgl_pengajuan']); ?></td>
                 <td>
                   <?php
                    if ($row['kelengkapan_berkas'] == 0) {
                      echo 'Belum Lengkap';
                    } else {
                      echo 'Sudah Lengkap';
                    }
                    ?>
                 </td>
                 <!-- <td class="not-export-col">
                   <a href="pengusulan-bantuan.php?page=edit&id_pengusulan_bantuan=<?= $row['id_pengusulan_bantuan']; ?>" class="btn btn-warning">Edit</a>
                 </td> -->
               </tr>
             <?php } ?>
           </tbody>
         </table>
       </div>
     </div>
   </div>

 </div>

 <!-- /.container-fluid -->