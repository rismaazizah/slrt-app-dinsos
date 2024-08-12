<?php
include '../config/koneksi.php';
include '../modules/header.php';

// Check if the user is logged in as an admin
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

// Check if usulan_id is provided
if (!isset($_GET['usulan_id'])) {
    die("Usulan ID tidak ditemukan.");
}

$usulan_id = $_GET['usulan_id'];

// Fetch usulan and berkas data from the database
$query = "SELECT u.id_usulan, u.jenis_usulan, pu.tgl_pengajuan, m.nama AS nama_pengusul, b.nama_berkas, b.file_path
          FROM tb_usulan u 
          JOIN tb_pengusulan_bantuan pu ON u.id_usulan = pu.usulan_id
          JOIN tb_masyarakat m ON pu.masyarakat_id = m.id_masyarakat 
          LEFT JOIN tb_berkas b ON u.id_usulan = b.usulan_id
          WHERE u.id_usulan = ?";

$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $usulan_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Usulan tidak ditemukan.");
}

$usulan = $result->fetch_assoc();
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail Berkas Usulan</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Usulan #<?php echo $usulan['id_usulan']; ?></h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-3"><strong>Jenis Usulan:</strong></div>
                <div class="col-md-9"><?php echo $usulan['jenis_usulan']; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Tanggal Pengajuan:</strong></div>
                <div class="col-md-9"><?php echo date('d-m-Y', strtotime($usulan['tgl_pengajuan'])); ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Nama Pengusul:</strong></div>
                <div class="col-md-9"><?php echo $usulan['nama_pengusul']; ?></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"><strong>Berkas:</strong></div>
                <div class="col-md-9">
                    <?php if ($usulan['nama_berkas'] && $usulan['file_path']): ?>
                        <a href="<?php echo $usulan['file_path']; ?>" target="_blank" class="btn btn-primary btn-sm">
                            Lihat <?php echo $usulan['nama_berkas']; ?>
                        </a>
                    <?php else: ?>
                        <p>Tidak ada berkas yang tersedia.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <a href="admin_usulan_list.php" class="btn btn-secondary">Kembali ke Daftar Usulan</a>
</div>

<?php
include '../modules/footer.php';
$koneksi->close();
?>