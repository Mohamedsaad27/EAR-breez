// البيانات
var productsData = [
  { image: 'image/a.png', s: ' aa',c:22, rating: 4 },
  { image: 'image/a.png', s: ' bbbb', c:22,rating: 5 },
  { image: 'image/a.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/a.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/a.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/a.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/a.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/a.png', s: ' ttttt',c:22, rating: 4 },
  { image: 'image/a.png', s: ' aa', c:22,rating: 4 },
  { image: 'image/a.png', s: ' bbbb',c:22, rating: 5 },
  { image: 'image/a.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/a.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/a.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/a.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/a.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/a.png', s: ' ttttt',c:22, rating: 4 },
  { image: 'image/a.png', s: ' aa',c:22, rating: 4 },
  { image: 'image/b.png', s: ' bbbb',c:22, rating: 5 },
  { image: 'image/c.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/d.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/e.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/f.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/g.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/h.png', s: ' ttttt',c:22, rating: 4 },
  { image: 'image/a.png', s: ' aa',c:22, rating: 4 },
  { image: 'image/b.png', s: ' bbbb',c:22, rating: 5 },
  { image: 'image/c.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/d.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/e.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/f.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/g.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/h.png', s: ' ttttt',c:22, rating: 4 },
  { image: 'image/a.png', s: ' aa',c:22, rating: 4 },
  { image: 'image/b.png', s: ' bbbb',c:22, rating: 5 },
  { image: 'image/c.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/d.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/e.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/f.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/g.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/h.png', s: ' ttttt',c:22, rating: 4 },
  { image: 'image/a.png', s: ' aa',c:22, rating: 4 },
  { image: 'image/b.png', s: ' bbbb',c:22, rating: 5 },
  { image: 'image/c.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/d.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/e.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/f.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/g.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/h.png', s: ' ttttt',c:22, rating: 4 },
  





];


// الحاوية التي ستحتوي على المنتجات
var productContainer = document.getElementById('product-container');

// دالة لإضافة المنتجات إلى الصفحة
function displayProducts(startIndex, count) {
    for (var i = startIndex; i < Math.min(startIndex + count, productsData.length); i++) {
        // إنشاء عنصر المنتج
        var productDiv = document.createElement('div');
        productDiv.classList.add('product');

        // إنشاء عنصر الصورة
        var image = document.createElement('img');
        image.src = productsData[i].image;
        image.alt = productsData[i].s;
        productDiv.appendChild(image);

        // إنشاء عنصر الاسم
        var s = document.createElement('p');
        s.textContent = productsData[i].s;
        productDiv.appendChild(s);
        
        var c = document.createElement('p');
        c.textContent = productsData[i].c;
        productDiv.appendChild(c);
        // إنشاء عنصر تقييم النجوم
        var rating = document.createElement('div');
        rating.classList.add('rating');
        for (var j = 0; j < productsData[i].rating; j++) {
            var star = document.createElement('span');
            star.textContent = '★';
            rating.appendChild(star);
        }
        productDiv.appendChild(rating);

        // إضافة عنصر المنتج إلى الحاوية
        productContainer.appendChild(productDiv);
        
    }
}

// العدد الافتراضي لعدد المنتجات لكل عملية تحميل
var productsPerPage = 16;

// عرض المنتجات الأولى عند تحميل الصفحة
displayProducts(0, productsPerPage);

// عرض المزيد عند الضغط على الزر
document.getElementById('load-more-btn').addEventListener('click', function() {
    // إخفاء المنتجات القديمة
    var oldProducts = document.querySelectorAll('.product');
    oldProducts.forEach(function(product) {
        product.style.display = 'none';
    });

    // عرض المزيد من المنتجات الجديدة
    displayProducts(oldProducts.length, productsPerPage);
});
productsContainer.addEventListener('click', function (event) {
  const productId = event.target.closest('.product').dataset.productId;
  window.location.href = `wishlist.html?id=${productId}`;
});


/*shop2*/


