<?php
include_once 'config.php';

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Prepare the delete query
    $query = "DELETE FROM about WHERE Id='$postId'";

    // Execute the query
    $data = mysqli_query($conn, $query);

    if ($data) {
        // Success: Alert the user and redirect
        echo "<script>
                alert('Record deleted successfully!');
                window.location.href = 'hr_page.php';
              </script>";
    } else {
        // Error: Alert the user about the failure
        echo "<script>
                alert('Error deleting record: " . mysqli_error($conn) . "');
              </script>";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Error: No ID provided in the request
    echo "<script>
            alert('Invalid request: No ID specified.');
            window.location.href = 'hr_page.php';
          </script>";
}
?>
