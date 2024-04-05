function validateChoreForm() {
  const choreNameInput = document.getElementById('choreName');

  if (!choreNameInput.value.trim()) {
      alert('Please enter chore name.');
      return false;
  }

  return true;
  }



// Function to add a chore to the list
function addChoreToList(choreName) {
  const table = document.querySelector('.chore-list-section table tbody');
  const newRow = document.createElement('tr');
  newRow.innerHTML = `
    <td>${table.rows.length + 1}</td>
    <td>${choreName}</td>
    <td>
      <button onclick="editChore(${table.rows.length + 1})">Edit</button>
      <button onclick="deleteChore(${table.rows.length + 1})">Delete</button>
    </td>
  `;
  table.appendChild(newRow);
}


function fetchChores() {
  fetch('../action/get_all_chores_action.php')
      .then(response => response.json())
      .then(data => {
          const choreTableBody = document.getElementById('choreTableBody');
          choreTableBody.innerHTML = '';

          data.forEach(chore => {
              const row = document.createElement('tr');
              row.innerHTML = `
                  <td>${chore.chore_id}</td>
                  <td>${chore.chore_name}</td>
                  <td>
                      <button onclick="editChore(${chore.chore_id})">Edit</button>
                      <button onclick="deleteChore(${chore.chore_id})">Delete</button>
                  </td>
              `;
              choreTableBody.appendChild(row);
          });
      })
      .catch(error => console.error('Error:', error));
}

// Call the fetchChores function when the page loads
window.onload = fetchChores;




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
  // Add sign-out logic here
  // For now, redirect to the login page
  window.location.href = 'Login_Page.html'
}