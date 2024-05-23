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

// Handle sign-in form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists with provided email and password
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User authenticated
        session_start();
        $_SESSION['email'] = $email;
        header("Location: general.php");
        exit();
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid email or password.'); window.location.href = 'signin.html';</script>";
    }
}

$conn->close();
?>





