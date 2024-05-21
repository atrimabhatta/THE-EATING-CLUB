<?php
// login.php
session_start();
include 'server.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['u_id'];
        $_SESSION['username'] = $user['username'];
        header("Location: swigy.html");
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>