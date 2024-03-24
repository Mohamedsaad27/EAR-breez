@extends('layouts.orderHeader')
@section('title', 'Seller|Order')

<div class="col-3">
    @include('components.Seller.seller-vertical-nav')
</div>

<div class="container-fluid bg-secondary-dark">
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
