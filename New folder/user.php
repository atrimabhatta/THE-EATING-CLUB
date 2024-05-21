<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>The Eating Club</title>
    <link rel="icon" sizes="500x500" href="logo.jpg">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head> 
<body>  
    <!-- Navbar top --> 
    <div class="navbar-top">  
        <div class="title"> 
            <h1>Reservations</h1>  
        </div> 
  
        <!-- Navbar --> 
        <ul> 
        <li><a href="admin.php"><i class="fas fa-home" style="font-size:35px; color:pink;"></i></a></li> 
        <li><a href="index.html"><i class="fa fa-sign-out-alt" style="font-size:35px; color:pink;"></i></a></li> 
        </ul>
    </div> 
  
    <!-- Sidenav --> 
    <div class="sidenav"> 
        <div class="profile"> 
            <img src="logo.jpg" alt="Profile Logo" width="100" height="100"> 
            <div class="name"> 
                The Eating Club 
            </div> 
        </div> 
  
    </div> 
  
    <!-- Main --> 
    <div class="main"> 
        <div class="card"> 
            <?php  
            // Establish a connection to your database 
            $conn = new mysqli("localhost", "root", "", "project"); 
 
            // Check connection 
            if ($conn->connect_error) { 
                die("Connection failed: " . $conn->connect_error); 
            } 
 
            // Query to fetch order history 
            $sql = "SELECT * FROM booktable"; 
            $result = $conn->query($sql); 
 
            // Output fetched orders 
            if ($result->num_rows > 0) { 
                while ($row = $result->fetch_assoc()) { 
                    echo '<div class="card-body">'; 
                    echo '<table>'; 
                    echo '<tbody>'; 
                    echo '<tr><td><h2>Restaurant ID</td><td>'. htmlspecialchars($row['r_id']) . '</h2></td></tr>';                    
                    echo '<tr><td>Profile ID</td><td>:</td><td>' . htmlspecialchars($row['uni_id']) . '</td></tr>';
                    echo '<tr><td><p>User Name</td><td>:</td><td>' . htmlspecialchars($row['email']);'</p></td></tr>';
                    echo '<tr><td><p>Name</td><td>:</td><td>' . htmlspecialchars($row['name']);'</p></td></tr>';
                    echo '<tr><td>Restaurant</td><td>:</td><td>' . htmlspecialchars($row['restaurant']) . '</td></tr>'; 
                    echo '<tr><td>Location</td><td>:</td><td>' . htmlspecialchars($row['location']) . '</td></tr>'; 
                    echo '<tr><td>Reservation Time</td><td>:</td><td>' . htmlspecialchars($row['reservationdatetime']) . '</td></tr>'; 
                    echo '<tr><td>Table Type</td><td>:</td><td>' . htmlspecialchars($row['tabletype']) . '</td></tr>'; 
                    echo '<tr><td>Status</td><td>:</td><td>Booked</td></tr>'; 
                    echo '</tbody>'; 
                    echo '</table>'; 
                    echo '</div>'; 
                } 
            } else { 
                echo "<p>No orders found.</p>"; 
            } 
 
            // Close database connection 
            $conn->close(); 
            ?> 
        </div> 
    </div> 
</body>  
</html>