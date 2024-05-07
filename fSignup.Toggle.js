function togglePasswordVisibility(inputId) {
    var passwordInput = document.getElementById(inputId);
    var passwordToggle = passwordInput.nextElementSibling;
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordToggle.textContent = "🔓"; // Change to unlock icon
    } else {
        passwordInput.type = "password";
        passwordToggle.textContent = "🔒"; // Change to lock icon
    }
}
