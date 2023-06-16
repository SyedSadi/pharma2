// Add event listener to cart buttons
var addToCartButtons = document.querySelectorAll('.add-to-cart');
addToCartButtons.forEach(function (button) {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        // You can add your cart logic here
        alert('Added to cart');
    });
});
