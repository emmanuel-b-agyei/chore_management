<!-- admin_welcome.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrator Welcome - Chore Management System</title>
  <link rel="stylesheet" href="../css/Admin_Page.css">
</head> 
<body>

  <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <button onclick="location.reload()">Dashboard</button>
    <button onclick="navigateToPage('home_view.php')">User Dashboard</button>
    <button onclick="navigateToPage('manage_chore.html')">Manage Chores</button>
    <button onclick="navigateToPage('Add_chore.php')">Add Chore</button>
    <button onclick="navigateToPage('Assign_chore.php')">Assign Chore</button>
    <button onclick="navigateToPage('deadline_tracker.html')">Deadline Tracker</button>
    <button onclick="navigateToPage('Chore_Page.html')">Chore Page</button>
    <button onclick="navigateToPage('leaderboard.html')">Leaderboard</button>
    <button onclick="navigateToPage('User_profile.html')">Profile</button>
    <button onclick="navigateToPage('Settings_page.html')">Settings</button> <br>
    <button class="sign-out" onclick="signOut()">Sign Out</button>
  </div>

  <div id="main">
    <button class="openbtn" onclick="openNav()">☰ Menu</button>

    <div class="container">
      <header>
        <h1>Welcome to the Administrator Dashboard</h1>
      </header>

      <section class="admin-overview">
        <h2>Administrator Overview</h2>
        <div class="statistics">
          <div class="stat-box" onclick="location.href='manage_chore.html'">
            <p>Total Chores</p>
            <span>200</span>
          </div>
          <div class="stat-box" onclick="location.href='manage_chore.html'">
            <p>In Progress</p>
            <span>80</span>
          </div>
          <div class="stat-box" onclick="location.href='manage_chore.html'">
            <p>Incomplete</p>
            <span>40</span>
          </div>
          <div class="stat-box" onclick="location.href='manage_chore.html'">
            <p>Completed</p>
            <span>80</span>
          </div>
        </div>
        <div class="admin-specific-content">
          <h3>Chore Management Overview</h3>
          <p>As an administrator, you have the power to manage all chores in the system. Keep things organized!</p>
        </div>
      </section>

      <section class="admin-actions">
        <h2>Administrator Actions</h2>
        <button onclick="approveCompletedChores()">Approve Completed Chores</button>
        <button onclick="createNewChore()">Create New Chore</button>
        <button onclick="assignChoreToAllUsers()">Assign Chore to All Users</button>
        <button onclick="viewUserScores()">View User Scores</button>
      </section>

      <section class="recent-admin-activity">
        <h2>Recent Admin Activity</h2>
        <ul>
          <li>Created new chore: "Inspect Fire Alarms"</li>
          <li>Assigned "Clean the Kitchen" to all users</li>
          <li>Reviewed and approved completed chores</li>
        </ul>
      </section>

      <section class="suggested-admin-actions">
        <h2>Suggested Admin Actions</h2>
        <p>Manage and oversee the Chore Management System to keep your household organized!</p>
        <button onclick="navigateToPage('Chore_Page.html')">View All Chores</button>
        <button onclick="navigateToPage('add_chore.html')">Add New Chore</button>
      </section>
    </div>
  </div>

  <script src="../js/Admin_Page.js"></script>
</body>
</html>
