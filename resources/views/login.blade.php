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


            <form action="{{route('loginsubmit')}}" method="post" class="form-signin">
            @csrf
            <input type="email" name="email" id="email" class="form-control form-group mb-2" placeholder="Email" required>
                <input type="password" name="password" id="inputPassword" class="form-control form-group mb-3" placeholder="password" required autofocus>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Log in</button>
            </form><!-- /form -->
        </div>
    </div>
</div>
</div>
<script async src="https://cse.google.com/cse.js?cx=5008acc4ca29d4403">
</script>
<div class="gcse-search"></div>
@endsection