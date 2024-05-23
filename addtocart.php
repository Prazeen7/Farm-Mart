<?php
// Check if product ID is provided in the request
if(isset($_POST['product_id']) && !empty($_POST['product_id'])) {
    // Get the product ID from the request
    $productId = $_POST['product_id'];

    
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "farmmart"; // Corrected variable name

    try {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

     
        $userEmail = "samika@gmail.com"; // Replace this with the actual user's email

        // Check if the product is already in the user's cart
        $checkStmt = $conn->prepare("SELECT * FROM cart WHERE userEmail = ? AND productId = ?");
        if (!$checkStmt) {
            throw new Exception("Prepare statement error: " . $conn->error);
        }
        $checkStmt->bind_param("si", $userEmail, $productId);
        if (!$checkStmt->execute()) {
            throw new Exception("Execute statement error: " . $checkStmt->error);
        }
        $result = $checkStmt->get_result();

    
            // Prepare SQL statement to insert into cart table
            $stmt = $conn->prepare("INSERT INTO cart (userEmail, productId, status) VALUES (?, ?, 1)");
            if (!$stmt) {
                throw new Exception("Prepare statement error: " . $conn->error);
            }
            $stmt->bind_param("si", $userEmail, $productId); // Changed 'ii' to 'si' to match the types of parameters
            if (!$stmt->execute()) {
                throw new Exception("Execute statement error: " . $stmt->error);
            }

            echo "Product added to cart successfully!";
        

        // Close statements and connection
        $checkStmt->close();
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // If product ID is not provided in the request, display an error message
    echo "Error: Product ID not provided.";
}
?>
