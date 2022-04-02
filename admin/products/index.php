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
        $sql = "select products.*,manufacturers.name as manufacturer_name 
        from products 
        join manufacturers 
        on products.manufacturer_id = manufacturers.id";
        $result = mysqli_query($connect,$sql);
    ?>
    <h1>Quản lý nhà sản phẩm</h1>
    <a href="form_insert.php">Thêm sản phẩm</a>
    <table border="1" width="100%">
        <tr>
            <td>Mã</td>
            <td>Tên sản phẩm</td>
            <td>Ảnh sản phẩm</td>
            <td>Nhà sản xuất</td>
            <td>Giá</td>
            <td>Mô tả</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php foreach ($result as $each) { ?>
            <tr>
                <td><?php echo $each['id']; ?></td>
                <td><?php echo $each['name']; ?></td>
                <td>
                    <img src="images/<?php echo $each['image']; ?>" alt="" height="100px">
                </td>
                <td>
                    <?php echo $each['manufacturer_name']; ?>
                </td>
                <td><?php echo $each['price']; ?></td>
                <td><?php echo $each['description']; ?></td>
                <td>
                    <a href="form_update.php?id=<?php echo $each['id'];?>">Sửa</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id'];  ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php mysqli_close($connect); ?>
</body>
</html>