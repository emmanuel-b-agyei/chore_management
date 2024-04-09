<?php
// Check if the constants are not defined before defining them
if (!defined('AZURE_MYSQL_HOST')) {
    define('AZURE_MYSQL_HOST', 'chef-api-assignment-server.mysql.database.azure.com');
}

if (!defined('AZURE_MYSQL_USERNAME')) {
    define('AZURE_MYSQL_USERNAME', 'root');
}

if (!defined('AZURE_MYSQL_PASSWORD')) {
    define('AZURE_MYSQL_PASSWORD', '');
}

if (!defined('AZURE_MYSQL_DBNAME')) {
    define('AZURE_MYSQL_DBNAME', 'chores_mgt');
}

if (!defined('DB_PORT')) {
    define('AZURE_MYSQL_PORT', '3306');
}

// Establish a database connection using the defined constants
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
