<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Quên mật khẩu</h1>
    <?php if (isset($_GET['error'])){ ?>
        <span style="color: red;">
            <?php echo $_GET['error'] ?>
        </span>
    <?php } ?>
    <form action="process_forgot_password.php" method="post">
        Nhập Email của bạn
        <br>
        <input type="email" name="email" id="">
        <br>
        <button>Gửi</button>
        <br>
        Bạn đã có tài khoản?<a href="signin.php">Đăng nhập</a>
        <br>
        Bạn chưa có tài khoản?<a href="signup.php">Đăng nhập</a>
    </form>
</body>
</html>