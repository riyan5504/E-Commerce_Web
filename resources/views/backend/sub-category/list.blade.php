@extends('backend.master')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Sub Category List</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                        <li class="breadcrumb-item active" aria-current="page">Sub Category List</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <!-- /.card -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Manage Sub Categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 70px">Sl. No.</th>
                                        <th style="width: 170px">Sub Category Name</th>
                                        <th style="width: 170px">Category</th>
                                        <th style="width: 170px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subCategories as $subCategory)
                                        <tr class="align-middle">
                                            <td>{{$loop->index+1}}</td>
                                            <td>
                                                {{$subCategory->name}}
                                            </td>
                                            <td>{{$subCategory->category->name}}</td>
                                            <td>
                                                <a href="{{url('/sub-category/edit/'.$subCategory->id)}}" class="btn btn-primary">Edit</a>
                                                <a href="{{url('/sub-category/delete/'.$subCategory->id)}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
