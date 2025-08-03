@extends('backend.master')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Product</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                        <li class="breadcrumb-item active" aria-current="page">Product</li>
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
            <div class="row g-4">
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Quick Example-->
                    <div class="card card-primary card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Input Product Data</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form action="{{ url('/product/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 mb-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="code" class="form-label">Product Code</label>
                                        <input type="text" name="code" class="form-control" id="code" required />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="cat_id" class="form-label">Category</label>
                                        <select name="cat_id" class="form-control" id="cat_id" required>
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="sub_cat_id" class="form-label">Sub Category</label>
                                        <select name="sub_cat_id" class="form-control" id="sub_cat_id">
                                            <option selected disabled>Select Sub Category</option>
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="type" class="form-label">Product Type</label>
                                        <select name="type" class="form-control" id="type" required>
                                            <option selected disabled>Select Product Type</option>
                                            <option value="hot">Hot Product</option>
                                            <option value="new">New Product</option>
                                            <option value="reguler">Reguler Product</option>
                                            <option value="discount">Discount Product</option>
                                        </select>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="qty" class="form-label">Product Quentity</label>
                                        <input type="text" name="qty" class="form-control" id="qty" required />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="buying_price" class="form-label">Buying Price</label>
                                        <input type="text" name="buying_price" class="form-control" id="buying_price"
                                            required />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="reguler_price" class="form-label">Reguler Price</label>
                                        <input type="text" name="reguler_price" class="form-control" id="reguler_price"
                                            required />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="discount_price" class="form-label">Discount Price (Optional)</label>
                                        <input type="text" name="discount_price" class="form-control"
                                            id="discount_price" />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <div class="form-group" id="color">
                                            <label for="color_name" class="form-label">Product Color (Optional)</label>
                                            <div class="row">
                                                <div class="col-6 ms-4 p-0">
                                                    <input type="text" name="color_name[]" class="form-control"
                                                        id="color_name" />
                                                </div>
                                                <div class="col-5 ms-1 p-0">
                                                    <button type="button" class="btn btn-primary" id="color_add">Add
                                                        More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 mb-3" id="size">
                                        <label for="size_name" class="form-label">Product Size (Optional)</label>
                                        <div class="row">
                                            <div class="col-6 ms-4 p-0">
                                                <input type="text" name="size_name[]" class="form-control"
                                                    id="size_name" />
                                            </div>
                                            <div class="col-5 ms-1 p-0">
                                                <button type="button" class="btn btn-primary" id="size_add">Add
                                                    More</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="description" class="form-label">Product Description</label>
                                        <textarea name="description" class="form-control" id="summernote" required></textarea>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="p_policy" class="form-label">Product Policy</label>
                                        <textarea name="p_policy" class="form-control" id="summernote1" required></textarea>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label class="input-group-text" for="image">Upload Main Image</label>
                                        <input type="file" accept="image/*" name="image" class="form-control"
                                            id="image" required />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label class="input-group-text" for="gal_image">Upload Gallery Image</label>
                                        <input type="file" name="gal_image[]" accept="image/*" class="form-control"
                                            id="gal_image" multiple />
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Quick Example-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote1').summernote();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#color_add').click(function() {
                $('#color').append(
                    '<div class="row"><div class="col-6 ms-4 mt-2 p-0"><input type="text" name="color_name[]" class="form-control" id="color_name" /></div><div class="col-5 ms-1 mt-2 p-0"><button type="button" class="btn btn-danger" id="remove">Remove</button></div></div>'
                    )
            });
        });
        $(document).on('click', '#remove', function() {
            $(this).closest('.row').remove();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#size_add').click(function() {
                $('#size').append(
                    '<div class="row"><div class="col-6 ms-4 mt-2 p-0"><input type="text" name="size_name[]" class="form-control" id="size_name" /></div><div class="col-5 ms-1 mt-2 p-0"><button type="button" class="btn btn-danger" id="removesize">Remove</button></div></div>'
                    )
            });
        });
        $(document).on('click', '#removesize', function() {
            $(this).closest('.row').remove();
        });
    </script>
@endpush
