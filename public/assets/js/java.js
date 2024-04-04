document.getElementById('registrationForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission
  
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;
  
  // Simulate storing registration data in local storage
  localStorage.setItem('username', username);
  localStorage.setItem('password', password);
  
  alert('Registration successful!');
  
  // Redirect to login page
  window.location.href = 'User and seller registration page.html';
});
//shop
// البيانات
