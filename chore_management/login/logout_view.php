<?php
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['role_id']);
header("Location: Login_Page.html");

exit();
?>
