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
    $action = $_POST['action'];

    // Initialize response variable
    $response = "";

    // Process the action (approve or disapprove)
    switch ($action) {
        case 'approve':
            // Update product status to 'Approved' in the products table
            $sql1 = "UPDATE products SET Admin = 'Approved' WHERE id = ?";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bind_param("i", $productId);
            $approvalSuccess = $stmt1->execute();
            $stmt1->close();

            // Iterate over each dynamic table and update the product status
            $tablesQuery = "SHOW TABLES LIKE 'table_%'";
            $tablesResult = $conn->query($tablesQuery);
            if ($tablesResult->num_rows > 0) {
                while ($tableRow = $tablesResult->fetch_row()) {
                    $tableName = $tableRow[0];
                    $sql2 = "UPDATE $tableName SET Admin = 'Approved' WHERE name = ? AND price = ? AND image = ?";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bind_param("sds", $productName, $productPrice, $productImage);
                    $approvalSuccess = $stmt2->execute();
                    $stmt2->close();
                }
            } else {
                $response = "No matching tables found.";
            }

            if ($approvalSuccess) {
                $response = "Product approved successfully";
            } else {
                $response = "Error approving product.";
            }
            break;
        case 'disapprove':
            // Delete the product from the products table
            $sql1 = "DELETE FROM products WHERE id = ?";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->bind_param("i", $productId);
            $disapprovalSuccess = $stmt1->execute();
            $stmt1->close();

            // Iterate over each dynamic table and delete the product entry
            $tablesQuery = "SHOW TABLES LIKE 'table_%'";
            $tablesResult = $conn->query($tablesQuery);
            if ($tablesResult->num_rows > 0) {
                while ($tableRow = $tablesResult->fetch_row()) {
                    $tableName = $tableRow[0];
                    $sql2 = "DELETE FROM $tableName WHERE name = ? AND price = ? AND image = ?";
                    $stmt2 = $conn->prepare($sql2);
                    $stmt2->bind_param("sds", $productName, $productPrice, $productImage);
                    $disapprovalSuccess = $stmt2->execute();
                    $stmt2->close();
                }
            } else {
                $response = "No matching tables found.";
            }

            if ($disapprovalSuccess) {
                $response = "Product disapproved and deleted successfully";
            } else {
                $response = "Error disapproving product.";
            }
            break;
        default:
            $response = "Invalid action.";
    }

    // Output the response
    echo $response;
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
