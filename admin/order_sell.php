<?php
if (isset($_GET['id'])) {
    include "config.php";
    $sqlGetDepData = "select * from order_list where id=" . $_GET['id'];
    $result = mysqli_query($conn, $sqlGetDepData);
    $row = mysqli_fetch_assoc($result);
    $sql= "update order_list set order_state=1 where order_list.id=" . $_GET['id'];
    $res = mysqli_query($conn, $sql);
    header('location:order_list_mangment.php?success=true');
    exit();
}
