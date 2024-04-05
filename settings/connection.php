<?php
// Check if the constants are not defined before defining them
if (!defined('DB_HOST')) {
    define('DB_HOST', 'chef-api-assignment-server.mysql.database.azure.com');
}

if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}

if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', '');
}

if (!defined('DB_NAME')) {
    define('DB_NAME', 'chores_mgt');
}

// Establish a database connection using the defined constants
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
