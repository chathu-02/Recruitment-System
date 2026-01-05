<?php
include_once 'config.php'; // Include the config file

// Check if the interview ID is provided
if (isset($_GET['id'])) {
    $interviewID = $_GET['id'];

    // Prepare the SQL DELETE query
    $sql = "DELETE FROM interviews WHERE interviewID = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, 'i', $interviewID);

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Interview deleted successfully');</script>";
        echo "<script>window.location.href = 'recruiterpage.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('No interview ID provided.');</script>";
    echo "<script>window.location.href = 'recruiterpage.php';</script>";
}

// Close the database connection
mysqli_close($conn);
?>
