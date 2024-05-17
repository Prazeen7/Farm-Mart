const loginbtn = document.getElementById('loginbtn');
const signbtn = document.getElementById('signbtn');
const potato = document.getElementById('potato-product');

// // Add event listeners to both buttons
// potato.addEventListener('click', function () {
//   // Call the changePage function with the page parameter
//   changePage('pdetails');
// });

function login() {
  window.location.href = 'Login.html';
}

loginbtn.addEventListener('click', login)

function signup() {
  window.location.href = 'signup.html';
}

signbtn.addEventListener('click', signup)

document.addEventListener("DOMContentLoaded", function () {
  const navLinks = document.querySelectorAll("nav ul li a");

  navLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      event.preventDefault(); // Prevent the default link behavior
      removeActiveClass(); // Remove active class from all links
      this.classList.add("active"); // Add active class to the clicked link
    });
  });

  function removeActiveClass() {
    navLinks.forEach(function (link) {
      link.classList.remove("active");
    });
  }
});



// Function to handle the page change based on the clicked link
function changePage(page) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Update the content div with the response text
        document.querySelector('.main-content').innerHTML = xhr.responseText;
        // Scroll to the top of the page
        window.scrollTo(0, 0);
      } else {
        console.error('Failed to load ' + page + '.html');
      }
    }
  };

  xhr.open('GET', page + '.html', true);
  xhr.send();
}


document.querySelectorAll('nav ul li a').forEach(function (link) {
  link.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default link behavior
    var page = this.getAttribute('data-page'); // Get the data-page attribute value\
    if (page === 'home') {
      window.location.href = 'index.html';
    } else if (page == 'freshProducts') {
      window.location.href = 'freshProducts.html';
  } else if (page == 'inquiry') {
    window.location.href = 'inquiry.html';
  }
    else {
      changePage(page); // Call the function to load the corresponding page
    }
  });
});






