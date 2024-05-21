<?php
// profile.php
session_start();
include 'server.php';
if (!isset($_SESSION['user_id'])) {
header("Location: login.php");
exit();
}
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE u_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
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
        <h1>My Profile</h1> 
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
            <a href="myprofile.php"class="active">Profile</a> 
            <hr align="center"> 
        </div> 
        <div class="url"> 
            <a href="orders.php" >Order History</a> 
            <hr align="center"> 
        </div> 
    </div> 
</div> 
 
    <div class="main"> 
        <h2>Details</h2> 
        <div class="card">
            <div class="card-body">
                <table>
                    <tbody>
                            <tr><td><p>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</p></td></tr>
                            <tr><td><p>ID</td><td>:</td><td> <?php echo htmlspecialchars($user['uni_id']); ?></p></td></tr>
                            <tr><td><p>User Name</td><td>:</td><td> <?php echo htmlspecialchars($user['username']); ?></p></td></tr>
                            <tr><td><p>Mobile Number</td><td>:</td><td> <?php echo htmlspecialchars($user['mobnumber']); ?></p></td></tr>
                    </tbody>
                </table>
            </div>  
        </div>  
    </div>  
</body>
</html>
