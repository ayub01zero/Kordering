<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kordering website</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/bloger.png')}}" rel="icon">
  <link href="{{asset('assets/img/bloger.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">


</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="{{route('dashboard')}}">K<span>ordering</span></a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{url('/')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('about.us')}}">About us</a></li>
          <li><a class="nav-link scrollto" href="{{url('/brands')}}">Brands</a></li>
          @auth
          <li class="dropdown">
            <a href="#"><span>Shop</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{url('/add/order')}}">Add Order</a></li>
              <li>
                @if(session()->has('cart'))
                <a href="{{url('/cart')}}">Cart 
                  @php
                  $cartCount = count(session('cart'));
                  @endphp
                  @if($cartCount > 0)
                  {{$cartCount}}
                  @endif
                </a>
                @else
                <a href="{{url('/cart')}}">Cart</a>
                @endif
              </li>
              <li><a href="{{route('orders.all')}}">Orders</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{url('/user/profile')}}">Profile</a></li>
          <li><a class="nav-link scrollto" href="{{route('logout.auth')}}">Logout</a></li>
          @endauth
          @guest
          <li><a class="nav-link scrollto" href="{{url('/login')}}">Login</a></li>
          @endguest
          <!-- Currency Dropdown -->
          <li>
            <div class="input-group">
              <select class="form-select shadow-none border-0" name="currency" id="currency">
                <option value="usd">USD</option>
                <option value="iraq">IQD</option>
                <!-- Add more options for other currencies as needed -->
              </select>
            </div>
          </li>
          <!-- End Currency Dropdown -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->
  

  <!-- ======= Hero Section ======= -->
  @if(request()->url() != route('add.order'))
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>Kordering</span></h1>
      <h2>we are as a team work with customer to shipping thier product</h2>
      <h2>we are as a team work with customer to shipping thier product</h2>
      <div class="d-flex">
        <a href="{{ route('add.order') }}" class="btn-get-started scrollto">Get Started</a>
      </div>
    </div>
  </section><!-- End Hero -->
  @endif
  <main id="main">
<style>
  
</style>
