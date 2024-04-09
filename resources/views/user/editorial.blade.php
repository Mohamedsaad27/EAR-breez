<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>
<div class="back">
    <nav>
        <ul>
            <li><a href="{{route('user.home')}}">HOME</a></li>
            <li><a href="{{route('user.shop')}}">SHOP</a></li>
            <li><a href="{{route('user.editorial')}}">EDITORIAL</a></li>
            <li><a href="{{route('user.aboutUs')}}">ABOUT</a></li>
        </ul>
        <div class="logo-container">
            <img src="/image/Logo 1.png" alt="logo">
        </div>
        <div class="search-container">
            <input type="text" placeholder="WHAT ARE YOU LOOKING FOR? " >
            <img src="/image/Component 2.png" alt="image">

        </div>

    </nav>
    <div class="line"></div>
    <h1 class="shop2">Editorial</h1>
    <button class="image-button"></button>
    <button class="image-button2"></button>
</div>
<div id="products">
    @foreach($products->chunk(3) as $chunk)
        <div class="row">
            @foreach($chunk as $product)
                <div class="col-md-4"> <!-- Adjusted to display 3 products per row -->
                    @foreach($product->images as $image)
                        <img src="{{ asset('image/' . $image->image) }}" alt="{{ $product->title }}">
                    @endforeach
                    <h3>{{ $product->title }}</h3>
                    <p>{{ $product->description }}</p>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
<button id="load-more-btn">more...</button>
<div class="group11-76-2mC" id="22:8014">
    <div class="frame1-859-Lmt" id="23:8095">
        <div class="group1-73-V8z" id="22:8016">
            <p class="free1-delivery-EcN" id="22:8017">Free Delivery</p>
            <p class="for1-all-oders-over-500egp-B1p" id="22:8018">For all oders over 500EGP.</p>
        </div>
        <div class="group1-74-fxa" id="22:8019">
            <p class="days1-return-ccv" id="22:8020">28 Days Return</p>
            <p class="if1-goods-have-problems-kDL" id="22:8021">If goods have problems.</p>
        </div>
        <div class="group1-75-Uf8" id="22:8022">
            <p class="secure1-payment-Qog" id="22:8023">Secure Payment</p>
            <p class="secure1-payment-LhL" id="22:8024">100% secure payment    .</p>
        </div>
    </div>
</div>
{{--<script>--}}
{{--    const productsData = [--}}
{{--        { name: '2024 Sustainable Gift Ideas',n: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mus mauris vitae ultricies leo integer malesuada nunc. In nulla posuere sollicitudin aliquam ultrices. Morbi blandit cursus risus at ultrices mi tempus imperdiet. Libero enim sed faucibus turpis in. Cursus mattis molestie a iaculis at erat. Nibh cras pulvinar mattis nunc sed blandit libero. Pellentesque elit ullamcorper dignissim cras tincidunt. Pharetra et ultrices neque ornare aenean euismod elementum.', image: '/image/image 5.png' },--}}
{{--        { name: '2024 Sustainable Gift Ideas',n: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mus mauris vitae ultricies leo integer malesuada nunc. In nulla posuere sollicitudin aliquam ultrices. Morbi blandit cursus risus at ultrices mi tempus imperdiet. Libero enim sed faucibus turpis in. Cursus mattis molestie a iaculis at erat. Nibh cras pulvinar mattis nunc sed blandit libero. Pellentesque elit ullamcorper dignissim cras tincidunt. Pharetra et ultrices neque ornare aenean euismod elementum.', image: '/image/image 5.png' },--}}
{{--        { name: '2024 Sustainable Gift Ideas',n: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Mus mauris vitae ultricies leo integer malesuada nunc. In nulla posuere sollicitudin aliquam ultrices. Morbi blandit cursus risus at ultrices mi tempus imperdiet. Libero enim sed faucibus turpis in. Cursus mattis molestie a iaculis at erat. Nibh cras pulvinar mattis nunc sed blandit libero. Pellentesque elit ullamcorper dignissim cras tincidunt. Pharetra et ultrices neque ornare aenean euismod elementum.', image: '/image/image 5.png' },--}}
{{--        // وهكذا...--}}
{{--    ];--}}

{{--    const productsContainer = document.getElementById('products');--}}

{{--    function createProductElement(product) {--}}
{{--        const productDiv = document.createElement('div');--}}
{{--        productDiv.classList.add('product');--}}

{{--        const img = document.createElement('img');--}}
{{--        img.src = product.image;--}}
{{--        productDiv.appendChild(img);--}}

{{--        const productName = document.createElement('p');--}}
{{--        productName.textContent = product.name;--}}
{{--        productDiv.appendChild(productName);--}}

{{--        const n = document.createElement('p');--}}
{{--        n.textContent = product.n;--}}
{{--        productDiv.appendChild(n);--}}

{{--        return productDiv;--}}
{{--    }--}}

{{--    let productsIndex = 0; // لتتبع عنصر المنتج الذي يجب عرضه--}}

{{--    function loadMoreProducts() {--}}
{{--        const productsFragment = document.createDocumentFragment(); // لعرض عناصر المنتجات دفعة واحدة--}}

{{--        for (let i = 0; i < 3; i++) {--}}
{{--            if (productsIndex < productsData.length) { // التحقق من وجود المزيد من المنتجات للعرض--}}
{{--                const product = productsData[productsIndex];--}}
{{--                const productElement = createProductElement(product);--}}
{{--                productsFragment.appendChild(productElement);--}}
{{--                productsIndex++;--}}
{{--            } else {--}}
{{--                document.getElementById('load-more-btn').style.display = 'none'; // إخفاء الزر إذا لم يكن هناك المزيد من المنتجات--}}
{{--                break;--}}
{{--            }--}}
{{--        }--}}

{{--        productsContainer.appendChild(productsFragment);--}}
{{--    }--}}

{{--    document.getElementById('load-more-btn').addEventListener('click', loadMoreProducts);--}}

{{--    // تحميل المنتجات الأولى عند تحميل الصفحة--}}
{{--    loadMoreProducts();--}}
{{--</script>--}}

</body>
</html>
