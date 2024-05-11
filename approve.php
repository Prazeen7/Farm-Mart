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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'];
    $username = $_POST['username']; 

    // Construct the table name
    $tableName = "table_" . preg_replace('/[^A-Za-z0-9_]/', '_', strtolower($username));

    $sql = "UPDATE $tableName SET Admin = 'Approved' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    if ($stmt->execute()) {
        echo "Product approved successfully";
    } else {
        echo "Error approving product: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
