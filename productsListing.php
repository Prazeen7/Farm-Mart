<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are not empty
    if (!empty($_POST["productName"]) && !empty($_POST["productPrice"]) && !empty($_POST["productDescription"]) && !empty($_FILES["productImage"]) && !empty($_POST["productQuantity"])) {
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

        // Get form data
        $productName = $_POST["productName"];
        $productPrice = (int)$_POST["productPrice"];
        $productDescription = $_POST["productDescription"];
        $productImage = $_FILES["productImage"];
        $productQuantity = $_POST["productQuantity"]; // Retrieve quantity
        $productStatus = isset($_POST["productStatus"]) ? ($_POST["productStatus"] == 1 ? 1 : 0) : 0; // Convert to integer, 1 if checked, 0 if unchecked
        $username = isset($_POST["username"]) ? $_POST["username"] : '';

        // Handle file upload
        $targetDir = "Images/";
        $targetFile = $targetDir . basename($productImage["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($productImage["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit;
        }

        // Attempt to move the uploaded file to its new destination
        if (!move_uploaded_file($productImage["tmp_name"], $targetFile)) {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }

        // Construct the table name
        $tableName = "table_" . preg_replace('/[^A-Za-z0-9_]/', '_', strtolower($username));

        // Prepare and bind statement for insertion
        $stmt = $conn->prepare("INSERT INTO $tableName (name, price, description, image, fresh, quantity) VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sisssi", $productName, $productPrice, $productDescription, $targetFile, $productStatus, $productQuantity);

        $stmt2 = $conn->prepare("INSERT INTO products (name, price, description, image, fresh) VALUES (?, ?, ?, ?, ?)");
        $stmt2->bind_param("sisss", $productName, $productPrice, $productDescription, $targetFile, $productStatus);

        // Execute the statement
        if ($stmt->execute() && $stmt2->execute()) {
            echo "New product added successfully";
        } else {
            echo "Error adding new product";
        }

        // Close statement and connection
        $stmt->close();
        $stmt2->close();
        $conn->close();
    } else {
        echo "Form fields cannot be empty.";
    }
} else {
    echo "Invalid request.";
}
?>
