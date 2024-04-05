document.getElementById('addChoreForm').addEventListener('submit', function(event) {
  event.preventDefault();

  const choreName = document.getElementById('choreName').value;
  const assignedBy = document.getElementById('assignedBy').value;
  const dateAssigned = document.getElementById('dateAssigned').value;
  const dateDue = document.getElementById('dateDue').value;
  const choreStatus = document.getElementById('choreStatus').value;

  const tbody = document.querySelector('tbody');
  const newRow = tbody.insertRow();

  const cell1 = newRow.insertCell(0);
  const cell2 = newRow.insertCell(1);
  const cell3 = newRow.insertCell(2);
  const cell4 = newRow.insertCell(3);
  const cell5 = newRow.insertCell(4);
  const cell6 = newRow.insertCell(5);

  cell1.textContent = choreName;
  cell2.textContent = assignedBy;
  cell3.textContent = dateAssigned;
  cell4.textContent = dateDue;
  cell5.textContent = choreStatus;

  const markCompletedBtn = document.createElement('button');
  markCompletedBtn.textContent = 'Mark Completed';
  markCompletedBtn.addEventListener('click', function() {
    markChoreCompleted(newRow);
  });

  const editBtn = document.createElement('button');
  editBtn.textContent = 'Edit';
  editBtn.addEventListener('click', function() {
    editChore(newRow);
  });

  cell6.appendChild(markCompletedBtn);
  cell6.appendChild(editBtn);

  document.getElementById('addChoreForm').reset();
});

function markChoreCompleted(row) {
  row.cells[4].textContent = 'Completed';
}

function editChore(row) {
  alert('Edit chore: ' + row.cells[0].textContent);
}
