@extends('layout')
@section('content') 

<section><div class="container mt-5">
    <div class="row">
        <!-- Trainer Details Section -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                 
                    <h5 class="card-title">Trainer Details</h5>
                    <p><strong>Name:</strong> {{ $trainerdetail->trainer_name }}</p>
                    <p><strong>Email:</strong> {{ $trainerdetail->traine_email }}</p>
                    <p><strong>Age:</strong> {{ $trainerdetail->trainer_age }}</p>
                    <p><strong>Height:</strong> {{ $trainerdetail->trainer_height }} "cm</p>
                    <p><strong>Achievements:</strong> {{ $trainerdetail->trainer_achievment }}</p>
                </div>
            </div>
        </div>
        
        <!-- Image Section (Right Side) -->
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/New Project.png') }}" class="card-img-top" alt="Trainer Image">
                <div class="card-body">
                    <p class="card-text text-center">Profile Picture</p>
                </div>
            </div>
        </div>
    </div>
</div></section>
<section class="pricing-section mt-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="section-title text-center title-ex1">
                    <h2>Pricing Tables</h2>
                    <p>Inventore cillum soluta inceptos eos platea, soluta class laoreet repellendus imperdiet optio.</p>
                </div>
            </div>
        </div>
        <!-- Pricing Table starts -->
        <div class="row">
            <div class="col-md-4">
                <div class="price-card ">
                    <h2>Basic</h2>
                    <p>Access to gym facilities</p>
                    <p class="price"><span>29</span>/ Month</p>
                    <ul class="pricing-offers">
                        <li>Access to gym equipment</li>
                        <li>Locker room access</li>
                        <li>1 Personal Training Session</li>
                        <li>Group Classes</li>
                        <li>Free Wi-Fi</li>
                    </ul>
                    <a href="#" class="btn btn-primary btn-mid">Join Now</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="price-card featured">
                    <h2>Standard</h2>
                    <p>Most popular choice</p>
                    <p class="price"><span>49</span>/ Month</p>
                    <ul class="pricing-offers">
                        <li>Access to gym equipment</li>
                        <li>Locker room access</li>
                        <li>5 Personal Training Sessions</li>
                        <li>Group Classes</li>
                        <li>Free Wi-Fi</li>
                    </ul>
                    <a href="#" class="btn btn-primary btn-mid">Join Now</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="price-card ">
                    <h2>Premium</h2>
                    <p>For the dedicated</p>
                    <p class="price"><span>69</span>/ Month</p>
                    <ul class="pricing-offers">
                        <li>Access to gym equipment</li>
                        <li>Locker room access</li>
                        <li>Unlimited Personal Training</li>
                        <li>Group Classes</li>
                        <li>Free Wi-Fi</li>
                        <li>Sauna and Spa Access</li>
                    </ul>
                    <a href="#" class="btn btn-primary btn-mid">Join Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection