<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping card</title>
    <link rel="stylesheet" href="/assets/css/style-order.css" />


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
            <img src="/assets/image/Logo 1.png" alt="logo">
        </div>
        <div class="search-container">
            <input type="text" placeholder="WHAT ARE YOU LOOKING FOR? " >
            <img src="/assets/image/Component 2.png" alt="image">

        </div>
        <div>
            <button class="butto1"onclick="window.location.href='shoping card.html'"></button>
            <button class="butto2" id="menuButton"></button>
            <div id="menuContent" class="menu-content">
                <a href="manage-my-account.html"><img src="image/my.png"> My Account</a>
                <a href="order-user.html"> <img src="image/ordd.png">  My Order</a>
                <a href="C:/Users/Win11/Desktop/Graduation Project/user-befor-reg/Registration page.html"><img src="/assets/image/logout.png">  Logout</a>
            </div>
        </div>

    </nav>
    <div >
        <img class="chatbot" src="/assets/image/ChatBot.png">
    </div>
    <table class="table3">
        <thead>
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th> price</th>
            <th> Quantity</th>
            <th> Subtotal</th>
            <th>delete</th>


        </tr>
        </thead>
        <tbody>
        @foreach ($cartItems as $item)
            <tr>

                    @foreach($item->images as $image)
                    <td>
                        <img src="{{ asset('image/' . $image->image) }}" alt="{{ $item->title }}">
                    </td>
                    @endforeach
                <td>
                    {{ $item->title }}
                    <br>
                    {{ $item->description }}
                </td>
                <td>{{ $item->price }} EGP</td>
                <td><input type="number" id="quantity" name="quantity" placeholder="01"></td>
                <td>{{ $item->price }} EGP</td>
                <td>
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="frame-804-zvj" id="12:5209">
    <button class="button-7" onclick="redirectToShop()">Return To Shop</button>

    <script>
        function redirectToShop() {
            // Redirect the user to the user.shop route
            window.location.href = "{{ route('user.shop') }}";
        }
    </script>
    <button class="button-7" id="64:7044" onclick="redirectToCart()">Update Cart</button>

    <script>
        function redirectToCart() {
            // Redirect the user to the user.cart route
            window.location.href = "{{ route('user.cart') }}";
        }
    </script>
</div>
<div class="auto-group-ggaz-TbM" id="7BBHatqZFc9Z6wiXt6GGAz">
    <div class="frame-801-Lf9" id="12:5323">
        <button class="button-16" role="button" id="12:5324">Coupon Code</button>
        <button class="button-16" role="button" id="64:6934">Apply Coupon</button>
    </div>
    <div class="frame-800-ZAX" id="12:5328">
        <p class="cart-total-ceb" id="12:5329">Cart Total</p>
        <div class="auto-group-e7sw-VCb" id="7BBHq46dVcjby8QzpbE7SW">
            <p class="subtotal--q1Z" id="12:5331">Subtotal:</p>
            <p class="egp-keK" id="12:5332">{{$subtotal}}</p>
        </div>
        <div class="auto-group-eqtj-mpK" id="7BBHwU5cLx7AevCcuVEqtJ">
            <p class="shipping--VEX" id="12:5334">Shipping:</p>
            <p class="free-Bt3" id="12:5335">Free</p>
        </div>
        <div class="auto-group-dyzw-1cB" id="7BBJ38aqe9wazzUogVDyzW">
            <p class="total--Mg3" id="12:5337">Total:</p>
            <p class="egp-HZh" id="12:5338">{{$total}}</p>
        </div>
        <button class="button-RA7" id="64:7038" onclick="redirectToCart()">Proceed to checkout</button>

        <script>
            function redirectToCart() {
                window.location.href = {{route('user.cart')}}; // Replace 'user.cart' with the actual route URL
            }
        </script>
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




