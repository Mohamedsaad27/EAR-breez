// script.js
const products = [
  { id: 1, name: 'منتج 1', image: 'product1.jpg', price: 10 },
  { id: 2, name: 'منتج 2', image: 'product2.jpg', price: 15 },
  { id: 3, name: 'منتج 3', image: 'product3.jpg', price: 20 },
  { id: 1, name: 'منتج 1', image: 'product1.jpg', price: 10 },
  { id: 2, name: 'منتج 2', image: 'product2.jpg', price: 15 },
  { id: 3, name: 'منتج 3', image: 'product3.jpg', price: 20 },
  { id: 1, name: 'منتج 1', image: 'product1.jpg', price: 10 },
  { id: 2, name: 'منتج 2', image: 'product2.jpg', price: 15 },
  { id: 3, name: 'منتج 3', image: 'product3.jpg', price: 20 },
  // يمكنك إضافة المزيد من المنتجات هنا
];

const productList = document.getElementById('product-list');
const loadMoreBtn = document.getElementById('load-more-btn');

let currentIndex = 0;
const productsPerPage = 3;

function displayProducts(startIndex, endIndex) {
  for (let i = startIndex; i < endIndex; i++) {
      if (i >= products.length) {
          loadMoreBtn.style.display = 'none';
          break;
      }
      const product = products[i];
      const productElement = document.createElement('div');
      productElement.classList.add('product');
      productElement.dataset.id = product.id;
      productElement.addEventListener('click', addToCart);
      const imageElement = document.createElement('img');
      imageElement.src = product.image;
      imageElement.alt = product.name;
      const nameElement = document.createElement('p');
      nameElement.textContent = product.name + ' - $' + product.price;
      productElement.appendChild(imageElement);
      productElement.appendChild(nameElement);
      productList.appendChild(productElement);
  }
}

function loadMoreProducts() {
  const nextIndex = currentIndex + productsPerPage;
  displayProducts(currentIndex, nextIndex);
  currentIndex = nextIndex;
}

function addToCart(event) {
  const productId = event.currentTarget.dataset.id;
  const product = products.find(p => p.id === parseInt(productId));

  let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
  cartItems.push(product);
  localStorage.setItem('cartItems', JSON.stringify(cartItems));

  alert('تمت إضافة المنتج إلى سلة المشتريات!');
}

loadMoreBtn.addEventListener('click', loadMoreProducts);

// Display initial set of products
displayProducts(currentIndex, currentIndex + productsPerPage);
