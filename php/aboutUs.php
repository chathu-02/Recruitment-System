<?php
session_start();
?>

<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>

<head>"
<head>

<!-- Include CSS stylesheet for styling -->
<link rel="stylesheet" href="../css/about.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<script src="script.js"></script>
<title>About Us</title>
</head>

<body>

<header class="header">
    <nav class="navbar">
    
    <a href="../index.html">Home</a>
            <a href="../blog.html">Blog</a>
            <a href="../project.html">Our Projects</a>
            <a href="aboutUs.php">About Us</a>
            <a href="../contactus.html">Contact Us</a>
            <a href="login.php"><button class="btnLogin-popup">Login</button></a>
    </nav>
    <form action="" class="search-bar">
        <input type="text" placeholder="Search....">
        <button type="submit"><i class='bx bx-search'></i></button>
    </form>
</header>
<br>


<div class="about-section">
    <!-- Display information about the mission -->
                <div class ="about-misson">
                <h2><u>Our Mission</u></h2></div>
                <div class="misson-img"><img src = "../images/mission.jpg" class ="logo" alt = "Mission" width="400px" height ="250px"></div>
                <div class="misson-para">   <p class = "font"><b>"Our mission is to connect exceptional talent with the right opportunities, revolutionizing the recruitment process through our innovative and user-friendly platform. 
                We aim to empower organizations to build high-performing teams and individuals to find fulfilling careers."By providing technology expertise, operational guidance and sustainable growth, we empower organizations across all industries to stay ahead in the digital economy.</b></p></div>
               </div>
            
     <div class="team-section">
        <div class="our-team">
                <h2><u>Our Team</u></h2></div>
                <div class="team-img">       <img src = "../images/project4.jpg" class ="logo" alt = "Our team" width="400px" height ="250px"></div>
                <div class="team-p"><p class = "font"><b>We align leaders around a shared purpose and strategic story that catalyzes their business and brand to take action.
                The principal reason we continue to evolve our business model is to ensure that we are meeting our customers  expectations.

</b></p>
</div>
</div>
</div>
         
    <div class="job-posts">
        <?php
        // Retrieve job post data from the database
        $sql = "SELECT * FROM about";
        $result = $conn->query($sql);
        // Check if there are any job posts available
        if ($result->num_rows > 0) {
                    // display  details
            while ($row = $result->fetch_assoc()) {
                echo '<div class="job-post">';
                // Adjust the image source path
            $imagePath = '../images/uploads/' . basename($row["image"]); // Adjust path as necessary
            echo '<div class="post-image"><img src="' . $imagePath . '" alt="Job Post Image" style="max-width: 100%; height: auto;"></div>';
                echo '<div class="post-details">';
               
                echo '<p><strong>Position:</strong> ' . $row["position"] . '</p><br>';// Display the job position
                echo '<p><strong>Description:</strong> ' . $row["description"] . '</p><br>';// Display the job description
                echo '<p><strong>Status:</strong> ' . $row["status"] . '</p><br>';// Display the job status
                echo '<div class="post-actions">';
                echo '<button class="bttn"><a href="applyVacancy.html"?id=' . $row['Id'] . '">Apply</a></button>';// Button to apply for the job
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "<p>No job posts available.</p>";
        }
        ?>
    </div>
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
                                <span>+94 11 2571179</span>
                            </li>
                            <li>
                                <span class="fas fa-envelope"></span>
                                <span><a href="#" target="_blank" class="email">info@nextsteprecruiters.com</a></span>
                            </li>
                            <li>
                                <span class="fas fa-map-marker-alt"></span>
                                <span>No 456,<br>Kaduwela Road,<br>Colombo.</span>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Do You Need Any Support?</h4><br>
                        <ul>
                            <li>  <a href="helpandsupport.html"><button class="help-button">Help & Support</button></li></li>
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
                    <label class="lable"><i>Copyright 2024,NextStep Recruiters All rights Reserved</i></label>
                </center>
        </div>
        </footer>
    
</body>
</html>
