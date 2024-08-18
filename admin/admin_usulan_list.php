<?php
include '../config/koneksi.php';
include '../modules/header2.php';

// Check if the user is logged in as an admin
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
// Initialize search query
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Fetch usulan data from the database with search functionality
$query = "SELECT u.id_usulan, u.jenis_usulan, pu.id_pengusulan_bantuan, pu.tgl_pengajuan, pu.status, m.nama AS nama_pengusul, m.id_masyarakat
          FROM tb_usulan u 
          JOIN tb_pengusulan_bantuan pu ON u.id_usulan = pu.usulan_id
          JOIN tb_masyarakat m ON pu.masyarakat_id = m.id_masyarakat 
          WHERE m.nama LIKE ? OR u.jenis_usulan LIKE ?
          ORDER BY pu.tgl_pengajuan DESC";
$stmt = $koneksi->prepare($query);
$searchParam = "%$search%";
$stmt->bind_param("ss", $searchParam, $searchParam);
$stmt->execute();
$result = $stmt->get_result();

// Check if the query was successful
if (!$result) {
    die("Query failed: " . $koneksi->error);
}

// Function to get usulan details
function getUsulanDetails($koneksi, $id_pengusulan_bantuan) {
    $query = "SELECT u.*, pu.*, m.*
              FROM tb_usulan u 
              JOIN tb_pengusulan_bantuan pu ON u.id_usulan = pu.usulan_id
              JOIN tb_masyarakat m ON pu.masyarakat_id = m.id_masyarakat 
              WHERE pu.id_pengusulan_bantuan = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_pengusulan_bantuan);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Usulan</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-12">
                    <form action="" method="GET" class="form-inline">
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="search" class="sr-only">Cari</label>
                            <input type="text" class="form-control" id="search" name="search" placeholder="Cari nama atau jenis usulan" value="<?php echo htmlspecialchars($search); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Cari</button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No.</th>
                            <th>Nama Pengusul</th>
                            <th>Jenis Usulan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($row = $result->fetch_assoc()) : 
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($row['nama_pengusul']); ?></td>
                                <td><?php echo htmlspecialchars($row['jenis_usulan']); ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row['tgl_pengajuan'])); ?></td>
                                <td><?php echo htmlspecialchars($row['status']); ?></td>
                                <td>
                                    <a href="../view_berkas.php?id=<?php echo $row['id_masyarakat']; ?>" 
                                       class="btn btn-primary btn-sm" target="_blank">
                                        <i class="fas fa-file-pdf"></i> Lihat Berkas
                                    </a>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?php echo $row['id_pengusulan_bantuan']; ?>">
                                        <i class="fas fa-info-circle"></i> Detail
                                    </button>
                                </td>
                            </tr>
                            <!-- Detail Modal -->
                            <div class="modal fade" id="detailModal<?php echo $row['id_pengusulan_bantuan']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel<?php echo $row['id_pengusulan_bantuan']; ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel<?php echo $row['id_pengusulan_bantuan']; ?>">Detail Usulan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            $details = getUsulanDetails($koneksi, $row['id_pengusulan_bantuan']);
                                            if ($details) :
                                            ?>
                                                <p><strong>Nama Pengusul:</strong> <?php echo htmlspecialchars($details['nama']); ?></p>
                                                <p><strong>Jenis Usulan:</strong> <?php echo htmlspecialchars($details['jenis_usulan']); ?></p>
                                                <p><strong>Tanggal Pengajuan:</strong> <?php echo date('d-m-Y', strtotime($details['tgl_pengajuan'])); ?></p>
                                                <p><strong>Status:</strong> <?php echo htmlspecialchars($details['status']); ?></p>
                                                <!-- Add more details as needed -->
                                            <?php else : ?>
                                                <p>Detail tidak ditemukan.</p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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