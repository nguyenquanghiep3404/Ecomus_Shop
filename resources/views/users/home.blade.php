@extends('users.layouts.main')

@section('title')
    @parent
    Trang chủ
@endsection

@push('style')
@endpush



@section('topbar')
    <div class="tf-top-bar bg_white line">
        <div class="px_15 lg-px_40">
            <div class="tf-top-bar_wrap grid-3 gap-30 align-items-center">
                <ul class="tf-top-bar_item tf-social-icon d-flex gap-10">
                    <li><a href="#" class="box-icon w_28 round social-facebook bg_line"><i
                                class="icon fs-12 icon-fb"></i></a></li>
                    <li><a href="#" class="box-icon w_28 round social-twiter bg_line"><i
                                class="icon fs-10 icon-Icon-x"></i></a></li>
                    <li><a href="#" class="box-icon w_28 round social-instagram bg_line"><i
                                class="icon fs-12 icon-instagram"></i></a></li>
                    <li><a href="#" class="box-icon w_28 round social-tiktok bg_line"><i
                                class="icon fs-12 icon-tiktok"></i></a></li>
                    <li><a href="#" class="box-icon w_28 round social-pinterest bg_line"><i
                                class="icon fs-12 icon-pinterest-1"></i></a></li>
                </ul>
                <div class="text-center overflow-hidden">
                    <div dir="ltr" class="swiper tf-sw-top_bar" data-preview="1" data-space="0" data-loop="true"
                        data-speed="1000" data-delay="2000">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <p class="top-bar-text fw-5">Spring Fashion Sale <a href="shop-default.html"
                                        title="all collection" class="tf-btn btn-line">Shop now<i
                                            class="icon icon-arrow1-top-left"></i></a></p>
                            </div>
                            <div class="swiper-slide">
                                <p class="top-bar-text fw-5">Summer sale discount off 70%</p>
                            </div>
                            <div class="swiper-slide">
                                <p class="top-bar-text fw-5">Time to refresh your wardrobe.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="top-bar-language tf-cur justify-content-end">


                    <div class="tf-currencies">
                        <select class="image-select center style-default type-currencies">
                            <option data-thumbnail="{{ asset('user/assets/images/country/fr.svg') }}">EUR <span>€ |
                                    France</span></option>
                            <option data-thumbnail="{{ asset('user/assets/images/country/de.svg') }}">EUR <span>€ |
                                    Germany</span></option>
                            <option selected data-thumbnail="{{ asset('user/assets/images/country/us.svg') }}">USD <span>$ |
                                    United States</span></option>
                            <option data-thumbnail="{{ asset('user/assets/images/country/vn.svg') }}">VND <span>₫ |
                                    Vietnam</span></option>
                        </select>
                    </div>
                    <div class="tf-languages">
                        <select class="image-select center style-default type-languages">
                            <option>English</option>
                            <option>العربية</option>
                            <option>简体中文</option>
                            <option>اردو</option>
                        </select>
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection



