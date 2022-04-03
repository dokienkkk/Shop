<?php 
    session_start();
    // die($_SESSION['level']);
    if (!isset($_SESSION['level'])) {
        header('location:../index.php');
        exit;
    }