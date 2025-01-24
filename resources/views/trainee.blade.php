@extends('layout')
@section('content') 
<div class="col-md-12 pb-4 ">
      <h1 class="text-center">Welcome Trainee</h1>
     
 
    </div>
  <!-- <div class="banner">
  <img src="{{ asset('images/newgymbanner.jpg') }}" alt="">

  </div> -->
<div class="container mt-5">

  
 
<div class="row ">
   
    <div class="col-md-8   ">
        <h2 class="invite_heading">Invitation Requirements</h2>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('sendInvitation') }}">
               
                <div >
       
        <ul class="list-group d-flex flex-colmun gap-2">
        <h2 >List of Trainers</h2>
            @foreach($trainers as $trainer)
            <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  {{ $trainer->trainer_name }}
  </label>
</div>
              
            @endforeach
            <div class="pt-5 pb-3">
                        <label for="requirement" class="form-label">Requirement</label>
                        <textarea class="form-control" id="requirement" name="requirement" rows="3" placeholder="Enter requirements"></textarea>
                    </div>
                    <button type="submit" style="
    width: 150px;
    background-color: #8a2be2;
    color: white;
" class="btn  pt-2">Send Invitation</button>
        </ul>
 
                    @csrf
                   
                    
                </form>
            </div>

        </div>
       
        </div>
    </div>
   
<div class="rightimage col-4">
  <img src="{{asset('images/trainers.jpeg')}}" alt=""></div>
</div>
<div class="row">
  
<div class="col-8">
         <h3 class="invite_heading mt-5" >My trainers</h3> 
         <div class="card">
            <div class="card-body" style="
    width: 100%;
    display: flex;
    flex-direction: column;
    /* gap: 22px; */
">
            <ul class="list-group">
            @foreach ($trainerss->traineeralation as $trainer)
            <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1"><a href="{{ route('payment', ['id' => $trainer->id]) }}">{{ $trainer->trainer_name }}</a></h5>
      <small class="text-primary
">3 days ago</small>
    </div> 
        @endforeach
        </div>    
</div>
<!-- <div class="col-12 mytrainers"><img src="{{asset('images/mytrainers.jpeg')}}" alt=""></div> -->
</div>

  </div>

<!-- Bootstrap Modal for Trainer Form -->
@if (auth()->user()->info_status === 'inactive')
<div class="modal fade" id="trainerModal" tabindex="-1" aria-labelledby="trainerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="trainerModalLabel">Please add Trainee Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Trainer Form -->
        <form method="post"  action="{{ route('registrainer') }}">
            @csrf
           @if($errors->any())
       @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">   
        {{ $error }}</div>
      @endforeach
    @endif 
          <div class="mb-3">
            <label for="trainee_name" class="form-label">Trainee Name</label>
            <input type="text" class="form-control" id="trainee_name" name="trainee_name" placeholder="Enter Trainee Name"  >
          </div>
          <div class="mb-3">
            <label for="trainee_email" class="form-label">Trainee Email</label>
            <input type="email" class="form-control" id="trainee_email" name="trainee_email" placeholder="Enter Trainee Email"  >
          </div>
          <div class="mb-3">
            <label for="trainee_age" class="form-label">Trainee Age</label>
            <input type="number" class="form-control" id="trainee_age" name="trainee_age" placeholder="Enter Trainee Age"   >
          </div>
          <div class="mb-3">
            <label for="trainee_height" class="form-label">Trainee Height</label>
            <input type="number" class="form-control" id="trainee_height" name="trainee_height" placeholder="Enter Trainee Height"  >
          </div>
          <div class="mb-3">
            <label for="trainee_mobile" class="form-label">Trainee Number</label>
            <input type="text" class="form-control" id="trainee_mobile" name="trainee_mobile" rows="3" placeholder="Enter Trainee Number"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var myModal = new bootstrap.Modal(document.getElementById('trainerModal'));
    myModal.show();
  });
</script>
@endif

@endsection