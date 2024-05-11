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

// Retrieve product ID from query parameter and sanitize it
$productId = isset($_GET['productId']) ? $conn->real_escape_string($_GET['productId']) : '';

// Initialize an empty array to store product details
$productDetails = array();

// Check if product ID is not empty
if (!empty($productId)) {
    // Fetch product details from the database based on the product ID
    $sql = "SELECT name, price, description, image FROM products WHERE id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch product details
        $product = $result->fetch_assoc();
        // Add product details to the array
        $productDetails = $product;
    }
}

// Close the database connection
$conn->close();

// Output product details as JSON
header('Content-Type: application/json');
echo json_encode($productDetails);
?>
