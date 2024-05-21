<?php
$servername = "localhost";
$username = "root"; 
$password =""; 
$dbname = "project"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Retrieve data from the form
if (isset($_POST['uni_id'],$_POST['name'], $_POST['email'], $_POST['restaurant'], $_POST['location'], $_POST['reservationdatetime'], $_POST['tabletype'], $_POST['mobnumber'])) {
    $uni_id = $_POST['uni_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $restaurant = $_POST['restaurant'];
    $location = $_POST['location'];
    $reservationdatetime = $_POST['reservationdatetime'];
    $tabletype = $_POST['tabletype'];
    $mobnumber = $_POST['mobnumber'];
} else {
    die('Missing form data');
}
$sql = "INSERT INTO booktable(uni_id,name, email, restaurant, location, reservationdatetime, tabletype, mobnumber) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?) 
        ON DUPLICATE KEY UPDATE 
        uni_id = VALUES(uni_id), name = VALUES(name), email = VALUES(email), restaurant = VALUES(restaurant), 
        location = VALUES(location), reservationdatetime = VALUES(reservationdatetime), 
        tabletype = VALUES(tabletype)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $uni_id, $name, $email, $restaurant, $location, $reservationdatetime, $tabletype, $mobnumber);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "Reservation successful!";
        header("location: receipt.php");
    } else {
        echo "Reservation updated!";
        header("location: receipt.php");
    }
} else {
    echo "Error: ". $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>