// البيانات
var productsData = [
  { image: 'image/a.png', s: ' aa',c:22, rating: 4 },
  { image: 'image/a.png', s: ' bbbb', c:22,rating: 5 },
  { image: 'image/a.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/a.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/a.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/a.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/a.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/a.png', s: ' ttttt',c:22, rating: 4 },
  { image: 'image/a.png', s: ' aa', c:22,rating: 4 },
  { image: 'image/a.png', s: ' bbbb',c:22, rating: 5 },
  { image: 'image/a.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/a.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/a.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/a.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/a.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/a.png', s: ' ttttt',c:22, rating: 4 },
  { image: 'image/a.png', s: ' aa',c:22, rating: 4 },
  { image: 'image/b.png', s: ' bbbb',c:22, rating: 5 },
  { image: 'image/c.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/d.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/e.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/f.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/g.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/h.png', s: ' ttttt',c:22, rating: 4 },
  { image: 'image/a.png', s: ' aa',c:22, rating: 4 },
  { image: 'image/b.png', s: ' bbbb',c:22, rating: 5 },
  { image: 'image/c.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/d.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/e.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/f.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/g.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/h.png', s: ' ttttt',c:22, rating: 4 },
  { image: 'image/a.png', s: ' aa',c:22, rating: 4 },
  { image: 'image/b.png', s: ' bbbb',c:22, rating: 5 },
  { image: 'image/c.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/d.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/e.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/f.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/g.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/h.png', s: ' ttttt',c:22, rating: 4 },
  { image: 'image/a.png', s: ' aa',c:22, rating: 4 },
  { image: 'image/b.png', s: ' bbbb',c:22, rating: 5 },
  { image: 'image/c.png', s: ' cccc',c:22, rating: 3 },
  { image: 'image/d.png', s: ' dddd',c:22, rating: 4 },
  { image: 'image/e.png', s: ' eeee',c:22, rating: 5 },
  { image: 'image/f.png', s: 'dddd ',c:22, rating: 4 },
  { image: 'image/g.png', s: 'eee ',c:22, rating: 5 },
  { image: 'image/h.png', s: ' ttttt',c:22, rating: 4 },
  





];


// الحاوية التي ستحتوي على المنتجات
var productContainer = document.getElementById('product-container');

// دالة لإضافة المنتجات إلى الصفحة
function displayProducts(startIndex, count) {
    for (var i = startIndex; i < Math.min(startIndex + count, productsData.length); i++) {
        // إنشاء عنصر المنتج
        var productDiv = document.createElement('div');
        productDiv.classList.add('product');

        // إنشاء عنصر الصورة
        var image = document.createElement('img');
        image.src = productsData[i].image;
        image.alt = productsData[i].s;
        productDiv.appendChild(image);

        // إنشاء عنصر الاسم
        var s = document.createElement('p');
        s.textContent = productsData[i].s;
        productDiv.appendChild(s);
        
        var c = document.createElement('p');
        c.textContent = productsData[i].c;
        productDiv.appendChild(c);
        // إنشاء عنصر تقييم النجوم
        var rating = document.createElement('div');
        rating.classList.add('rating');
        for (var j = 0; j < productsData[i].rating; j++) {
            var star = document.createElement('span');
            star.textContent = '★';
            rating.appendChild(star);
        }
        productDiv.appendChild(rating);

        // إضافة عنصر المنتج إلى الحاوية
        productContainer.appendChild(productDiv);
        
    }
}

// العدد الافتراضي لعدد المنتجات لكل عملية تحميل
var productsPerPage = 16;

// عرض المنتجات الأولى عند تحميل الصفحة
displayProducts(0, productsPerPage);

// عرض المزيد عند الضغط على الزر
document.getElementById('load-more-btn').addEventListener('click', function() {
    // إخفاء المنتجات القديمة
    var oldProducts = document.querySelectorAll('.product');
    oldProducts.forEach(function(product) {
        product.style.display = 'none';
    });

    // عرض المزيد من المنتجات الجديدة
    displayProducts(oldProducts.length, productsPerPage);
});
productsContainer.addEventListener('click', function (event) {
  const productId = event.target.closest('.product').dataset.productId;
  window.location.href = `wishlist.html?id=${productId}`;
});


/*shop2*/

document.getElementById("menuButton").addEventListener("click", function() {
  var menu = document.getElementById("menuContent");
  if (menu.style.display === "block") {
    menu.style.display = "none";
  } else {
    menu.style.display = "block";
  }
});






