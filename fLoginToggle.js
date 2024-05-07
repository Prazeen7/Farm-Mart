function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var passwordToggle = document.querySelector(".password-toggle");
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordToggle.textContent = "🔓"; // Change to unlock icon
    } else {
        passwordInput.type = "password";
        passwordToggle.textContent = "🔒"; // Change to lock icon
    }
}
