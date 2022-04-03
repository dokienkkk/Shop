<?php 
    session_start();
    if (empty($_SESSION['cart'])){
        echo 'Gio hang cua ban chua co san pham nao';
    } else {
        $cart = $_SESSION['cart'];
    }
?>

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
        // session_start();
        $sum = 0;
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
        <?php if (isset($cart)){
            foreach ($cart as $product_id => $product) { ?>
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
                <td>
                    <?php 
                        echo $product['price'] * $product['quantity'];
                        $sum += $product['price'] * $product['quantity'];
                    ?>
                </td>
                <td>
                    <a href="delete_cart.php?id=<?php echo $product_id ?>">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <h2>Tổng tiền đơn hàng của bạn: <?php echo $sum ?></h2>
    
    <!-- Orders -->
    <h3>Thông tin người nhận</h3>
    <?php 
        //lấy lại thông tin khách hàng điền sẵn vào form đặt hàng
        //cho trải nghiệm tốt hơn
        $id = $_SESSION['id'];
        require 'admin/connect.php';
        $sql = "select * from customers where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
    ?>
    <form action="">
        Tên người nhận
        <input type="text" name="name_receiver" value="<?php $each['name'] ?>">
        <br>
        Số điện thoại người nhận
        <input type="text" name="phone_receiver" value="<?php $each['phone'] ?>">
        <br>
        Địa chỉ người nhận
        <input type="text" name="address_receiver" value="<?php $each['address'] ?>">
        <br>
        <button>Đặt hàng</button>
    </form>
    <?php } else { ?>
            <h2>GIo hang chua co san pham nao`</h2>
    <?php  } ?>
</body>
</html>