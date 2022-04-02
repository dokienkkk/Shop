<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require '../connect.php';
        $sql = "select * from manufacturers ";
        $result = mysqli_query($connect,$sql);
    ?>
    <h1>Thêm sản phẩm</h1>
        <a href="index.php">Về trang quản lý nhà sản xuất</a>
        <form action="process_insert.php" method="post" enctype="multipart/form-data" >
            Tên sản phẩm
            <input type="text" name="name" id="">
            <br>
            Mô tả
            <input type="text" name="description" id="">
            <br>
            Ảnh
            <input type="file" name="image" id="">
            <br>
            Giá
            <input type="text" name="price" id="">
            <br>
            Nhà sản xuất
            <select name="manufacturer_id" id="">
                <?php foreach ($result as $each) { ?>
                    <option value="<?php echo $each['id'] ?>">
                        <?php echo $each['name'] ?>
                    </option>
                <?php } ?>
            </select>
            <br>
            <button>Thêm</button>
        </form>
</body>
</html>