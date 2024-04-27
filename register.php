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

// Retrieve data from registration form
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];

// Check if username already exists
$check_username_sql = "SELECT * FROM users WHERE username='$username'";
$check_username_result = $conn->query($check_username_sql);

if ($check_username_result->num_rows > 0) {
    // Username already exists, show an alert
    echo '<script>alert("Username already exists. Please choose a different username.");</script>';
} else {
    // Insert data into database
    $insert_sql = "INSERT INTO users (email ,username, password, repeat_password) VALUES ('$email','$username', '$password','$repeat_password')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "Registration successful! Go back to login page";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
