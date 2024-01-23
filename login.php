<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>
  <link rel="shortcut icon" href="assets/img/banjar.png" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="assets/library/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/library/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-secondary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-top: 7rem;">

      <div class="col-xl-6 col-lg-6 col-md-8 col-12">

        <div class="row">
          <div class="col-12 mt-5">
            <?php
            session_start();
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
        </div>

        <div class="card o-hidden border-0 shadow-lg ">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" action="config/login_proses.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" required placeholder="Masukkan Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" required placeholder="Masukkan Password...">
                    </div>
                    <button type="submit" class="btn btn-info btn-user btn-block">Login</button>

                    <hr>
                    <div class="d-flex w-100 justify-content-center align-content-center mt-2">
                      <p class="small">
                        Masyarakat? Daftar <a href="register.php">Disini</a>
                      </p>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/library/sbadmin/vendor/jquery/jquery.min.js"></script>
  <script src="assets/library/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/library/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/library/sbadmin/js/sb-admin-2.min.js"></script>

</body>

</html>