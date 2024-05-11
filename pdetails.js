// Retrieve the productId from the URL query parameter
var urlParams = new URLSearchParams(window.location.search);
var productId = urlParams.get('productId');

console.log(productId);

// Check if productId is not null
if (productId) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "pdetails.php?productId=" + encodeURIComponent(productId), true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var product = JSON.parse(xhr.responseText);
            if (product) {
                displayProductDetails(product);
            } else {
                console.error("Product not found");
            }
        }
    };
    xhr.send();

} else {
    console.error("Product ID not provided");
}
function displayProductDetails(product) {
    // Update the HTML content with the product details
    document.getElementById("name").innerText = product.name;
    document.getElementById("description").innerText = product.description;
    document.getElementById("price").innerText = "Price: RS. " + product.price;
    document.querySelector(".product-image img").src = product.image;
    document.querySelector(".product-image img").alt = product.name;
}

document.getElementById('logoLink').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent default behavior of link
    history.back(); // Go back one step in the browser history
});

