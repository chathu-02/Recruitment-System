<?php
include_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $applicant_id = $_POST['applicant_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password for security if it is updated
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE `applicant` SET `first_name`='$first_name', `last_name`='$last_name', `address`='$address', `country`='$country', 
    `gender`='$gender', `dob`='$dob', `contact_no`='$contact_no', `email`='$email', `password`='$hashed_password' WHERE `applicant_id`='$applicant_id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Record updated successfully'); window.location.href='admin_page.php';</script>";
    } else {
        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }

    mysqli_close($conn);
}
?>
