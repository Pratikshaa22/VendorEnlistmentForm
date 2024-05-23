<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Default password for XAMPP
$database = "signup"; // Change this to your actual database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email already exists
    $check_sql = "SELECT * FROM users WHERE email='$email'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // User already exists
        echo "<script>alert('User already exists. Please try a different email.'); window.location.href = 'signup.html';</script>";
    } else {
        // Insert user into database
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // User registered successfully
            echo "<script>alert('Registered successfully.'); window.location.href = 'signin.html';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();


?>
