<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from login for
$username = $_POST['username'];
$password = $_POST['password'];

// Query to check if username and password match
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful, redirect to index.html
    header("Location: index1.html");
    exit();
} else {
    echo "Invalid username or password.";
    // You may want to include a link to the login page here
}

$conn->close();
?>
