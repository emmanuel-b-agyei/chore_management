<?php
include '../settings/connection.php';
include_once '../action/get_all_assignment_action.php'; // Include the get_all_assignment_action.php file

// Function to get all assignment data

// Call the function to get all assignments
$assignments = getAllAssignments($conn);

// Display the assignments in HTML table rows and elements
if (!empty($assignments)) {
    foreach ($assignments as $assignment) {
        echo "<tr>";
        echo "<td>{$assignment['chorename']}</td>";
        echo "<td>{$assignment['fname']} {$assignment['lname']}</td>";
        echo "<td>{$assignment['date_assign']}</td>";
        echo "<td>{$assignment['date_due']}</td>";
        echo "<td>{$assignment['sname']}</td>";
        echo "<td>";
        // Add delete button with link for each assignment
        echo "<a href='../action/delete_assignment_action.php?aid={$assignment['assignmentid']}'><button>Delete</button></a>";
        echo "<button>Status</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No assignments found.</td></tr>";
}
?>
