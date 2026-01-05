<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind the SQL statement
    $sql = "INSERT INTO applicant (first_name, last_name, address, country, gender, dob, contact_no, email, password)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $first_name, $last_name, $address, $country, $gender, $dob, $contact_no, $email, $hashed_password);

    // Check if the insert is successful
    if ($stmt->execute()) {
        echo "<script>alert('Record added successfully'); window.location.href='admin_page.php';</script>";
    } else {
        echo "<script>alert('Error adding record: " . $conn->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add_style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Add Applicant</title>
    <script>
        function validateForm() {
            // Check if password and confirm password match
            const password = document.getElementById("password").value;
            const cnfrpwd = document.getElementById("cnfrpwd").value;
            if (password !== cnfrpwd) {
                alert("Passwords do not match!");
                return false;
            }

            // Ensure date of birth is not in the future
            const dob = new Date(document.getElementById("dob").value);
            const today = new Date();
            if (dob > today) {
                alert("Date of birth cannot be in the future!");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <!-- Form -->
    <div class="Container">
        <form id="reg" method="post" onsubmit="return validateForm()" action="add_applicant.php">
            <h2>Add Applicant Details</h2>

            <label>First Name: </label>
            <input type="text" name="first_name" class="register" placeholder="Enter first name" required>
            <br><br>

            <label>Last Name: </label>
            <input type="text" name="last_name" class="register" placeholder="Enter last name" required>
            <br><br>

            <label>Address: </label>
            <textarea name="address" rows="8" cols="50"></textarea>
            <br><br>

            <label>Country: </label>
            <select name="country" required>
                <option value="">Select Country</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Colombo">Colombo</option>
                <option value="Negombo">Negombo</option>
                <!-- Add other options as needed -->
            </select>
            <br><br>

            <label>Gender: </label>
            <input type="radio" name="gender" value="Male" id="male" required><span>Male</span>
            <input type="radio" name="gender" value="Female" id="female" required><span>Female</span>
            <br><br>

            <label>Date of Birth: </label>
            <input type="date" name="dob" id="dob" required>
            <br><br>

            <label>Phone Number: </label>
            <input type="tel" class="contact_no" name="contact_no" placeholder="0777777777" pattern="[0-9]{10}" required>
            <br><br>

            <label>Email: </label>
            <input type="email" class="email" name="email" placeholder="abc@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}" required>
            <br><br>

            <label>Password: </label>
            <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,10}" required>
            <br><br>

            <label>Re-enter Password: </label>
            <input type="password" id="cnfrpwd" required>
            <br><br>

            <center><input type="submit" value="Add" id="submitBtn"></center>
        </form>
    </div>
</body>
</html>
