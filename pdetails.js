function fetchProductDetails(productId) {
    // Perform AJAX request to fetch product details based on productId
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "pdetails.php?productId=" + encodeURIComponent(productId), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var product = JSON.parse(xhr.responseText);
            displayProductDetails(product);
        }
    };
    xhr.send();
}

function displayProductDetails(product) {
    // Populate the product details in the HTML elements
    var productNameElement = document.querySelector('.product-info h2');
    var productDescriptionElement = document.querySelector('.product-info p');
    var productPriceElement = document.querySelector('.product-info p.price');
    var productImageElement = document.querySelector('.product-image img');

    productNameElement.textContent = product.name;
    productDescriptionElement.textContent = product.description;
    productPriceElement.textContent = "Price: Rs. " + product.price;
    productImageElement.src = product.image;
}
