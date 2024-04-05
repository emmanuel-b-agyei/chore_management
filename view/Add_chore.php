<!-- add_chore.html -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chore Management System - Add Chore</title>
  <link rel="stylesheet" href="../css/Add_chore.css">
  
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
    <button onclick="navigateToPage('User_profile.html')">Profile</button>
    <button onclick="navigateToPage('Settings_page.html')">Settings</button> <br>
    <button class="sign-out" onclick="signOut()">Sign Out</button>
  </div>

  <div id="main">
    <button class="openbtn" onclick="openNav()">☰ Menu</button>
    <div class="container">
      <header>
        <h1>Add Chore</h1>
      </header>

      <section class="add-chore-section">
        <form id="addChoreForm" action="../action/add_chore_action.php" method="post" onsubmit="return validateChoreForm">
          <div class="form-group">
            <label for="choreName">Chore Name:</label>
            <input type="text" id="choreName" name="choreName" placeholder="Enter chore name" required>
          </div>
          <button type="submit" id="addChoreBtn">Add Chore</button> 
        </form>
      </section>     
    </div>
  </div>
  <?php 
  include_once '../admin/chore_control_view.php';
  ?> 
</body>
</html>

<style>
#main { 
  height: 50vh; 
  background-image: url("https://cdn.standardmedia.co.ke/images/wysiwyg/images/KQurTtoozSpmE0ZxH9peDUb9DVmALOmmy472TPyk.jpg");
  background-position: center;  
  background-size: cover;
  
}
  
.container {
  margin: auto;
  width: 50%;
  border: none;
  padding: auto;
  align-self: center;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  background-color: rgb(201, 157, 201);
  color: #fff; 
  height: 30vh;
  
}


h1 {
  color: #f2f2f3;
}

form,
table {
  width: 100%;
}

form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  color: #fff;
}

input, button {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


button {
  background-color: #3498db;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.sidebar button {
  text-align: left;
  font-size: 20px;
  cursor: pointer;
  border: none;
  background-color: #3498db;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  position: static;
  margin-left: 10px;
  z-index: 2;
}


button:hover {
  background-color: #59358c;
}


table {
  border-collapse: collapse;
}

thead {
  background-color: #493268;
  color: #fff;
}

th, td {
  padding: 10px;
  border: 1px solid #ccc;
}

th {
  text-align: left;
}

/* Sidebar Styles */
.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  left: 0;
  top: 0;
  background-color: #3498db;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: underline;
  font-size: 18px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: red;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}


.openbtn {
  font-size: 20px;
  width: fit-content;
  cursor: pointer;
  background-color: #3498db;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  position: satic;
  margin-left: 10px;
  margin-top: 10px;
}

.openbtn:hover {
  background-color: #444;
}
</style>

<script src="../js/Add_chore.js"></script>