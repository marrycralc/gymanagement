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
            <div class="card-body">
                    <h2 style="
    text-align: right;
" class="card-text text-right mt-5 p-4">Profile Picture >> </h2>
                   
                </div>
        </div>
        
        <!-- Image Section (Right Side) -->
        <div class="col-md-4">
            <div class="card bg-white">
                <img width="100%" height="500px" src="{{ asset('images/angel.jpg') }}" class="card-img-top" alt="Trainer Image">
            
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
   
 
    @csrf
    <input type="hidden" name="trainer_id" value="{{ $trainerdetail->id }}">
    
    <div class="row">
        <div class="col-md-4">
            <div class="price-card">
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
                <!-- Separate form for Basic membership -->
                <form action="{{ route('checkout.route') }}" method="POST">
                    @csrf
                    <input type="hidden" name="trainer_id" value="{{ $trainerdetail->id }}">
                    <input type="hidden" name="membership_type" value="basic">
                    <input type="submit" class="btn btn-primary btn-mid" name="firstmember" value="Join Now">
                </form>
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
                <!-- Separate form for Standard membership -->
                <form action="{{ route('checkout.route') }}" method="POST">
                    @csrf
                    <input type="hidden" name="trainer_id" value="{{ $trainerdetail->id }}">
                    <input type="hidden" name="membership_type" value="standard">
                    <input type="submit" class="btn btn-primary btn-mid" name="secondmember" value="Join Now">
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="price-card">
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
                <!-- Separate form for Premium membership -->
                <form action="{{ route('checkout.route') }}" method="POST">
                    @csrf
                    <input type="hidden" name="trainer_id" value="{{ $trainerdetail->id }}">
                    <input type="hidden" name="membership_type" value="premium">
                    <input type="submit" class="btn btn-primary btn-mid" name="thirdmember" value="Join Now">
                </form>
            </div>
        </div>
    </div>


    </div>
</section>

@endsection