<?php
// Database connection parameters
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "farmmart"; 

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data from POST request
$name = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];

// Perform password validation
if ($password !== $confirmPassword) {
    echo "Passwords do not match";
    exit();
}

// Check if email already exists in the database
$stmt = $conn->prepare("SELECT * FROM farmer WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Email already taken";
    exit();
}

// Insert new user into the farmer table
$stmt = $conn->prepare("INSERT INTO farmer (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
    echo "Registration successful";

    // Normalize and create a unique table name based on the user's email
    $tableName = "table_" . preg_replace('/[^A-Za-z0-9_]/', '_', strtolower($email)); // Replace invalid characters with '_'

    $createTableSQL = "CREATE TABLE $tableName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        description LONGTEXT,
        image VARCHAR(255),
        fresh TINYINT(4) NOT NULL,
        Admin VARCHAR(50) NOT NULL DEFAULT 'Disapproved'
    )";
    

    // Attempt to create a new table for the user
    if ($conn->query($createTableSQL) === TRUE) {
    } else {
        echo "Error creating user table: ";
    }
} else {
    echo "Error inserting user: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
