function validateLoginForm() {
  // Validating email using a regular expression
  const emailInput = document.getElementById('email');
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(emailInput.value)) {
    alert('Please enter a valid email address.');
    return false;
  }

  // Validating password using a regular expression
  const passwordInput = document.getElementById('password');
  // Password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, and one number
  const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

  if (!passwordRegex.test(passwordInput.value)) {
    alert('Please enter a valid password. It must contain at least 8 characters, including at least one uppercase letter, one lowercase letter, and one number.');
    return false;
  }

  return true;
}
