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

    require 'admin/mail.php';
    $title ='Đăng ký tài khoản thành công';
    $content = 'chúc mừng bạn đã trúng iphone 13 pro max. Bấm link sau để nhận thưởng<a href="https//scam.com">Link uy tín</a>';
    send_mail($email,$name,$title,$content);

    //lưu thông tin user (id và name) vào session
    $sql = "select id from customers where email ='$email'";
    $result = mysqli_query($connect,$sql);
    $id = mysqli_fetch_array($result)['id'];
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;

    mysqli_close($connect);
    header('location:index.php?success=Đăng ký thành công');