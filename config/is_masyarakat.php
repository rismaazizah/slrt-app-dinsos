<?php
if ($_SESSION['role'] != 'masyarakat') {
  header("Location: ../login.php");
  exit();
}
