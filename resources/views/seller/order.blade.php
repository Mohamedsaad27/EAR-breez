@extends('layouts.orderHeader')
@section('title', 'Seller|Order')

<div class="row">
    <div class="col-2">
        <!-- the vertical nave -->
        @include('components.Seller.seller-vertical-nav')
    </div>
    <div class="col align-items-end ">
        <div class="container-fluid bg-secondary-dark mt-5">
            <p class="fs-3 font-medium">Orders</p>
            <div class="container-fluid">
                <div class="card bg-primary-dark">
                    <div class="card-body pb-5 pt-3">
                        <hr>
                        <!-- Include the order-table component here -->
                        <livewire:order-table />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
