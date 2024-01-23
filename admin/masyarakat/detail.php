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
   <h1 class="h3 mb-4 text-gray-800">Masyarakat </h1>

   <div class="card card-body">
     <div class="row">
       <div class="col-12">
         <a href="masyarakat.php" class="btn btn-success">Kembali</a>
         <table class="table table-bordered mt-3">
           <tr>
             <th style="width: 200px;">Nomor Kartu Keluarga</th>
             <td><?= $row['no_kk'] ?></td>
            </tr>
            <tr>
              <th style="width: 200px;">Nomor Induk Kependudukan</th>
             <td><?= $row['nik'] ?></td>
           </tr>
              <tr>
                <th style="width: 200px;">Nama</th>
                <td><?= $row['nama'] ?></td>
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
              <th style="width: 200px;">Alamat Lengkap</th>
              <td><?= $row['alamat'] . ' RT. ' . ($row['rt']) . ' RW. ' . ($row['rw']) . ', ' . ($row['desa']) . ', ' . ($row['kecamatan']) . ', ' . ($row['kode_pos']) ?></td>
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
         <a href="masyarakat.php?page=edit&id_masyarakat=<?= $row['id_masyarakat']; ?>" class="btn btn-warning">Edit</a>
       </div>
     </div>
   </div>

 </div>

 <!-- /.container-fluid -->