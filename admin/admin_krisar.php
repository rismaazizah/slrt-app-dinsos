<?php
include '../config/koneksi.php';
include '../modules/header2.php';

// Check if the user is logged in as an admin
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

// Pagination settings
$records_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

// Initialize the WHERE clause
$where_clause = "WHERE 1=1";

// Check for filter parameters
if (isset($_GET['start_date']) && $_GET['start_date'] != '') {
    $where_clause .= " AND tanggal >= '" . $_GET['start_date'] . "'";
}
if (isset($_GET['end_date']) && $_GET['end_date'] != '') {
    $where_clause .= " AND tanggal <= '" . $_GET['end_date'] . "'";
}

// Fetch kritik dan saran data with pagination and filters
$sql = "SELECT * FROM kritik_saran $where_clause ORDER BY tanggal DESC LIMIT $offset, $records_per_page";
$result = $koneksi->query($sql);

// Get total number of records
$total_records_sql = "SELECT COUNT(*) FROM kritik_saran $where_clause";
$total_records_result = $koneksi->query($total_records_sql);
$total_records = $total_records_result->fetch_row()[0];
$total_pages = ceil($total_records / $records_per_page);

?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Kritik dan Saran</h1>
    <div class="card card-body">
     <div class="row">
       <div class="col-12 d-flex justify-content-between">
         <a href="export_krisar.php" class="btn btn-info" target="_blank">Print Data</a>
       </div>
     </div>
    </div>
    <div class="card card-body mt-2">
        <div class="row">
            <div class="col-12">
                <form action="" method="GET">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="start_date">Tanggal Awal</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="<?= isset($_GET['start_date']) ? $_GET['start_date'] : '' ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="end_date">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="<?= isset($_GET['end_date']) ? $_GET['end_date'] : '' ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary btn-block">Filter</button>
                        </div>
                    </div>
                </form>
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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = $offset + 1;
                        while ($row = $result->fetch_assoc()): 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['pesan']); ?></td>
                            <td><?php echo $row['tanggal']; ?></td>
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
                                <a class="page-link" href="?page=<?php echo $page - 1; ?><?php echo isset($_GET['start_date']) ? '&start_date='.$_GET['start_date'] : ''; ?><?php echo isset($_GET['end_date']) ? '&end_date='.$_GET['end_date'] : ''; ?>" aria-label="Previous">
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
                                <a class="page-link" href="?page=<?php echo $i; ?><?php echo isset($_GET['start_date']) ? '&start_date='.$_GET['start_date'] : ''; ?><?php echo isset($_GET['end_date']) ? '&end_date='.$_GET['end_date'] : ''; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <?php if ($page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?><?php echo isset($_GET['start_date']) ? '&start_date='.$_GET['start_date'] : ''; ?><?php echo isset($_GET['end_date']) ? '&end_date='.$_GET['end_date'] : ''; ?>" aria-label="Next">
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