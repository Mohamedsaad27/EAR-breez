document.getElementById('loginForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission
  
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  
  // Retrieve registration data from local storage
  var storedUsername = localStorage.getItem('username');
  var storedPassword = localStorage.getItem('password');
  
  if (username === storedUsername && password === storedPassword) {
      alert('Login successful!');
      // Redirect to another page
      window.location.href = 'Homepage.html';
  } else {
      alert('Invalid username or password.');
      window.location.href = 'User registration page.html';

  }
});
