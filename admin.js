window.onload = function () {
    fetchProducts();
};

function fetchProducts() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "admin.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var products = JSON.parse(xhr.responseText);
            displayProducts(products);
        }
    };
    xhr.send();
};
function displayProducts(products) {
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
                <button onclick="approveProduct(${product.id})">Approve</button>
                <button>Disapprove</button>
            </div> 
        `;
    });
}


function approveProduct(productId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "approve.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
            fetchProducts(); // Refetch products to update the list
        }
    };
    xhr.send("productId=" + productId);
}
