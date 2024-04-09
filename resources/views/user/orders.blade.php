<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{--bootstrap--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    </nav>
    <div >
        <img class="chatbot" src="/assets/image/ChatBot.png">
    </div>
    <div class="line"></div>

    <div>
        <button class="butto1"onclick="window.location.href='shoping card.html'"></button>
        <button class="butto2" id="menuButton"></button>
        <div id="menuContent" class="menu-content">
            <a href="manage-my-account.html"><img src="/assets/image/my.png"> My Account</a>
            <a href="order-user.html"> <img src="/assets/image/ordd.png">  My Order</a>
            <a href="C:/Users/Win11/Desktop/Graduation Project/user-befor-reg/Registration page.html"><img src="/assets/image/logout.png">  Logout</a>
        </div>
    </div>
    <div class="order">
        <h1>Order</h1>
    </div>

</div>
<div class="filter-kM2" id="63:4676">
    <div class="custom-search-HLx" id="63:4677">
        <div class="text-PPz" id="63:4678">
            <div class="auto-group-4hnw-GCt" id="7BCrzX2ijyPVqEkurV4HnW">
                <div class="line-1-bW4" id="63:4682"></div>
                <p class="placeholder-voE" id="63:4683"></p>
            </div>
        </div>
        <img class="search-rwn" src="/api/prod-us-east-2-first-cluster/projects/JdGLw99..." id="63:4684"/>
    </div>
    <div class="row my-4">
        <div class="col-6 ">
            <div class="">
                <div class="dropdown ">
                    <button class="dropbtn btn btn-success ">Show With Status <i class="m-1 bi bi-caret-down"></i></button>
                    <div class="dropdown-content">
                        <a href="{{route('user.orders.get-by-status', ['new'])}}">new</a>
                        <a href="{{route('user.orders.get-by-status', ['in production'])}}">in production</a>
                        <a href="{{route('user.orders.get-by-status', ['shipped'])}}">shipped</a>
                        <a href="{{route('user.orders.get-by-status', ['cancelled'])}}">canceled</a>
                        <a href="{{route('user.orders.get-by-status', ['rejected'])}}">rejected</a>
                        <a href="{{route('user.orders.get-by-status', ['draft'])}}">draft</a>
                        <a href="{{route('user.order')}}">ALL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table2">
    <thead>
    <tr>
        <th> ORDER NUMBER</th>
        <th> STATUS</th>
        <th> ITEM</th>
        <th> Customer NAME</th>
        <th> ORDER DATE</th>
        <th> Price</th>

    </tr>
    </thead>
    <tbody>
@foreach($orders as $order)
    <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->status}}</td>
        <td>{{$order->items}}</td>
        <td>{{$order->user->name}}</td>
        <td>{{$order->created_at->format('Y-m-d')}}</td>
        <td>{{$order->total_value}}</td>
    </tr>
@endforeach
    </tbody>
</table>
<script>
    // دالة JavaScript للانتقال إلى الصفحة التالية
    function navigateToPage() {
        window.location.href = 'editproduct.html';
    }
    document.getElementById("menuButton").addEventListener("click", function() {
        var menu = document.getElementById("menuContent");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
