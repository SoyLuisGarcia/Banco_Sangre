<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: ../public/login.php");
    exit;
}

if($_SESSION['user']['rol'] != "admin"){
    header("Location: ../public/dashboard.php");
    exit;
}
?>