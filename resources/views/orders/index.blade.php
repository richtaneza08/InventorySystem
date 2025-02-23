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
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">
        <span class="icon-plus"></span>
        CREATE
    </a>

    @include('alert')

    <div class="table-container mt-4">
        <div class="t-header">List of Purchase Orders</div>
        <div class="table-responsive">
            <table id="basicExample" class="table custom-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>


    </div>
    <!-- Main container end -->

@endsection

