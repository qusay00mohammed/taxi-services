<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>@yield('title', 'unknown')</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="author" content="Qusay Alkahlout">

  <!-- Favicon -->
  <!-- <link href="{{ asset('website/img/logo/logologo.ico') }}" rel="icon"> -->

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap"
    rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="{{ asset('website/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('website/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">

    @yield('cssjs')

  <!-- Template Stylesheet -->
  <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">
  <style>
    @media print {
      #print_button {
        display: none;
      }
    }
  </style>

  <!-- ScrollReveal -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <script>
    ScrollReveal({
      reset: true
    });
  </script>
</head>


<body>
  <!-- Topbar Start -->
  <div class="container-fluid  px-lg-5 d-sm-block d-lg-block social_sec">
    <div class="row">
      <div class="col-md-12 text-center  mb-2 mb-lg-0 test_2">
        <div class="allitem">
          <div class="items">
            <div class="d-inline-flex align-items-center social_left">
              <a class="phone pr-3" href="https://wa.me/+970597778496"><i class="fa fa-phone-alt mr-2"> :</i>+1 (***)
                907-****</a>
              <span class="text-body"> | </span>
            </div>
            <div class="d-inline-flex align-items-center social_right">
              <a class="icon_facebook px-3"
                href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a class="icon_instagram px-3">
                <i class="fab fa-instagram"></i>
              </a>
              <a class="icon_twitter px-3">
                <i class="fab fa-twitter"></i>
              </a>
              <a class="icon_youtube pl-3">
                <i class="fab fa-youtube"></i>
              </a>
              <a class="icon_linkedin px-3">
                &nbsp; <i class="fab fa-linkedin-in"></i>
              </a>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Topbar End -->


  <!-- Navbar Start -->
  <div class="container-fluid position-relative nav-bar p-0">
    <div class="position-relative " style="z-index: 9;">
      <nav class="navbar navbar-expand-lg bg-secondary navbar-dark  py-lg-0 pl-3 pl-lg-5">
        <a href="{{ route('index') }}" class="navbar-brand ">
          <img src="{{ asset('website/img/logo/LOGO1.ico') }}" alt="image logo" class="img-logo">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between " id="navbarCollapse">
          <div class="navbar-nav ml-auto py-0">
            <a href="{{ route('index') }}" class="nav-item nav-link nav-link-home active ">Home</a>
            <a href="#about" class="nav-item nav-link nav-link-about">About</a>
            <a href="#All_Cars" class="nav-item nav-link nav-link-allcar">All Cars</a>
            <a class="btn btn-primary px-3 nav-link btn_reserve" href="{{ route('booking') }}">Booking</a>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- Navbar End -->





  @yield('content')








  <!-- Footer Start -->
  <div class="container-fluid bg-secondary  px-sm-3 px-md-5" style="margin-top: 90px;">
    <div class="row pt-5">
      <div class="col-lg-4 col-md-4 mb-5">
        <h4 class="text-uppercase text-light mb-4 item_footer">Get In Touch</h4>
        <p class="mb-2 item_footer"><i class="fa fa-map-marker-alt text-white mr-3 "></i>Palestine Gaza</p>
        <p class="mb-2 item_footer"><i class="fa fa-phone-alt text-white mr-3"></i>+1 (***) 907-****</p>
        <p class="item_footer"><i class="fa fa-envelope text-white mr-3 item_footer"></i>info@sparkerx.com</p>
        <h6 class="text-uppercase text-white py-2 item_footer">Follow Us</h6>
        <div class="d-flex justify-content-start">
          <a class="btn btn-lg btn-dark btn-lg-square mr-2 item_footer"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-lg btn-dark btn-lg-square mr-2 item_footer"
            href="https://www.facebook.com/profile.php?id=100090049655832&mibextid=ZbWKwL"><i
              class="fab fa-facebook-f"></i></a>
          <a class="btn btn-lg btn-dark btn-lg-square mr-2 item_footer"><i class="fab fa-linkedin-in"></i></a>
          <a class="btn btn-lg btn-dark btn-lg-square item_footer"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div class="col-lg-5 col-md-5 mb-5">
        <h4 class="text-uppercase text-light mb-4 item_footer">Car Gallery</h4>
        <div class="row mx-n1">
          <div class="col-4 px-1 mb-2 item_footer">
            <a><img class="w-100" src="{{ asset('website/img/gallery-2.png') }}" alt="image cars"></a>
          </div>
          <div class="col-4 px-1 mb-2 item_footer">
            <a><img class="w-100" src="{{ asset('website/img/gallery-4.png') }}" alt="image cars"></a>
          </div>
          <div class="col-4 px-1 mb-2 item_footer">
            <a><img class="w-100" src="{{ asset('website/img/gallery-2.png') }}" alt="image cars"></a>
          </div>
          <div class="col-4 px-1 mb-2 item_footer">
            <a><img class="w-100" src="{{ asset('website/img/gallery-3.png') }}" alt="image cars"></a>
          </div>
          <div class="col-4 px-1 mb-2 item_footer">
            <!--<a><img class="w-100" src="{{ asset('website/img/gallery-1.png') }}" alt="image cars"></a>-->
          </div>
          <div class="col-4 px-1 mb-2 item_footer">
            <a><img class="w-100" src="{{ asset('website/img/gallery-3.png') }}" alt="image cars"></a>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 mb-5">
        <!--<h4 class="text-uppercase text-light mb-4 item_footer_right">Newsletter</h4>-->
        <!--<p class="mb-4 item_footer_right">Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed-->
        <!--  elitr sed kasd et</p>-->
        <!--<div class="w-100 mb-3">-->
        <!--  {{-- <div class="input-group">-->
        <!--    <input type="text" class="form-control bg-dark border-dark item_footer_right" style="padding: 25px;"-->
        <!--      placeholder="Your Email">-->
        <!--    <div class="input-group-append  item_footer_right">-->
        <!--      <button class="btn btn-primary text-uppercase px-3 item_footer_right">Sign Up</button>-->
        <!--    </div>-->
        <!--  </div> --}}-->
        <!--</div>-->
        <!--<i class="item_footer_right">Lorem sit sed elitr sed kasd et</i>-->
      </div>
    </div>
  </div>
  <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
    <p class="mb-2 text-center text-body item_footer">&copy; <a href="#">TAXI SERVICE</a>. All Rights
      Reserved.</p>
    <p class="m-0 text-center text-body item_footer">Designed by <a target="_blank"
        href="https://nsr404.github.io/cv-spark/"> NSR WADI .</a></p>
  </div>
  <!-- Footer End -->
















  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i
      class="fa fa-angle-double-up"></i></a>

      @yield('js')

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('website/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('website/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('website/lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('website/lib/tempusdominus/js/moment.min.js') }}"></script>
  <script src="{{ asset('website/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
  <script src="{{ asset('website/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

  <!-- file Javascript -->
  <script src="{{ asset('website/js/main.js') }}"></script>

</body>






</html>
