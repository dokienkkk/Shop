<?php  

    require 'admin/connect.php';

    if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['password'])) {
        header('location:signup.php?error=Bạn phải điền đầy đủ thông tin');
        exit;
    }

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "insert into manufacturers(name,address,phone,image) 
    values('$name','$address','$phone','$image')";
    mysqli_query($connect,$sql);
    mysqli_close($connect);

    header('location:index.php?success=Thêm nhà sản xuất thành công');