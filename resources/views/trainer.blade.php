@extends('layout')
@section('content') 
<!-- Bootstrap Modal for Trainer Form -->
<div> 
  <div class="col-6 p-5">
  
<ul class="list-group">
<h4>My Trainee List</h4>
@foreach ($traineee->trainerralation as $trainer)
       
            <li class="list-group-item d-flex justify-content-between align-items-center">{{ $trainer->trainee_name }}<span class="badge badge-primary badge-pill text-primary

">1 day ago</span></li>
            
     

    @endforeach
</ul>
</div>  
      </div>
        @if (auth()->user()->info_status === 'inactive')
<div class="modal fade" id="trainerModal" tabindex="-1" aria-labelledby="trainerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="trainerModalLabel">Please add Trainer Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
 
        <!-- Trainer Form -->
        <form method="post">
            @csrf
           @if($errors->any())
   @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">   
    {{ $error }}</div>
  @endforeach
@endif 
          <div class="mb-3">
            <label for="trainer_name" class="form-label">Trainer Name</label>
            <input type="text" class="form-control" id="trainer_name" name="trainer_name" placeholder="Enter Trainer Name"  >
          </div>
          <div class="mb-3">
            <label for="trainer_email" class="form-label">Trainer Email</label>
            <input type="email" class="form-control" id="trainer_email" name="trainer_email" placeholder="Enter Trainer Email"  >
          </div>
          <div class="mb-3">
            <label for="trainer_age" class="form-label">Trainer Age</label>
            <input type="number" class="form-control" id="trainer_age" name="trainer_age" placeholder="Enter Trainer Age"   >
          </div>
          <div class="mb-3">
            <label for="trainer_height" class="form-label">Trainer Height</label>
            <input type="number" class="form-control" id="trainer_height" name="trainer_height" placeholder="Enter Trainer Height"  >
          </div>
          <div class="mb-3">
            <label for="trainer_achievement" class="form-label">Trainer Achievement</label>
            <textarea class="form-control" id="trainer_achievement" name="trainer_achievement" rows="3" placeholder="Enter Trainer Achievements"></textarea>
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