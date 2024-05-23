<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User's Cart</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
</style>
</head>
<body>

<div class="container">
    <h1>User's Cart</h1>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Enable error reporting
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            // Connect to database
            $servername = "localhost"; 
            $username = "root"; 
            $password = ""; 
            $dbname = "farmmart"; // corrected variable name
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch cart data for the logged-in user with status 1
            $userId = "samika@gmail.com"; // Replace with the user's email, or fetch it from the session
            $sql = "SELECT products.name, products.price FROM cart JOIN products ON cart.productId = products.id WHERE cart.userEmail = '$userId' AND cart.status = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["name"] . "</td><td>$" . $row["price"] . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No items in the cart.</td></tr>";
            }
            $conn->close();
            ?>

        </tbody>
    </table>
    <button><a href="checkout.php" class="checkout-btn">Checkout</a></button>
</div>

</body>
</html>
