@extends('layouts.adminApp')
@section('title', 'Seller|Dashboard')

<main>
    <div class="row">
        <div class="col-2">
            <!-- the vertical nave -->
            @include('components.Seller.seller-vertical-nav')
        </div>
        <div class="col align-items-end ">
            <!--Page Name -->
            <div class="row ">
                <div class="col-6">
                    <div class="header" style="display: flex; justify-content: space-between">
                        <h1>Dashboard</h1>
                    </div>
                </div>
                <div class="col-6">
                    <div style="display: flex; justify-content: flex-end; margin-top: 8px">
                        <form action="" method="GET">
                            @csrf
                            <input type="month" name="date" type="date" id="selectedDate" name="date"
                                   style="padding: 5px;">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--first row-->
            <div class="row ">
                <div class="col-4">
                    <div class="box">
                        <img src="{{ @asset('/image/1.png') }}" alt="">
                        <p>Total Products</p>
                        <h4>{{ $products->count() }} Products</h4>
                    </div>
                </div>

            </div>
            <br>
            <!--second row-->
            <div class="row ">
                <div class="col-4">
                    <div class="box">
                        <img src="{{ @asset('/image/4.png') }}" alt="">
                        <p>Total Sales</p>
                        <h4>{{ $totalSales }} EGP</h4>{{--  Fixed --}}
                        <img src="{{ @asset('/image/UP.png') }}" alt="">
                        <span>100%</span>
                        From Last Month
                    </div>
                </div>
                <div class="col-4">
                    <div class="box">
                        <img src="{{ @asset('/image/5.png') }}" alt="">
                        <p>Avg. Order Value</p>
                        <h4>{{ number_format($averageOrderValue, 3) }} EGP</h4>{{--  Fixed --}}
                        <img src="{{ @asset('/image/UP.png') }}" alt="">
                        <span>100%</span>
                        From Last Month
                    </div>
                </div>
                <div class="col-4">
                    <div class="box">
                        <img src="{{ @asset('/image/6.png') }}" alt="">
                        <p>Total Orders</p>
                        <h4>{{ $orders->count() }} Order</h4>{{--  Fixed --}}
                        <img src="{{ @asset('/image/UP.png') }}" alt="">
                        <span>100%</span>
                        From Last Month
                    </div>
                </div>
            </div>
            <br>
            <!--third row-->
            <div class="row ">
                <div class="col-4">
                    <div class="box">
                        <img src="{{ @asset('/image/Group 182 (5).png') }}" alt="">
                        <p>Total Orders Delivered</p>
                        <h4>{{ $deliveredOrders->count() }} Order</h4>{{--  Fixed --}}
                        <img src="{{ @asset('/image/UP.png') }}" alt="">
                        <span>100%</span>
                        From Last Month
                    </div>
                </div>
                <div class="col-4">
                    <div class="box">
                        <img src="{{ @asset('/image/Group 182 (4).png') }}" alt="">
                        <p>Total Orders Returned</p>
                        <h4>{{ $returnedOrders->count() }} Order</h4>{{--  Fixed --}}
                        <img src="{{ @asset('/image/UP.png') }}" alt="">
                        <span>100%</span>
                        From Last Month
                    </div>
                </div>
                <div class="col-4">
                    <div class="box">
                        <img src="{{ @asset('/image/Group 182 (3).png') }}" alt="">
                        <p>Total Orders Pending</p>
                        <h4>{{ $pendingOrders->count() }} Order</h4>{{--  Fixed --}}
                        <img src="{{ @asset('/image/UP.png') }}" alt="">
                        <span>100%</span>
                        From Last Month
                    </div>
                </div>
            </div>
            <!--forth row-->
            <br>
            <div class="row ">
                <div class="col-4">
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="m-1">
                    <h2>Top Selling Product</h2>
                    <div class="container">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Inventory</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($topSalesProduct as $product)
                                <tr>
                                    <td>
                                        {{ $product->title }}
                                    </td>
                                    <td>
                                        {{ $product->price }} EGP
                                    </td>
                                    <td>
                                        {{ $product->quantity }} PCS
                                    </td>
                                    <td>
                                        {{ $product->status }}
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Repeat rows for other products as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
