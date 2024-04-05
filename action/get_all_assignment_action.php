<?php
// Include the connection file
include_once '../settings/connection.php';

// Function to get all chore assignments
function getAllAssignments($conn) {
    // Check if the connection is valid
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Write the SELECT all assignments query
    $query = "SELECT Assignment.assignmentid, Chores.chorename, People.fname, People.lname, Assignment.date_assign, Assignment.date_due, Status.sname
              FROM Assignment
              INNER JOIN Chores ON Assignment.cid = Chores.cid
              INNER JOIN People ON Assignment.who_assigned = People.pid
              INNER JOIN Status ON Assignment.sid = Status.sid";

    // Execute the query
    $result = $conn->query($query);

    // Check if execution worked
    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    // Fetch records and assign to a variable
    $assignments = array();
    while ($row = $result->fetch_assoc()) {
        $assignments[] = $row;
    }

    // Free result set
    $result->free_result();

    // Return the result variable
    return $assignments;
}

// Function 2 - Get all chore assignments in progress before due date
function getInProgressAssignments() {
    global $conn;

    $query = "SELECT * FROM Assignment WHERE sid = 2 AND date_due > CURDATE()";
    $result = $conn->query($query);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    $assignments = array();
    while ($row = $result->fetch_assoc()) {
        $assignments[] = $row;
    }

    return $assignments;
}

// Function 3 - Get all incomplete chore assignments after due date
function getIncompleteAssignments() {
    global $conn;

    $query = "SELECT * FROM Assignment WHERE sid = 4 AND date_due < CURDATE()";
    $result = $conn->query($query);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    $assignments = array();
    while ($row = $result->fetch_assoc()) {
        $assignments[] = $row;
    }

    return $assignments;
}

// Function 4 - Get all completed chore assignments
function getCompletedAssignments() {
    global $conn;

    $query = "SELECT * FROM Assignment WHERE sid = 3";
    $result = $conn->query($query);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    $assignments = array();
    while ($row = $result->fetch_assoc()) {
        $assignments[] = $row;
    }

    return $assignments;
}

// Function 5 - Get all recent chore assignments (last 3 records)
function getRecentAssignments() {
    global $conn;

    $query = "SELECT * FROM Assignment WHERE sid = 2 ORDER BY date_assign DESC LIMIT 3";
    $result = $conn->query($query);

    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    $assignments = array();
    while ($row = $result->fetch_assoc()) {
        $assignments[] = $row;
    }

    return $assignments;
}
?>
