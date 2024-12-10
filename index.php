<?php
session_start(); 

if (empty($_GET) || !isset($_GET['page']) || empty($_GET['page'])) {
    header('Location: index.php?page=home');
    exit; 
}

if (isset($_SESSION['userID'])) {

    $id_user = $_SESSION['userID'];
} else {

    $id_user = null;
}


include_once "views/partial/header.php";
include_once "router/route.php";
include_once "views/partial/footer.php";