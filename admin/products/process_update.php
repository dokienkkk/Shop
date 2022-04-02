<?php 
    $id = $_POST['id'];
    if (empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price'])) {
        header("location:form_update.php?id=$id&error=Bạn phải điền đầy đủ thông tin");
        exit;
    }

    require '../connect.php';
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image_new = $_FILES['image_new'];
    $manufacturer_id = $_POST['manufacturer_id'];
    
    if ($image_new['size'] > 0) {
        $folder = "images/";
        //lấy đuôi file ảnh
        $file_extension = explode('.',$image_new['name'])[1];
        //đặt lại tên ảnh (đường dẫn) (nhớ thêm dấu chấm '.')
        $image_name = time().'.'.$file_extension;
        $target_file = $folder.$image_name;
        //chuyển file ảnh từ thư mục tạm thời temp vào thư mục images do mình tạo
        move_uploaded_file($image_new["tmp_name"], $target_file);
    } else {
        $image_name = $_POST['image_old'];
    }
    $sql = "update products set name = '$name',
    description = '$description',
    image = '$image_name',
    price = '$price',
    manufacturer_id = '$manufacturer_id' 
    where id = '$id' ";
    mysqli_query($connect,$sql);
    $error = mysqli_error($connect);
    mysqli_close($connect);
    if (empty($error)) {
        header('location:index.php?success=Sửa sản phẩm thành công');
    } else {
        header("location:form_update.php?id=$id&error=Lỗi truy vấn");
    }
