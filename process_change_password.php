<?php  
    $password = $_POST['password'];
    $token = $_POST['token'];
    //cap nhat mat khau moi cho nguoi dung
    require 'admin/connect.php';

    //van kiem tra lai token xem link co chinh xac khong
    $sql = "select customer_id from forgot_password where token = '$token'";
    $result = mysqli_query($connect,$sql);
    if (mysqli_num_rows($result) !== 1) {
        header('location:forgot_password.php?error=Link da het han');
        exit;
    }
    $customer_id = mysqli_fetch_array($result)['customer_id'];

    //cap nhat mat khau moi
    $sql = "update customers set password = '$password' where id = '$customer_id'";
    // die($sql);
    mysqli_query($connect,$sql);
    mysqli_close($connect);

    header('location:signin.php?success=Doi mk thanh cong');

    