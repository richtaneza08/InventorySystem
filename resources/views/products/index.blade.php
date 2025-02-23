@extends('layouts')
@section('content')

    <!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Products Module</li>
        </ol>
    </div>
    <!-- Page header end -->


    <!-- Main container start -->
    <div class="main-container">


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#customModalTwo">
        <span class="icon-plus"></span>
        CREATE
    </button>

    @include('products.create')
    @include('alert')

    <div class="table-container mt-4">
        <div class="t-header">List of Products</div>
        <div class="table-responsive">
            <table id="basicExample" class="table custom-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><img src="{{ asset('assets/products/'. $product->image) }}" class="avatar" alt="Agent" /></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->categories->name }}</td>
                            <td class="text-center">
                                <a type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#edit{{ $product->id }}">
                                    <span class="icon-mode_edit"></span>
                                </a>
                            </td>
                            @include('products.edit')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    </div>
    <!-- Main container end -->

@endsection

