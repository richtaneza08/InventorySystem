@extends('layouts')
@section('content')

    <!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Purchase Orders Module</li>
        </ol>
    </div>
    <!-- Page header end -->


    <!-- Main container start -->
    <div class="main-container">


    <!-- Button trigger modal -->
    <a href="{{ route('orders.index') }}" class="btn btn-primary mb-3">
        <span class="icon-back"></span>
        BACK TO INDEX
    </a>

    @include('alert')

    <div class="card">
        <div class="card-header">
            <div class="card-title">Purchase Orders Create Form</div>
        </div>
        <div class="card-body">
            <div class="row gutters">
                <div class="col-xl-6 col-lglg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                        <label for="inputEmail">Suppliers</label>
                        <select class="form-control" name="suppliers_id" placeholder="Please Select Categories">
                            <option value="">Please Select Suppliers</option>
                            @foreach ($suppliers as $suppliersId => $suppliersName)
                                <option value="{{ $suppliersId }}" {{ old('suppliers_id') == $suppliersId ? 'selected' : '' }}>
                                    {{ $suppliersName }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lglg-4 col-md-4 col-sm-4 col-12">

                </div>
                <div class="col-xl-6 col-lglg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                        <label for="inputName">Date Ordered</label>
                        <input type="text" class="form-control" id="inputName">
                    </div>
                </div>
                <div class="col-xl-6 col-lglg-4 col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                        <label for="inputEmail">Date Arrived</label>
                        <input type="email" class="form-control" id="inputEmail">
                    </div>
                </div>

                <hr>
                <div class="row gutters" id="purchase-items">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="categories">Categories</label>
                            <select class="form-control category-select" name="categories_id[]">
                                <option value="">Please Select Category</option>
                                @foreach ($categories as $categoriesId => $categoriesName)
                                    <option value="{{ $categoriesId }}">{{ $categoriesName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="products">Product</label>
                            <select class="form-control product-select" name="products_id[]">
                                <option value="">Please Select Product</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" name="unit[]">
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" class="form-control" name="quantity[]">
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label>Action</label>
                            <button type="button" class="btn btn-danger remove-item">Remove</button>
                        </div>
                    </div>
                </div>

                <!-- Add Item Button -->
                <button type="button" class="btn btn-success mt-3" id="add-item">
                    <i class="icon-plus"></i> Add Item
                </button>

            </div>
        </div>
    </div>


    </div>
    <!-- Main container end -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#categories').on('change', function () {
                let categoryId = $(this).val();

                if (categoryId) {
                    $.ajax({
                        url: "/get-products/" + categoryId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('#products').empty();
                            $('#products').append('<option value="">Please Select Product</option>');

                            $.each(data, function (key, value) {
                                $('#products').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#products').empty();
                    $('#products').append('<option value="">Please Select Product</option>');
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Select elements
            let purchaseItemsContainer = document.getElementById('purchase-items');
            let addItemButton = document.getElementById('add-item');

            // Function to add new item row
            addItemButton.addEventListener('click', function() {
                let newRow = purchaseItemsContainer.cloneNode(true);
                newRow.querySelectorAll('select, input').forEach(el => el.value = ''); // Clear inputs
                document.querySelector('.main-container').appendChild(newRow);
            });

            // Remove item row
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-item')) {
                    event.target.closest('.row.gutters').remove();
                }
            });

            // Handle dependent dropdown logic
            document.addEventListener('change', function(event) {
                if (event.target.classList.contains('category-select')) {
                    let categoryId = event.target.value;
                    let productDropdown = event.target.closest('.row.gutters').querySelector('.product-select');

                    fetch(`/get-products/${categoryId}`)
                        .then(response => response.json())
                        .then(data => {
                            productDropdown.innerHTML = '<option value="">Please Select Product</option>';
                            data.forEach(product => {
                                productDropdown.innerHTML += `<option value="${product.id}">${product.name}</option>`;
                            });
                        });
                }
            });
        });
    </script>

@endsection

