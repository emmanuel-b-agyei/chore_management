<?php
// Include the get_all_assignment_action.php file
include_once '../action/get_all_assignment_action.php';

// Call the necessary functions and assign the output to variables
$allAssignments = getAllAssignments($conn);
$inProgressAssignments = getInProgressAssignments($conn);
$incompleteAssignments = getIncompleteAssignments($conn);
$completedAssignments = getCompletedAssignments($conn);
$recentAssignments = getRecentAssignments($conn);

// Display the statistics or table rows and elements
// You can format this output as needed based on your HTML structure
echo "<h2>In Progress Assignments</h2>";
echo "<pre>";
print_r($inProgressAssignments);
echo "</pre>";

echo "<h2>Incomplete Assignments</h2>";
echo "<pre>";
print_r($incompleteAssignments);
echo "</pre>";

echo "<h2>Completed Assignments</h2>";
echo "<pre>";
print_r($completedAssignments);
echo "</pre>";

echo "<h2>Recent Assignments</h2>";
echo "<pre>";
print_r($recentAssignments);
echo "</pre>";
?>
