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
            @if(session('success'))
                <div class="alert alert-success" id="success">
                    {{ session('success') }}
                </div>
                <script>
                    // Wait for the DOM to be fully loaded
                    document.addEventListener("DOMContentLoaded", function() {
                        // Select the success alert element
                        var successAlert = document.getElementById("success");

                        // Set a timeout to hide the success alert after 3 seconds
                        setTimeout(function() {
                            successAlert.style.display = "none"; // Hide the alert
                        }, 5000); // 3000 milliseconds = 3 seconds
                    });
                </script>
            @endif

            <form action="{{route('seller.storeEditBusinessInformation',$businessInformationBySellerId->seller_id)}}" method="post">
                @csrf
                <div class="row border rounded ms-4 pb-4">
                    <div class="col-12 d-flex align-items-center mt-3">
                        <h4>Business information - </h4>
                        <p class="mb-0 ms-2"> All fields ore required</p>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="">
                            <input type="text" id="business-name" placeholder="business name"
                                   value="{{$businessInformationBySellerId->business_name}}"
                             name="business_name" class="form-control @error('business_name') is-invalid @enderror">
                            @error('business_name')
                            <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <input type="text" id="city" placeholder="City"
                                   value="{{$businessInformationBySellerId->city}}"
                                   name="city" class="form-control @error('city') is-invalid @enderror">
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">

                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="">
                            <input type="text" id="business-name" placeholder="Main Business Address" name="business_address"
                                   value="{{$businessInformationBySellerId->business_address}}"
                                   class="form-control @error('business_address') is-invalid @enderror">
                            @error('business_address')
                            <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <input type="text" id="city" placeholder="Zip/Postal Code" name="zip_code"
                                   value="{{$businessInformationBySellerId->postal_code}} "
                                   class="form-control @error('zip_code') is-invalid @enderror">
                            @error('zip_code')
                            <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">

                        </div>
                    </div>
                    <div class="col-12 d-flex align-items-center mt-3">
                        <h4>Business Contact information - </h4>
                        <p class="mb-0 ms-2"> All fields ore required</p>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="">
                            <input type="text" id="first-name" placeholder="First Name" name="first_name"
                                   value="{{$businessContactInformationBySellerId->first_name}}"
                                   class="form-control @error('first_name') is-invalid @enderror">
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <input type="email" id="email" placeholder="Email Address" name="email"
                                   value="{{$businessContactInformationBySellerId->email}}"
                                   class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <input type="text" id="website" placeholder="Website"  name="website"
                                   value="{{$businessContactInformationBySellerId->website}}"
                                   class="form-control @error('website') is-invalid @enderror">
                            @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="">
                            <input type="text" id="last-name" placeholder="Last Name" name="last_name"
                                   value="{{$businessContactInformationBySellerId->last_name}}"
                                   class="form-control @error('last_name') is-invalid @enderror">
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <input type="text" id="phone" name="phone"
                                   placeholder="Phone Number"
                                   value="{{$businessContactInformationBySellerId->phone}}"
                                   class="form-control  @error('phone') is-invalid @enderror ">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <input type="text" id="password"  name="address"
                                   value="{{$businessContactInformationBySellerId->address}}"
                                   placeholder="Main Inventory Address (To Receive Your Products From)"
                                   class="form-control
                                   @error('address') is-invalid @enderror">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <button type="submit"  class="btn-lg btn btn-success">Edit business information</button>
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
                        <h3>{{$bankTransefersBySellerId->amount}}EGP</h3>
                    </div>
                    <div class="border rounded p-3">
                        <p class="mb-2">Avai!able Balance</p>
                        <h3>70.5000 EGP</h3>
                    </div>
                </div>
            </div>
            <form action="{{route('bank-transfer.store')}}" method="post">
                @csrf
                <div class="row align-items-center justify-content-center border rounded ms-4 p-4 mt-5">
                    <div class="col-12 border-bottom">
                        <h4 class="m-0">Direct Bank Transfer</h4>
                        <p>Configure Your bank account from here.</p>
                        @if(session('success-bank'))
                            <div class="alert alert-success" id="success">
                                {{ session('success-bank') }}
                            </div>
                            <script>
                                // Wait for the DOM to be fully loaded
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Select the success alert element
                                    var successAlert = document.getElementById("success");

                                    // Set a timeout to hide the success alert after 3 seconds
                                    setTimeout(function() {
                                        successAlert.style.display = "none"; // Hide the alert
                                    }, 5000); // 3000 milliseconds = 3 seconds
                                });
                            </script>
                        @endif
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
                                <label for="" class="form-label text-nowrap me-3 mt-4">Account holer name</label>
                                <label for="" class="form-label text-nowrap me-3 mt-4">Address</label>
                                <label for="" class="form-label text-nowrap me-3 mt-4">Phone number</label>
                            </div>
                            <div class="col-8">
                                <input type="text" name="amount" class="form-control mt-3 @error('amount') is-invalid @enderror" placeholder="EX:5000EGP">
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                                <input type="text" name="country" class="form-control mt-3 @error('country') is-invalid @enderror" placeholder="EGYPT">
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                                <input type="text" name="swift_code" class="form-control mt-2 @error('swift_code') is-invalid @enderror" placeholder="">
                                @error('swift_code')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                                <input type="text" name="iban" class="form-control mt-2 @error('iban') is-invalid @enderror" placeholder="">
                                @error('iban')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                                <input type="text" name="account_number" class="form-control mt-2 @error('account_number') is-invalid @enderror" placeholder="">
                                @error('account_number')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                                <input type="text" name="account_holder_name" class="form-control mt-2 @error('account_holder_name') is-invalid @enderror" placeholder="">
                                @error('account_holder_name')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                                <input type="text" name="address_name" class="form-control mt-2 @error('address') is-invalid @enderror" placeholder="">
                                @error('address_name')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                                <input type="text" name="phone_number" class="form-control mt-2 @error('phone_number') is-invalid @enderror" placeholder="">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                            </div>
                            <p class="mt-3 text-center lh-1">*you will be charged a withdrawal free of <span
                                    class="fw-bold">1OEGP</span>
                            </p>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <button type="reset"
                                    class="pt-2 pb-2 pe-3 ps-3 bg-transparent rounded me-2">Cancel</button>
                                <button type="submit"  class="btn btn-success pt-2 pb-2 pe-3 ps-3">Save</button>
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
                    </div>
            </form>
        </div>
    </div>
    <main>
