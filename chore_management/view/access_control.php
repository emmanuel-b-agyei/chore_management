<?php
// Include the core.php file that contains the access control functions
include '../settings/core.php';

// Call checkLogin() to ensure the user is logged in
checkLogin();

// Define allowed roles for accessing this page
$allowedRoles = [1, 2]; // Example: Super-admin (1), Admin (2)

// Check role-based access
checkRoleAccess($allowedRoles);
include "home_view.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Access-Controlled Page</title>
</head>
<body>
  <h1>Welcome to the Access-Controlled Page</h1>
  <p>This page is accessible only to users with certain roles.</p>
  <?php include "home_view.php";?>
</body>
</html>
