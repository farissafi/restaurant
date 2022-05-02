<?php
// delete data without image|file
if (isset($_GET['id'])) {
    include 'config.php';
    $sql = "delete from food_menu where id=" . $_GET["id"];
    $rsDelete = mysqli_query($conn, $sql);
    if ($rsDelete) {
      header('location:food_meals_mangment.php?success=true');
      exit();
    }
  }
?>