@extends('layouts.adminApp')

<div class="add-business">
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success" id="success-message">
                {{ session('success') }}
            </div>

            <script>
                // Hide the success message after the specified duration
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, {{ session('message_duration') ?? 5000 }});
            </script>
        @endif

        <form enctype="multipart/form-data" action="{{route('seller.storeBusinessInformation')}}" method="post">
            @csrf
            <div class="title">
                <h3 class="fw-bold">Thanks to finish your first step</h3>
                <h3 class="fw-bold">Now we have some Information Required</h3>

                <div class="row">
                    <div class="col-12 d-flex align-items-center mt-5">
                        <h4>Business information - </h4>
                        <p class="mb-0 ms-1"> All Filed Are Required</p>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" placeholder="Business Name">
                        @error('business_name')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control @error('business_address') is-invalid @enderror" name="business_address" placeholder="Main Business Address">
                        @error('business_address')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"  placeholder="City">
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                    <div class="col-4 mt-3">
                        <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code"  placeholder="Zip/Postal Code">
                        @error('postal_code')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex align-items-center mt-5">
                        <h4>Business Contact information - </h4>
                        <p class="mb-0 ms-1"> All Fileds Are Required</p>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="First Name">
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Last Name">
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                    <div class="col-4 mt-3">
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                    <div class="col-4 mt-3">
                        <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" placeholder="website">
                        @error('website')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                            placeholder="Main Inventory Address (To Receive Your Product)">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex align-items-center mt-5">
                        <h4>certificates information - </h4>
                        <p class="mb-0 ms-1"> All Filed Are Required</p>
                    </div>
                    <div class="col-4">
                        <input type="file"  accept=".pdf,.doc,.docx" class="form-control mt-3 @error('certificate_information') is-invalid @enderror " name="certificate_information" placeholder="UPLOAO YOUR Certificates">
                        @error('certificate_information')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <input type="text" class="form-control @error('comment') is-invalid @enderror" name="comment"
                            placeholder="Comments">
                        @error('comment')
                        <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-5 align-items-center justify-content-center">
                    <div class="col-3">
                        <button  class="btn btn-light w-100">
                            <a href="{{route('seller.login')}}"></a>
                            Back</button>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-success w-100">CONFIRM</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
