@extends('frontend.master')

@section('content')
    <section class="product-page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-page-header-wrapper">
                                <div class="left-side-box">
                                    <h4 class="title">
                                        {{ ucfirst($type) }} Products
                                    </h4>
                                </div>
                                <div class="right-side-box">
                                    <h4 class="product-qty">
                                        Total Products
                                        <span class="number">{{ $productCount }}</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product__item-outer">
                                    <div class="product__item-image-outer">
                                        <a href="#" class="product__item-image-inner">
                                            <img src="{{ asset('backend/images/product/' . $product->image) }}"
                                                alt="Product Image" />
                                        </a>
                                        <div class="product__item-add-cart-btn-outer">
                                            <a href="#" class="product__item-add-cart-btn-inner">
                                                Add to Cart
                                            </a>
                                        </div>
                                        <div class="product__type-badge-outer">
                                            <span class="product__type-badge-inner">
                                                {{ ucfirst($product->type) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="product__item-info-outer">
                                        <a href="#" class="product__item-name">
                                            {{ $product->name }}
                                        </a>
                                        <div class="product__item-price-outer">
                                            @if ($product->discount_price != null)
                                                <div class="product__item-discount-price">
                                                    <del>{{ $product->reguler_price }} Tk.</del>
                                                </div>
                                                <div class="product__item-regular-price">
                                                    <span>{{ $product->discount_price }} Tk.</span>
                                                </div>
                                            @else
                                                <div class="product__item-regular-price">
                                                    <span>{{ $product->reguler_price }} Tk.</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
