<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CHi tiết sản phẩm</h1>
    <?php 
        require 'admin/connect.php';
        $id = $_GET['id'];
        $sql = "select products.*,manufacturers.name as manufacturer_name 
        from products 
        join manufacturers 
        on products.manufacturer_id = manufacturers.id 
        where products.id ='$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
    ?>
    <h2><?php echo $each['name'] ?></h2>
    <i><?php echo $each['manufacturer_name'] ?></i>
    <br>
    <img src="admin/products/images/<?php echo $each['image'] ?>" alt="" height="300px">
    <br>
    <p><?php echo $each['description'] ?></p>
    <span>Giá: $<?php echo $each['price'] ?></span>
    <br>
    <a href="add_to_cart.php?id=<?php echo $id ?>">Thêm vào giỏ hàng</a>
</body>
</html>