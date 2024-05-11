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

// Retrieve username from query parameter and sanitize it
$username = isset($_GET['username']) ? $conn->real_escape_string($_GET['username']) : '';

// Check if username is not empty
if (!empty($username)) {
    // Construct the table name
    $tableName = "table_" . preg_replace('/[^A-Za-z0-9_]/', '_', strtolower($username));

    // Modify the query to check for admin approval and match the username
    $sql = "SELECT name, price, description, image FROM $tableName WHERE Admin = 'Approved'";
    $result = $conn->query($sql);

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        echo json_encode($products);
    } else {
        echo json_encode([]);
    }
} else {
    // If username is empty, return an empty array
    echo json_encode([]);
}

$conn->close();
?>
