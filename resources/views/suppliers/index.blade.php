@extends('layouts')
@section('content')

    <!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Suppliers Module</li>
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

    @include('suppliers.create')
    @include('alert')

    <div class="table-container mt-4">
        <div class="t-header">List of Suppliers</div>
        <div class="table-responsive">
            <table id="basicExample" class="table custom-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->contact }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td class="text-center">
                                <a type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#edit{{ $supplier->id }}">
                                    <span class="icon-mode_edit"></span>
                                </a>
                            </td>
                            @include('suppliers.edit')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    </div>
    <!-- Main container end -->

@endsection

