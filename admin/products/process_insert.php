<?php  

    require '../connect.php';

    if (empty($_POST['name']) || empty($_POST['price']) || empty($_FILES['image']) || empty($_POST['description'])) {
        header('location:form_insert.php?error=Bạn phải điền đầy đủ thông tin');
        exit;
    }

    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image'];
    $manufacturer_id = $_POST['manufacturer_id'];

    $folder = "images/";

    //lấy đuôi file ảnh
    $file_extension = explode('.',$image['name'])[1];
    //đặt lại tên ảnh (đường dẫn) (nhớ thêm dấu chấm '.')
    $image_name = time().'.'.$file_extension;
    $target_file = $folder.$image_name;
    //chuyển file ảnh từ thư mục tạm thời temp vào thư mục images do mình tạo
    move_uploaded_file($image["tmp_name"], $target_file);

    $sql = "insert into products(name,description,price,manufacturer_id,image) 
    values('$name','$description','$price','$manufacturer_id','$image_name')";
    mysqli_query($connect,$sql);
    mysqli_close($connect);
    header('location:index.php?success=Thêm sản phẩm thành công');