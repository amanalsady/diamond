@extends('layouts.base')

@section('body')
    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="assets/images/Diamond.png" alt="Logo">
                        </a> <!-- Logo -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a data-scroll-nav="0" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#product">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#team">Brands</a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="#contact">Contact</a>
                                </li>
                            </ul> <!-- navbar nav -->
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SLIDER PART START ======-->

    <section id="home" class="slider-area pt-100">
        <div class="container-fluid position-relative">
            <div class="slider-active">
                @foreach ($sliders as $slider)
                    <div class="single-slider">
                        <div class="slider-bg">
                            <div class="row no-gutters align-items-center ">
                                <div class="col-lg-4 col-md-5">
                                    <div class="slider-product-image d-none d-md-block">
                                        <img src="{{ $slider->image }}" alt="{{ $slider->title }}">
                                        <div class="slider-discount-tag">
                                            <p>-{{ $slider->disccount }}% <br> OFF</p>
                                        </div>
                                    </div> <!-- slider product image -->
                                </div>
                                <div class="col-lg-8 col-md-7">
                                    <div class="slider-product-content">
                                        <h1 class="slider-title mb-10" data-animation="fadeInUp" data-delay="0.3s">
                                            <span>{{ $slider->title }}</span><span></span>
                                        </h1>
                                        <p class="mb-25" data-animation="fadeInUp" data-delay="0.9s"><br> {{ $slider->description }}</p>
                                        <a class="main-btn" href="#product" data-animation="fadeInUp" data-delay="1.5s">Explore
                                            More <i class="lni-chevron-right"></i></a>
                                    </div> <!-- slider product content -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                    </div> <!-- single slider -->
                @endforeach
            </div> <!-- slider active -->
            <div class="slider-social">
                <div class="row justify-content-end">
                    <div class="col-lg-7 col-md-6">
                        <ul class="social text-right">
                            <!-- <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                            <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                            <li><a href="#"><i class="lni-instagram"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- container fluid -->
    </section>

    <!--====== SLIDER PART ENDS ======-->

    <!--====== DISCOUNT PRODUCT PART START ======-->

    <section id="discount-product" class="discount-product pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-discount-product mt-30">
                        <div class="product-image">
                            <img src="assets/images/discount-product/85878f090d3b4f60acb6747d5550f309.jpg"
                                alt="Product">
                        </div> <!-- product image -->
                        <div class="product-content">
                            <h4 class="content-title mb-15">High-quality clothes <br> For your outfit</h4>
                        </div> <!-- product content -->
                    </div> <!-- single discount product -->
                </div>
                <div class="col-lg-6">
                    <div class="single-discount-product mt-30">
                        <div class="product-image">
                            <img src="assets/images/discount-product/de727cf35f4cb3a5c489920cdb5e4a72.jpg"
                                alt="Product">
                        </div> <!-- product image -->
                        <div class="product-content">
                            <h4 class="content-title mb-15">Hot Offer <br> Discount up to 80%</h4>
                        </div> <!-- product content -->
                    </div> <!-- single discount product -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== DISCOUNT PRODUCT PART ENDS ======-->

    <!--====== PRODUCT PART START ======-->

    <section id="product" class="product-area pt-100 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="collection-menu text-center mt-30">
                        <h4 class="collection-tilte">OUR COLLECTION</h4>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            @foreach ($brands as $brand)
                                <a id="v-pills-{{ $brand->id }}-tab" data-toggle="pill" href="#v-pills-{{ $brand->id }}"
                                role="tab" aria-controls="v-pills-{{ $brand->id }}" aria-selected="false">{{ $brand->name }}</a>
                            @endforeach
                        </div>
                        <!-- nav -->
                    </div> <!-- collection menu -->
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($brands as $brand)
                        <div class="tab-pane fade show" id="v-pills-{{ $brand->id }}" role="tabpanel"
                            aria-labelledby="v-pills-{{ $brand->id }}-tab">
                            <div class="product-items mt-30">
                                <div class="row product-items-active">
                                    @foreach ($brand->products as $product)
                                        <div class="col-md-4">
                                            <div class="single-product-items">
                                                <div class="product-item-image">
                                                    <a href="#"><img src="{{ $product->image }}"
                                                            alt="{{ $product->name }}"></a>
                                                    <div class="product-discount-tag">
                                                        <p>-{{ $product->disccount }}%</p>
                                                    </div>
                                                </div>
                                                <div class="product-item-content text-center mt-30">
                                                    <h5 class="product-title"><a href="#">{{ $product->name }}</a></h5>
                                                    <h5 class=""><span>Disccount Code: {{ $product->code }}</span></h5>
                                                    <span class="regular-price">${{ $product->final_price }}</span>
                                                    <span class="discount-price">${{ $product->price }}</span>
                                                </div>
                                            </div> <!-- single product items -->
                                        </div>
                                    @endforeach
                                </div> <!-- row -->
                            </div> <!-- product items -->
                        </div> <!-- tab pane -->
                        @endforeach
                    </div> <!-- tab content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== TEAM PART START ======-->

    <section id="team" class="team-area pt-125 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-25">
                        <h3 class="title mb-15">Our Brands</h3>
                        <p>We are working to improve user experience
                            And to provide you with some assistance and services that may benefit you in our mall, while
                            participating with the best brands.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                @foreach ($brands as $brand)
                    <div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="single-temp text-center mt-30">
                            <div class="team-image">
                                <img src="{{ $brand->image }}" alt="{{ $brand->name }}">
                            </div>
                            <div class="team-content mt-30">
                                <h4 class="title mb-10"><a href="#">{{ $brand->name }}</a></h4>
                                <span>Follow us</span>
                                <ul class="social mt-15">
                                    <li><a href="{{ $brand->facebook }}"><i
                                                class="lni-facebook-filled"></i></a></li>
                                    <li><a href="{{ $brand->twitter }}"><i class="lni-twitter-original"></i></a></li>
                                    <li><a href="{{ $brand->instagram }}"><i class="lni-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- single temp -->
                    </div>
                @endforeach
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--======  BLOG PART ENDS ======-->

    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-title text-center">
                        <h2 class="title">Get In Touch</h2>
                    </div> <!-- contact title -->
                </div>
            </div> <!-- row -->
            <div class="contact-box mt-70">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact-info pt-25">
                            <h4 class="info-title">Contact Info</h4>
                            <ul>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-phone-handset"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>+963 962470457</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>amansady6@gmail.com</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                                <li>
                                    <div class="single-info mt-30">
                                        <div class="info-icon">
                                            <i class="lni-home"></i>
                                        </div>
                                        <div class="info-content">
                                            <p>Damascus Mazzh DTc-unrwa</p>
                                        </div>
                                    </div> <!-- single info -->
                                </li>
                            </ul>
                        </div> <!-- contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact box -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    <section id="footer" class="footer-area">
        <div class="container">
            <div class="footer-widget pt-75 pb-120">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-sm-7">
                        <div class="footer-logo mt-40">
                            <a href="#">
                                <img src="assets/images/Diamond.png" alt="Logo">
                            </a>
                            <p class="mt-10">This advertisement appeared to you on our device.</p>
                        </div> <!-- footer logo -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-5">


                        <div class="footer-link mt-50">
                            <h5 class="f-title">our Project</h5>
                            <a href="#">
                                <img src="assets/images/DiamondPic.png" alt="Logo" style="height: 130px; width: 130px;">
                            </a>
                        </div>
                        <!-- footer link  -->
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-5">
                        <div class="footer-link mt-50">
                            <h5 class="f-title">BRANDS</h5>
                            <ul>
                                @foreach ($brands as $brand)
                                    <li><a href="{{ $brand->facebook }}">{{ $brand->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- <div class="footer-link mt-50">
                            <h5 class="f-title">Help</h5>
                            <ul>
                                <li><a href="#">Forum</a></li>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div> -->
                        <!-- footer link -->
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-7">
                        <div class="footer-info mt-50">
                            <h5 class="f-title">Contact Info</h5>
                            <ul>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>Phone :</span>
                                        <div class="footer-info-content">
                                            <p>+963 962470457</p>
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>Email :</span>
                                        <div class="footer-info-content">
                                            <p>amandev@gmail.com</p>
                                            <p>yaramasria@gmail.com</p>
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                                <li>
                                    <div class="single-footer-info mt-20">
                                        <span>Address :</span>
                                        <div class="footer-info-content">
                                            <p>Damascus Mazzh DTC-unrwa</p>
                                        </div>
                                    </div> <!-- single footer info -->
                                </li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <!-- <div class="footer-copyright pt-15 pb-15">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p>Crafted by <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                        </div>  -->
            <!-- copyright -->
            <!-- </div>
                </div>  -->
            <!-- row -->
            <!-- </div>  -->
            <!-- footer copyright -->
        </div> <!-- container -->
    </section>

    <!--====== FOOTER PART ENDS ======-->
@endsection