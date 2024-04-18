const loginbtn = document.getElementById('loginbtn');
const signbtn = document.getElementById('signbtn');
const potato = document.getElementById('potato-product');
const potatohome = document.getElementById('potato-');


// Add event listeners to both buttons
potato.addEventListener('click', function() {
    // Call the changePage function with the page parameter
    changePage('pdetails');
});

// const potatohome = document.getElementById('potato-home');
// potatohome.addEventListener('click', function() {
//     // Call the changePage function with the page parameter
//     changePage('pdetails');
// });


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

 

// Function to handle the page change based on the clicked link
function changePage(page) {
  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Define the function to handle the response
  xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              // Update the content div with the response text
              document.querySelector('.main-content').innerHTML = xhr.responseText;
          } else {
              // Handle errors (e.g., page not found)
              console.error('Failed to load ' + page + '.html');
          }
      }
  };

  // Open a GET request to fetch the corresponding page
  xhr.open('GET', page + '.html', true);

  // Send the request
  xhr.send();
}

// Add event listener to the nav links
document.querySelectorAll('nav ul li a').forEach(function(link) {
  link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default link behavior
      var page = this.getAttribute('data-page'); // Get the data-page attribute value
      changePage(page); // Call the function to load the corresponding page
  });
});


  
  