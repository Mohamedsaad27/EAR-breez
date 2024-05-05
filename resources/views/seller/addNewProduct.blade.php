@extends('layouts.adminApp')
@section('title', 'Seller|AddProduct')

<main>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <!-- the vertical nave -->
                @include('components.Seller.seller-vertical-nav')
            </div>
            <div class="col align-items-end ">
                <!--Page Name -->
                <div class="row ">
                    <div class="col-6">
                        <h1>Add Product</h1>
                    </div>
                    <div class="col-6">
                        <a href="{{route('seller.productListPage')}}" class="btn btn-success m-2">BACK TO PRODUCT LIST</a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
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
                        <form class="border border-1 border-solid rounded p-3" method="POST" action="{{route('seller.storeNewProduct')}}"  enctype="multipart/form-data">
                            @csrf
                            <p class="fw-bold d-inline">General information</p><span class="text-danger">*</span>
                            <p class="input-info">To start selling, all you need is a name and a price.</p>
                            <!--title, subtitle-->
                            <div class="row" >
                                <div class="col-6">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <x-text-input id="title" name="title" type="text" value="{{old('title')}}" class=" form-control" placeholder="Title Of Product" />
                                    </div>
                                       <x-input-error class="text-danger" :messages="$errors->get('title')"  />
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Subtitle</label>
                                    <div class="input-group mb-3">
                                        <x-text-input id="subtitle" name="subtitle" type="text" value="{{old('subtitle')}}" class="form-control" placeholder="Subtitle Of Product" />
                                    </div>
                                    <x-input-error class="text-danger"  :messages="$errors->get('subtitle')" />
                                </div>
                            </div>
                            <!--Description-->
                            <div class="row">
                                <label class="form-label">Description</label>
                                <div class="input-group mb-3">
                                    <x-text-input value="{{old('description')}}" style="height: 100px" id="description" placeholder="Enter Description" name="description" type="text" class="form-control" />
                                </div>
                                <x-input-error class="text-danger" :messages="$errors->get('description')" />
                                <p class="input-info">Give your product a short and clear title.</p>
                                <p class="input-info">50-60 characters is the recommended length for search engines</p>
                            </div>
                            <!--quantity price offer-->
                            <div class="row">
                                <div class="col-4">
                                    <label class="form-label">Available Quantity<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <x-text-input value="{{old('quantity')}}" style=" " placeholder="Quantity" id="quantity" name="quantity" type="text" class="form-control" />
                                    </div>
                                    <x-input-error class="text-danger" :messages="$errors->get('quantity')" />
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Price EGP<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <x-text-input value="{{old('quantity')}}" style=" " id="price" placeholder="Price" name="price" type="text" class="form-control"/>
                                    </div>
                                    <x-input-error class="text-danger" :messages="$errors->get('price')" />
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Offer Percentage<span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <x-text-input value="{{old('offer')}}" style=" " id="offer" placeholder="Offer" name="offer" type="text" class="form-control" />
                                    </div>
                                    <x-input-error class="text-danger" :messages="$errors->get('offer')" />
                                </div>
                            </div>
                            <!--product options -->
                            <div class="row">
                                <div class="col">
                                    <p class="fw-bold">Product Options</p>
                                    <p class="input-info">Used for products that come in different variations . </p>

                                    <table>
                                        <thead >
                                        <tr >
                                            <th class="bg-success text-white">Options</th>
                                            <th class="bg-success text-white">Variations</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>color</td>
                                            <td>
                                                <x-text-input value="{{old('color')}}" style="" id="color" placeholder="Color Of Product" name="color" type="text" class="form-control" />
                                                <x-input-error class="text-danger" :messages="$errors->get('color')" />
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Size</td>
                                            <td>
                                                <x-text-input value="{{old('size')}}" style=" " id="size"   placeholder="Size Of Product" name="size" type="text" class="form-control" />
                                                <x-input-error class="text-danger"  :messages="$errors->get('size')" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>category</td>
                                            <td>
                                                <select id="category" name="category_id" class="form-control">
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                                <x-input-error class="text-danger" :messages="$errors->get('category')" />
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <!--Thumbnail-->
                            <div class="row">
                                <p class="fw-bold">Thumbnail</p>
                                <p class="input-info">Used to represent your product during checkout, social sharing and more.</p>
                                <label for="imageUpload" class="dashed-border text-center">
                                    <span id="fileInputLabel">Drop your file here, or click to browse</span>
                                    <input style="display: none;" type="file" id="imageUpload" name="image" accept="image" >
                                </label>
                            </div>
                            <div class="row">
                                <div class="d-flex flex-wrap">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="d-flex justify-content-center">
                            </div>
                            <br>
                            <div >
                                <center><button class="btn btn-success btn-custom-width" type="submit">Add Product</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
