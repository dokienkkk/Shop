<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Quay lại</a>
    <?php 
        $order_id = $_GET['order_id'];
        $total_price = 0;
        require '../connect.php';
        $sql = "select products.*,order_product.quantity from order_product join products on order_product.product_id = products.id where order_id = '$order_id'";
        $result = mysqli_query($connect,$sql);
    ?>
    <h2>Mã đơn : <?php echo $order_id; ?></h2>
    <table border="1" width="100%">
        <tr>
            <td>Tên</td>
            <td>Ảnh</td>
            <td>Giá</td>
            <td>Số lượng</td>
            <td>Thành tiền</td>
            <!-- <td>Xử lý đơn</td> -->
        </tr>
        <?php foreach ($result as $product) { ?>
            <tr>
                <td><?php echo $product['name'] ?></td>
                <td>
                    <img src="../products/images/<?php echo $product['image'] ?>" alt="" height="100px">
                </td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['quantity'] ?></td>
                <td>
                    <?php 
                        echo $product['quantity'] * $product['price'];
                        $total_price += $product['quantity'] * $product['price'];
                    ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <h2 style="color: #222;"><?php echo 'Tổng tiền: $'.$total_price; ?></h2>
    
</body>
</html>