@section('content')
    <!-- Slider -->
    <div class="tf-slideshow slider-home-2 slider-effect-fade position-relative">
        <div dir="ltr" class="swiper tf-sw-slideshow" data-preview="1" data-tablet="1" data-mobile="1"
            data-centered="false" data-space="0" data-loop="true" data-auto-play="true" data-delay="2000" data-speed="1000">
            <div class="swiper-wrapper">
                <div class="swiper-slide" lazy="true">
                    <div class="wrap-slider">
                        <img class="lazyload" data-src="{{ asset('user/assets/images/slider/fashion-slideshow-04.jpg') }}"
                            src="{{ asset('user/assets/images/slider/fashion-slideshow-04.jpg') }}"
                            alt="fashion-slideshow-01">
                        <div class="box-content">
                            <div class="container">
                                <h1 class="fade-item fade-item-1">Summer Style<br>Sensations</h1>
                                <p class="fade-item fade-item-2">Discover the hottest trends and must-have looks</p>
                                <a href="shop-default.html"
                                    class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Shop
                                        collection</span><i class="icon icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" lazy="true">
                    <div class="wrap-slider">
                        <img class="lazyload" data-src="{{ asset('user/assets/images/slider/fashion-slideshow-05.jpg') }}"
                            src="{{ asset('user/assets/images/slider/fashion-slideshow-05.jpg') }}"
                            alt="fashion-slideshow-02">
                        <div class="box-content">
                            <div class="container">
                                <h1 class="fade-item fade-item-1">Youthful<br>Summer style</h1>
                                <p class="fade-item fade-item-2">Discover the hottest trends and must-have looks</p>
                                <a href="shop-default.html"
                                    class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Shop
                                        collection</span><i class="icon icon-arrow-right"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide" lazy="true">
                    <div class="wrap-slider">
                        <img class="lazyload" data-src="{{ asset('user/assets/images/slider/fashion-slideshow-06.jpg') }}"
                            src="{{ asset('user/assets/images/slider/fashion-slideshow-06.jpg') }}"
                            alt="fashion-slideshow-03">
                        <div class="box-content">
                            <div class="container">
                                <h1 class="fade-item fade-item-1">Gentle<br>Summer style</h1>
                                <p class="fade-item fade-item-2">Discover the hottest trends and must-have looks</p>
                                <a href="shop-default.html"
                                    class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Shop
                                        collection</span><i class="icon icon-arrow-right"></i></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-pagination sw-absolute-2">
            <div class="container">
                <div class="sw-dots sw-pagination-slider"></div>
            </div>
        </div>
    </div>
    <!-- /Slider -->
    <!-- Collection -->
    <section class="flat-spacing-8">
        <div class="container-full">
            <div class="masonry-layout">
                <div class="item-1 collection-item large hover-img wow fadeInUp" data-wow-delay="0s">
                    <div class="collection-inner">
                        <a href="shop-women.html" class="collection-image img-style rounded-0">
                            <img class="lazyload"
                                data-src="{{ asset('user/assets/images/collections/collection-21.jpg') }}"
                                src="{{ asset('user/assets/images/collections/collection-21.jpg') }}"
                                alt="collection-img">
                        </a>
                        <div class="collection-content">
                            <a href="shop-women.html" class="tf-btn collection-title hover-icon"><span>Women</span><i
                                    class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item-2 collection-item large hover-img wow fadeInUp" data-wow-delay=".1s">
                    <div class="collection-inner">
                        <a href="shop-default.html" class="collection-image img-style rounded-0">
                            <img class="lazyload"
                                data-src="{{ asset('user/assets/images/collections/collection-22.jpg') }}"
                                src="{{ asset('user/assets/images/collections/collection-22.jpg') }}"
                                alt="collection-img">
                        </a>
                        <div class="collection-content">
                            <a href="shop-default.html" class="tf-btn collection-title hover-icon"><span>Handbag</span><i
                                    class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item-3 collection-item large hover-img wow fadeInUp" data-wow-delay=".2s">
                    <div class="collection-inner">
                        <a href="shop-default.html" class="collection-image img-style rounded-0">
                            <img class="lazyload"
                                data-src="{{ asset('user/assets/images/collections/collection-23.jpg') }}"
                                src="{{ asset('user/assets/images/collections/collection-23.jpg') }}"
                                alt="collection-img">
                        </a>
                        <div class="collection-content">
                            <a href="shop-default.html"
                                class="tf-btn collection-title hover-icon"><span>Accessories</span><i
                                    class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item-4 collection-item large hover-img wow fadeInUp" data-wow-delay="0s">
                    <div class="collection-inner">
                        <a href="shop-men.html" class="collection-image img-style rounded-0">
                            <img class="lazyload"
                                data-src="{{ asset('user/assets/images/collections/collection-24.jpg') }}"
                                src="{{ asset('user/assets/images/collections/collection-24.jpg') }}"
                                alt="collection-img">
                        </a>
                        <div class="collection-content">
                            <a href="shop-men.html" class="tf-btn collection-title hover-icon"><span>Men</span><i
                                    class="icon icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Collection -->
    <!-- Shop Collection -->
    <section class="flat-spacing-4 pt_0">
        <div class="container">
            <div class="tf-grid-layout md-col-2 tf-img-with-text">
                <div class="tf-image-wrap wow fadeInUp" data-wow-delay="0s">
                    <img class="lazyload" data-src="{{ asset('user/assets/images/collections/collection-25.jpg') }}"
                        src="{{ asset('user/assets/images/collections/collection-25.jpg') }}" alt="collection-img">
                </div>
                <div class="tf-content-wrap wow fadeInUp" data-wow-delay="0s">
                    <span class="sub-heading text-uppercase fw-7">SPRING SALE 30% OFF</span>
                    <div class="heading">Effortless <br> Denim Delights</div>
                    <p class="description">Discover the versatility of denim with our collection of jeans, jackets</p>
                    <a href="shop-collection-list.html" class="tf-btn style-2 btn-fill radius-3 animate-hover-btn">Shop
                        collection</a>
                </div>
            </div>
        </div>
    </section>
    <!-- /Shop Collection -->
    <!-- Best seller -->
    <section class="flat-spacing-2 pt_0">
        <div class="container">
            <div class="flat-title flex-row justify-content-between px-0">
                <span class="title wow fadeInUp" data-wow-delay="0s">Best Seller</span>
                <div class="box-sw-navigation">
                    <div class="nav-sw square nav-next-slider nav-next-product"><span
                            class="icon icon-arrow1-left"></span></div>
                    <div class="nav-sw square nav-prev-slider nav-prev-product"><span
                            class="icon icon-arrow1-right"></span></div>
                </div>
            </div>
            <div class="hover-sw-nav hover-sw-2">
                <div dir="ltr" class="swiper tf-sw-product-sell wrap-sw-over" data-preview="4" data-tablet="3"
                    data-mobile="2" data-space-lg="30" data-space-md="15" data-pagination="2" data-pagination-md="3"
                    data-pagination-lg="3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product style-2">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product"
                                            data-src="{{ asset('user/assets/images/products/orange-1.jpg') }}"
                                            src="{{ asset('user/assets/images/products/orange-1.jpg') }}"
                                            alt="image-product">
                                        <img class="lazyload img-hover"
                                            data-src="{{ asset('user/assets/images/products/white-1.jpg') }}"
                                            src="{{ asset('user/assets/images/products/white-1.jpg') }}"
                                            alt="image-product">
                                    </a>
                                    <div class="list-product-btn column-left">
                                        <a href="javascript:void(0);" class="box-icon wishlist bg_white btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                            class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                    </div>
                                    <div class="list-product-btn absolute-3">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add style-2">
                                            <span class="icon icon-bag"></span>
                                            <span class="text">QUICK ADD</span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon quickview style-2">
                                            <span class="icon icon-view"></span>
                                            <span class="text">QUICK VIEW</span>
                                        </a>
                                    </div>
                                    <div class="size-list style-2">
                                        <span>S</span>
                                        <span>M</span>
                                        <span>L</span>
                                        <span>XL</span>
                                    </div>
                                    <div class="on-sale-wrap text-end">
                                        <div class="on-sale-item">-33%</div>
                                    </div>
                                    <div class="countdown-box">
                                        <div class="js-countdown" data-timer="1007500" data-labels="d :,h :,m :,s"></div>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <a href="product-detail.html" class="title link">Ribbed Tank Top</a>
                                    <span class="price">$16.95</span>
                                    <ul class="list-color-product">
                                        <li class="list-color-item color-swatch active">
                                            <span class="tooltip">Orange</span>
                                            <span class="swatch-value bg_orange-3"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/orange-1.jpg') }}"
                                                src="{{ asset('user/assets/images/products/orange-1.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Black</span>
                                            <span class="swatch-value bg_dark"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/black-1.jpg') }}"
                                                src="{{ asset('user/assets/images/products/black-1.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">White</span>
                                            <span class="swatch-value bg_white"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/white-1.jpg') }}"
                                                src="{{ asset('user/assets/images/products/white-1.jpg') }}"
                                                alt="image-product">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product style-2">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product"
                                            data-src="{{ asset('user/assets/images/products/brown.jpg') }}"
                                            src="{{ asset('user/assets/images/products/brown.jpg') }}"
                                            alt="image-product">
                                        <img class="lazyload img-hover"
                                            data-src="{{ asset('user/assets/images/products/purple.jpg') }}"
                                            src="{{ asset('user/assets/images/products/purple.jpg') }}"
                                            alt="image-product">
                                    </a>
                                    <div class="list-product-btn column-left">
                                        <a href="javascript:void(0);" class="box-icon wishlist bg_white btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                            class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                    </div>
                                    <div class="list-product-btn absolute-3">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add style-2">
                                            <span class="icon icon-bag"></span>
                                            <span class="text">QUICK ADD</span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon quickview style-2">
                                            <span class="icon icon-view"></span>
                                            <span class="text">QUICK VIEW</span>
                                        </a>
                                    </div>
                                    <div class="size-list style-2">
                                        <span>S</span>
                                        <span>M</span>
                                        <span>L</span>
                                        <span>XL</span>
                                    </div>

                                </div>
                                <div class="card-product-info">
                                    <a href="product-detail.html" class="title link">Ribbed modal T-shirt</a>
                                    <span class="price">From $18.95</span>
                                    <ul class="list-color-product">
                                        <li class="list-color-item color-swatch active">
                                            <span class="tooltip">Brown</span>
                                            <span class="swatch-value bg_brown"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/brown.jpg') }}"
                                                src="{{ asset('user/assets/images/products/brown.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Light Purple</span>
                                            <span class="swatch-value bg_purple"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/purple.jpg') }}"
                                                src="{{ asset('user/assets/images/products/purple.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Light Green</span>
                                            <span class="swatch-value bg_light_green"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/green.jpg') }}"
                                                src="{{ asset('user/assets/images/products/green.jpg') }}"
                                                alt="image-product">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- product --}}
                        @foreach ($products as $product)
                            <div class="swiper-slide" lazy="true">
                                <div class="card-product style-2">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="product-img">
                                            @if ($product->images->isNotEmpty())
                                                <div class="main-image">
                                                    <img src="{{ asset($product->images[0]->image_url) }}"
                                                        alt="Ảnh chính" class="img-fluid"
                                                        style="max-width: 400px; border-radius: 8px;">
                                                </div>
                                            @endif
                                    </div>
                                    <div class="card-product-info">
                                        <a href="product-detail.html" class="title link">{{ $product->name }}</a>
                                        <span class="price">{{ number_format($product->price, 0, ',', '.') }} VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- end product --}}
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product style-2">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product"
                                            data-src="{{ asset('user/assets/images/products/white-2.jpg') }}"
                                            src="{{ asset('user/assets/images/products/white-2.jpg') }}"
                                            alt="image-product">
                                        <img class="lazyload img-hover"
                                            data-src="{{ asset('user/assets/images/products/pink-1.jpg') }}"
                                            src="{{ asset('user/assets/images/products/pink-1.jpg') }}"
                                            alt="image-product">
                                    </a>
                                    <div class="list-product-btn column-left">
                                        <a href="javascript:void(0);" class="box-icon wishlist bg_white btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                            class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                    </div>
                                    <div class="list-product-btn absolute-3">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add style-2">
                                            <span class="icon icon-bag"></span>
                                            <span class="text">QUICK ADD</span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon quickview style-2">
                                            <span class="icon icon-view"></span>
                                            <span class="text">QUICK VIEW</span>
                                        </a>
                                    </div>
                                    <div class="size-list style-2">
                                        <span>S</span>
                                        <span>M</span>
                                        <span>L</span>
                                        <span>XL</span>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <a href="product-detail.html" class="title link">Oversized Printed T-shirt</a>
                                    <span class="price">$16.95</span>
                                    <ul class="list-color-product">
                                        <li class="list-color-item color-swatch active">
                                            <span class="tooltip">White</span>
                                            <span class="swatch-value bg_white"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/white-2.jpg') }}"
                                                src="{{ asset('user/assets/images/products/white-2.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Pink</span>
                                            <span class="swatch-value bg_purple"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/pink-1.jpg') }}"
                                                src="{{ asset('user/assets/images/products/pink-1.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Black</span>
                                            <span class="swatch-value bg_dark"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/black-2.jpg') }}"
                                                src="{{ asset('user/assets/images/products/black-2.jpg') }}"
                                                alt="image-product">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product style-2">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product"
                                            data-src="{{ asset('user/assets/images/products/light-green-1.jpg') }}"
                                            src="{{ asset('user/assets/images/products/light-green-1.jpg') }}"
                                            alt="image-product">
                                        <img class="lazyload img-hover"
                                            data-src="{{ asset('user/assets/images/products/light-green-2.jpg') }}"
                                            src="{{ asset('user/assets/images/products/light-green-2.jpg') }}"
                                            alt="image-product">
                                    </a>
                                    <div class="list-product-btn column-left">
                                        <a href="javascript:void(0);" class="box-icon wishlist bg_white btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                            class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                    </div>
                                    <div class="list-product-btn absolute-3">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add style-2">
                                            <span class="icon icon-bag"></span>
                                            <span class="text">QUICK ADD</span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon quickview style-2">
                                            <span class="icon icon-view"></span>
                                            <span class="text">QUICK VIEW</span>
                                        </a>
                                    </div>
                                    <div class="size-list style-2">
                                        <span>S</span>
                                        <span>M</span>
                                        <span>L</span>
                                        <span>XL</span>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <a href="#" class="title link">Loose Fit Sweatshirt</a>
                                    <span class="price">$10.00</span>
                                    <ul class="list-color-product">
                                        <li class="list-color-item color-swatch active">
                                            <span class="tooltip">Light Green</span>
                                            <span class="swatch-value bg_light-green"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/light-green-1.jpg') }}"
                                                src="{{ asset('user/assets/images/products/light-green-1.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Black</span>
                                            <span class="swatch-value bg_dark"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/black-3.jpg') }}"
                                                src="{{ asset('user/assets/images/products/black-3.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Blue</span>
                                            <span class="swatch-value bg_blue-2"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/blue.jpg') }}"
                                                src="{{ asset('user/assets/images/products/blue.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Dark Blue</span>
                                            <span class="swatch-value bg_dark-blue"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/dark-blue.jpg') }}"
                                                src="{{ asset('user/assets/images/products/dark-blue.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">White</span>
                                            <span class="swatch-value bg_white"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/white-6.jpg') }}"
                                                src="{{ asset('user/assets/images/products/white-6.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Light Grey</span>
                                            <span class="swatch-value bg_light-grey"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/light-grey.jpg') }}"
                                                src="{{ asset('user/assets/images/products/light-grey.jpg') }}"
                                                alt="image-product">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="card-product style-2">
                                <div class="card-product-wrapper">
                                    <a href="product-detail.html" class="product-img">
                                        <img class="lazyload img-product"
                                            data-src="{{ asset('user/assets/images/products/black-4.jpg') }}"
                                            src="{{ asset('user/assets/images/products/black-4.jpg') }}"
                                            alt="image-product">
                                        <img class="lazyload img-hover"
                                            data-src="{{ asset('user/assets/images/products/black-5.jpg') }}"
                                            src="{{ asset('user/assets/images/products/black-5.jpg') }}"
                                            alt="image-product">
                                    </a>
                                    <div class="list-product-btn column-left">
                                        <a href="javascript:void(0);" class="box-icon wishlist bg_white btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Add to Wishlist</span>
                                            <span class="icon icon-delete"></span>
                                        </a>
                                        <a href="#compare" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft"
                                            class="box-icon bg_white compare btn-icon-action">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Add to Compare</span>
                                            <span class="icon icon-check"></span>
                                        </a>
                                    </div>
                                    <div class="list-product-btn absolute-3">
                                        <a href="#quick_add" data-bs-toggle="modal" class="box-icon quick-add style-2">
                                            <span class="icon icon-bag"></span>
                                            <span class="text">QUICK ADD</span>
                                        </a>
                                        <a href="#quick_view" data-bs-toggle="modal" class="box-icon quickview style-2">
                                            <span class="icon icon-view"></span>
                                            <span class="text">QUICK VIEW</span>
                                        </a>
                                    </div>
                                    <div class="size-list style-2">
                                        <span>S</span>
                                        <span>M</span>
                                        <span>L</span>
                                        <span>XL</span>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <a href="#" class="title link">Regular Fit Oxford Shirt</a>
                                    <span class="price">$10.00</span>
                                    <ul class="list-color-product">
                                        <li class="list-color-item color-swatch active">
                                            <span class="tooltip">Black</span>
                                            <span class="swatch-value bg_dark"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/black-4.jpg') }}"
                                                src="{{ asset('user/assets/images/products/black-4.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Dark Blue</span>
                                            <span class="swatch-value bg_dark-blue"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/dark-blue-2.jpg') }}"
                                                src="{{ asset('user/assets/images/products/dark-blue-2.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Beige</span>
                                            <span class="swatch-value bg_beige"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/beige.jpg') }}"
                                                src="{{ asset('user/assets/images/products/beige.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">Light Blue</span>
                                            <span class="swatch-value bg_light-blue"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/light-blue.jpg') }}"
                                                src="{{ asset('user/assets/images/products/light-blue.jpg') }}"
                                                alt="image-product">
                                        </li>
                                        <li class="list-color-item color-swatch">
                                            <span class="tooltip">White</span>
                                            <span class="swatch-value bg_white"></span>
                                            <img class="lazyload"
                                                data-src="{{ asset('user/assets/images/products/white-7.jpg') }}"
                                                src="{{ asset('user/assets/images/products/white-7.jpg') }}"
                                                alt="image-product">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nav-sw nav-next-slider nav-next-product box-icon w_46 round"><span
                        class="icon icon-arrow-left"></span></div>
                <div class="nav-sw nav-prev-slider nav-prev-product box-icon w_46 round"><span
                        class="icon icon-arrow-right"></span></div>
            </div>
        </div>
    </section>
    <!-- /Best seller -->
    <!-- Banner Collection -->
    <section class="flat-spacing-3 pt_0 line">
        <div class="container-full">
            <div class="wrap-carousel">
                <div dir="ltr" class="swiper tf-sw-collection" data-preview="2" data-tablet="2" data-mobile="1"
                    data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" lazy="true">
                            <div class="banner-gr-item text-center hover-img">
                                <div class="img-style">
                                    <a href="shop-default.html">
                                        <img class="lazyload"
                                            data-src="{{ asset('user/assets/images/shop/file/banner-gr-1.jpg') }}"
                                            src="{{ asset('user/assets/images/shop/file/banner-gr-1.jpg') }}"
                                            alt="banner-collection">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <a href="shop-default.html" class="link">Accessories Galore</a>
                                    </div>
                                    <p>Shop through our latest selection of Fashion</p>
                                    <a href="shop-default.html" class="tf-btn btn-line">Shop Collection<i
                                            class="icon icon-arrow1-top-left"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" lazy="true">
                            <div class="banner-gr-item text-center hover-img">
                                <div class="img-style">
                                    <a href="shop-default.html">
                                        <img class="lazyload"
                                            data-src="{{ asset('user/assets/images/shop/file/banner-gr-2.jpg') }}"
                                            src="{{ asset('user/assets/images/shop/file/banner-gr-2.jpg') }}"
                                            alt="banner-collection">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <a href="shop-default.html" class="link">Statement Pieces</a>
                                    </div>
                                    <p>Shop through our latest selection of Womens</p>
                                    <a href="shop-default.html" class="tf-btn btn-line">Shop Collection<i
                                            class="icon icon-arrow1-top-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-dots style-2 sw-pagination-collection justify-content-center"></div>
            </div>

        </div>
    </section>
    <!-- /Banner Collection -->
    <!-- Store -->
    <section class="flat-spacing-9 pb_0">
        <div class="container">
            <div class="flat-title wow fadeInUp" data-wow-delay="0s">
                <span class="title">Visit our store</span>
            </div>
            <div class="flat-tab-store flat-animate-tab">
                <ul class="widget-tab-2" role="tablist">
                    <li class="nav-tab-item" role="presentation">
                        <a href="#hongkong" class="active" data-bs-toggle="tab">Hongkong</a>
                    </li>
                    <li class="nav-tab-item" role="presentation">
                        <a href="#london" data-bs-toggle="tab">London</a>
                    </li>
                    <li class="nav-tab-item" role="presentation">
                        <a href="#paris" data-bs-toggle="tab">Paris</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="hongkong" role="tabpanel">
                        <div class="widget-card-store align-items-center tf-grid-layout md-col-2">
                            <div class="store-item-info">
                                <h5 class="store-heading">Hongkong Store</h5>
                                <div class="description">
                                    <p>301 Front St WToronto,<br>Ecomus@support.com <br>(08) 8942 1299</p>
                                    <p>Mon - Fri, 8:30am - 10:30pm<br>Saturday, 8:30am - 10:30pm <br>Sunday Closed</p>
                                </div>
                            </div>
                            <div class="store-img">
                                <img class="lazyload"
                                    data-src="{{ asset('user/assets/images/shop/store/ourstore1.png') }}"
                                    src="{{ asset('user/assets/images/shop/store/ourstore1.png') }}" alt="store-img">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="london" role="tabpanel">
                        <div class="widget-card-store align-items-center tf-grid-layout md-col-2">
                            <div class="store-item-info">
                                <h5 class="store-heading">London Store</h5>
                                <div class="description">
                                    <p>301 Front St WToronto,<br>Ecomus@support.com <br>(08) 8942 1299</p>
                                    <p>Mon - Fri, 8:30am - 10:30pm<br>Saturday, 8:30am - 10:30pm <br>Sunday Closed</p>
                                </div>
                            </div>
                            <div class="store-img">
                                <img class="lazyload"
                                    data-src="{{ asset('user/assets/images/shop/store/ourstore2.png') }}"
                                    src="{{ asset('user/assets/images/shop/store/ourstore2.png') }}" alt="store-img">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="paris" role="tabpanel">
                        <div class="widget-card-store align-items-center tf-grid-layout md-col-2">
                            <div class="store-item-info">
                                <h5 class="store-heading">Paris Store</h5>
                                <div class="description">
                                    <p>301 Front St WToronto,<br>Ecomus@support.com <br>(08) 8942 1299</p>
                                    <p>Mon - Fri, 8:30am - 10:30pm<br>Saturday, 8:30am - 10:30pm <br>Sunday Closed</p>
                                </div>
                            </div>
                            <div class="store-img">
                                <img class="lazyload"
                                    data-src="{{ asset('user/assets/images/shop/store/ourstore3.png') }}"
                                    src="{{ asset('user/assets/images/shop/store/ourstore3.png') }}" alt="store-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Store -->
    <!-- Brand -->
    <section class="flat-spacing-1 wow fadeIn" data-wow-delay="0s">
        <div class="container">
            <div class="row-brand">
                <div class="brand-item-v2 hover-img-brand">
                    <img class="lazyload" data-src="{{ asset('user/assets/images/brand/brand-01.png') }}"
                        src="{{ asset('user/assets/images/brand/brand-01.png') }}" alt="image-brand">
                </div>
                <div class="brand-item-v2 hover-img-brand">
                    <img class="lazyload" data-src="{{ asset('user/assets/images/brand/brand-02.png') }}"
                        src="{{ asset('user/assets/images/brand/brand-02.png') }}" alt="image-brand">
                </div>
                <div class="brand-item-v2 hover-img-brand">
                    <img class="lazyload" data-src="{{ asset('user/assets/images/brand/brand-03.png') }}"
                        src="{{ asset('user/assets/images/brand/brand-03.png') }}" alt="image-brand">
                </div>
                <div class="brand-item-v2 hover-img-brand">
                    <img class="lazyload" data-src="{{ asset('user/assets/images/brand/brand-04.png') }}"
                        src="{{ asset('user/assets/images/brand/brand-04.png') }}" alt="image-brand">
                </div>
                <div class="brand-item-v2 hover-img-brand">
                    <img class="lazyload" data-src="{{ asset('user/assets/images/brand/brand-05.png') }}"
                        src="{{ asset('user/assets/images/brand/brand-05.png') }}" alt="image-brand">
                </div>
                <div class="brand-item-v2 hover-img-brand">
                    <img class="lazyload" data-src="{{ asset('user/assets/images/brand/brand-06.png') }}"
                        src="{{ asset('user/assets/images/brand/brand-06.png') }}" alt="image-brand">
                </div>
            </div>
        </div>
    </section>
    <!-- /Brand -->
@endsection

@push('script')
@endpush
