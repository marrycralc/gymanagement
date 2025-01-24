@extends('layout')
@section('content') 
<section id="pricing">
    <div width="100%" class="pricing_bnr">
        <img width="550px" src="{{asset('images/money3.jpg')}}" alt="">
    </div>
    
    <div class="row">
    <h3 class="cl-bv  mt-3 ">Pricing Plan</h3>
    <h1 class=" mt-5"><b>Join Our Membership,<br>Let's Start</b></h1><br><br>
      <div class="col-lg-3 col-md-6 ">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title  text-muted">Daily Plan</h5><br>
            <h1 class="card-subtitle mb-2"><b>$15</b></h1><br>
            <div style="border-top: 1px solid blueviolet;"><br>
              <ul>
                <li class="card-text" style="text-align: left;">2 Hours of Personal Training</li>
                <li class="card-text" style="text-align: left;">Free Consulting</li>
              </ul>
            </div>
            <button class="btn btn-outline-dark btn-lg">Join Now</button>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title  text-muted">Weekly Plan</h5><br>
            <h1 class="card-subtitle mb-2"><b>$50</b></h1><br>
            <div style="border-top: 1px solid blueviolet;"><br>
              <ul>
                <li class="card-text" style="text-align: left;">3 Hours of Personal Training</li>
                <li class="card-text" style="text-align: left;">Free Consulting</li>
              </ul>
            </div>
            <button class="btn btn-outline-dark btn-lg">Join Now</button>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title  text-muted">Monthly Plan</h5><br>
            <h1 class="card-subtitle mb-2"><b>$150</b></h1><br>
            <div style="border-top: 1px solid blueviolet;"><br>
              <ul>
                <li class="card-text" style="text-align: left;">5 Hours of Personal Training</li>
                <li class="card-text" style="text-align: left;">Free Consulting</li>
                <li class="card-text" style="text-align: left;">Exercise Program</li>
              </ul>
            </div>
            <button class="btn btn-dark btn-lg">Join Now</button>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title  text-muted">Yearly Plan</h5><br>
            <h1 class="card-subtitle mb-2"><b>$500</b></h1><br>
            <div style="border-top: 1px solid blueviolet;"><br>
              <ul>
                <li class="card-text" style="text-align: left;">5 Hours of Personal Training</li>
                <li class="card-text" style="text-align: left;">Free Consulting</li>
                <li class="card-text" style="text-align: left;">Exercise Program</li>
                <li class="card-text" style="text-align: left;">Nutrition Plan</li>
              </ul>
            </div>
            <button class="btn btn-outline-dark btn-lg">Join Now</button>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection