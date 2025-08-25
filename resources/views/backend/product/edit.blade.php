@extends('backend.master')
@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Product</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
                            <div class="card-title">Edit Product Data</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form action="{{ url('/product/update/' . $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 mb-3">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" value="{{ $product->name }}" name="name"
                                            class="form-control" id="name" required />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="code" class="form-label">Product Code</label>
                                        <input type="text" value="{{ $product->code }}" name="code"
                                            class="form-control" id="code" required />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="cat_id" class="form-label">Category</label>
                                        <select name="cat_id" class="form-control" id="cat_id" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($product->cat_id == $category->id) selected @endif>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="sub_cat_id" class="form-label">Sub Category</label>
                                        <select name="sub_cat_id" class="form-control" id="sub_cat_id">
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}"
                                                    @if ($product->sub_cat_id == $subCategory->id) selected @endif>
                                                    {{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="type" class="form-label">Product Type</label>
                                        <select name="type" class="form-control" id="type" required>
                                            <option value="hot" @if ($product->type == 'hot') selected @endif>Hot
                                                Product</option>
                                            <option value="new" @if ($product->type == 'new') selected @endif>New
                                                Product</option>
                                            <option value="reguler" @if ($product->type == 'reguler') selected @endif>
                                                Reguler Product</option>
                                            <option value="discount" @if ($product->type == 'discount') selected @endif>
                                                Discount Product</option>
                                        </select>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="qty" class="form-label">Product Quentity</label>
                                        <input type="text" value="{{ $product->qty }}" name="qty"
                                            class="form-control" id="qty" required />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="buying_price" class="form-label">Buying Price</label>
                                        <input type="text" value="{{ $product->buying_price }}" name="buying_price"
                                            class="form-control" id="buying_price" required />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="reguler_price" class="form-label">Reguler Price</label>
                                        <input type="text" value="{{ $product->reguler_price }}" name="reguler_price"
                                            class="form-control" id="reguler_price" required />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="discount_price" class="form-label">Discount Price (Optional)</label>
                                        <input type="text" value="{{ $product->discount_price }}" name="discount_price"
                                            class="form-control" id="discount_price" />
                                    </div>
                                    <div class="col-3 mb-3">
                                        <div class="form-group" id="color">
                                            <label for="color_name" class="form-label">Product Color (Optional)</label>
                                            <div class="row">
                                                @if ($product->color && count($product->color) > 0)
                                                    <div class="col-6 ms-4 p-0">
                                                        @foreach ($product->color as $color)
                                                            <div class="position-relative">
                                                                <input type="text" value="{{ $color->color_name }}"
                                                                    class="form-control mb-2 pe-5" name="color_name[]"
                                                                    id="color_name" />
                                                                <a
                                                                    href="{{ url('/product/color/delete/' . $color->id) }}">
                                                                    <button type="button"
                                                                        class="btn btn-danger position-absolute end-0 top-50 translate-middle-y me-2 p-0 bg-transparent text-danger">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="col-6 ms-4 p-0">
                                                        <input type="text" name="color_name[]" class="form-control"
                                                            id="color_name" />
                                                    </div>
                                                @endif
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
                                            @if ($product->size && count($product->size) > 0)
                                                <div class="col-6 ms-4 p-0">
                                                    @foreach ($product->size as $size)
                                                        <div class="position-relative">
                                                            <input type="text" value="{{ $size->size_name }}"
                                                                class="form-control mb-2 pe-5" name="size_name[]"
                                                                id="size_name" />
                                                            <a href="{{ url('/product/size/delete/' . $size->id) }}">
                                                                <button type="button"
                                                                    class="btn btn-danger position-absolute end-0 top-50 translate-middle-y me-2 p-0 bg-transparent text-danger">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="col-6 ms-4 p-0">
                                                    <input type="text" name="size_name[]" class="form-control"
                                                        id="size_name" />
                                                </div>
                                            @endif
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

                                    <div class="col-12 mb-3">
                                        <label class="input-group-text" for="image">Upload Main Image</label>
                                        <input type="file" accept="image/*" name="image" class="form-control"
                                            id="image" />
                                        <img src="{{ asset('backend/images/product/' . $product->image) }}"
                                            class="mt-2" height="55px" width="65px">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="input-group-text" for="gal_image">Upload Gallery Image</label>
                                        <input type="file" name="gal_image[]" accept="image/*"
                                            class="form-control mb-2" id="gal_image" multiple />
                                        @foreach ($product->galleryImage as $galimage)
                                            <div class="position-relative d-inline-block">
                                                <img src="{{ asset('backend/images/galleryimage/' . $galimage->gal_images) }}"
                                                    class="mt-2" height="55px" width="65px">
                                                <a href="{{ url('/product/galleryimage/delete/' . $galimage->id) }}">
                                                    <button type="button"
                                                        class="btn position-absolute top-0 end-0 m-1 p-1 bg-transparent text-danger">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
            // First initialize empty
            $('#summernote').summernote({
                height: 200,
                callbacks: {
                    onInit: function() {
                        $('#summernote').summernote('code', {!! json_encode($product->description) !!});
                    }
                }
            });

            $('#summernote1').summernote({
                height: 200,
                callbacks: {
                    onInit: function() {
                        $('#summernote1').summernote('code', {!! json_encode($product->p_policy) !!});
                    }
                }
            });
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
