<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Giỏ hàng của bạn</h1>
    <a href="index.php">Về trang chủ</a>
    <?php 
        session_start();
        $cart = $_SESSION['cart'];
    ?>

    <table border="1" width="100%">
        <tr>
            <td>Mã sản phẩm</td>
            <td>Tên sản phẩm</td>
            <td>Ảnh sản phẩm</td>
            <td>Nhà sản xuất</td>
            <td>Số lương</td>
            <td>Giá</td>
            <td>Thành tiền</td>
            <td>Xóa</td>
        </tr>
        <?php foreach ($cart as $product_id => $product) { ?>
            <tr>
                <td><?php echo $product_id ?></td>
                <td><?php echo $product['name'] ?></td>
                <td><img src="admin/products/images/<?php echo $product['image'] ?>" height="200px" alt=""></td>
                <td><?php echo $product['manufacturer_name'] ?></td>
                <td>
                    <a href="update_quantity.php?id=<?php echo $product_id ?>&type=decre" style="text-decoration: none;">-</a>
                    <?php echo $product['quantity'] ?>
                    <a href="update_quantity.php?id=<?php echo $product_id ?>&type=incre" style="text-decoration: none;">+</a>
                </td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['price'] * $product['quantity'] ?></td>
                <td>
                    <a href="delete_cart.php?id=<?php echo $product_id ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>