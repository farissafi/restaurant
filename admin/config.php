<?php
// connecting in database
$conn = mysqli_connect("localhost", "root", "", "restaurant_db");
if (!$conn) {
  die("No connect" . mysqli_connect_errno());
}
?>
