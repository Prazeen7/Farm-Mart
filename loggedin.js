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

function changePage(page) {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the function to handle the response
    xhr.onreadystatechange = function () {
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


document.querySelectorAll('nav ul li a').forEach(function (link) {
    link.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default link behavior
        var page = this.getAttribute('data-page'); // Get the data-page attribute value\
        if (page === 'loggedhome') {
            window.location.href = 'loggedin.html';
        } else if (page == 'fPLogin') {
        window.location.href = 'fPLogin.html';
    } else if(page == 'inquiry'){
        window.location.href = 'inquiry.html'
    }
    else {
        changePage(page); // Call the function to load the corresponding page
    }
});
});



// Function to handle the page change based on the clicked link
function changePage(page) {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Define the function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update the content div with the response text
                document.querySelector('.main-content').innerHTML = xhr.responseText;
                // Scroll to the top of the page
                window.scrollTo(0, 0);
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

const potato = document.getElementById('potato-loggedin');
potato.addEventListener('click', function () {
    // Call the changePage function with the page parameter
    changePage('pdetails');
});

const potatohome = document.getElementById('potato-producthome');
potatohome.addEventListener('click', function () {
    // Call the changePage function with the page parameter
    changePage('pdetails');
});