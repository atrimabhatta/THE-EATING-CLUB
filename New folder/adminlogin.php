<?php
// login.php
session_start();
include 'server.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: admin.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta charset="UTF-8">
    <title>The Eating Club</title>
    <link rel="icon" sizes="500x500" href="logo.jpg">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">AdminPanel</a>
            </div>
        </div>
    </nav>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Admin Area <small>Admin Login</small></h1>
                </div>
            </div>
        </div>
    </header>
    <section id="main">
    
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
    <form action="adminlogin.php" method="post" class="well">
                        <?php if (isset($error)):?>
                        <div class="alert alert-danger"><?php echo $error;?></div>
                        <?php endif;?>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">
        <p>&copy; 2017, theeatingclub.co.in. All Rights Reserved.</p>
    </footer>
</body>
</html>