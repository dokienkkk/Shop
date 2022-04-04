<?php  

    $status = $_GET['status'];
    $order_id = $_GET['order_id'];

    require '../connect.php';
    $sql = "update orders set status = '$status' where id = '$order_id'";
    mysqli_query($connect,$sql);
    mysqli_close($connect);
    header('location:index.php');