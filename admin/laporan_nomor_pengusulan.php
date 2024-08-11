<?php
include '../config/koneksi.php';
include '../modules/header.php';

// Check if the user is logged in as an admin
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

// Pagination settings
$records_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Fetch pengusulan bantuan data with pagination
$sql = "SELECT nomor_pengusulan, nama_pengusul, tgl_pengajuan, status FROM tb_pengusulan_bantuan ORDER BY tgl_pengajuan DESC LIMIT $offset, $records_per_page";
$result = $koneksi->query($sql);

// Get total number of records
$total_records_sql = "SELECT COUNT(*) FROM tb_pengusulan_bantuan";
$total_records_result = $koneksi->query($total_records_sql);
$total_records = $total_records_result->fetch_row()[0];
$total_pages = ceil($total_records / $records_per_page);

?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Laporan Nomor Pengusulan</h1>
    <div class="card card-body">
     <div class="row">
       <div class="col-12 d-flex justify-content-between">
         <a href="export_laporan_nomor_pengusulan.php" class="btn btn-info" target="_blank">Print Data</a>
       </div>
     </div>
   </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pengusulan</th>
                            <th>Nama Pengusul</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = $offset + 1;
                        while ($row = $result->fetch_assoc()): 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($row['nomor_pengusulan']); ?></td>
                            <td><?php echo htmlspecialchars($row['nama_pengusul']); ?></td>
                            <td><?php echo $row['tgl_pengajuan']; ?></td>
                            <td><?php echo htmlspecialchars($row['status']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    Showing <?php echo $offset + 1; ?> to <?php echo min($offset + $records_per_page, $total_records); ?> of <?php echo $total_records; ?> entries
                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo; Previous</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php
                        $start_page = max(1, $page - 2);
                        $end_page = min($total_pages, $page + 2);
                        for ($i = $start_page; $i <= $end_page; $i++):
                        ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <?php if ($page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">Next &raquo;</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php
include '../modules/footer.php';
$koneksi->close();
?>