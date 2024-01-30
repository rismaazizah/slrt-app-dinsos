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
  if (!isset($_GET['id_kunjungan'])) {
    header("Location: kunjungan.php");
  } else {
    $id_kunjungan = $_GET['id_kunjungan'];
    // get data from database
    $query = "SELECT * FROM tb_kunjungan
    WHERE tb_kunjungan.id_kunjungan = '$id_kunjungan'";
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
         <a href="kunjungan.php" class="btn btn-success">Kembali</a>
         <table class="table table-bordered mt-3">
           <tr>
             <th style="width: 200px;">Nama</th>
             <td><?= $row['nama'] ?></td>
           </tr>
           <tr>
             <th style="width: 200px;">NIP</th>
             <td><?= $row['nip'] ?></td>
           </tr>
           <tr>
             <th style="width: 200px;">Pangkat/Golongan</th>
             <td><?= $row['pangkat_golongan'] ?></td>
           </tr>
           <tr>
             <th style="width: 200px;">Pendidikan Terakhir</th>
             <td><?= $row['pendidikan_terakhir'] ?></td>
           </tr>
           <tr>
             <th style="width: 200px;">Jabatan</th>
             <td><?= $row['jabatan'] ?></td>
           </tr>
           <tr>
             <th style="width: 200px;">Jenis Kelamin</th>
             <td><?= $row['jenis_kelamin'] ?></td>
           </tr>
           <tr>
             <th style="width: 200px;">Tempat, Tanggal Lahir</th>
             <td><?= $row['tempat_lahir'] . ', ' . tgl_indo($row['tanggal_lahir']) ?> </td>
           </tr>
           <tr>
             <th style="width: 200px;">No. HP</th>
             <td><?= $row['no_hp'] ?></td>
           </tr>
           <tr>
             <th style="width: 200px;">Alamat</th>
             <td><?= $row['alamat'] ?></td>
           </tr>
         </table>
         <a href="kunjungan.php?page=edit&id_kunjungan=<?= $row['id_kunjungan']; ?>" class="btn btn-warning">Edit</a>
       </div>
     </div>
   </div>

 </div>

 <!-- /.container-fluid -->