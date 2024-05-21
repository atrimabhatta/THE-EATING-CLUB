<?php
session_start();
include 'server.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM booktable WHERE email IN (SELECT username FROM users WHERE u_id = ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "No past reservations found for this user.";
    exit();
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
        <h1>Order History</h1> 
    </div> 
    <ul> 
        <li><a href="swigy.html"><i class="fas fa-home" style="font-size:35px; color:pink;"></i></a></li> 
        <li><a href="booktable.html"><i class="fas fa-book" style="font-size:35px; color:pink;"></i></a></li> 
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
            <a href="myprofile.php">Profile</a> 
            <hr align="center"> 
        </div> 
        <div class="url"> 
            <a href="orders.php"class="active" >Order History</a> 
            <hr align="center"> 
        </div> 
    </div> 
</div> 
<div class="main"> 
        <h2>Details</h2> 
                        <?php while ($reservation = $result->fetch_assoc()): ?>
                        <?php 
                        echo '<div class="card">'; 
                        echo '<div class="card-body">'; 
                        echo '<table>'; 
                        echo '<tbody>';?>
                        <tr><td><p>Reservation ID</td><td>:</td><td><td><?php echo htmlspecialchars($reservation['r_id']); ?></p></td></tr>
                        <tr><td><p>Name</td><td>:</td><td><td><?php echo htmlspecialchars($reservation['name']); ?></p></td></tr>
                        <tr><td><p>Email</td><td>:</td><td><td><?php echo htmlspecialchars($reservation['email']); ?></p></td></tr>
                        <tr><td><p>Restaurant</td><td>:</td><td><td> <?php echo htmlspecialchars($reservation['restaurant']); ?></p></td></tr>
                        <tr><td><p>Location</td><td>:</td><td><td><?php echo htmlspecialchars($reservation['location']); ?></p></td></tr>
                        <tr><td><p>Date & Time</td><td>:</td><td><td><?php echo htmlspecialchars($reservation['reservationdatetime']); ?></p></td></tr>
                        <tr><td><p>Table Type</td><td>:</td><td><td><?php echo htmlspecialchars($reservation['tabletype']); ?></p></td></tr>
                        <tr><td><p>Mobile Number</td><td>:</td><td><td><?php echo htmlspecialchars($reservation['mobnumber']); ?></p></td></tr>
                        <?php 
                        echo '</tbody>'; 
                        echo '</table>'; 
                        echo '</div>'; 
                        echo '</div>'; ?>
                        <?php endwhile; ?>
    </div>  
</body>
</html>
