<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection parameters
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
    // Get form data
    $productName = $_POST["productName"];
    $productPrice = (int)$_POST["productPrice"];
    $productDescription = $_POST["productDescription"];
    $productImage = $_FILES["productImage"];
    $productStatus = isset($_POST["productStatus"]) ? 1 : 0; // 1 if checked, 0 if unchecked
    $username = isset($_POST["username"]) ? $_POST["username"] : '';

    // Handle file upload
    $targetDir = "Images/";
    $targetFile = $targetDir . basename($productImage["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($productImage["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit;
        }
    }

    // Attempt to move the uploaded file to its new destination
    if (!move_uploaded_file($productImage["tmp_name"], $targetFile)) {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }

    // Construct the table name
    $tableName = "table_" . preg_replace('/[^A-Za-z0-9_]/', '_', strtolower($username));

    // Prepare and bind statement for insertion
    $stmt = $conn->prepare("INSERT INTO $tableName (name, price, description, image, fresh) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $productName, $productPrice, $productDescription, $targetFile, $productStatus);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No data submitted.";
}
?>
