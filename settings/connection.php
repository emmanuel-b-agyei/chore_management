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

if (!defined('AZURE_MYSQL_PORT')) {
    define('AZURE_MYSQL_PORT', '3306');
}

// Establish a database connection using the defined constants
$conn = new mysqli(AZURE_MYSQL_HOST, AZURE_MYSQL_USERNAME, AZURE_MYSQL_PASSWORD, AZURE_MYSQL_DBNAME, AZURE_MYSQL_PORT. );

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
