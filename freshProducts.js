window.onload = function () {
    // Retrieve the username from localStorage
    var username = localStorage.getItem('username');

    // Check if username is not empty
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "freshProducts.php?username=" + encodeURIComponent(username), true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var products = JSON.parse(xhr.responseText);
                    displayProducts(products);
                } else {
                    console.error("Failed to fetch products: " + xhr.status);
                }
            }
        };
        xhr.send();
};

function displayProducts(products) {
    const productList = document.getElementById("productList");
    // Clear previous products
    productList.innerHTML = '';

    if (products.length === 0) {
        productList.innerHTML = '<h2 class="no-products">No products available</h2>';
        return; // Exit the function if no products are available
    }

    products.forEach(function (product) {
        productList.innerHTML += `
            <div class="product">
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>Rs. ${product.price}</p>
                <button>Add to cart</button>
                <button class="details-btn" data-id="${product.id}">See Details</button> <!-- Add data-id attribute -->
            </div>
        `;
    });

    // Add event listener to each "See Details" button
    var detailButtons = document.querySelectorAll('.details-btn');
    detailButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var productId = this.getAttribute('data-id');
            console.log(productId);
            window.location.href = "pdetails.html?productId=" + encodeURIComponent(productId);
        });
    });
}


