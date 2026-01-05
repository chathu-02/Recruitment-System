<?php
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Description = $_POST['Description'];
	

	// Include database connection
	include 'config.php';

	// Prepare and execute the SQL statement
	$stmt = $conn->prepare("INSERT INTO contactus ( Name, Email, Description) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $Name, $Email, $Description);
	$stmt->execute();

	echo "Your Report has been successfully submitted.";
	echo "<script>window.location.replace(\"../index.html\");</script>";

	$stmt->close();
	$conn->close();
?>
