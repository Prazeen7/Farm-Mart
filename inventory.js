window.onload = function () {
    // Retrieve the username from localStorage
    var username = localStorage.getItem('username');

    // Check if username is not empty
    if (username) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "inventory.php?username=" + encodeURIComponent(username), true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var products = JSON.parse(xhr.responseText);
                displayProducts(products);
            }
        };
        xhr.send();
    } else {
        console.error("Username not found in localStorage");
    }
};

var username = localStorage.getItem('username');

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
                <p>Quantity: ${product.quantity}</p>
                <button style="background-color: red; color: white;" class='remove-list' data-id="${product.id}" data-name="${product.name}" data-price="${product.price}" data-image="${product.image}">Remove Listing</button>
            </div>
        `;
    });
    
    var removeButtons = document.querySelectorAll('.remove-list');
    removeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var productId = this.getAttribute('data-id');
            var productName = this.getAttribute('data-name');
            var productPrice = this.getAttribute('data-price');
            var productImage = this.getAttribute('data-image');
            removeProduct(productId, productName, productPrice, productImage, username);
        });
    });
    
}

function removeProduct(productId, productName, productPrice, productImage, username) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "remove.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
            location.reload();
        }
    };
    xhr.send("productId=" + productId + "&productName=" + encodeURIComponent(productName) + "&productPrice=" + productPrice + "&productImage=" + encodeURIComponent(productImage) + "&username=" + encodeURIComponent(username));
}
