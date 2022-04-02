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
        <button>Đăng nhập</button>
    </form>
</body>
</html>