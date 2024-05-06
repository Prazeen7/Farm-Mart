<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Mart</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="index.css">
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
        <form class="search-form" action="search.php" method="GET">
            <input type="text" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" required>
            <button type="submit">Search</button>
        </form>        
        <box-icon name='cart' color='#0c9a42' class="cart-icon"></box-icon>
        <div class="login-signup">
            <button id="loginbtn">Login</button>
            <button id="signbtn">Sign Up</button>
        </div>
    </div>
</header>

<div class="main-content">
    <!-- Discount Banner -->
    <div class="discount-banner" onclick="location.href='#'">
        <div class="banner-content">
            <div class="text-content">
                <h2>Flash Sale!</h2>
                <p>Get discounts on fresh vegetables</p>
            </div>
            <div class="product-images">
                <img src="Images/sale.png" alt="Flash Sale" class="image-animation">
            </div>
        </div>
    </div>

    <!-- Most Selling Heading -->
    <h2 class="most-selling-heading">Most Selling Products</h2>

    <!-- Product Listing -->
    <div class="product-listing">
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

        // Check if the search query is set
        if (isset($_GET['search'])) {
            $search = $_GET['search'];

            // Prepare SQL statement to search for products
            $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";

            // Execute SQL query
            $result = $conn->query($sql);

            // Display search results
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Output HTML representing each product
                    echo "<div class='product'>";
                    echo "<img src='Images/{$row["image"]}' alt='{$row["name"]}'>";
                    echo "<h3>{$row["name"]}</h3>";
                    echo "<p>{$row["price"]}</p>";
                    echo "<button>Add to Cart</button>";
                    echo "<button class='details-btn'>See Details</button>";
                    echo "</div>";
                }
            } else {
                echo "<p>No results found.</p>";
            }
        } else {
            echo "<p>No search query provided.</p>";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</div>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="index.js"></script>
</body>
</html>