<?php  

    require 'admin/connect.php';

    if (empty($_POST['name']) 
    || empty($_POST['address']) 
    || empty($_POST['phone']) 
    || empty($_POST['email']) 
    || empty($_POST['password'])) {
        header('location:signup.php?error=Bạn phải điền đầy đủ thông tin');
        exit;
    }

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // kiểm tra xem email đã có ai đặt chưa
    $sql = "select count(*) from customers where email ='$email'";
    $result = mysqli_query($connect,$sql);
    $number_rows = mysqli_fetch_array($result)['count(*)'];
    if ($number_rows == 1) {
        header('location:signup.php?error=Email đã có người đặt rồi');
        exit;
    }
    $sql = "insert into customers(name,email,password,phone,address) 
    values('$name','$email','$password','$phone','$address')";
    mysqli_query($connect,$sql);
    mysqli_close($connect);
    header('location:signin.php?success=Đăng ký thành công');