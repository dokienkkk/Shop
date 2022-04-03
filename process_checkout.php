<?php

    $name_receiver = $_POST['name_receiver'];
    $phone_receiver = $_POST['phone_receiver'];
    $address_receiver = $_POST['address_receiver'];

    //trạng thái ban đầu của đơn hàng là 0 (mới đặt)
    //còn lại là 1(đã duyệt) và 2 (hủy đơn)
    $status = 0;

    //lấy mã khách hàng
    session_start();
    $customer_id = $_SESSION['id'];
    $cart = $_SESSION['cart'];
    $total_price = 0;
    foreach ($cart as $item) {
        $total_price += $item['quantity'] * $item['price'];
    }



    require 'admin/connect.php';

    //insert vào bảng orders
    $sql = "insert into orders(customer_id,name_receiver,phone_receiver,address_receiver,status,total_price)   
    values('$customer_id','$name_receiver','$phone_receiver','$address_receiver','$status','$total_price')";
    // die($sql);
    mysqli_query($connect,$sql);

    

    //lấy id của đơn hàng vừa insert vào bên trên để lưu vào bảng order_product
    $sql = "select max(id) from orders where customer_id = '$customer_id' ";
    $result = mysqli_query($connect,$sql);
    // print_r(mysqli_fetch_array($result));
    // die();
    $order_id = mysqli_fetch_array($result)['max(id)'];
    

    foreach ($cart as $product_id => $item) {
        $quantity = $item['quantity'];
        $sql = "insert into order_product(order_id,product_id,quantity) 
        values('$order_id','$product_id','$quantity')";
        mysqli_query($connect,$sql);
    }
    
    mysqli_close($connect);
    unset($_SESSION['cart']);
    header('location:view_cart.php');