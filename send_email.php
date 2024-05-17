<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "farmmart";

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO inquiry (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

// Execute the statement
if ($stmt->execute()) {
    // Inquiry data inserted successfully
    http_response_code(200);
    echo 'Inquiry submitted successfully.';
} else {
    // Error inserting inquiry data
    http_response_code(500);
    echo 'Error submitting inquiry. Please try again later.';
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
