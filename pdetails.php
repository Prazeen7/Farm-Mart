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

// Check if product ID is not empty
if (!empty($productId)) {
    // Fetch product details from the database based on the product ID
    $sql = "SELECT name, price, description, image FROM products WHERE id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch product details
        $product = $result->fetch_assoc();
        // Output the product details
        echo "<h2>{$product['name']}</h2>";
        echo "<p>Description: {$product['description']}</p>";
        echo "<p>Price: {$product['price']}</p>";
        echo "<img src='{$product['image']}' alt='{$product['name']}'>";
    } else {
        // Product not found
        echo "Product not found";
    }
} else {
    // Product ID is empty
    echo "Product ID is empty";
}

$conn->close();
?>
