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
            // Fetch products from the table
            $sql = "SELECT id, name, price, description, image FROM products WHERE Admin = 'Approved'";
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
$conn->close();
?>
