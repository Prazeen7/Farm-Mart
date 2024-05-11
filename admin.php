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

// Get the username from the query parameter
$username = isset($_GET['username']) ? $_GET['username'] : '';

// Construct the table name
$tableName = "table_" . preg_replace('/[^A-Za-z0-9_]/', '_', strtolower($username));

// Modify the query to check for admin approval based on the provided username
$sql = "SELECT id, name, price, description, image FROM $tableName WHERE Admin = 'Disapproved'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    echo json_encode($products);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();
?>
