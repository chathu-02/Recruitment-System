<?php
session_start(); // Start the session
include 'config.php'; // Include the config file
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/hrpage.css">
    <title>HR Page</title>
</head>

<body>

<h1>Vacancy Details</h1>
<br><br><br>

<!-- Button to create a new vacancy -->
<a href="createVacancy.php"><input class="create-button" type="button" value="Create"></a>
<a href="login.php"><input class="create-button" type="button" value="Logout"></a>
<div class="job-posts">
    <?php
    // Fetch job posts from the 'about' table
    $sql = "SELECT * FROM about";
    $result = $conn->query($sql);

    // Check if there are any job posts available
    if ($result->num_rows > 0) {
        // Loop through the job posts and display each
        while ($row = $result->fetch_assoc()) {
            echo '<div class="job-post">';
            // Adjust the image source path
            $imagePath = '../images/uploads/' . basename($row["image"]); // Adjust path as necessary
            echo '<div class="post-image"><img src="' . $imagePath . '" alt="Job Post Image" style="max-width: 100%; height: auto;"></div>';
            echo '<div class="post-details">';
            echo '<p><strong>Post ID:</strong> ' . $row["Id"] . '</p>';
            echo '<p><strong>Position:</strong> ' . $row["position"] . '</p>';
            echo '<p><strong>Description:</strong> ' . $row["description"] . '</p>';
            echo '<p><strong>Status:</strong> ' . $row["status"] . '</p>';

            // Add action buttons for viewing, editing, and deleting
            echo '<div class="post-actions">';
           
            echo '<a href="editVacancy.php?id=' . $row["Id"] . '"><input class="edit-button" type="button" value="Edit"></a>';
            echo '<a href="deleteVacancy.php?id=' . $row["Id"] . '"><input class="delete-button" type="button" value="Delete"></a>';
            echo '</div>'; // Close post-actions div

            echo '</div>'; // Close post-details div
            echo '</div>'; // Close job-post div
        }
    } else {
        // If no job posts are available, display a message
        echo "<p>No job posts available.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</div>


</body>
</html>
