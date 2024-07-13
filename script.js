// function to handle animation of first "login to continue button" on index page
// .LOGIN-BTN


document.querySelector('.login-btn').addEventListener('click', function () {
    const loadingBarContainer = document.querySelector('.loading-bar-container');
    const loadingBar = document.querySelector('.loading-bar');
   
    // Show the loading bar container
    loadingBarContainer.style.display = 'block';

    // Reset the width and color of the loading bar
    loadingBar.style.width = '0';
    loadingBar.style.backgroundColor = '#0866FF'; // Initial color

    // Animate the loading bar
    let width = 0;
    const interval = setInterval(function () {
        if (width >= 100) { // The width reaches 100% of the container
            clearInterval(interval);
            // Change color to green
            loadingBar.style.backgroundColor = '#1EC677';
            // Redirect to another page after loading completes
            setTimeout(function () {
                window.location.href = 'to_continue.html';
            }, 500); // Optional: Add a slight delay before redirecting (500ms in this case)
        } else {
            width++;
            loadingBar.style.width = width + '%';
        }
    }, 20); // Adjust the speed of the animation (lower value means faster)


});




// CONFETTI

document.addEventListener("DOMContentLoaded", () => {
    
    confetti({
        particleCount: 120,
        spread: 100,
        origin: {x: 1, y: 0.7 },
    });
    confetti({
        particleCount: 120,
        spread: 100,
        origin: {x: 0, y: 0.7 },
    });

});

