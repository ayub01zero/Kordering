@extends('frontend.frontbody.body')
@section('interface')
<div class="container crt rounded bg-white mt-3 mb-2">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img id="profileImage" class="img-fluid" src="{{asset('assets/img/noimage.webp')}}" alt="Profile Image">
            </div>
        </div>
        <div class="col-md-8">
            <div class="p-3 py-5">
                <h6>add order here</h6>
                <form action="{{ route('Add.Cart') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <input type="file" class="form-control rounded-pill" placeholder="File" name="file" id="fileInput" value="">
                            @error('file')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control rounded-pill" placeholder="Link" name="link" value="">
                            @error('link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <select class="form-control rounded-pill" name="country">
                                <option value="">Select Country</option>
                                <option value="USA">USA</option>
                                <option value="Turkey">Turkey</option>
                            </select>
                            @error('country')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <select class="form-control rounded-pill" name="size">
                                <option value="">Select Size</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                            @error('size')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control rounded-pill" placeholder="Color" name="color" value="">
                            @error('color')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control rounded-pill" placeholder="Qty" name="qty" value="">
                            @error('qty')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <input type="text" class="form-control rounded-pill" placeholder="Description" name="description" value="">
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button type="submit" class="btn btnmy btn-lg rounded-pill px-5">Add Order</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<style>
        .btnmy{
       background-color: #dab83d!important;
       border-color: #dab83d!important;
       color: #fff!important;
    }
    
    body {
        background: #f8f9fa;
    }

    /* .crt {
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    } */

    .form-control {
        border: 1px solid #ced4da;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #6c757d;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fileInput = document.getElementById("fileInput");
        const profileImage = document.getElementById("profileImage");

        fileInput.addEventListener("change", function() {
            const file = fileInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profileImage.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>



@endsection
