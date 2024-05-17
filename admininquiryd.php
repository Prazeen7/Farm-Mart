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

// Check if ID parameter is provided
if (isset($_POST['id'])) {
    $inquiryId = $_POST['id'];

    // Prepare SQL statement to delete inquiry with the given ID
    $sql = "DELETE FROM inquiry WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $inquiryId);

    // Execute the statement
    if ($stmt->execute()) {
        // Inquiry deleted successfully
        echo "Inquiry deleted successfully";
    } else {
        // Error deleting inquiry
        echo "Error deleting inquiry";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
