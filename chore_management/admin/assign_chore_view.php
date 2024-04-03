<?php
// Include the core.php file to check user login status
include_once '../settings/core.php';
include '../settings/connection.php';
include '../action/get_all_chores_action.php';



// Check if the user is not logged in, then redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/Login_Page.html");
    exit();
}
$chores = getAllChores($conn);
$users = getAllPeople($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Chore</title>
    <link rel="stylesheet" href="../css/assign_chore.css">
</head>
<body>
    <div class="container">
        <h1>Assign Chore</h1>
        <form id="assignChoreForm" action="../action/assign_chore_action.php" method="post" onsubmit="return validateAssignChoreForm()">
            <div class="form-group">
                <label for="assignPerson">Assign Person:</label>
                <select id="assignPerson" name="assignPerson" required>
                    <option value="">Select Person</option>
                    <!-- Populate options dynamically for users -->
                    <?php foreach ($users as $user) : ?>
                        <option value="<?php echo $user['pid']; ?>"><?php echo $user['fname'] . ' ' . $user['lname']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="assignChore">Assign Chore:</label>
                <select id="assignChore" name="assignChore" required>
                    <option value="">Select Chore</option>
                    <!-- Populate options dynamically for chores -->
                    <?php foreach ($chores as $chore) : ?>
                        <option value="<?php echo $chore['cid']; ?>"><?php echo $chore['chorename']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="dueDate">Due Date:</label>
                <input type="date" id="dueDate" name="dueDate" required>
            <div id="dueDateError" class="error-message"></div> <!-- Error message for due date -->
</div>

            <!-- Modify the button type and add an ID for JavaScript -->
            <button type="button" id="assignChoreBtn">Assign Chore</button>
        </form>
    </div>
    

    <script src="../js/Assign_chore.js"></script>
    <script>
        document.getElementById('assignChoreBtn').addEventListener('click', function() {
            document.getElementById('assignChoreForm').submit();
        });


        document.getElementById('assignChoreBtn').addEventListener('click', function() {
        // Get the due date input element
        var dueDateInput = document.getElementById('dueDate');
        // Get the error message element
        var dueDateError = document.getElementById('dueDateError');

        // Check if the due date is not selected
        if (!dueDateInput.value) {
            // Display the error message
            dueDateError.textContent = 'Please select a due date.';
            // Prevent the form from being submitted
            return false;
        } else {
            // Clear the error message if the due date is selected
            dueDateError.textContent = '';
            // Submit the form
            document.getElementById('assignChoreForm').submit();
        }
        });

    </script>
    <?php include '../functions/get_all_assignment_fxn.php'; ?>
</body>
</html>

<style>
    /* assign_chore.css */

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    select,
    input[type="date"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    button[type="button"] {
        background-color: #663399;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="button"]:hover {
        background-color: #501d99;
    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>
