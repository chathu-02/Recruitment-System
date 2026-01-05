<?php
session_start(); // Start the session

include_once 'config.php'; // Include the config file

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $position = $_POST['position'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Handle the image upload
    $targetDirectory = "C:/xampp/htdocs/Recruitment-of-Company-System-mai/images/uploads/"; // Absolute path
    $target_file = $targetDirectory . uniqid() . '_' . basename($_FILES["image"]["name"]); // Generate a unique file name
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image or fake
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Prepare the SQL query with the image path
            $sql = "INSERT INTO about (image, position, description, status)
                    VALUES ('$target_file', '$position', '$description', '$status')";
            // Execute the query
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Vacancy created successfully.');</script>";
                header("Location: hr_page.php"); // Redirect the user to the HR page after creating the vacancy
                exit(); // Ensure the script stops executing after the redirect
            } else {
                // Error in SQL query
                echo "<script>alert('Error: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your image.');</script>";
        }
    } else {
        echo "<script>alert('File is not an image.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/create.css">
    <title>Vacancy</title>
</head>
<body>
    <div class="Containervacancy" style="margin-top:30px;">
        <form id="vacancy" method="post" enctype="multipart/form-data">
            <h2>New Vacancy</h2>

            <label>Upload Image:</label><br>
            <input type="file" name="image" required>
            <br><br>

            <label>Position Name:</label><br>
            <input type="text" name="position" class="vacant" required>
            <br><br>

            <label>Description:</label><br>
            <textarea id="description" name="description" rows="10" cols="60" required></textarea>
            <br><br>

            <label for="status">Status:</label><br>
            <input type="text" id="status" name="status" required>
            <br><br>
            
            <center><button type="submit">Create Vacancy</button></center>
        </form>
    </div>
</body>
</html>
