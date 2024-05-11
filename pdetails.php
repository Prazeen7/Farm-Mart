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
    // Get all table names that match the pattern "table_"
    $tablesQuery = "SHOW TABLES LIKE 'table_%'";
    $tablesResult = $conn->query($tablesQuery);

    if ($tablesResult->num_rows > 0) {
        $products = [];

        // Iterate over each table
        while ($tableRow = $tablesResult->fetch_row()) {
            $tableName = $tableRow[0];

            // Fetch product details from the table based on product ID
            $sql = "SELECT name, price, description, image FROM $tableName WHERE id = $productId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Fetch product details and append them to the products array
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row;
                }
            }
        }

        // Output the product details as JSON
        echo json_encode($products);
    } else {
        // No matching tables found, return an empty array
        echo json_encode([]);
    }
} else {
    // If product ID is empty, return an empty array
    echo json_encode([]);
}

$conn->close();
?>
