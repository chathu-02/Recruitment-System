<?php
// Include database connection
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    
    $email = $_POST['email'];
    
    $description = $_POST['description'];

    if (isset($_POST['update'])) {
        // Prepare the query to update the contact
        $stmt = $conn->prepare("UPDATE contactus SET  Name = ?, Description = ? WHERE Email = ?");
        $stmt->bind_param("sss", $name,  $description, $email);
        if ($stmt->execute()) {
            echo "Contact updated successfully!";
            echo "<script>window.location.replace(\"../contactus.html\");</script>";
        } else {
            echo "Error updating contact.";
        }
    } elseif (isset($_POST['delete'])) {
        // Prepare the query to delete the contact
        $stmt = $conn->prepare("DELETE FROM contactus WHERE Email = ?");
        $stmt->bind_param("s", $email);
        if ($stmt->execute()) {
            echo "Contact deleted successfully!";
            echo "<script>window.location.replace(\"../index.html\");</script>";
        } else {
            echo "Error deleting contact.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
