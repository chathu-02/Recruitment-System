<?php
session_start();
include 'config.php';


        $applicant_id = $_GET['id'];
//execute the query
        $sql = "SELECT * FROM `applicant` WHERE `applicant_id` = '$applicant_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        //connecting the datase
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $address = $row['address'];
        $country = $row['country'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $contact_no = $row['contact_no']; 
        $email = $row['email'];
        $password = $row['password']; 

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/editstyle.css">
    <title>Edit Applicant Details</title>
</head>
<body>
    <div class="container">
        <form action="updateDetails.php" method="POST" onsubmit="return validateForm()">
            <h2>Edit Applicant Details</h2>
            <br>
            <label>Applicant ID:</label>
            <input type="text" id="applicant_id" name="applicant_id" value="<?php echo $applicant_id; ?>" readonly><br><br>

            <label>First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>"><br><br>

            <label>Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>"><br><br>

            <label>Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>"><br><br>

            <label>Country:</label>
            <input type="text" id="country" name="country" value="<?php echo $country; ?>"><br><br>

            <label>Gender:</label>
            <input type="text" id="gender" name="gender" value="<?php echo $gender; ?>"><br><br>

            <label>Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $dob; ?>"><br><br>

            <label>Phone Number:</label>
            <input type="tel" id="contact_no" name="contact_no" pattern="[0-9]{10}" value="<?php echo $contact_no; ?>" required><br><br>

            <label>Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br><br>

            <label>Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>"><br><br>

            <center><input type="submit" value="Update" id="submitBtn"></center>
        </form>
    </div>

    <script>
        function validateForm() {
            // Add any custom validation like password strength or matching
            return true;
        }
    </script>
</body>
</html>
