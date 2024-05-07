window.onload = function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "show.php", true);
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
    products.forEach(function(product) {
        productList.innerHTML += `
            <div class="product">
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>$${product.price}</p>
                <button>Add to cart</button>
                <button class="details-btn">See Details</button>
            </div>
        `;
    });
}
