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
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productImage = $_POST['productImage'];
    $username = $_POST['username'];

    // Get all table names that match the pattern "table_%"
    $tablesQuery = "SHOW TABLES LIKE 'table_%'";
    $tablesResult = $conn->query($tablesQuery);

    if ($tablesResult->num_rows > 0) {
        // Iterate over each table
        while ($tableRow = $tablesResult->fetch_row()) {
            $tableName = $tableRow[0];

            // Prepare and execute the first update query for products table
            $sql = "DELETE FROM $tableName WHERE id = ?";
            $stmt1 = $conn->prepare($sql);
            $stmt1->bind_param("i", $productId);
            $stmt1->execute();

            // Prepare and execute the second update query for the dynamic table
            $sql2 = "DELETE FROM products WHERE name = ? AND price = ? AND image = ?";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->bind_param("sds", $productName, $productPrice, $productImage);
            $stmt2->execute();

            // Check if both updates were successful
            if ($stmt1->affected_rows > 0 && $stmt2->affected_rows > 0) {
                echo "Product removed successfully";
            } 

            // Close prepared statements
            $stmt1->close();
            $stmt2->close();
        }
    } else {
        echo "No matching tables found";
    }
}

// Close connection
$conn->close();
?>
