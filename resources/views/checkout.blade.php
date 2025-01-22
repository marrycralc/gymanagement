@extends( 'layout' )
@section( 'content' )
<div class="container">
  <div class="py-5 text-center">
    
    <h2>Checkout form</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <h6 class="my-0 mb-3"><b>Monnthly Subscription</b></h6>
      <ul class="list-group mb-3 ">
        
        <li class="list-group-item  d-flex flex-column gap-2  justify-content-between lh-condensed">
        
            
            <span class="text-muted">subscription Price :- {{ $membershipprice}}</span>
         
          <span class="text-muted">subscription validation for :- {{$membershipduration}} days </span>
        </li>
        
      </ul>

      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form action="{{route('checkoutp')}}" class="needs-validation" method="post" novalidate>
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
         



        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
      </form>
    </div>
  </div>
  <script src="https://js.stripe.com/v3/"></script>

  <form id="payment-form">
    <div id="card-element">
        <!-- Stripe Elements will insert the card input here -->
    </div>
    <button id="submit">Pay</button>
    <div id="error-message"></div>
</form>

<script>document.addEventListener("DOMContentLoaded", function () {
    const stripe = Stripe('pk_test_51Q9lu6SHpq4xQfXnbjukSfBrEARqEk9ORGsEi1II3vTwtyQ4yNZHTIOvDuTg6ly7e2wB1C1sS72Wwm5UF4joj4hx00xiyIUcf2'); // Replace with your Stripe publishable key
    const elements = stripe.elements();

    // Create an instance of the card Element
    const card = elements.create('card');
    card.mount('#card-element');

    // Handle form submission
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const { error, paymentIntent } = await stripe.confirmKlarnaPayment(
            'pi_3QjdjFSHpq4xQfXn1UXxB3s3_secret_DzIbmvEqk1oDIXA7RGnKM07jn', // Replace with the clientSecret you received from your backend
            {
              payment_method: {
      billing_details: {
        email: 'jenny.rosen@example.com',
        address: {
          country: 'DE',
        },
      },
    },
    return_url: 'https://example.com/checkout/complete',
  },
            
        );

        if (error) {
            document.getElementById('error-message').textContent = error.message;
        } else {
            alert('Payment successful!');
        }
    });
});

</script>
<?php 
// Parent class
class Animal {
  public $name;

  // public function __construct($name) {
  //     echo $this->name = $name;
  // }

  public function speak() {
      echo $this->name . " makes a sound.";
  }
}

// Child class inherits from Animal
class Dog extends Animal {
  public function speak() {
      echo $this->name . " barks.";
  }
}

// Creating an object of Dog class
$dog = new Animal("Rex");
$dog->speak();
echo "</br>";  // Output: Rex barks.
// $nn = new Animal("cheeta");

?>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2019 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
@endsection

@if(auth()->check())
    <p>Your user ID is: {{ auth()->user()->id }}</p>
@else
    <p>You are not logged in.</p>
@endif
