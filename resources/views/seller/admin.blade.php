@extends('layouts.adminApp')
@section('title', 'Seller|EditProduct')

<main>
    <div class="row">
        <div class="col-2">
            <!-- the vertical nave -->
            @include('components.Seller.seller-vertical-nav')
        </div>
        <div class="col-9 align-items-end ">
            <!--Page Name -->
            <h2 class="mt-4">Edit Your Business Information</h2>
            <form action="">
                <div class="row border rounded ms-4 pb-4">
                    <div class="col-12 d-flex align-items-center mt-3">
                        <h4>Business information - </h4>
                        <p class="mb-0 ms-2"> All fields ore required</p>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="">
                            <input type="text" id="business-name" placeholder="business name" class="form-control">
                        </div>
                        <div class="mt-3">
                            <input type="text" id="city" placeholder="City" class="form-control">
                        </div>
                        <div class="mt-3">
                            <input type="password" id="password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="">
                            <input type="text" id="business-name" placeholder="Main Business Address"
                                class="form-control">
                        </div>
                        <div class="mt-3">
                            <input type="text" id="city" placeholder="Zip/Postal Code" class="form-control">
                        </div>
                        <div class="mt-3">
                            <input type="password" id="password" placeholder="Password Confirmation"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-12 d-flex align-items-center mt-3">
                        <h4>Business Contact information - </h4>
                        <p class="mb-0 ms-2"> All fields ore required</p>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="">
                            <input type="text" id="first-name" placeholder="First Name" class="form-control">
                        </div>
                        <div class="mt-3">
                            <input type="email" id="email" placeholder="Email Address" class="form-control">
                        </div>
                        <div class="mt-3">
                            <input type="text" id="website" placeholder="Website" class="form-control">
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="">
                            <input type="text" id="last-name" placeholder="Last Name" class="form-control">
                        </div>
                        <div class="mt-3">
                            <input type="text" id="phone"
                                placeholder="Main Inventory Address (To Receive your products from)"
                                class="form-control">
                        </div>
                        <div class="mt-3">
                            <input type="text" id="password" placeholder="Password Confirmation"
                                class="form-control">
                        </div>
                    </div>
                </div>
            </form>
            <div class="d-flex align-items-center justify-content-between mt-5">
                <div>
                    <h2 class="m-0">Request to withdraw</h2>
                    <p class="m-0 fs-3">your Available Balance</p>
                </div>
                <div class="d-flex align-items-center">
                    <div class="border rounded me-3 p-3">
                        <p class="mb-2">Total Balanece</p>
                        <h3>70.5000 EGP</h3>
                    </div>
                    <div class="border rounded p-3">
                        <p class="mb-2">Avai!able Balance</p>
                        <h3>70.5000 EGP</h3>
                    </div>
                </div>
            </div>
            <form action="">
                <div class="row align-items-center justify-content-center border rounded ms-4 p-4 mt-5">
                    <div class="col-12 border-bottom">
                        <h4 class="m-0">Direct Bank Transfer</h4>
                        <p>Confiaure vout bank account from here.</p>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <label for="" class="form-label text-nowrap me-3 mt-4">Amount of cash</label>
                                <label for="" class="form-label text-nowrap me-3 mt-4">Country(your bank
                                    in)</label>
                                <label for="" class="form-label text-nowrap me-3 mt-4">swift
                                    code(international)</label>
                                <label for="" class="form-label text-nowrap me-3 mt-4">Bank IBAN</label>
                                <label for="" class="form-label text-nowrap me-3 mt-4">Account number</label>
                                <label for="" class="form-label text-nowrap me-3 mt-4">Address</label>
                                <label for="" class="form-label text-nowrap me-3 mt-4">Phone number</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control mt-3" placeholder="EX:5000EGP">
                                <input type="text" class="form-control mt-3" placeholder="EGYPT">
                                <input type="text" class="form-control mt-2" placeholder="">
                                <input type="text" class="form-control mt-2" placeholder="">
                                <input type="text" class="form-control mt-2" placeholder="">
                                <input type="text" class="form-control mt-2" placeholder="">
                                <input type="text" class="form-control mt-2" placeholder="">
                            </div>
                            <p class="mt-3 text-center lh-1">*you will be charged a withdrawal free of <span
                                    class="fw-bold">1OEGP</span>
                            </p>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <button type="reset"
                                    class="pt-2 pb-2 pe-3 ps-3 bg-transparent rounded me-2">Cancel</button>
                                <button type="submit" class="btn btn-success pt-2 pb-2 pe-3 ps-3">Save</button>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                                <div>
                                    <h3 class="m-0">Transaction History</h3>
                                    <p class="m-0">See your past transactions</p>
                                </div>
                                <div>
                                    <button class="pt-2 pb-2 pe-3 ps-3 bg-transparent rounded">SEE ALL</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    <main>
