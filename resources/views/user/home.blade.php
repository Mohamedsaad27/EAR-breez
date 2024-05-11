<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/assets/css/globals.css" />
    <link rel="stylesheet" href="/assets/css/styleguide.css" />
    <link rel="stylesheet" href="/assets/css/style2.css" >

</head>
<body>
<div class="home">

{{--    <form method="POST" action="{{ route('logout') }}">--}}
{{--        @csrf--}}
{{--        <button class="btn btn-success" type="submit">--}}
{{--            Log Out--}}
{{--        </button>--}}
{{--    </form>--}}
    <nav>
        <a href="{{route('user.home')}}">Home</a>
        <a href="{{route('user.shop')}}">SHOP</a>
        <a href="{{route('user.editorial')}}">Editorial </a>
        <a href="{{route('user.aboutUs')}}">About </a>

    </nav>
    <div class="font">
        <h3>The Platform For </h3>
        <h1>Sustainable Home</h1>
        <button class="button-58" onclick="window.location.href='{{route('user.shop')}}'" role="button">SHOP</button>
        <button class="button-59" onclick="window.location.href='{{route('user.aboutUs')}}'" role="button">LEARN MORE</button>

    </div>
    <img src="/assets/image/Logo 1.png" alt=" logo" class="logo">
    <div class="search-container">
        <input type="text" placeholder="WHAT ARE YOU LOOKING FOR? " >
        <img src="/assets/image/Component 2.png" alt="image">

    </div>


    <div>
        <button class="butto1"onclick="window.location.href='shoping card.html'"></button>
        <button class="butto2" id="menuButton"></button>
        <div id="menuContent" class="menu-content">
            <a href="manage-my-account.html"><img src="/assets/image/my.png"> My Account</a>
            <a href="{{route('user.order')}}"> <img src="/assets/image/ordd.png">  My Order</a>
            <a href="C:/Users/Win11/Desktop/Graduation Project/user-befor-reg/Registration page.html"><img src="image/logout.png">  Logout</a>
        </div>
    </div>
    <div >
        <img class="chatbot" src="/assets/image/ChatBot.png">
    </div>
    <div class="div2">
        <h1>Top Sales</h1>
        <h4>ELEMENTS OF SUSTAINABLE LIVING</h4>
        <button class="shop-all" onclick="window.location.href='{{route('user.shop')}}'">SHOP ALL</button>
        <div class="container">
            @foreach($topSalesProduct as $product)
            <div class="product">
                @foreach($product->images as $image)
                    <img src="{{ asset('image/' . $image->image) }}" alt="{{ $product->title }}">
                @endforeach
                    <h3>{{$product->title}} </h3>
                <h3>{{$product->subtitle}} </h3>
                <p>{{$product->price}} </p>
                <div class="rating">
                    {{$product->status}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="half-line"></div>
    <div class="div3">
{{--        <h1>New Arrivals</h1>--}}
{{--        <h4>New SUSTAINABLE LIVING</h4>--}}
        <button class="shop-all1" onclick="window.location.href='{{route('user.shop')}}'">SHOP ALL</button>
        <div class="container1">
            @foreach($newArrivals as $product)
                <div class="product">
                    @foreach($product->images as $image)
                        <img src="{{ asset('image/' . $image->image) }}" alt="{{ $product->title }}">
                    @endforeach
                    <h3>{{$product->title}} </h3>
                    <h3>{{$product->subtitle}} </h3>
                    <p>{{$product->quantity}} </p>
                    <div class="rating">
                        {{$product->status}}
                    </div>
                </div>
            @endforeach
        </div>


    </div>


</div>
<div class="content">
    <h4>don't miss our SPECIAL NEW ARRIVALS</h4>
    <h3>SPECIAL NEW ARRIVALS</h3>
    <h1>Asgaard sofa</h1>

    <img src="/assets/image/Asgaard sofa 1.png">
</div>
<div class="container1">
   @foreach($topPriceOfProduct as $product)
        <div class="product">
            <div class="product-image">
                @foreach($product->images as $image)
                    <img src="{{ asset('image/' . $image->image) }}" alt="{{ $product->title }}">
                @endforeach
            </div>
            <h3>{{ $product->title }}</h3>
            <h3>{{ $product->subtitle }}</h3>
            <p>{{ $product->price }}</p>
            <div class="rating">
                {{ $product->status }}
            </div>
        </div>
    @endforeach
</div>
</div>
<div class="group1-76-2mC" id="22:8014">
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
<script>
    document.getElementById("menuButton").addEventListener("click", function() {
        var menu = document.getElementById("menuContent");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    });

</script>
</body>
</html>
