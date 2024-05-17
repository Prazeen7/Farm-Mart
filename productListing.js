function submitProduct() {
    // Create a new FormData object
    var formData = new FormData();

    // Retrieve the username from localStorage
    var username = localStorage.getItem('username');

    // Append the username to the FormData object
    if (username) {
        formData.append("username", username);
    } else {
        console.error("Username not found in localStorage");
        return; // Exit the function if username is not found
    }

    // Append other form data to the FormData object
    formData.append("productName", document.getElementById("productName").value);
    formData.append("productPrice", document.getElementById("productPrice").value);
    formData.append("productDescription", document.getElementById("productDescription").value);
    formData.append("productImage", document.getElementById("productImage").files[0]);
    formData.append("productQuantity", document.getElementById("productQuantity").value);
    
    // Check if the checkbox is checked
    var productStatus = document.getElementById("productStatus").checked ? 1 : 0;
    formData.append("productStatus", productStatus);

    // Create AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "productsListing.php", true);

    // Handle response
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Response received successfully
                alert(xhr.responseText); 
                if (xhr.responseText.includes("successfully")) {
                    // Reset the form if product added successfully
                    document.getElementById("productForm").reset();
                } else {
                    // Handle failure
                    console.error("Failed to add product: " + xhr.responseText);
                }
            } else {
                // Error occurred
                alert("An error occurred while processing your request");
            }
        }
    };

    // Send form data
    xhr.send(formData);
}
