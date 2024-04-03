<?php
// Include the core.php file to check user login status
include_once '../settings/core.php';
include '../settings/connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign values from the form
    $assignPerson = $_POST['assignPerson']; // Assuming this is the person selected in the dropdown
    $assignChore = $_POST['assignChore']; // Assuming this is the chore selected in the dropdown
    $dueDate = $_POST['dueDate']; // Assuming this is the due date input

    // Check if the chore ID exists in the Chores table
    $checkChoreQuery = "SELECT * FROM Chores WHERE cid = ?";
    $checkChoreStmt = $conn->prepare($checkChoreQuery);
    $checkChoreStmt->bind_param("i", $assignChore);
    $checkChoreStmt->execute();
    $checkChoreResult = $checkChoreStmt->get_result();

    if ($checkChoreResult->num_rows == 0) {
        // Chore ID does not exist in the Chores table
        echo "Error: Invalid Chore ID";
        $checkChoreStmt->close();
        $conn->close();
        exit();
    }

    $checkChoreStmt->close();

    // Prepare an SQL statement to insert the new chore assignment
    $stmt = $conn->prepare("INSERT INTO Assignment (cid, sid, date_assign, date_due, who_assigned) VALUES (?, ?, ?, ?, ?)");

    // Check if the statement is prepared successfully
    if ($stmt) {
        // Bind parameters to the statement
        $stmt->bind_param("iisss", $assignChore, $statusId, $dateAssign, $dueDate, $assignedBy);

        // Set parameters and execute the statement
        $assignChore = $assignChore; // Assuming the value is already validated
        $statusId = 1; // Assuming 'Assigned' status has id 1 based on the database dump
        $dateAssign = date("Y-m-d"); // Current date
        $dueDate = $dueDate; // Value from the form
        $assignedBy = $_SESSION['user_id']; // Assuming user ID is stored in session

        if ($stmt->execute()) {
            // Chore assignment added successfully
            // Redirect back to assign_chore_view.php with a success message
            header("Location: ../view/Assign_chore.php?success=1");
            exit();
        } else {
            // Error occurred while executing the statement
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Error preparing the statement
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    // Redirect to the form page if accessed without submitting the form
    header("Location: ../view/Assign_chore.php");
    exit();
}
?>
