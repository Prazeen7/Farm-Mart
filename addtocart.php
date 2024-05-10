<?php
// Check if product ID is provided in the request
if(isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    // Get the product ID from the request
    $productId = $_POST['product_id'];

    // Replace these variables with your actual database credentials
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "farmmart"; // Corrected variable name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assume user ID is 1 for demonstration purposes, you should fetch it from the session
    $userId = 1;

    // Prepare SQL statement to insert into cart table
    $stmt = $conn->prepare("INSERT INTO cart (userId, productId, status) VALUES (?, ?, 1)");
    $stmt->bind_param("ii", $userId, $productId);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Product added to cart successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If product ID is not provided in the request, display an error message
    echo "Error: Product ID not provided.";
}
?>
