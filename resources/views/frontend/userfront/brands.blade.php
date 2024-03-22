@extends('frontend.frontbody.body')
@section('interface')




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

        {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/girl1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="ri-add-fill"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="ri-links-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/girl2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>App</p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="ri-add-fill"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="ri-links-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 2</h4>
              <p>Card</p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="ri-add-fill"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="ri-links-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/girl3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 2</h4>
              <p>Web</p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="ri-add-fill"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="ri-links-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 3</h4>
              <p>App</p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="ri-add-fill"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="ri-links-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 1</h4>
              <p>Card</p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="ri-add-fill"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="ri-links-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Card 3</h4>
              <p>Card</p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="ri-add-fill"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="ri-links-fill"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <div class="portfolio-links">
                <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="ri-add-fill"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="ri-links-fill"></i></a>
              </div>
            </div>
          </div>
        </div> --}}

      </div>

    </div>
  </section><!-- End Portfolio Section -->

@endsection
