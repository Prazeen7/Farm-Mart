<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Farm Mart</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>

<header>
    <div class="logo">
        <a href="index.html"><img src="Images/Logo5.png" alt="Farm Mart Logo"></a>
    </div>
    <nav>
        <ul>
            <li><a href="#" class="active" data-page="home">Home</a></li>
            <li><a href="#" data-page="freshProducts">Fresh Products</a></li>
            <li><a href="#" data-page="becomeFarmer">Become a Farmer</a></li>
            <li><a href="#" data-page="aboutUs">About Us</a></li>
            <li><a href="#" data-page="inquire">Inquire</a></li>
        </ul>
    </nav>
   
    <div class="user-actions">
        <a href="cart.php" class="cart-link">View Cart</a>
        <box-icon name='cart' color='#0c9a42' class="cart-icon"></box-icon>
        <div class="login-signup">
            <button id="loginbtn">Login</button>
            <button id="signbtn">Sign Up</button>
        </div>
    </div>
</header>

<div class="main-content">
    <h2 class="cart-heading">Your Cart</h2>
    <div class="cart-items">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establish connection to MySQL database
                $servername = "localhost"; // Change this according to your database configuration
                $username = "root"; // Change this according to your database configuration
                $password = ""; // Change this according to your database configuration
                $dbname = "farmmart"; // Change this to your database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch cart items
                $sql = "SELECT products.name, products.price FROM cart JOIN products ON cart.productId = products.id WHERE cart.userId = 'user_id' AND cart.status = 1";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['price']}</td>";
                        echo "<td><a href='remove_from_cart.php?product_id={$row['id']}'>Remove</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Your cart is empty</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>

