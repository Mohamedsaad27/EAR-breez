<div>
    <nav class="nav">

        <div>
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            <p>{{Auth::guard('seller')->user()->name}}</p>
        </div>

        <!-- Vertical Navigation List -->
        <ul >
            <li  class="list-group-item">
                <a class="d-flex align-items-center" href="{{route('seller.Dashboard')}}">
                    <img src="{{@asset('/image/Dashboard icon.png')}}" >
                    Dashboard
                </a>
            </li>
            <li  class="list-group-item" >
                <a class="d-flex align-items-center" href="{{route('seller.orderPage')}}">
                    <img src="{{@asset('/image/Order.png')}}" >
                    Orders
                </a>
            </li>
            <li  class="list-group-item" >
                <a class="d-flex align-items-center" href="{{route('seller.productListPage')}}">
                    <img src="{{@asset('/image/menu3.png')}}" >
                    Products List
                </a>
            </li>
            <li  class="list-group-item" >
                <a class="d-flex align-items-center" href="{{route('seller.editBusinessInformation')}}">
                    <img src="{{@asset('/image/menu66.png')}}" >
                 Admin
                </a>
            </li>
            <li  class="list-group-item" >
                <a class="d-flex align-items-center" href="{{route('seller.viewContactUsPage')}}">
                    <img src="{{@asset('/image/Aadmin.png')}}" >
                 Contact Us
                </a>
            </li>

            <form method="POST" action="{{route('admin.logout')}}">
                @csrf

                <button class="btn btn-success" type="submit">
                    <img class="logout" src="{{@asset('/image/Icon-logout.png')}}" alt="Image 4">
                    Log Out
                </button>
            </form>
        </ul>
    </nav>
</div>
