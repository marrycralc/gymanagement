<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />      <title>@yield('title', 'Gym Management')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<section id="sec1">
    <div class="frosted-contain">
      <div class="modal-contain">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand cl-bv" href="#">Fitney.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"></button>
            <span class="navbar-toggler-icon"></span>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link cl-bv" style="color: blueviolet; font-weight: 800;" href="#">Home</a>
                <a class="nav-link" href="{{route('tranee')}}">Trainers</a>
                <a class="nav-link" href="#">Programs</a>
                <a class="nav-link" href="#">Experience</a>
                <a class="nav-link" href="#">Pricing</a>

              </div>
              <div class="navbar-btn">
              <a class=" btn btn-dark" href="{{route('login')}}">Login</a>
              <a class=" btn btn-dark" href="{{url('/logout')}}">Logout</a>
              
              </div>
            </div>
          </div>
        </nav>
        @if(Request::is('/'))
          <div class="content">
            <h1>Get Your Perfect Workout With The Perfect <span class="cl-bv">Trainers</span></h1><br><br>
          </div>
        @endif
      </div>
    </div>

  </section>
     <!-- Main Content Section -->
     <main>
        @yield('content') 
    </main>

    <footer style="background-color: #f3f3f3; text-align: center; padding: 5% 5%;">
    <h1>Get the Latest Updates From Us</h1>
    <p style="color: gray;">Join our mailing list by entering your email for exclusive information.</p>
    <input placeholder="example@1234.com" type="email"><br><br>
    <button class="btn btn-dark btn-lg">Get Updates</button>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>         <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
</body>

</html>