<?php
session_start();
include_once '../settings/connection.php';

if (isset($_POST['choreName'])) {
    // Checking if user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "User not logged in.";
        exit();
    }

    // Retrieving chore name from form
    $choreName = $_POST['choreName'];

    // Preparing and executing SQL statement to insert chore into database
    $query = "INSERT INTO Chores (chorename) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $choreName);
    $result = $stmt->execute();

    // Checking if chore was successfully added
    if ($result) {
        // Redirect back to chore control view
        header("Location: ../admin/chore_control_view.php");
        exit();
    } else {
        echo "Failed to add chore.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>
