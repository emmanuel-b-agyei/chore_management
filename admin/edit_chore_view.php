<?php
include_once '../settings/core.php';
include_once '../action/get_a_chore_action.php';


if (isset($_GET['cid'])) {
    $choreId = $_GET['cid'];
    $choreData = getChoreById($choreId);

    if ($choreData) {
        // Chore data found, proceed with displaying edit form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Chore</title>
    
   
</head>
<body>

  <!-- Edit Chore Modal -->
  <div id="editChoreModal" class="modal">
    <div  class="modal-content">
      <span class="close" onclick="closeEditModal()">&times;</span>
      <h2>Edit Chore</h2>
      <form id="editChoreForm" action="../action/edit_a_chore_action.php" method="post" onsubmit="return validateChoreForm()"><hr><br>
        <input type="hidden" name="cid" value="<?php echo isset($choreData['cid']) ? $choreData['cid'] : ''; ?>">
        <div class="formGroup">
          <lable class="lable">Chore Name:</lable><br><br>
          <input type="text" id="choreName" name="choreName" placeholder="Chore name" value="<?php echo isset($choreData['chorename']) ? $choreData['chorename'] : ''; ?>" required><br><br>
          <button type="submit" name="editChoreBtn">Update</button>
        </div><br>
        
      </form>
    </div>
  </div>

  

  <script>
    // Get the modal
    var modal = document.getElementById('editChoreModal');

    // Get the button that opens the modal
    var btn = document.getElementById('openEditChoreBtn');

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName('close')[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
      modal.style.display = 'block';
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = 'none';
    }

    // Close the modal when the user clicks anywhere outside the modal
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    }

    // Function to close the modal
    function closeEditModal() {
      modal.style.display = 'none';
    }
  </script>

</body>
</html>

<?php
    } else {
        // Chore not found, redirect back to chore control view
        header("Location: chore_control_view.php");
        exit();
    }
} else {
    // No chore ID provided, redirect back to chore control view
    header("Location: chore_control_view.php");
    exit();
}
?>
<style>

  /* Adjust modal styles for smaller size */
  .modal-content, .editChoreModal {
      width: 300px;
      margin: auto;
      background-color: honeydew;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      align-items: center;
      height: 30vh;
      margin-top: 50px;
  }

  /* Close button style */
  .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
  }

  .close:hover,
  .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
  }

  input {
  align-self: center;
  width: 200px;
  height: 35px; 
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  
}


button {
  width: 100px;
  align-self: center;
  margin-left: 50px;
  height: 40px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  background-color: #3498db;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: medium;
}

button:hover {
  background-color: #59358c;
}

h2{
  margin-top: 50px;
  align-self: center;
  width: 50%;
  margin: auto;
}

.lable{
  margin-left: 50px;
  font-size: larger;
}

.formGroup{
  margin-top: 50px;
  align-self: center;
  width: 65%;
  margin: auto;
}
</style>