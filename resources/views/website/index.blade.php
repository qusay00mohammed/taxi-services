@extends('layouts.master_website')

@section('title', 'Sam Taxi Service')


@section('content')

  <!-- Carousel Start -->
  <div class="container-fluid p-0" style="margin-bottom: 15px;">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="margin-top: -10px">
            <div class="carousel-item active">
                <img class=" w-100 " src="{{ asset('website/img/carousel-1.jpeg') }}" alt="Image" style="max-height: 520px;">
                <div class="carousel-caption d-flex flex-column pt-0 align-items-center justify-content-center" style="margin-top: 70px;">
                    <div class="mt-5" style="max-width: 900px;">
                        <!-- <h4 class="text-white text-uppercase mt-5 mb-md-3 title_home">Rent A Car</h4>
                        <h1 class=" text-white mb-md-4 title_home title_home_font"><span style="color: #F77D0A;">Best</span> Rental Cars In
                            <br> Your Location</h1> -->
                        <a href="{{ route('booking') }}" class="btn btn-primary py-md-3 px-md-5 mt-5 btn_home">Booking</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100 h-100" src="{{ asset('website/img/carousel-2.jpeg') }}" alt="Image" style="max-height: 520px;">
                <div class="carousel-caption d-flex flex-column pt-0 align-items-center justify-content-center" style="margin-top: 70px;">
                    <div class="mt-5" style="max-width: 900px;">
                        <!-- <h4 class="text-white text-uppercase mb-md-3">Rent A Car</h4>
                        <h1 class=" text-white mb-md-4 title_home_font"><span style="color: #F77D0A;">Quality</span> Cars with
                          <br>  Unlimited Miles</h1> -->
                        <a href="{{ route('booking') }}" class="btn btn-primary py-md-3 px-md-5 mt-5">Booking</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100 h-100" src="{{ asset('website/img/carousel-3.jpeg') }}" alt="Image" style="max-height: 520px;">
                <div class="carousel-caption d-flex flex-column pt-0 align-items-center justify-content-center" style="margin-top: 70px;">
                    <div class="mt-5" style="max-width: 900px;">
                        <!-- <h4 class="text-white text-uppercase mb-md-3">Rent A Car</h4>
                        <h1 class=" text-white mb-md-4 title_home_font"><span style="color: #F77D0A;">Quality</span> Cars with
                          <br>  Unlimited Miles</h1> -->
                        <a href="{{ route('booking') }}" class="btn btn-primary py-md-3 px-md-5 mt-5">Booking</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100 h-100" src="{{ asset('website/img/carousel-4.jpeg') }}" alt="Image" style="max-height: 520px;">
                <div class="carousel-caption d-flex flex-column pt-0 align-items-center justify-content-center" style="margin-top: 70px;">
                    <div class="mt-5" style="max-width: 900px;">
                        <!-- <h4 class="text-white text-uppercase mb-md-3">Rent A Car</h4>
                        <h1 class=" text-white mb-md-4 title_home_font"><span style="color: #F77D0A;">Quality</span> Cars with
                          <br>  Unlimited Miles</h1> -->
                        <a href="{{ route('booking') }}" class="btn btn-primary py-md-3 px-md-5 mt-5">Booking</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
</div>
<!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid " id="about">
        <div class="container pt-1 pb-3">
            {{-- <h1 class="display-1 text-primary text-center number_section">01</h1> --}}
            <h1 class="display-4 text-uppercase text-center mb-0 title_section">About Us</h1>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <!--<img class="  img-about" src="{{ asset('website/img/about.png') }}" alt="image aboute">-->
                    <br><br>
                    <h3 class="title_abote">SAM  TAXI  service  PROFESSIONAL TRANSPORTATION SERVICES</h3>
                    <h4 style="color: #F77D0A;">Any time any where from/to buffalo </h4>
                    <p class="description_about">At Sam taxi service, we offer quality corporate and private transportation services across the entire buffalo ny, and Canada area at reasonable prices. We know that in today’s world, time is money. That’s why we promise to get you wherever you’re going on time, every time. Sam  taxi service has been providing top-notch transportation services to the local area since 2018.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Rent A Car Start -->
    <div class="container-fluid " id="All_Cars">
        <div class="container pt-3 pb-3">
            {{-- <h1 class="display-1 text-primary text-center number_section">02</h1> --}}
            <h1 class="display-4 text-uppercase text-center mb-5 title_section">Cars</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4 item_cars_left">
                        <img class="img-fluid mb-4" src="{{ asset('website/img/car-rent-1.png') }}" alt="image car">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item active mb-4 item_cars_b">
                        <img class="img-fluid mb-4" src="{{ asset('website/img/car-rent-3.png') }}" alt="image car">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4 item_cars_right">
                        <img class="img-fluid mb-4" src="{{ asset('website/img/car-rent-2.png') }}" alt="image car">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4 item_cars_left">
                        <img class="img-fluid mb-4" src="{{ asset('website/img/car-rent-1.png') }}" alt="image car">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <!--<div class="rent-item mb-4 item_cars_b">-->
                        <!--<img class="img-fluid mb-4" src="{{ asset('website/img/car-rent-4.png') }}" alt="image car">-->
                    <!--</div>-->
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4 item_cars_right">
                        <img class="img-fluid mb-4" src="{{ asset('website/img/car-rent-2.png') }}" alt="image car">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rent A Car End -->






@endsection
