@extends('layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <h1>OPAI</h1>
                <h2>
                    Welcome To Gymlocal Support
                </h2>
                  <div class="col-6 pt-5">
            <form  id="datagenrate" >
                @csrf
                <div  class="pb-5" id="response"><h5 style="
    background: #497059;
    color: white;
    padding: 20px;"></h5></div>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="dataquery"  id="prompt"  class="form-control" placeholder="Enter Your Name">
                @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
                <div class="form-group pt-5 ">
                    <input type="submit" class="btn btn-primary" value="Generate">
            </div>
            </form>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>  


$(document).ready(function() {
   

    $('#datagenrate').on('submit', function(event) {
        event.preventDefault();

        var prompts = $('#prompt').val();

        $.ajax({
            url: '/generate',  // The URL to send the request to
            method: 'POST', 
            data: {
                prompt: prompts,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            contentType: 'application/x-www-form-urlencoded',  
            dataType: 'json',  
            beforeSend: function() {
        // setting a timeout
        $('#response h5').text('Loading please wait...');
    },
            success: function(response) {
                $('#response h5').text(response.message);
 
                console.log(response);  // Handle the response here
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ', error);  // Handle errors here
            }
        });
    });
    });
</script>