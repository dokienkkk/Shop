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
        //kiểm tra token để xem link có phải link mới nhất không
        //tránh trường hợp spam
        $token = $_GET['token'];
        require 'admin/connect.php';
        $sql = "select customer_id from forgot_password where token = '$token'";
        $result = mysqli_query($connect,$sql);
        if (mysqli_num_rows($result) !== 1) {
            header('location:forgot_password.php?error=Link da het han');
            exit;
        }
        $customer_id = mysqli_fetch_array($result)['customer_id'];

    ?>
    <h1>Đổi mật khẩu mới</h1>
    <form action="process_change_password.php" method="post">
        <input type="hidden" name="token" value="<?php echo $token ?>">
        Nhập mật khẩu mới
        <input type="password" name="password">
        <br>
        <button>Đổi mk</button>
    </form>
</body>
</html>