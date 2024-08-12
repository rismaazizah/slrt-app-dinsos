<?php
include '../config/koneksi.php';
include '../modules/header.php';

// Check if the user is logged in as an admin
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

// Fetch usulan data from the database
$query = "SELECT u.id_usulan, u.jenis_usulan, pu.tgl_pengajuan, m.nama AS nama_pengusul
          FROM tb_usulan u 
          JOIN tb_pengusulan_bantuan pu ON u.id_usulan = pu.usulan_id
          JOIN tb_masyarakat m ON pu.masyarakat_id = m.id_masyarakat 
          ORDER BY pu.tgl_pengajuan DESC";
$result = mysqli_query($koneksi, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}

?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Usulan</h1><br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Usulan</th>
                            <th>Jenis Usulan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Nama Pengusul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?php echo $row['id_usulan']; ?></td>
                                <td><?php echo $row['jenis_usulan']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row['tgl_pengajuan'])); ?></td>
                                <td><?php echo $row['nama_pengusul']; ?></td>
                                <td>
                                    <a href="view_berkas.php?usulan_id=<?php echo $row['id_usulan']; ?>" 
                                       class="btn btn-primary btn-sm" target="_blank">
                                        Lihat Berkas
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include '../modules/footer.php';
$koneksi->close();
?>