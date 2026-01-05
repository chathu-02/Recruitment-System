<?php
session_start();
include 'config.php';

$message = ""; // Initialize a variable for messages

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $candidate_id = $_POST['candidate_id'];
    $interview_date = $_POST['interview_date'];
    $interview_time = $_POST['interview_time'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO interviews (candidate_id, interview_date, interview_time) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $candidate_id, $interview_date, $interview_time);

    if ($stmt->execute()) {
        $message = "Interview scheduled successfully"; // Success message
        echo "<script>alert('$message');</script>";
        // Redirect to recruiter page after showing the alert
        echo "<script>setTimeout(function(){ window.location.href = 'recruiterpage.php'; }, 1000);</script>";
    } else {
        $message = "Error: " . $stmt->error; // Error message
        echo "<script>alert('$message');</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Interview</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: lightskyblue;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Schedule Interview</h1>
    <form method="POST" action="">
        <div>
            <label for="candidate_id">Candidate ID:</label>
            <input type="text" id="candidate_id" name="candidate_id" required>
        </div>
        <div>
            <label for="interview_date">Interview Date:</label>
            <input type="date" id="interview_date" name="interview_date" required>
        </div>
        <div>
            <label for="interview_time">Interview Time:</label>
            <input type="time" id="interview_time" name="interview_time" required>
        </div>
        <div>
            <input type="submit" name="submit" value="Schedule">
        </div>
    </form>
</body>
</html>
