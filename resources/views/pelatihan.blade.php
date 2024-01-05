@extends('layoutsF.master')

@section('content')
<header class="site-header section-padding d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row">

            <div class="col-lg-10 col-12">
                <h1>
                    <span class="d-block text-primary">Choose your</span>
                    <span class="d-block text-dark">favorite stuffs</span>
                </h1>
            </div>
        </div>
    </div>
</header>

<section class="products section-padding">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h2 class="mb-5">New Arrivals</h2>
            </div>

            <div class="col-lg-4 col-12 mb-3">
                <div class="product-thumb">
                    <a href="product-detail.html">
                        <img src="{{ asset('depan/images/product/evan-mcdougall-qnh1odlqOmk-unsplash.jpeg') }}" class="img-fluid product-image" alt="">
                    </a>

                    <div class="product-top d-flex">
                        <span class="product-alert me-auto">New Arrival</span>

                        <a href="#" class="bi-heart-fill product-icon"></a>
                    </div>

                    <div class="product-info d-flex">
                        <div>
                            <h5 class="product-title mb-0">
                                <a href="product-detail.html" class="product-title-link">Tree pot</a>
                            </h5>

                            <p class="product-p">Original package design from house</p>
                        </div>

                        <small class="product-price text-muted ms-auto">Kouta : 60</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 mb-3">
                <div class="product-thumb">
                    <a href="product-detail.html">
                        <img src="{{ asset('depan/images/product/jordan-nix-CkCUvwMXAac-unsplash.jpeg') }}" class="img-fluid product-image" alt="">
                    </a>

                    <div class="product-top d-flex">
                        <span class="product-alert">Discounted Price</span>

                        <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                    </div>

                    <div class="product-info d-flex">
                        <div>
                            <h5 class="product-title mb-0">
                                <a href="product-detail.html" class="product-title-link">Fashion set</a>
                            </h5>

                            <p class="product-p">Costume package</p>
                        </div>

                        <small class="product-price text-muted ms-auto">$35</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12">
                <div class="product-thumb">
                    <a href="product-detail.html">
                        <img src="{{ asset('depan/images/product/nature-zen-3Dn1BZZv3m8-unsplash.jpeg') }}" class="img-fluid product-image" alt="">
                    </a>

                    <div class="product-top d-flex">
                        <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                    </div>

                    <div class="product-info d-flex">
                        <div>
                            <h5 class="product-title mb-0">
                                <a href="product-detail.html" class="product-title-link">Juice Drinks</a>
                            </h5>

                            <p class="product-p">Nature made another world</p>
                        </div>

                        <small class="product-price text-muted ms-auto">$45</small>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <h2 class="mb-5">Popular</h2>
            </div>

            <div class="col-lg-4 col-12 mb-3">
                <div class="product-thumb">
                    <a href="product-detail.html">
                        <img src="{{ asset('depan/images/product/team-fredi-8HRKoay8VJE-unsplash.jpeg') }}" class="img-fluid product-image" alt="">
                    </a>

                    <div class="product-top d-flex">
                        <span class="product-alert">Trending</span>

                        <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                    </div>

                    <div class="product-info d-flex">
                        <div>
                            <h5 class="product-title mb-0">
                                <a href="product-detail.html" class="product-title-link">Package</a>
                            </h5>

                            <p class="product-p">Original package design from house</p>
                        </div>

                        <small class="product-price text-muted ms-auto">$50</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 mb-3">
                <div class="product-thumb">
                    <a href="product-detail.html">
                        <img src="{{ asset('depan/images/product/quokkabottles-kFc1_G1GvKA-unsplash.jpeg') }}" class="img-fluid product-image" alt="">
                    </a>

                    <div class="product-top d-flex">
                        <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                    </div>

                    <div class="product-info d-flex">
                        <div>
                            <h5 class="product-title mb-0">
                                <a href="product-detail.html" class="product-title-link">Bottle</a>
                            </h5>

                            <p class="product-p">Package design</p>
                        </div>

                        <small class="product-price text-muted ms-auto">$100</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 mb-3">
                <div class="product-thumb">
                    <a href="product-detail.html">
                        <img src="{{ asset('depan/images/product/anis-m-WnVrO-DvxcE-unsplash.jpeg') }}" class="img-fluid product-image" alt="">
                    </a>

                    <div class="product-top d-flex">
                        <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                    </div>

                    <div class="product-info d-flex">
                        <div>
                            <h5 class="product-title mb-0">
                                <a href="product-detail.html" class="product-title-link">Medicine</a>
                            </h5>

                            <p class="product-p">Original design from house</p>
                        </div>

                        <small class="product-price text-muted ms-auto">$200</small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection