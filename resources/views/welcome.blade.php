@extends('layout')
@section('content') 

          <div class="content" id="sechome">
           
            <h1>Get Your Perfect Workout With The Perfect <span class="cl-bv">Trainers</span></h1><br><br>
          </div>
    
  <section id="programs">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <h1><b>Training Programs We Offer</b></h1>
      </div>
      <div class="col-lg-3 col-md-6 left-most">
        <h3>Yoga</h3>
        <p>Enjoy yoga classes for all levels, body elastic, body weight workouts, barre, pilates, and more.</p>
      </div>
      <div class="col-lg-3 col-md-6 center">
        <h3>Muscles</h3>
        <p>Regular strength training improves the health of your bones, muscles, and connective tissue.</p>
      </div>
      <div class="col-lg-3 col-md-6 right-most">
        <h3>Fitness</h3>
        <p>Your trainer will prepare and show you a workout regime designed to meet your fitness level and goals.
        </p>
      </div>
    </div>
  </section>

  <section id="about">
    <div class="row">
      <div class="col-lg-6 healthinsurenece">
        <img  src="{{ asset('images/gymboy.jpg') }}" alt="">
      </div>
      <div class="col-lg-6">
        <div class="content">
          <h4 class="cl-bv">About Fitney</h4>
          <h1><b>Body Fit Routine for Health Investment</b></h1>
          <p>Your body will love you and hate you at the same time because of the energy you put into making your body feel fitter, healthier, and lighter. Become healthier.</p>
          <button class="btn btn-dark">Learn More</button>
        </div>
      </div>
    </div>
  </section>


 
  <div class="container-xxl py-5">
    <div class="container py-5">
        <div class="testimonial-text g-5">
            <div class="wow fadeIn" data-wow-delay="0.1s">
                <button class="btn btn-sm border rounded-pill  px-3 mb-3">Testimonial</button>
                <h1 class="mb-4">LambdaTest Reviews</h1>
                    <p class="mb-4">Our Unified Testing Cloud enables you to deliver world class digital experience with quality releases and help accelerate your release velocity.</p>
                    <a class="btn contactbtn rounded-pill px-4" href="#">Contact Sales</a>
            </div>
        <!-- </section>End of Testimonial Here -->

      <section class="carousel-landmark wow fadeIn" data-wow-delay="0.5s">
        <div id="carouselExampleCaptions" class="carousel slide testimonial-carousel border-start ">
          <!-- <section>
            <div class="control-bar"></div>
        </section> -->
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner"><!--The Carousel Container-->
              <div class="carousel-item carousel-item-1 active"><!--The Carousel item 1-->
                        <div class="testimonial-item ps-5">
                            <i class="fa fa-quote-left fa-2x  mb-3"></i>
                            <p class=" textimal-text">Super top notch customer support from <em>@lambdatesting</em> - just throwing it out there if you're looking for a decent browser testing platform, they get my full double thumbs up. Thumbs upThumbs up</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="https://user-images.githubusercontent.com/78242022/266013790-4d674d96-a311-47c3-9b7c-03feaa36c948.png"
                                    style="width: 60px; height: 60px;">
                                <div class="ps-3">
                                    <h5 class="mb-1">Ben Pritchard</h5>
                                    <span class="at">@yesiamben</span>
                                </div>
                            </div>
                        </div>
                    </div>

            <!-- Carousel Item 2 -->
            <div class="carousel-item carousel-item-2">
                        <div class="testimonial-item ps-5">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                            <p class=" textimal-text"><em>@lambdatesting</em> is fantastic. Cross browser and device testingtesting frustration is minimized. You can’t get rid of clients that need ie11 nor can you own every device but lambda test bridge that gap.</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="https://user-images.githubusercontent.com/78242022/266013776-40ac50f1-31f8-4250-acb2-05f16d683baa.png"
                                    style="width: 60px; height: 60px;">
                                <div class="ps-3">
                                    <h5 class="mb-1">Mat Gargano</h5>
                                    <span class="at">@matgargano</span>
                                </div>
                            </div>
                        </div><!--[end of card]-->
                    </div> <!--[carousel-item-2]-->

            <!-- Carousel Item 3 -->
            <div class="carousel-item carousel-item-2">
                    <div class="testimonial-item ps-5">
                        <i class="fa fa-quote-left fa-2x mb-3"></i>
                        <p class=" textimal-text">second-day using <em>@lambdatesting</em> and it's already proven itself a lot faster than Cross Browser Testing and BrowserStack, at half the price! bargain</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="https://user-images.githubusercontent.com/78242022/266013762-54201d6a-0923-4969-948c-790dec804253.png"
                                style="width: 60px; height: 60px;">
                            <div class="ps-3">
                                <h5 class="mb-1">Matthew Bryson</h5>
                                <span class="at">@mbrysonuk</span>
                            </div>
                        </div>
                    </div><!--[end of card]-->
                </div>
                
                <!-- Control Buttons -->
               <!--[carousel-item-3]-->
            </div><!--[End of Container]-->

        </div>
    </section><!--End of Carousel Landmark-->
</div><!--End of row g-5-->
</div><!-- container py-5 -->
</div>
@endsection
  