
<div id="header">
    <?php 
        session_start();
        if (isset($_SESSION['name'])) { 
    ?>
        Xin chào bạn <?php echo($_SESSION['name']) ?>
        <ul>
            <li>
                <a href="signout.php">Đăng xuất</a>
            </li>
            <li>
                <a href="">Xem giỏ hàng của bạn</a>
            </li>
        </ul>
    <?php } else { ?>
        <ul>
            <li>
                <a href="signin.php">Đăng nhập</a>
            </li>
            <li>
                <a href="signup.php">Đăng ký</a>
            </li>
        </ul>
    <?php }  ?>

</div>