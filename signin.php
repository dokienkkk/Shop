
<?php 
//kiểm tra cookie nếu có thì cho user đăng nhập
    session_start();
    if (isset($_COOKIE['remember'])){
        // die($_COOKIE['remember']);
        $token = $_COOKIE['remember'];
        require 'admin/connect.php';
        $sql = "select * from customers where token = '$token'";
        $result = mysqli_query($connect,$sql);
        $number_rows = mysqli_num_rows($result);

        //nếu người dùng có lưu token thì đăng nhập lun cho
        if ($number_rows == 1) {
            $each = mysqli_fetch_array($result);
            $_SESSION['id'] = $each['id'];
            $_SESSION['name'] = $each['name'];
        }
        // còn không không làm gì cả
        // vẫn hiện form đăng nhập như bình thường

    }
    //tự động đăng nhập
    if (isset($_SESSION['name'])){
        header('location:index.php');
        exit;
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
    <h1>Trang đăng nhập</h1>
    <?php if (isset($_GET['error'])) { ?>
        <span style="color: red;">
            <?php echo($_GET['error'])  ?>
        </span>
    <?php } ?>

    <form action="process_signin.php" method="post">
        Email
        <input type="email" name="email" id="">
        <br>
        Password
        <input type="password" name="password" id="">
        <br>
        Ghi nhớ đăng nhập
        <input type="checkbox" name="remember" id="">
        <br>
        <a href="forgot_password.php">Quên mật khẩu</a>
        <button>Đăng nhập</button>
    </form>
    <p>Bạn chưa có tài khoản ? <a href="signup.php">Đăng ký</a></p>
</body>
</html>