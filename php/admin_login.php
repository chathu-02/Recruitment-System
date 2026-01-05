<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username and password are correct
    if ($username == "admin" && $password == "admin123") {
        // Store the logged-in user in the session
        $_SESSION['logged_user'] = $username;

        // Display success alert and redirect
        echo "<script>
                alert('Login successful!');
                window.location.href = 'admin_page.php';
              </script>";
        exit();
    } else {
        // Display error alert and redirect back to the login page
        echo "<script>
                alert('Incorrect username or password!');
                window.location.href = 'admin_login.php';
              </script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin Login</title>
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <a href="../index.html">Home</a>
            <a href="../blog.html">Blog</a>
            <a href="../project.html">Our Projects</a>
            <a href="aboutUs.php">About Us</a>
            <a href="../contactus.html">Contact Us</a>
            <a href="login.php"> <button class="btnLogin-popup">Login</button></a>
        </nav>
        <form action="" class="search-bar">
            <input type="text" placeholder="Search....">
            <button type="submit"><i class='bx bx-search'></i></button>
        </form>
    </header>

    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form method="POST" action="admin_login.php">
                <div class="input-box">
                    <span class="icon"><i class='bx bx-user'></i></span>
                    <input type="text" id="username" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                    <input type="password" id="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>

</body>
</html>
