window.onload = function () {
    // Retrieve the username from localStorage
    var username = localStorage.getItem('username');

    if (username) {
        fetchProducts(username); // Pass the username to the fetchProducts function
    } else {
        console.error("Username not found in localStorage");
    }
};

function fetchProducts(username) {
    var xhr = new XMLHttpRequest();
    // Modify the URL to include the username as a query parameter
    xhr.open("GET", "admin.php?username=" + encodeURIComponent(username), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var products = JSON.parse(xhr.responseText);
            displayProducts(products, username); // Pass username to displayProducts
        }
    };
    xhr.send();
};

function displayProducts(products, username) {
    const productList = document.getElementById("productList");
    productList.innerHTML = ''; // Clear previous products

    if (products.length === 0) {
        productList.innerHTML = '<h2 class="no-products">No products available</h2>';
        return; // Exit the function if no products are available
    }

    products.forEach(function (product) {
        productList.innerHTML += `
            <div class="product">
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>$${product.price}</p>
                <button onclick="approveProduct(${product.id}, '${username}')">Approve</button>
                <button>Disapprove</button>
            </div> 
        `;
    });
}

function approveProduct(productId, username) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "approve.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
            fetchProducts(username); // Refetch products to update the list with the same username
        }
    };
    xhr.send("productId=" + productId + "&username=" + encodeURIComponent(username));
}
