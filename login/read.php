<?php
session_start();

if(!isset($_SESSION['user'])){
    header("location:../login/form-login.php");
}

include '../connect.php';
?>