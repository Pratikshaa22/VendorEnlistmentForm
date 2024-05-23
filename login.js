function login() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username === "" || password === "") {
        alert("All fields are required");
        return;
    }

    // Perform login functionality here
}
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('signup-form');
    form.addEventListener('submit', function(event) {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirm-password').value;

      if (password !== confirmPassword) {
        event.preventDefault(); // Prevent form submission
        alert('Passwords do not match. Please try again.');
        // You can also display a popup or error message instead of using alert
      }
    });
  });