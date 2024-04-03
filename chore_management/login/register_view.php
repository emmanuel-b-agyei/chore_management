<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chore Management System - Register</title>
  <link rel="stylesheet" href="Register-Page.css">
</head>
<body>
  <div class="container">
    <form id="registerForm" action="action/register_user_action.php" method="post" onsubmit="return validateRegisterForm()">
      <h2>Register</h2>
      <div class="form-group">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" required>
      </div>
      <div class="form-group">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" required>
      </div>
      <div class="form-group">
        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="0" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="1" required>
        <label for="female">Female</label>
      </div>
      <div class="form-group">
        <label for="familyRole">Family Role:</label>
        <select id="familyRole" name="familyRole" required>
          <option value="0">Select</option>
          <?php include 'select_role_fxn.php'; ?> <!-- Include the select_role_fxn.php file -->
        </select>
      </div>
      <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" placeholder="Select your date of birth" required>
      </div>
      <div class="form-group">
        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" id="registerBtn">Register</button>
    </form>
    <p>Already have an account? <a href="Login_Page.html">Login here</a></p>
  </div>

  <script src="Register-Page.js"></script>
</body>
</html>
