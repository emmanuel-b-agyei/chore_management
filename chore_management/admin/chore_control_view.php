<?php
include_once '../functions/chore_fxn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="background-color: honeydew;">
  <h1 style="color: indigo;
            margin: auto;
            width: 50%;
            align-self: center;
            margin-top: 50px;
            ">Chores List</h1>
  <table style="width: 60vw; 
                margin: auto;
                border: 3px solid green;
                margin-top: 20px;">
    <thead>
      <tr>
        <th>Chore No</th>
        <th>Chore Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include_once '../action/get_all_chores_action.php';
      // Call the function to get all chores
      $chores = getAllChores();
      

      if (empty($chores)) {
        echo "<tr><td colspan='3' style='text-align: center;'>No chores found.</td></tr>";
      } else {
        $index = 1; // Initialize index for numbering
        foreach ($chores as $chore) {
          echo "<tr>";
          echo "<td>{$index}</td>"; // Display the index for numbering
          //echo "<td>{$chore['cid']}</td>"
          echo "<td>{$chore['chorename']}</td>";
          echo "<td>";
          echo "<a href='edit_chore_view.php?cid={$chore['cid']}'><button>Edit</button></a>";

          echo "<a href='../action/delete_chore_action.php?id={$chore['cid']}' onclick='return confirm(\"Are you sure you want to delete this chore?\")'><button>Delete</button></a>";
          echo "</td>";
          echo "</tr>";
          $index++; // Increment index after each row
        }
      }
      ?>
    </tbody>
  </table>
</body>
</html>
