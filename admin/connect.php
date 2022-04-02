<?php  

    $connect = mysqli_connect('localhost','root','','shop');
    mysqli_set_charset($connect,'utf8');

    $sql = "select * from admin";
    $result = mysqli_query($connect,$sql);
    foreach ($result as $value) {
        print_r($value);
    }