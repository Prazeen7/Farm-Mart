<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "farmmart";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email, subject, message FROM inquiry";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$inquiries = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $inquiries[] = $row;
    }
    echo json_encode($inquiries);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
