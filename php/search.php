
<!DOCTYPE html>

<head>
    <title>Contact Us Page</title>
    <link rel="stylesheet" href="../css/contactus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!--Header-->
    <header class="header">
        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="blog.html">Blog</a>
            <a href="project.html">Our projects</a>
            <a href="aboutUs.php">About Us</a>
            <a href="contactus.html">Contact Us</a>

            <button class="btnLogin-popup"><a href="./php/login.php">Login</a></button>
        </nav>
        <form action="" class="search-bar">
            <input type="text" placeholder="Search....">
            <button type="submit"><i class='bx bx-search'></i></button>
        </form>
    </header>
    <br>
    <?php
// Include database connection
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Prepare the query to search contact by email
    $stmt = $conn->prepare("SELECT Name, Email, Description FROM contactus WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Fetch the result
        $stmt->bind_result( $name, $email, $description);
        $stmt->fetch();
        ?>
    <div class="contact">
        <!-- Display the result in input fields for update/delete -->
        <form method="POST" action="update_delete_search.php">
         <div class="form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly><br>

            <label for="message">Description:</label><br>
            <textarea id="message" name="description" required><?php echo $description; ?></textarea><br>

            <button type="submit"  id="subBtn" name="update">Update</button>
            <button type="submit"  id="subBtn" name="delete" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
         </div>
        </form>
    </div>
        <?php
    } else {
        echo "No contact found with the given email.";
    }

    $stmt->close();
    $conn->close();
}
?>


      
        
    
    <br>
    <br>
    <br>
    <!--footer-->
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
                    <li> <a href="helpandsupport.html"><button class="help-button">Help & Support</button></li></button></li>
                </ul>
            </div>
            <div class="footer-col">
                <div class="qrcode">
                    <i class="fa fa-qrcode" aria-hidden="true"></i>
                </div>
                <a href="feedback.html"><button class="feedback-button">Feedback</button></a>
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
    
</body>

</html>