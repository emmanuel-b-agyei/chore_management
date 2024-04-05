// Function to validate registration form
function validateRegisterForm() {
  const firstName = document.getElementById('firstName').value;
  const lastName = document.getElementById('lastName').value;
  const gender = document.querySelector('input[name="gender"]:checked');
  const familyRole = document.getElementById('familyRole').value;
  const dob = document.getElementById('dob').value;
  const phoneNumber = document.getElementById('phoneNumber').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  // Validating email using a regular expression
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert('Please enter a valid email address.');
    return false;
  }

  // Validating password using a regular expression
  // Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, and one number
  const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
  if (!passwordRegex.test(password)) {
    alert('Please enter a valid password. It must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, and one number.');
    return false;
  }

  
  if (!firstName || !lastName || !gender || familyRole === '0' || !dob || !phoneNumber || !email || !password) {
    alert('Please fill in all required fields.');
    return false;
  }

  registerUser(firstName, lastName, gender.value, familyRole, dob, phoneNumber, email, password);

  return true;
}
