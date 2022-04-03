<?php  
     
    require '../check_login_super_admin.php';

    $id = $_GET['id'];
    require '../connect.php';
    $sql = "delete from manufacturers where id = '$id'";
    mysqli_query($connect,$sql);
    mysqli_close($connect);
    header('location:index.php?success=Xóa nhà sản xuất thành công');
    