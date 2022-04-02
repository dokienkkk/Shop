<?php  

    require 'admin/connect.php';

    if (empty($_POST['email']) || empty($_POST['password'])) {
        header('location:signin.php?error=Bạn phải điền đầy đủ thông tin');
        exit;
    }

    if (isset($_POST['remember'])){
        $remember = true;
    } else {
        $remember = false;
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "select * from customers where email ='$email' and password = '$password'";
    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_num_rows($result);
    if ($number_rows == 1) {
        session_start();
        $each = mysqli_fetch_array($result);
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];

        //nếu ghi nhớ đăng nhập thì set cookie
        if ($remember) {
            $id = $each['id'];
            $token = uniqid("user_",true);
            $sql = "update customers set token = '$token' where id = '$id'";
            mysqli_query($connect,$sql);
            setcookie('remember',$token,time() + 60*60*24*30);
        }

        header('location:index.php?success=Đăng nhập thành công');
        exit;
    } else {
        header('location:signin.php?error=Tài khoản hoặc mật khẩu của bạn không đúng');
    }
    
    
