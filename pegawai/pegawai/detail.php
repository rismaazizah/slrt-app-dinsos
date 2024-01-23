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
  if (!isset($_GET['id_pegawai'])) {
    header("Location: pegawai.php");
  } else {
    $id_pegawai = $_GET['id_pegawai'];
    // get data from database
    $query = "SELECT * FROM tb_pegawai
    WHERE tb_pegawai.id_pegawai = '$id_pegawai'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
  }

  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Pegawai </h1>

   <div class="card card-body">
     <div class="row">
       <div class="col-12">
         <a href="pegawai.php" class="btn btn-success">Kembali</a>
         <table class="table table-bordered mt-3">
           <tr>
             <th style="width: 200px;">NIK/NIP</th>
             <td><?= $row['nik_nip'] ?></td>
           </tr>
           <tr>
             <th style="width: 200px;">Nama</th>
             <td><?= $row['nama_pegawai'] ?></td>
           </tr>
           <tr>
             <th style="width: 200px;">Tempat, Tanggal Lahir</th>
             <td><?= $row['tempat_lahir'] . ', ' . tgl_indo($row['tanggal_lahir']) ?> </td>
           </tr>
           <tr>
             <th style="width: 200px;">Jenis Kelamin</th>
             <td><?= $row['jenis_kelamin'] ?></td>
            </tr>
            <tr>
              <th style="width: 200px;">Agama</th>
              <td><?= $row['agama'] ?></td>
            </tr>
            <tr>
              <th style="width: 200px;">Alamat</th>
              <td><?= $row['alamat'] ?></td>
            </tr>
            <tr>
              <th style="width: 200px;">Jabatan</th>
              <td><?= $row['jabatan'] ?></td>
            </tr>
            <tr>
              <th style="width: 200px;">Tempat Tugas</th>
              <td><?= $row['tempat_tugas'] ?></td>
            </tr>
           <tr>
             <th style="width: 200px;">Nomor Telepon</th>
             <td><?= $row['no_hp'] ?></td>
           </tr>
           <tr>
             <th style="width: 200px;">Email</th>
             <td><?= $row['email'] ?></td>
           </tr>
         </table>
         <a href="pegawai.php?page=edit&id_pegawai=<?= $row['id_pegawai']; ?>" class="btn btn-warning">Edit</a>
       </div>
     </div>
   </div>

 </div>

 <!-- /.container-fluid -->