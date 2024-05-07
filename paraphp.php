<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $user_name, $user_password);

// Set parameters and execute
$user_name = $_POST['username'];
$user_password = $_POST['password'];
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>
