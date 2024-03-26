@extends('layouts.adminApp')
@section('title', 'Seller|EditProduct')

<main>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <!-- the vertical nave -->
                @include('components.Seller.seller-vertical-nav')
            </div>
            <div class="col">
                <!-- Page Content -->
                <div class="row">
                    <div class="col">
                        <h1>Get in touch with us</h1>
                        <h6>
                            Please Feel Free To Drop Us An Email <br>
                            Our Staff Always Be There To Help You.
                        </h6>
                        @if(session('success'))
                            <div class="alert alert-success" id="success">
                                {{ session('success') }}
                            </div>
                            <script>
                                $(document).ready(function(){
                                    setTimeout(function(){
                                        $('#success').fadeOut();
                                    }, 3000);
                                });
                            </script>
                        @endif
                        <!-- Contact Form -->
                        <form method="POST" action="{{route('seller.sendContactMessage')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                       placeholder="ABC"
                                       style="width: 900px; height: 50px;"
                                       required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                       placeholder="examble@gmail.com"
                                       style="width: 900px; height: 50px;"
                                       required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject"
                                       placeholder="What you Will talk about"
                                       style="width: 900px; height: 50px;"
                                       required>
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5"
                                          placeholder="Hi i'd like to ask about!"
                                          required></textarea>
                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                <strong class="category-error">{{ $message }} </strong>
                                </span>
                                @enderror
                            </div>
                            <br>
                            <br>
                           <center><button type="submit" class="btn btn-primary">Send Message</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
