@extends('layouts.adminApp')

<div class="add-business">
    <div class="container mt-5">
        <form action="">
            <div class="title">
                <h3 class="fw-bold">Thanks to finish your first step</h3>
                <h3 class="fw-bold">Now we have some Information Required</h3>
                <div class="row">
                    <div class="col-12 d-flex align-items-center mt-5">
                        <h4>Business information - </h4>
                        <p class="mb-0 ms-1"> All Fileds Are Required</p>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Business Name">
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Main Business Address">
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="City">
                    </div>
                    <div class="col-4 mt-3">
                        <input type="text" class="form-control" placeholder="Zip/Postal Code">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex align-items-center mt-5">
                        <h4>Business Contact information - </h4>
                        <p class="mb-0 ms-1"> All Fileds Are Required</p>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Frist Name">
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="col-4">
                        <input type="email" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="col-4 mt-3">
                        <input type="text" class="form-control" placeholder="phone">
                    </div>
                    <div class="col-4 mt-3">
                        <input type="text" class="form-control" placeholder="webite">
                    </div>
                    <div class="col-12 mt-3">
                        <input type="text" class="form-control"
                            placeholder="Main Inventory Address (To Receve Your Product)">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex align-items-center mt-5">
                        <h4>certificates information - </h4>
                        <p class="mb-0 ms-1"> All Fileds Are Required</p>
                    </div>
                    <div class="col-4">
                        <input type="file" class="form-control mt-3" placeholder="UPLOAO YOUR Certificates">
                    </div>
                    <div class="col-12 mt-3">
                        <input type="text" class="form-control"
                            placeholder="Comments">
                    </div>
                </div>
                <div class="row mt-5 align-items-center justify-content-center">
                    <div class="col-3">
                        <button class="btn btn-light w-100">Back</button>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-success w-100">CONFIRM</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
