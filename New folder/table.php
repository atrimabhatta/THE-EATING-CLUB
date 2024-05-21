<!DOCTYPE html>
<html>
<head>
    <title>Add Restaurants</title>
</head>
<body>
    <h2>Add Restaurants</h2>
    <form method="post" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required><br>
        <label for="details">Details:</label><br>
        <textarea id="details" name="details" required></textarea><br><br>
        <input type="submit" name="submit" value="Add Restaurant">
    </form>
<a href="admin.php">Home</a>
    <?php
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

    // If form is submitted
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $location = $_POST['location'];
        $details = $_POST['details'];

        // Insert restaurant into tables table
        $sql = "INSERT INTO tables (name, location, details) VALUES ('$name', '$location', '$details')";
        if ($conn->query($sql) === TRUE) {
            echo "Restaurant added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Display all restaurants
    $sql = "SELECT * FROM tables";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Restaurants</h2>";
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>Name:</strong> " . $row["name"]. "<br><strong>Location:</strong> " . $row["location"]. "<br><strong>Details:</strong> " . $row["details"]. "</p>";
        }
    } else {
        echo "No restaurants found";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
