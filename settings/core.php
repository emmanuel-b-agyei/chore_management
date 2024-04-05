<?php
session_start(); 

function checkLogin() {
    if(!isset($_SESSION['user_id'])) { 
        header("Location: Login_view.php");
        exit(); 
    }
}

function checkRoleAccess($allowedRoles) {
    if (!isset($_SESSION['role_id'])) {
        header("Location: Login_view.php");
        exit();
    }

    $userRole = $_SESSION['role_id'];
    if (!in_array($userRole, $allowedRoles)) {
        header("Location: home_view.php");
        exit();
    }
}
?>
