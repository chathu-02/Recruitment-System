<?php
include_once 'config.php';

$eid = $_GET['id'];

$query = "DELETE FROM employee WHERE eid='$eid'";
$data = mysqli_query($conn, $query);

if ($data) {
    // Successful deletion
    echo "<script>
            alert('Record deleted successfully!');
            window.location.href = 'system.php';
          </script>";
} else {
    // Error in deletion
    echo "<script>
            alert('Error in deleting record!');
            window.location.href = 'system.php';
          </script>";
}

mysqli_close($conn);
?>
