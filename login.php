<?php
session_start();
include('db.php');
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        $msg = 'Username atau password salah!';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Library System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <p><?php echo $msg; ?></p>
</body>
</html>
