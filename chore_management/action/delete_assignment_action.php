<?php
// Include the connection file
include_once '../settings/connection.php';

try {
    // Check if assignment ID is provided in the URL
    if (isset($_GET['aid'])) {
        // Retrieve assignment ID from the GET URL
        $assignmentId = $_GET['aid'];

        // Create a new PDO connection
        $pdo = new PDO("mysql:host=localhost;dbname=chores_mgt", "root", "");

        // Write and execute the DELETE query
        $deleteQuery = "DELETE FROM Assignment WHERE assignmentid = :assignmentId"; // Use a placeholder for assignmentId
        $stmt = $pdo->prepare($deleteQuery);
        $stmt->bindParam(':assignmentId', $assignmentId, PDO::PARAM_INT);
        $stmt->execute();

        // Check if execution was successful
        if ($stmt->rowCount() > 0) {
            // Redirect to assignment display page
            header("Location: ../view/Assign_chore.php");
            exit();
        } else {
            // If deletion failed, display error message or take appropriate action
            echo "Error: Failed to delete assignment. No rows affected.";
        }
    } else {
        // If no assignment ID provided in the URL
        echo "Error: Assignment ID not specified.";
    }
} catch (PDOException $e) {
    // Handle PDO exceptions
    echo "Error: " . $e->getMessage();
}
?>
