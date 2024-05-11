document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('inquiryForm');
    var responseMessage = document.getElementById('responseMessage');
    

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Get form inputs
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var subject = document.getElementById('subject').value;
        var message = document.getElementById('message').value;

        
        // Construct inquiry text
        var inquiryText = "Name: " + name + "\nEmail: " + email + "\nSubject: " + subject + "\nMessage: " + message;

        // Display success message
        responseMessage.innerText = "Thank you for your inquiry. We will get back to you as soon as possible.";
        responseMessage.style.display = 'block';

        // Clear form fields
        form.reset();
    });

    
});
