const loginbtn = document.getElementById('loginbtn');
const signbtn = document.getElementById('signbtn');

function login(){
    window.location.href = 'Login.html';
}

loginbtn.addEventListener('click', login)

function signup(){
    window.location.href = 'signup.html';
}

signbtn.addEventListener('click', signup)

document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll("nav ul li a");
  
    navLinks.forEach(function(link) {
      link.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default link behavior
        removeActiveClass(); // Remove active class from all links
        this.classList.add("active"); // Add active class to the clicked link
      });
    });
  
    function removeActiveClass() {
      navLinks.forEach(function(link) {
        link.classList.remove("active");
      });
    }
  });

  
  