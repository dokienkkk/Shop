
<div id="header">
    <ul>
        <?php if (isset($_SESSION['id'])){ ?>
            <p>Xin chào bạn <?php echo($_SESSION['name']) ?></p>
            <li>
            <a href="signout.php">Đăng xuất</a>
        </li>
        <li>
            <a href="">Xem giỏ hàng</a>
        </li>
        <?php } else { ?>
            <li>
                <a href="sigin.php">Đăng nhập</a>
            </li>
            <li>
                <a href="signup.php">Đăng ký</a>
            </li>
        <?php }  ?>
    </ul>
</div>