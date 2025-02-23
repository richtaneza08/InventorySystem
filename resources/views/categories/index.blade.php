@extends('layouts')
@section('content')

    <!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Categories Module</li>
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

    @include('categories.create')
    @include('alert')

    <div class="table-container mt-4">
        <div class="t-header">List of Categories</div>
        <div class="table-responsive">
            <table id="basicExample" class="table custom-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td class="text-center">
                                <a type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#edit{{ $category->id }}">
                                    <span class="icon-mode_edit"></span>
                                </a>
                            </td>
                            @include('categories.edit')
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    </div>
    <!-- Main container end -->

@endsection

