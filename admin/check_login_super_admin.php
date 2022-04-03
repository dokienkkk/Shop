<?php 
    session_start();
    if (empty($_SESSION['level'])) {
        //empty($_SESSION['level']) tương đương với isset($_SESSION['level']) && $_SESSION['level'] == 1
        header('location:../index.php');
        exit;
    }