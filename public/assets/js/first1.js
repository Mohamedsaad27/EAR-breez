// cart.js
document.addEventListener('DOMContentLoaded', function () {
  const cartItemsList = document.getElementById('cart-items');

  function displayCartItems() {
      const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
      cartItemsList.innerHTML = '';
      cartItems.forEach(item => {
          const cartItem = document.createElement('li');
          cartItem.textContent = item.name + ' - $' + item.price;
          cartItemsList.appendChild(cartItem);
      });
  }

  displayCartItems();
});
