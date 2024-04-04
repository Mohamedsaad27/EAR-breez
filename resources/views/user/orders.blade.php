<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <link rel="stylesheet" href="/assets/css/style-order.css" />
</head>
<body>
<div class="back">
    <nav>
        <ul>
            <li><a href="Home page1.html">HOME</a></li>
            <li><a href="shop befoe after reg.html">SHOP</a></li>
            <li><a href="editorial.html">EDITORIAL</a></li>
            <li><a href="about1.html">ABOUT</a></li>

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
            <input class="placeholder-8sN" id="63:4679" placeholder="Product Name Search">
            <div class="auto-group-4hnw-GCt" id="7BCrzX2ijyPVqEkurV4HnW">
                <div class="line-1-bW4" id="63:4682"></div>
                <p class="placeholder-voE" id="63:4683"></p>
            </div>
        </div>
        <img class="search-rwn" src="/api/prod-us-east-2-first-cluster/projects/JdGLw99..." id="63:4684"/>
    </div>
    <div class="select-menu-trigger-jVn" id="63:4686">
        <select  class="text-raQ" id="63:4687" name="choices">
            <option value="option1">Status </option>
            <option value="option2"> 2</option>
            <option value="option3"> 3</option>
            <option value="option4"> 4</option>
        </select>
        <img class="chevron-down-zRi" src="/api/prod-us-east-2-first-cluster/projects/JdGLw99..." id="63:4688"/>
    </div>
</div>
<table class="table2">
    <thead>
    <tr>
        <th> ORDER NUBER</th>
        <th> STATUS</th>
        <th> ITEM</th>
        <th> STORE NAME</th>
        <th> ORDER DATE</th>
        <th> REVIEW</th>

    </tr>
    </thead>
    <tbody>

    <tr>
        <td>aaaa</td>
        <td>bbbb</td>
        <td>cccc</td>
        <td>dddd</td>
        <td>eeee</td>
        <td>ffff</td>
    </tr>
    <tr>
        <td>aaaa</td>
        <td>bbbb</td>
        <td>cccc</td>
        <td>dddd</td>
        <td>eeee</td>
        <td>ffff</td>
    </tr>
    <tr>
        <td>aaaa</td>
        <td>bbbb</td>
        <td>cccc</td>
        <td>dddd</td>
        <td>eeee</td>
        <td>ffff</td>
    </tr>
    <tr>
        <td>aaaa</td>
        <td>bbbb</td>
        <td>cccc</td>
        <td>dddd</td>
        <td>eeee</td>
        <td>ffff</td>
    </tr>
    <tr>
        <td>aaaa</td>
        <td>bbbb</td>
        <td>cccc</td>
        <td>dddd</td>
        <td>eeee</td>
        <td>ffff</td>
    </tr>
    <tr>
        <td>aaaa</td>
        <td>bbbb</td>
        <td>cccc</td>
        <td>dddd</td>
        <td>eeee</td>
        <td>ffff</td>
    </tr>
    <tr>
        <td>aaaa</td>
        <td>bbbb</td>
        <td>cccc</td>
        <td>dddd</td>
        <td>eeee</td>
        <td>ffff</td>
    </tr>
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
</body>
</html>
