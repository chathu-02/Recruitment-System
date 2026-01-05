<?php
session_start();
include 'config.php';

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Declare the target directory at the top
    $targetDirectory = "C:/xampp/htdocs/Recruitment-of-Company-System-mai/images/uploads/"; // Adjust your path here

    // Fetch the existing vacancy details
    $sql = "SELECT * FROM about WHERE Id = '$postId'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (isset($_POST['submit'])) {
            $position = $_POST['position'];
            $description = $_POST['description'];
            $status = $_POST['status'];

            // Handle the image upload
            $image = $row['image']; // Default to existing image
            if ($_FILES['image']['name']) {
                $image_tmp = $_FILES['image']['tmp_name'];
                $image = uniqid() . '_' . basename($_FILES['image']['name']); // Create a unique image name

                // Move the uploaded file
                if (move_uploaded_file($image_tmp, $targetDirectory . $image)) {
                    // Successfully uploaded
                } else {
                    echo "<script>alert('Error uploading the image.');</script>";
                }
            }

            // Update the database
            $sql = "UPDATE about SET image='$image', position='$position', description='$description', status='$status' WHERE Id='$postId'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Post updated successfully.'); window.location.href = 'hr_page.php';</script>";
            } else {
                echo "<script>alert('Error updating post: " . $conn->error . "');</script>";
            }
        }
    } else {
        echo "<script>alert('No vacancy found.'); window.location.href = 'hr_page.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'hr_page.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/create.css">
    <title>Edit Vacancy</title>
</head>
<body>
    <div class="edit-vacancy">
        <h2>Edit Vacancy</h2><br><br>
        <form method="POST" action="" enctype="multipart/form-data">

            <label>Image:</label><br>
            <?php 
                // Debugging: Check if the image exists
                $imagePath = "../images/uploads/" . $row['image'];
                if (file_exists($targetDirectory . $row['image'])): ?>
                <img src="<?php echo $imagePath; ?>" alt="Job Post Image" style="max-width: 200px; height: auto;">
            <?php else: ?>
                <p style="color: red;">Image not found: <?php echo $row['image']; ?></p>
            <?php endif; ?>
            <br><br>
            <input type="file" name="image"><br><br>

            <label>Position:</label><br>
            <input type="text" name="position" value="<?php echo htmlspecialchars($row['position']); ?>" required><br><br>

            <label>Description:</label><br>
            <textarea name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea><br><br>

            <label>Status:</label><br>
            <input type="text" name="status" value="<?php echo htmlspecialchars($row['status']); ?>" required><br><br>

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
