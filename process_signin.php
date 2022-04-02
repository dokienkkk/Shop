<?php  

    require 'admin/connect.php';

    if (empty($_POST['email']) || empty($_POST['password'])) {
        header('location:signup.php?error=Bạn phải điền đầy đủ thông tin');
        exit;
    }
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "select count(*) from customers where email ='$email' and password = '$password'";
    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_fetch_array($result)['count(*)'];
    if ($number_rows == 1) {
        header('location:index.php?success=Đăng nhập thành công');
        exit;
    }
    header('location:signin.php?error=Đăng nhập thất bại');
    
    
