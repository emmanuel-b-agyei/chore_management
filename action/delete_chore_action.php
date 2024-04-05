<?php
include_once '../settings/connection.php';


if (isset($_GET['id'])) {
    // Retrieve the chore ID from the URL
    $chore_id = $_GET['id'];
    
    // Preparing and execute the DELETE query
    $query = "DELETE FROM Chores WHERE cid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $chore_id);
    $result = $stmt->execute();
    
    // Checking if deletion was successful
    if ($result) {
        header("Location: ../admin/chore_control_view.php");
        exit();
    } else {
        echo "Failed to delete chore.";
        exit();
    }
} else {
    // Chore ID not provided, redirect to chore control view page
    header("Location: ../admin/chore_control_view.php");
    exit();
}
?>

