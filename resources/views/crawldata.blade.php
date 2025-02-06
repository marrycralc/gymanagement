@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Crawl Data</h1>
                <form  id="serkey">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="form-group ">
                    <div  class="pb-5" id="response" style="
    background: #497059;
    color: white;
    padding: 20px;"></div>
                        <label for="url">Serach What u want</label>
                        <input type="text" class="form-control mt-5" id="serachfopresult" name="serachfopresult" placeholder="Enter you keyword">        
                    </div>      
                    <button type="submit" class="btn btn-primary mt-5">Crawl</button>
                </form>

                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    $('#serkey').on('submit', function(event) {
        event.preventDefault();
        // console.log($('meta[name="csrf-token"]').attr('content'));
    var serachfopresult = $('#serachfopresult').val();

    fetch('/webcraw', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    body: new URLSearchParams({
        serachfopresult: serachfopresult,
    })
})
.then(response => response.json())
.then(data => {

    if (data.length > 0) {
        data.forEach(item => {
          
            $('#response').append(`
                <p>
                    <a style="color: black;"  href="${item.link}" target="_blank">${item.title}</a><br>
                    ${item.snippet}
                </p>
            `);
        });
    } else {
        $('#response').text('No items found.');
    }
})


.catch(error => {
    console.error('Fetch Error:', error); 
});
    })
   });

</script>

