<?php
if ($_SESSION['role'] != 'kadis') {
  header("Location: ../login.php");
  exit();
}
