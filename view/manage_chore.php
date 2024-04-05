<?php
include '../settings/connection.php';
include '../settings/core.php';

// Call checkLogin() to ensure the user is logged in
checkLogin();

// Define allowed roles for accessing this page
$allowedRoles = [1, 2]; // Example: Super-admin (1), Admin (2)

// Check role-based access
checkRoleAccess($allowedRoles);

// Include the connection file
include '../settings/connection.php';

// Fetch ongoing/pending chore assignments from the database
$queryOngoing = "SELECT Chores.chorename, People.fname, People.lname, Assignment.date_assign, Assignment.date_due, Status.sname
                FROM Assignment
                INNER JOIN Chores ON Assignment.cid = Chores.cid
                INNER JOIN People ON Assignment.who_assigned = People.pid
                INNER JOIN Status ON Assignment.sid = Status.sid
                WHERE Assignment.sid = 2"; // Assuming status 2 means In Progress
$stmtOngoing = $conn->prepare($queryOngoing);
$stmtOngoing->execute();
$resultOngoing = $stmtOngoing->get_result();

// Fetch completed chores from the database
$queryCompleted = "SELECT Chores.chorename
                   FROM Assignment
                   INNER JOIN Chores ON Assignment.cid = Chores.cid
                   WHERE Assignment.sid = 3"; // Assuming status 3 means Completed
$stmtCompleted = $conn->prepare($queryCompleted);
$stmtCompleted->execute();
$resultCompleted = $stmtCompleted->get_result();

// HTML content starts here
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chore Management System - Manage Chores</title>
  <link rel="stylesheet" href="../css/manage_chore.css">
</head>
<body>
  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <button onclick="navigateToPage('Welcome_page.php')">Dashboard</button>
    <button onclick="navigateToPage('manage_chore.php')">Manage Chores</button>
    <button onclick="navigateToPage('Add_chore.php')">Add Chore</button>
    <button onclick="navigateToPage('Assign_chore.php')">Assign Chore</button>
    <button onclick="navigateToPage('deadline_tracker.php')">Deadline Tracker</button>
    <button onclick="navigateToPage('leaderboard.php')">Leaderboard</button>
    <button onclick="navigateToPage('User_profile.php')">Profile</button> <br>
    <button onclick="navigateToPage('Settings_page.php')">Settings</button> <br>
    <button class="sign-out" onclick="signOut()">Sign Out</button>
  </div>

  <div id="main">
    <button class="openbtn" onclick="openNav()">☰ Menu</button>

    <div class="container">
      <header>
        <h1>Manage Chores</h1>
      </header>
      
      <section class="chore-section">
        <h2>Ongoing/Pending Chore Assignments</h2>
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
            while ($row = $resultOngoing->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['chorename']}</td>";
                echo "<td>{$row['fname']} {$row['lname']}</td>";
                echo "<td>{$row['date_assign']}</td>";
                echo "<td>{$row['date_due']}</td>";
                echo "<td>{$row['sname']}</td>";
                echo "<td>";
                echo "<button onclick='markChoreComplete(1)'>Mark Complete</button>";
                echo "<button onclick='editChore(1)'>Edit</button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </section>
  
      <section class="chore-section">
        <h2>Completed Chores</h2>
        <table>
          <thead>
            <tr>
              <th>Chore Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($row = $resultCompleted->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['chorename']}</td>";
                echo "<td>";
                echo "<button onclick='markChoreIncomplete(2)'>Mark Incomplete</button>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </section>
    </div>  
  </div>
  
  <script src="../js/manage_chore.js"></script>
</body>
</html>
