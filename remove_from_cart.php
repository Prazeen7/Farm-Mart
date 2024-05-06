<?php
// Establish connection to MySQL database
$servername = "localhost"; // Change this according to your database configuration
$username = "root"; // Change this according to your database configuration
$password = ""; // Change this according to your database configuration
$dbname = "farmmart"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if product_id is set
if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    
    // Prepare SQL statement to update cart status
    $sql = "UPDATE cart SET status = 0 WHERE productId = $product_id";
    
    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Product removed from cart successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Product ID not provided.";
}

// Close connection
$conn->close();
?>