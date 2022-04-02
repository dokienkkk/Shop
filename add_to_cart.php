<?php  
    $id = $_GET['id'];

    session_start();

    require 'admin/connect.php';

    // unset($_SESSION['cart'][$id]);
    //thêm sản phẩm vào giỏ hàng
    //nếu chưa có thì lấy từ database về lưu vào giỏ hàng (session)
    if (empty($_SESSION['cart'][$id])) {
        $sql = "select products.*,manufacturers.name as manufacturer_name 
        from products join manufacturers on products.manufacturer_id = manufacturers.id where products.id = '$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
        $_SESSION['cart'][$id]['name'] = $each['name'];
        $_SESSION['cart'][$id]['image'] = $each['image'];
        $_SESSION['cart'][$id]['price'] = $each['price'];
        $_SESSION['cart'][$id]['manufacturer_name'] = $each['manufacturer_name'];
        $_SESSION['cart'][$id]['quantity'] = 1;
    } else {
        $_SESSION['cart'][$id]['quantity'] ++;
    }

    mysqli_close($connect);

    header('location:view_cart.php');