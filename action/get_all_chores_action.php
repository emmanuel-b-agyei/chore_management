<?php
// Include the database connection file
include_once '../settings/connection.php';

// Function to get all chores
function getAllChores() {
    global $conn; // Using the global connection object

    // Write the SELECT all chores query
    $query = "SELECT * FROM Chores";

    // Execute the query using the global connection
    $result = $conn->query($query);

    // Check if execution worked
    if (!$result) {
        die("Error executing query: " . $conn->error);
    }

    // Check if any record was returned
    if ($result->num_rows > 0) {
        // Fetch records and assign to a variable
        $chores = array();
        while ($row = $result->fetch_assoc()) {
            $chores[] = $row;
        }

        // Free result set
        $result->free_result();

        // Return the result variable
        return $chores;
    } else {
        return []; // Return an empty array if no records found
    }
}

function getAllPeople($conn) {
    $people = array(); // Initialize an empty array to store users

    // Prepare and execute the SQL statement to fetch users
    $stmt = $conn->prepare("SELECT * FROM People");
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Fetch each row and store it in the $people array
        while ($row = $result->fetch_assoc()) {
            $people[] = $row;
        }
    }

    // Close the statement
    $stmt->close();

    return $people; // Return the array of users
}

// Ensure the database connection is open before calling the function
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Call the function to get all chores
$allChores = getAllChores($conn);



?>
