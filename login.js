document.addEventListener('DOMContentLoaded', function() {
    const backButton = document.querySelector('.back-button');

    function navigateToIndex() {
        window.location.href = 'index.html';
    }

    backButton.addEventListener('click', navigateToIndex);
});
