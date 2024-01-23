<?php
include 'modules/header.php';
?>

<title>Ini Halaman Profil</title>

<!-- Begin Page Content -->
<div class="container-fluid">

  <?php
  include_once 'config/koneksi.php';
  $id_user = $_SESSION['id_user'];
  $qry = "SELECT * FROM tb_user WHERE id_user = '$id_user'";
  $result = mysqli_query($koneksi, $qry);
  $data = mysqli_fetch_assoc($result);
  ?>

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Edit Profil </h1>

  <div class="row">
    <div class="col-12">
      <?php
      if (isset($_SESSION['result'])) {
        if ($_SESSION['result'] == 'success') {
      ?>
          <!-- Success -->
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $_SESSION['message'] ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- Success -->
        <?php
        } else {
        ?>
          <!-- danger -->
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?= $_SESSION['message'] ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- danger -->
      <?php
        }
        unset($_SESSION['result']);
        unset($_SESSION['message']);
      }
      ?>

    </div>
    <div class="col-12">
      <div class="card card-body">
        <table class="table table-bordered">
          <tr>
            <th style="width: 200px;">Username</th>
            <td><?= $data['username'] ?></td>
          </tr>
          <tr>
            <th style="width: 200px;">Role</th>
            <td><?= $data['role'] ?></td>
          </tr>
        </table>
        <div class="row">
          <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Edit
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="update_profil.php" method="post" id="updateProfil">
          <input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="updateProfil" class="btn btn-primary">Perbarui</button>
      </div>
    </div>
  </div>
</div>
<?php
include 'modules/footer.php';
?>