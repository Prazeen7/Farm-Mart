window.onload = function () {
    var username = localStorage.getItem('username');

    if (username) {
        fetchProducts(username);
    } else {
        console.error("Username not found in localStorage");
    }
};

function fetchProducts(username) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "admin.php?username=" + encodeURIComponent(username), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var products = JSON.parse(xhr.responseText);
            displayProducts(products, username);
        }
    };
    xhr.send();
};

function displayProducts(products, username) {
    const productList = document.getElementById("productList");
    productList.innerHTML = '';

    if (products.length === 0) {
        productList.innerHTML = '<h2 class="no-products">No products available</h2>';
        return;
    }

    products.forEach(function (product) {
        productList.innerHTML += `
            <div class="product">
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>Rs. ${product.price}</p>
                <button onclick="approveProduct(${product.id}, '${product.name}', ${product.price}, '${product.image}', '${username}')">Approve</button>
                <button>Disapprove</button>
            </div> 
        `;
    });
}

function approveProduct(productId, productName, productPrice, productImage, username) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "approve.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
            fetchProducts(username);
        }
    };
    xhr.send("productId=" + productId + "&productName=" + encodeURIComponent(productName) + "&productPrice=" + productPrice + "&productImage=" + encodeURIComponent(productImage) + "&username=" + encodeURIComponent(username));
}