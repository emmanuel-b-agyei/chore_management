// Function to mark a chore as complete
function markChoreComplete(choreId) {
  alert(`Chore ${choreId} marked as complete.`);
  updateChoreStatus(choreId, 'Completed');
}

// Function to update chore status in the table 
function updateChoreStatus(choreId, newStatus) {
  const statusCell = document.querySelector(`#chore-${choreId}-status`);
  if (statusCell) {
    statusCell.textContent = newStatus;
  }
}

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
