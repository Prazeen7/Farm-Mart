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
    // Get all table names that match the pattern "table_"
    $tablesQuery = "SHOW TABLES LIKE 'table_%'";
    $tablesResult = $conn->query($tablesQuery);

    if ($tablesResult->num_rows > 0) {
        $products = [];

        // Iterate over each table
        while ($tableRow = $tablesResult->fetch_row()) {
            $tableName = $tableRow[0];
            
            // Fetch products from the table
            $sql = "SELECT id, name, price, description, image FROM $tableName WHERE Admin = 'Approved' AND fresh=1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Fetch products from this table and append them to the products array
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row;
                }
            }
        }

        // Output the products as JSON
        echo json_encode($products);
    } else {
        // No matching tables found, return an empty array
        echo json_encode([]);
    }
} else {
    // If username is empty, return an empty array
    echo json_encode([]);
}

$conn->close();
?>
