<?php  

    require 'admin/connect.php';

    if (empty($_POST['email']) || empty($_POST['password'])) {
        header('location:signin.php?error=Bạn phải điền đầy đủ thông tin');
        exit;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select count(*) from customers where email ='$email' and password = '$password'";
    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_fetch_array($result)['count(*)'];
    if ($number_rows == 1) {
        session_start();
        $each = mysqli_fetch_array($result);
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        header('location:index.php?success=Đăng nhập thành công');
        exit;
    } else {
        header('location:signin.php?error=Tài khoản hoặc mật khẩu của bạn không đúng');
    }
    
    
