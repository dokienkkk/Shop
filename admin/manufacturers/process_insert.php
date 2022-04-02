<?php  

    require '../connect.php';

    if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['image']) || empty($_POST['phone'])) {
        header('location:form_insert.php?error=Bạn phải điền đầy đủ thông tin');
        exit;
    }

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $image = $_POST['image'];

    $sql = "insert into manufacturers(name,address,phone,image) 
    values('$name','$address','$phone','$image')";
    mysqli_query($connect,$sql);
    mysqli_close($connect);

    header('location:index.php?success=Thêm nhà sản xuất thành công');