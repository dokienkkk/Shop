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
        $sql = "select * from manufacturers";
        $result = mysqli_query($connect,$sql);
    ?>
    <h1>Quản lý nhà sản xuất</h1>
    <a href="form_insert.php">Thêm nhà sản xuất</a>
    <table border="1" width="100%">
        <tr>
            <td>Mã</td>
            <td>Tên nhà sản xuất</td>
            <td>Ảnh nhà sản xuất</td>
            <td>Địa chỉ</td>
            <td>Số điện thoại</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php foreach ($result as $each) { ?>
            <tr>
                <td><?php echo $each['id']; ?></td>
                <td><?php echo $each['name']; ?></td>
                <td>
                    <img src="<?php echo $each['image']; ?>" alt="" height="100px">
                </td>
                <td><?php echo $each['address']; ?></td>
                <td><?php echo $each['phone']; ?></td>
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