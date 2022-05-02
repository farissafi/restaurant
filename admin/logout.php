<?php
// logout code
session_start();
if (isset($_SESSION['id'])) {
  session_destroy();
  header('location:login.php');
}
?>