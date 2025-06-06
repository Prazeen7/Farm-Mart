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
        <a href="index.php"><img src="Images/Logo5.png" alt="Farm Mart Logo"></a>
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
            <input type="text" name="search" placeholder="Search..." required>
            <button type="submit">Search</button>
        </form>        
        <a href="cart.php"><box-icon name='cart' color='#0c9a42' class="cart-icon"></box-icon></a>
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
    <div class="product">
        <img src="Images/onion.jpg" alt="Product 1">
        <h3>Onion</h3>
        <p>$10.99</p>
        <button>Add to Cart</button>
        <button class="details-btn">See Details</button>
    </div>
    <div class="product">
        <img src="Images/potato.jpg" alt="Product 2">
        <h3>Potato</h3>
        <p>$15.99</p>
        <button>Add to Cart</button>
        <button class="details-btn" id="potato-product">See Details</button> 
    </div>
    <div class="product">
        <img src="Images/Rice.jpg" alt="Product 2">
        <h3>Rice</h3>
        <p>$15.99</p>
        <button>Add to Cart</button>
        <button class="details-btn">See Details</button> 
    </div>
    <div class="product">
        <img src="Images/lentil.jpg" alt="Product 2">
        <h3>Lentil</h3>
        <p>$15.99</p>
        <button>Add to Cart</button>
        <button class="details-btn">See Details</button> 
    </div>
    <div class="product">
        <img src="Images/Cilantro.jpg" alt="Product 2">
        <h3>Cilantro</h3>
        <p>$15.99</p>
        <button>Add to Cart</button>    
        <button class="details-btn">See Details</button> 
    </div>
    <div class="product">
        <img src="Images/Fenugreek.jpg" alt="Product 2">
        <h3>Fenugreek Seeds</h3>
        <p>$15.99</p>
        <button>Add to Cart</button>
        <button class="details-btn">See Details</button> 
    </div>

    <div class="product">
        <img src="Images/Fenugreek.jpg" alt="Product 2">
        <h3>Fenugreek Seeds</h3>
        <p>$15.99</p>
        <button>Add to Cart</button>
        <button class="details-btn">See Details</button> 
    </div>
    <div class="product">
        <img src="Images/Fenugreek.jpg" alt="Product 2">
        <h3>Fenugreek Seeds</h3>
        <p>$15.99</p>
        <button>Add to Cart</button>
        <button class="details-btn">See Details</button> 
    </div>    <div class="product">
        <img src="Images/Fenugreek.jpg" alt="Product 2">
        <h3>Fenugreek Seeds</h3>
        <p>$15.99</p>
        <button>Add to Cart</button>
        <button class="details-btn">See Details</button> 
    </div>
    <div class="product">
        <img src="Images/Fenugreek.jpg" alt="Product 2">
        <h3>Fenugreek Seeds</h3>
        <p>$15.99</p>
        <button>Add to Cart</button>
        <button class="details-btn">See Details</button> 
    </div>
    <div class="product">
        <img src="Images/Fenugreek.jpg" alt="Product 2">
        <h3>Fenugreek Seeds</h3>
        <p>$15.99</p>
        <button>Add to Cart</button>
        <button class="details-btn">See Details</button> 
    </div>
    <div class="product">
        <img src="Images/Fenugreek.jpg" alt="Product 2">
        <h3>Fenugreek Seeds</h3>
        <p>$15.99</p>
        <button>Add to Cart</button>
        <button class="details-btn">See Details</button> 
    </div>
    <!-- Add more products as needed -->
</div>
</div>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="index.js"></script>
</body>
</html>