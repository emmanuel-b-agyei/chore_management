<?php
include_once '../settings/connection.php';
// Get the chore ID and chore name from the form data
$choreId = $_POST['cid'];
$choreName = $_POST['choreName'];

// Update the chore in the database using prepared statements
$query = "UPDATE Chores SET chorename = ? WHERE cid = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    // Bind the parameters and execute the statement
    $stmt->bind_param("si", $choreName, $choreId);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Redirect back to the chore control view with a success message
        header("Location: ../admin/chore_control_view.php?editSuccess=true");
        exit();
    } else {
        // Redirect back to the chore control view with an error message
        header("Location: ../admin/chore_control_view.php?editError=true");
        exit();
    }
} else {
    // Redirect back to the chore control view with an error message
    header("Location: ../admin/chore_control_view.php?editError=true");
    exit();
}
?>
