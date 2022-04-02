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
        //lấy thông tin sản phẩm để hiển thị 
        $sql = "select * from products where id ='$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);

        //lấy thông tin nhà sản xuất của sản phẩm
        $sql = "select * from manufacturers";
        $manufacturers = mysqli_query($connect,$sql);
    ?>
        <a href="index.php">Về trang quản lý sản phẩm</a>
        <form action="process_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $each['id'] ?>" >
            Tên sản phẩm
            <input type="text" name="name" id="" value="<?php echo $each['name'] ?>">
            <br>
            Mô tả sản phẩm
            <input type="text" name="description" id="" value="<?php echo $each['description'] ?>">
            <br>
            Ảnh hiện tại
            <img src="images/<?php echo $each['image']; ?>" alt="" height="100px">
            <input type="hidden" name="image_old" value="<?php echo $each['image']; ?>">
            <br>
            Chọn ảnh mới
            <input type="file" name="image_new" id="">
            <br>
            Giá
            <input type="text" name="price" id="" value="<?php echo $each['price'] ?>">
            <br>
            Nhà sản xuất
            <select name="manufacturer_id" id="">
                <?php foreach ($manufacturers as $manufacturer) { ?>
                    <option value="<?php echo $manufacturer['id'] ?>" 
                    <?php if ($manufacturer['id'] == $each['manufacturer_id']) { ?>
                        selected 
                    <?php } ?>
                        >
                        <?php echo $manufacturer['name'] ?>
                    </option>
                <?php } ?>
            </select>
            <br>
            <button>Sửa</button>
        </form>

        
</body>
</html>