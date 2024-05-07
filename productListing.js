function submitProduct() {
    var formData = new FormData();
    formData.append("productName", document.getElementsByName("productName")[0].value);
    formData.append("productPrice", document.getElementsByName("productPrice")[0].value);
    formData.append("productDescription", document.getElementsByName("productDescription")[0].value);
    formData.append("productImage", document.getElementsByName("productImage")[0].files[0]);

    // Create AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "productsListing.php", true);
    
    // Handle response
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Response received successfully
                alert(xhr.responseText);  // Assuming the PHP script echoes a message on success/failure
                if (xhr.responseText.includes("successfully")) {
                    // Product added successfully, handle as needed
                    console.log("Product added successfully");
                } else {
                    // Handle failure
                    console.error("Failed to add product: " + xhr.responseText);
                }
            } else {
                // Error occurred
                alert("An error occurred while processing your request.");
            }
        }
    };

    // Send form data
    xhr.send(formData); // Use FormData to send files and data
}
