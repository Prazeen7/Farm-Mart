<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout</title>
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
    .checkout-summary {
        margin-bottom: 20px;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Checkout</h1>
    
    <div class="checkout-summary">
        <h2>Order Summary</h2>
        <?php
            // Process checkout here
            // Display items in the cart and calculate total amount
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
            $userId = 1; // Replace with the user's ID, or fetch it from the session
            $sql = "SELECT products.name, products.price FROM cart JOIN products ON cart.productId = products.id WHERE cart.userId = $userId AND cart.status = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<ul>";
                $totalAmount = 0;
                while ($row = $result->fetch_assoc()) {
                    echo "<li>" . $row["name"] . " - $" . $row["price"] . "</li>";
                    $totalAmount += $row["price"];
                }
                echo "</ul>";
                echo "<p><strong>Total Amount: $" . $totalAmount . "</strong></p>";
            } else {
                echo "<p>No items in the cart.</p>";
            }
            $conn->close();
        ?>
    </div>

    <p>Payment Form Goes Here...</p>
    <!-- Add your payment form here -->

    <button onclick="placeOrder()">Place Order</button>
    <!-- JavaScript function to place the order -->
    <script>
        function placeOrder() {
            // Placeholder function for handling order placement
            alert("Order placed successfully!");
            // You can add actual order processing logic here
        }
    </script>
</div>

</body>
</html>
