<!-- home_view.php -->
<?php
include_once '../action/get_all_assignment_action.php'; 
include_once 'access_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chore Management System - Welcome</title>
  <link rel="stylesheet" href="../css/Welcome_page.css">
</head>
<body>
  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <button onclick="location.reload()">Dashboard</button>
    <button onclick="navigateToPage('manage_chore.php')">Manage Chores</button>
    <button onclick="navigateToPage('Add_chore.php')">Add Chore</button>
    <button onclick="navigateToPage('Assign_chore.php')">Assign Chore</button>
    <button onclick="navigateToPage('deadline_tracker.html')">Deadline Tracker</button>
    <button onclick="navigateToPage('leaderboard.html')">Leaderboard</button>
    <button onclick="navigateToPage('User_profile.html')">Profile</button> <br>
    <button onclick="navigateToPage('Settings_page.html')">Settings</button> <br>
    <button class="sign-out" onclick="signOut()">Sign Out</button>
  </div>

  <div id="main">
    <button class="openbtn" onclick="openNav()">☰ Menu</button>
   
    <div class="container">
      <header>
        <h1>Welcome to the Chore Management System</h1>
      </header>

      <!-- Display chore assignment statistics -->
      <?php
      // Call the necessary functions to get the data for statistics
      $assignments = getAllAssignments($conn); // Function already exists, no need to repeat
      $inProgressAssignments = getInProgressAssignments($conn);
      $incompleteAssignments = getIncompleteAssignments($conn);
      $completedAssignments = getCompletedAssignments($conn);
      $recentAssignments = getRecentAssignments($conn);
      ?>

      <section class="statistics-section">
        <div class="stat-box" onclick="navigateToPage('manage_chore.html')">
          <h3>Total Chores</h3>
          <p><?php echo count($assignments); ?></p>
        </div>
        <div class="stat-box" onclick="navigateToPage('manage_chore.html')">
          <h3>In Progress</h3>
          <p><?php echo count($inProgressAssignments); ?></p>
        </div>
        <div class="stat-box" onclick="navigateToPage('manage_chore.html')">
          <h3>Incomplete</h3>
          <p><?php echo count($incompleteAssignments); ?></p>
        </div>
        <div class="stat-box" onclick="navigateToPage('manage_chore.html')">
          <h3>Completed</h3>
          <p><?php echo count($completedAssignments); ?></p>
        </div>
      </section>

      <section class="additional-content">
        <h2>Recent Activity</h2>
        <ul>
          <?php
          // Example recent activity items (replace with actual recent activity data)
          $recentActivity = array(
            
          );

          foreach ($recentActivity as $activity) {
            echo "<li>$activity</li>";
          }
          ?>
        </ul>
      </section>

      <section class="suggested-actions">
        <h2>Suggested Actions</h2>
        <p>Explore the Chore Management System and stay organized with your household tasks!</p>
        <button onclick="navigateToPage('manage_chore.html')">View Chores</button>
        <button onclick="navigateToPage('assign_chore.php')">Assign Chores</button>
      </section>
    </div>
  </div>

  <script src="../js/Welcome_page.js"></script>
</body>
</html>
