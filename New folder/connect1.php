<?php
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed");
} else {
    echo "Connected Successfully";
}

// Fetch form data
$username = $_POST['username'];
$name = $_POST['name'];
$mobnumber = $_POST['mobnumber'];
$password = $_POST['password'];

// Prepare SQL statement with parameterized query
$stmt = $conn->prepare("INSERT INTO users (uni_id, username, name, mobnumber, password) VALUES (uuid(),?,?,?,?)");
$stmt->bind_param("ssss", $username, $name, $mobnumber, $password);

// Execute SQL statement
if ($stmt->execute()) {
    echo "New record created successfully";
    header("Location: swigy.html");
    exit; // Ensure redirection
} else {
    echo "Error: ". $stmt->error;
}

// Close connection
$conn->close();
?>