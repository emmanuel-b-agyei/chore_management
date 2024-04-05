<?php
Include '../settings/connection.php';
include '../settings/connection.php'; 
$query = "SELECT * FROM Family_name";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$roles = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($roles as $role) {
    echo "<option value='" . $role['fid'] . "'>" . $role['fam_name'] . "</option>";
}

mysqli_free_result($result);
mysqli_close($conn);
?>
