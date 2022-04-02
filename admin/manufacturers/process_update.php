<?php 
    $id = $_POST['id'];
    if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['image']) || empty($_POST['phone'])) {
        header("location:form_update.php?id=$id&error=Bạn phải điền đầy đủ thông tin");
        exit;
    }

    require '../connect.php';

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $image = $_POST['image'];

    $sql = "update manufacturers set name = '$name',
    address = '$address',
    phone = '$phone',
    image = '$image' 
    where id = '$id' ";
    mysqli_query($connect,$sql);
    $error = mysqli_error($connect);
    mysqli_close($connect);
    if (empty($error)) {
        header('location:index.php?success=Sửa nhà sản xuất thành công');
    } else {
        header("location:form_update.php?id=$id&error=Lỗi truy vấn");
    }
