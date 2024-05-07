document.addEventListener('DOMContentLoaded', function() {
    const backButton = document.querySelector('.back-button');

    function navigateToIndex() {
        window.location.href = 'index.html';
    }

    backButton.addEventListener('click', navigateToIndex);
});

function signup() {
    var fullname = document.getElementsByName("fullname")[0].value;
    var email = document.getElementsByName("email")[0].value;
    var password = document.getElementsByName("password")[0].value;
    var confirmPassword = document.getElementsByName("confirm-password")[0].value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "fSignup.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Check specific errors
                if (xhr.responseText === "Registration successful") {
                    alert("Signup successful");
                    window.location.href = "fLogin.html";
                } else {
                    // Show specific error message
                    alert(xhr.responseText);
                }
            } else {
                alert("An error occurred while processing your request.");
            }
        }
    };

    xhr.send("fullname=" + encodeURIComponent(fullname) + "&email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password) + "&confirm-password=" + encodeURIComponent(confirmPassword));
}

