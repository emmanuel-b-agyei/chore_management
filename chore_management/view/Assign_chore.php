<!-- assign_chore.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chore Management System - Assign Chore</title>
  <link rel="stylesheet" href="../css/Assign_Chore.css">
</head>
<body>
  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <button onclick="navigateToPage('home_view.php')">Dashboard</button>
    <button onclick="navigateToPage('manage_chore.html')">Manage Chores</button>
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

   
      <section class="assigned-chore-list-section">
        <h2>Assign Chores</h2>
        <table>
          <thead>
            <tr>
              <th>Chore Name</th>
              <th>Person Assigned</th>
              <th>Date Assigned</th>
              <th>Due Date</th>
              <th>Chore Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          include_once '../admin/assign_chore_view.php'; 
          include_once '../functions/get_all_assignment_fxn.php';
          ?>
          </tbody>
        </table>
      </section>
    </div>
  </div>
  
  
  <script src="../js/Assign_Chore.js"></script>
</body>
</html>