@extends('dashlayout')
@section('content') 
<!-- Bootstrap Modal for Trainer Form -->
<div class="modal fade" id="trainerModal" tabindex="-1" aria-labelledby="trainerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="trainerModalLabel">Please add Trainee Information</h5>
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
@endsection