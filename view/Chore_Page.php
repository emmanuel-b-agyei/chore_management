<?php
include '../settings/core.php';

// Call checkLogin() to ensure the user is logged in
checkLogin();

// Define allowed roles for accessing this page
$allowedRoles = [1, 2]; // Example: Super-admin (1), Admin (2)

// Check role-based access
checkRoleAccess($allowedRoles);

// Include the connection file
include '../settings/connection.php';

// Fetch chore data from the database
$query = "SELECT Chores.chorename, People.fname, People.lname, Assignment.date_assign, Assignment.date_due, Status.sname
          FROM Assignment
          INNER JOIN Chores ON Assignment.cid = Chores.cid
          INNER JOIN People ON Assignment.who_assigned = People.pid
          INNER JOIN Status ON Assignment.sid = Status.sid";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

// HTML content starts here
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chore Page - Chore Management System</title>
  <link rel="stylesheet" href="../css/Chore_Page.css">
</head>
<body>
  <div class="container">
    <header>
      <h1>Chore Page</h1>
    </header>

    <section class="chore-list">
      <h2>Chore List</h2>
      <table>
        <thead>
          <tr>
            <th>Chore Name</th>
            <th>Assigned By</th>
            <th>Date Assigned</th>
            <th>Date Due</th>
            <th>Chore Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>{$row['chorename']}</td>";
              echo "<td>{$row['fname']} {$row['lname']}</td>";
              echo "<td>{$row['date_assign']}</td>";
              echo "<td>{$row['date_due']}</td>";
              echo "<td>{$row['sname']}</td>";
              echo "<td>";
              // Add action buttons here
              echo "<button onclick='markChoreCompleted(1)'>Mark Completed</button>";
              echo "<button onclick='editChore(1)'>Edit</button>";
              echo "</td>";
              echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </section>

    <section class="add-new-chore">
      <h2>Assign Chore to All Users</h2>
      <!-- Add form for adding new chore here -->
    </section>
  </div>

  <script src="../js/Chore_Page.js"></script>
</body>
</html>
