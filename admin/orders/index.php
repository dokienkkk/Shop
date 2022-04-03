<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Quản lý đơn hàng</h1>
    <?php 
        require '../connect.php';
        $sql = "select orders.*,
        customers.name,customers.phone,customers.address from orders join customers on orders.customer_id = customers.id";
        $result = mysqli_query($connect,$sql);
    ?>
    <table border="1" width="100%">
        <tr>
            <td>Mã đơn</td>
            <td>Thông tin người đặt</td>
            <td>Thời gian đặt</td>
            <td>Thông tin người nhận</td>
            <td>Xem chi tiết</td>
            <td>Trạng thái đơn</td>
            <td>Xử lý đơn</td>
        </tr>
        <?php  foreach ($result as $each) { ?>
            <tr>
                <td><?php echo $each['id'] ?></td>
                <td>
                    Tên người đặt: <?php echo $each['name'] ?><br>
                    Địa chỉ người đặt: <?php echo $each['address'] ?><br>
                    Số điện thoại: <?php echo $each['phone'] ?>
                </td>
                <td><?php echo $each['create_at'] ?></td>
                <td>
                    Tên người nhận: <?php echo $each['name_receiver'] ?><br>
                    Địa chỉ người nhận: <?php echo $each['address_receiver'] ?><br>
                    Số điện thoại: <?php echo $each['phone_receiver'] ?>
                </td>
                <td>
                    <a href="detail.php?order_id=<?php echo $each['id'] ?>">Xem chi tiết</a>
                </td>
                <td><?php if($each['status']==0){ echo 'Mới đặt'; }?></td>
                <td>duyệt/hủy</td>
            </tr>
        <?php  } ?>
    </table>
</body>
</html>