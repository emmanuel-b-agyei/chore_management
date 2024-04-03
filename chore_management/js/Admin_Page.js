function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

function navigateToPage(page) {
  closeNav();
  window.location.href = page;
}

function signOut() {
  window.location.href = 'Login_Page.html'
}

// Function to approve completed chores
function approveCompletedChores() {
  navigateToPage('manage_chore.html')
}

// Function to create a new chore
function createNewChore() {
  navigateToPage('Add_Chore.html')
}

// Function to assign a chore to all users
function assignChoreToAllUsers() {
  navigateToPage('Chore_Page.html');
}

// Function to view user scores
function viewUserScores() {
  navigateToPage('leaderboard.html')
}
