<?php
// Suppress error reporting
error_reporting(0);

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>The Eating Club</title>
    <link rel="icon" sizes="500x500" href="logo.jpg">
    <link rel="stylesheet" href="r.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
<div class="navbar-top"> 
    <div class="title"> 
        <h1>Admin</h1> 
    </div> 
    <ul> 
        <li><a href="admin.php"><i class="fas fa-home" style="font-size:35px; color:pink;"></i></a></li> 
        <li><a href="index.html"><i class="fa fa-sign-out-alt" style="font-size:35px; color:pink;"></i></a></li> 
    </ul> 
</div> 
 
<div class="sidenav"> 
    <div class="profile"> 
        <img src="logo.jpg" alt="" width="100" height="100"> 
        <div class="name">The Eating Club</div> 
    </div> 
    <div class="sidenav-url"> 
        <div class="url"> 
            <a href="myprofile.php"class="active">Profile</a> 
            <hr align="center"> 
        </div> 
</div> 
</div> 

<div class="main">
<?php
// Query to fetch admin details
$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {

        echo '<div class="card">';    
        echo '<div class="card-body">';    
        echo '<table>';    
        echo '<tbody>'; 
        echo '<tr><td>ID</td><td>:</td><td>' . htmlspecialchars($row["id"]) . '</td></tr>';
        echo '<tr><td>Username</td><td>:</td><td>' . htmlspecialchars($row["username"]) . '</td></tr>';    
        echo '<tr><td>Name</td><td>:</td><td>' . htmlspecialchars($row["name"]) . '</td></tr>';    
        echo '<tr><td>Mobile</td><td>:</td><td>' . htmlspecialchars($row["mobnumber"]) . '</td></tr>';    
        echo '</tbody>';    
        echo '</table>';    
        echo '</div>';    
        echo '</div>';
    }
    
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
</div>  
</body>
</html>
