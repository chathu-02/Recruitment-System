
<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username and password are correct
    if ($username == "system" && $password == "1234") {
        // Store the logged-in user in the session
        $_SESSION['logged_user'] = $username;
        
        // Redirect to the system page with a success message
        header("Location: system.php?status=success&message=Login successful");
        exit();
    } else {
        // Redirect back to the login page with an error message
        header("Location: systemlogin.php?status=error&message=Incorrect username or password");
        exit();
    }
}
?>


<!DOCTYPE Html>
<html>

    <head>


        <link rel="stylesheet" href="../css/HR_login.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>system Login</title>
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
            <form action="hr_page" class="search-bar">
                <input type="text" placeholder="Search....">
                <button type="submit"><i class='bx bx-search'></i></button>
            </form>
        </header>

        <div class="wrapper">
            <div class="form-box login">
                <h2>Login</h2>

               

                <form method="POST" action="systemlogin.php">
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

                    <br><br>
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>
            </div>
        <br>
        <br>
        <br>
        <footer>
                <div class="containerf">
                    <div class="row">
                        <div class="footer-col">
                            <h4>QUICK LINKS</h4><br>
                            <ul>
                                <li><a href="#" target="_blank">HOME</a></li>
                                <li><a href="#" target="_blank">BLOGS</a></li>
                                <li><a href="#" target="_blank">RATE</a></li>
                                <li><a href="#" target="_blank">DISCOVER</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-col">
                        <h4>CONTACT US</h4><br>
                        <ul>
                            <li>
                                <span class="fas fa-phone-alt"></span>
                                <span>+94 75 8963207</span>
                            </li>
                            <li>
                                <span class="fas fa-envelope"></span>
                                <span><a href="#" target="_blank" class="email">softnexus@gmail.com</a></span>
                            </li>
                            <li>
                                <span class="fas fa-map-marker-alt"></span>
                                <span>No 90,<br>Kandy Road,<br>Colombo.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Do You Need Any Support?</h4><br>
                        <ul>
                            <li><button class="help-button">Help & Support</button></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <div class="qrcode">
                            <i class="fa fa-qrcode" aria-hidden="true"></i>
                        </div>
                        <a href = "feedback.html"><button class="feedback-button">Feedback</button></a>
                        <h4 class="follow-h4">Follow Us</h4>
                        <div class="social">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class="bx bxl-twitter"></i></a>
                            <a href="#"><i class="bx bxl-instagram"></i></a>
                            <a href="#"><i class="bx bxl-google-plus"></i></a>
                        </div>
                    </div>
                </div>
                <center>
                    <br>
                    <hr><br>
                    <label class="lable"><i>Copyright 2023,soft-nexus All rights Reserved</i></label>
                </center>
        </div>
        </footer>
        <script>
            // Function to display an alert with a message passed via URL
            function showAlertFromQuery() {
                const urlParams = new URLSearchParams(window.location.search);
                const status = urlParams.get('status');
                const message = urlParams.get('message');

                if (message) {
                    // Display the message in an alert box
                    alert(message);

                    // Optionally, you can remove the query string from the URL after displaying the alert
                    window.history.replaceState(null, null, window.location.pathname);
                }
            }

            // Run the function on page load
            showAlertFromQuery();
        </script>
</body>
</html>
    
        