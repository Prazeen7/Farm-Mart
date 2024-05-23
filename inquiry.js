document.getElementById('inquiryForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Get form data
    var formData = new FormData(this);

    // AJAX request to send the form data
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'send_email.php', true); 

    xhr.onload = function() {
        if (xhr.status == 200) {
            // Inquiry submitted successfully
            alert('Your inquiry has been sent successfully.');
            document.getElementById('inquiryForm').reset(); // Reset the form
        } else {
            // Error submitting inquiry
            alert('There was an error sending your inquiry. Please try again later.');
        }
    };

    // Send the form data
    xhr.send(formData);
});
