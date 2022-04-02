<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sửa nhà sản xuất</h1>
    <?php if(isset($_GET['error'])){ ?>
        <span style="color: red;"><?php echo($_GET['error']); ?></span>
        <br>
    <?php   } ?>
    <?php 
        if(empty($_GET['id'])){
            header('location:index.php?error=Phải truyền mã để sửa');   
            exit; 
        }
        $id = $_GET['id'];
        require '../connect.php';
        $sql = "select * from manufacturers where id ='$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
    ?>
        <a href="index.php">Về trang quản lý nhà sản xuất</a>
        <form action="process_update.php" method="post" >
            <input type="hidden" name="id" value="<?php echo $each['id'] ?>" >
            Tên nhà sản xuất
            <input type="text" name="name" id="" value="<?php echo $each['name'] ?>">
            <br>
            Địa chỉ nhà sản xuất
            <input type="text" name="address" id="" value="<?php echo $each['address'] ?>">
            <br>
            Link Ảnh
            <input type="text" name="image" id="" value="<?php echo $each['image'] ?>">
            <br>
            Số điện thoại
            <input type="text" name="phone" id="" value="<?php echo $each['phone'] ?>">
            <br>
            <button>Sửa</button>
        </form>
</body>
</html>