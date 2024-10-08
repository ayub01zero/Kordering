@extends('frontend.frontbody.body')
@section('interface')

<section id="featured-services" class="featured-services">
    <div class="container" data-aos="fade-up">

        <div class="text-center">
      <div class="row">
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4 class="title"><a href="">Fast</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4 class="title"><a href="">All Brands</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">safe items</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4 class="title"><a href="">Order in anywhere</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
          </div>
        </div>
      </div>

    </div>
    </div>
  </section><!-- End Featured Services Section -->







 <!-- ======= Portfolio Section ======= -->
 
 <section id="portfolio" class="portfolio">
  <div class="container">

    <div class="section-title">

      <h2>Portfolio</h2>
      <p>see all brands in our application and enjoy it </p>
    </div>


    <div class="row portfolio-container">
      @foreach ($items as $item)
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
          <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>{{ $item->name }}</h4>
            <p>{{ $item->description }}</p>
            <div class="portfolio-links">
              <a href="{{ $item->url }}"><i class="fa-solid fa-link"></i></a>
              {{-- <a href="portfolio-details.html" title="More Details"><i class="ri-links-fill"></i></a> --}}
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section><!-- End Portfolio Section -->







  <section id="clients" class="clients section-bg">
    <div class="container" data-aos="zoom-in">

      <div class="row">

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
        </div>

        <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
          <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
        </div>

      </div>

    </div>
  </section><!-- End Clients Section -->


 
  

@endsection
