document.addEventListener('DOMContentLoaded', function() {
    const backButton = document.querySelector('.back-button');

    function navigateToIndex() {
        window.location.href = 'index.html';
    }

    backButton.addEventListener('click', navigateToIndex);
});

function signup() {
    // Get form data
    var fullname = document.getElementsByName("fullname")[0].value;
    var email = document.getElementsByName("email")[0].value;
    var password = document.getElementsByName("password")[0].value;
    var confirmPassword = document.getElementsByName("confirm-password")[0].value;

    // Create AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "signup.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Handle response
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Response received successfully
                if (xhr.responseText === "success") {
                    // Signup successful, show success message in dialogue box
                    alert("Signup successful");
                    // Redirect to login page
                    window.location.href = "login.html";
                } else {
                    // Signup failed, display error message in dialogue box
                    alert("Email or Password already taken");
                }
            } else {
                // Error occurred
                alert("An error occurred while processing your request.");
            }
        }
    };

    // Send form data
    xhr.send("fullname=" + encodeURIComponent(fullname) + "&email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password) + "&confirm-password=" + encodeURIComponent(confirmPassword));
}
