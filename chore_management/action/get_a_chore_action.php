<?php
include_once '../settings/connection.php';

function getChoreById($choreId)
{
    global $conn;

    $query = "SELECT * FROM Chores WHERE cid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $choreId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        return null; // No chore found
    } else {
        return $result->fetch_assoc(); // Return chore data
    }
}
?>
