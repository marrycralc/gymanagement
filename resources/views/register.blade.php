@extends('layout')
@section('content') 

<div class="container h-80">
<div class="row align-items-center h-100">
<img id="profile-img" style="width:50%;" class="rounded-circle profile-img-card" src="https://i.imgur.com/6b6psnA.png" />
    <div class="col-3 mx-auto">
        <div class="text-center">
         
            <p id="profile-name" class="profile-name-card"></p>
            @if($errors->any())
   @foreach ($errors->all() as $error)
    <div class="alert alert-danger" role="alert">   
      {{ $error }}</div>
  @endforeach
@endif 

            <form action="{{route('registeruser')}}" method="post" class="form-signin">
              <h5><b>Register Your Account Please</b></h5>  
            @csrf
            <input type="text" name="name" id="inputName" class="form-control form-group mb-2" placeholder="Name" required>
            <input type="email" name="email" id="inputEmail" class="form-control form-group mb-2" placeholder="Email" required>
                <input type="password" name="password" id="inputPassword" class="form-control form-group mb-2" placeholder="password" required autofocus>
                <input type="password" name="password_confirmation" id="inputPasswordConfirmation" class="form-control form-group mb-2" placeholder="Confirm Password" required>
               
                <div class="form-control d-flex gap-2 form-group mb-2">
                    <label for="role">Role:</label><br>
                    <input type="radio"  name="user_role" value="trainer" required>
                    <label for="trainer">Trainer</label><br>
                    <input type="radio"  name="user_role" value="trainee" required>
                    <label for="trainee">Trainee</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Regsiter</button>
            </form><!-- /form -->
        </div>
    </div>
</div>
</div>
@endsection