<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values and sanitize them
    $Ename = mysqli_real_escape_string($conn, $_POST['Ename']);
    $Eaddress = mysqli_real_escape_string($conn, $_POST['Eaddress']);
    $salary = $_POST['salary'];
    $Eposition = mysqli_real_escape_string($conn, $_POST['Eposition']);
    
    // Validate salary to be a positive number
    if (!is_numeric($salary) || $salary <= 0) {
        echo "<script>alert('Please enter a valid positive salary.');</script>";
    } else {
        // Prepare an SQL statement
        $stmt = $conn->prepare("INSERT INTO employee (Ename, Eaddress, salary, Eposition) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $Ename, $Eaddress, $salary, $Eposition);  // 'ssds' -> string, string, double, string

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Record inserted successfully');</script>";
            echo "<script>window.location.replace('system.php');</script>"; // Redirect to the system page
            exit;
        } else {
            echo "<script>alert('Error inserting record: " . mysqli_error($conn) . "');</script>";
        }

        $stmt->close();  // Close the prepared statement
    }

    mysqli_close($conn);  // Close the connection
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="../css/addemployee.css">
    <style>
        .error {color: red;}
    </style>
</head>
<body>
    <h1 style="margin-top:30px; margin-bottom: 20px;">Add Employee</h1>
    
    <form method="POST" action="">
        <div class="d1">
            <label for="Ename">Name:</label>
            <input type="text" id="Ename" name="Ename" required>
        </div>
        <br>
        <div class="d1">
            <label for="Eaddress">Address:</label>
            <input type="text" id="Eaddress" name="Eaddress" required>
        </div>
        <br>
        <div class="d1">
            <label for="salary">Salary:</label>
            <input type="number" id="salary" name="salary" required min="0.01" step="0.01" oninput="validateSalary()">
            <span id="salaryError" class="error"></span>
        </div>
        <br>
        <div class="d1">
            <label for="Eposition">Position:</label>
            <input type="text" id="Eposition" name="Eposition" required>
        </div>
        <br>
        <div class="d2">
            <input type="submit" name="submit" value="Add" class="btn1">&nbsp;&nbsp;
            <a href="system.php">Cancel</a>
        </div>
    </form>

    <br><br><br><br><br><br><br>

    <!-- JavaScript for Salary Validation -->
    <script>
        function validateSalary() {
            const salaryInput = document.getElementById("salary");
            const salaryError = document.getElementById("salaryError");

            if (salaryInput.value <= 0) {
                salaryError.textContent = "Salary must be a positive number.";
            } else {
                salaryError.textContent = "";
            }
        }
    </script>
</body>
</html>
