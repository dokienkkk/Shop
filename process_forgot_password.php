<?php 
    $email = $_POST['email'];
    require 'admin/connect.php';
    //1.Kiểm tra xem email người dùng có tồn tại không ?
    //2.Gửi mail link thay đổi mật khẩu (dùng php mailer)
    //  2.1. Xóa thông tin cũ của ngươi dùng trong bảng quên mật khẩu (để đảm bảo link luôn mới)
    //3.
    //
    $sql = "select id,name from customers where email = '$email'";
    $result = mysqli_query($connect,$sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows === 1) {
        $each = mysqli_fetch_array($result);
        $id = $each['id'];
        $name = $each['name'];

        //xóa lần quên mật khẩu cũ đi
        //đảm bảo trong bảng quên mật khẩu của 1 người dùng chỉ có 1 lần
        $sql = "delete from forgot_password where customer_id = '$id'";
        mysqli_query($connect,$sql);
        
        $token = uniqid();
        $link =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http"). "://$_SERVER[HTTP_HOST]" . "/change_password.php?token=" . $token;
        
        //insert giá trị mới vào bảng forgot password
        $sql  = "insert into forgot_password(customer_id,token) values('$id','$token')";
        mysqli_query($connect,$sql);

        //gửi gmail
        $title = "chage new password";
        $content = "link đổi password <a href='$link'>tại đây</a>";
        require 'mail.php';
        send_mail($email,$name,$title,$content);
        echo 'Link khoi phuc da duoc gui vao gmail cua ban';
    } else {
        
        header('location:forgot_password.php?error=Email không tồn tại');
        exit;
    }