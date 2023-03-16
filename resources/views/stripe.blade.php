@extends('layout.user')
@section('content')    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style >
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
      
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body{
  background-color: #f5f5f5;
  font-family: Arial, Helvetica, sans-serif;
}
.wrapper{
  background-color: #fff;
  width: 500px;
  padding: 25px;
  margin: 25px auto 0;
  box-shadow: 0px 0px 20px rgba(0,0,0,0.5);
}
.wrapper h2{
  background-color: #fcfcfc;
  /* color: #7ed321; */
  font-size: 24px;
  padding: 10px;
  margin-bottom: 20px;
  text-align: center;
  border: 1px dotted #333;
}
/* h4{
  padding-bottom: 5px;
  color: #7ed321;
} */
.input-group{
  margin-bottom: 8px;
  width: 100%;
  position: relative;
  display: flex;
  flex-direction: row;
  padding: 5px 0;
}
.input-box{
  width: 100%;
  margin-right: 12px;
  position: relative;
}
.input-box:last-child{
  margin-right: 0;
}
.name{
  padding: 14px 10px 14px 50px;
  width: 100%;
  background-color: #fcfcfc;
  border: 1px solid #00000033;
  outline: none;
  letter-spacing: 1px;
  transition: 0.3s;
  border-radius: 3px;
  color: #333;
}
/* .name:focus, .dob:focus{
  -webkit-box-shadow:0 0 2px 1px #7ed32180;
  -moz-box-shadow:0 0 2px 1px #7ed32180;
  box-shadow: 0 0 2px 1px #7ed32180;
  border: 1px solid #7ed321;
} */
.input-box .icon{
  width: 48px;
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 0px;
  left: 0px;
  bottom: 0px;
  color: #333;
  background-color: #f1f1f1;
  border-radius: 2px 0 0 2px;
  transition: 0.3s;
  font-size: 20px;
  pointer-events: none;
  border: 1px solid #00000033;
  border-right: none;
}
.name:focus + .icon{
  /* background-color: #7ed321; */
  color: #fff;
  /* border-right: 1px solid #7ed321; */
  border: none;
  transition: 1s;
}
.dob{
  width: 30%;
  padding: 14px;
  text-align: center;
  background-color: #fcfcfc;
  transition: 0.3s;
  outline: none;
  border: 1px solid #c0bfbf;
  border-radius: 3px;
}
.radio{
  display: none;
}
.input-box label{
  width: 50%;
  padding: 13px;
  background-color: #fcfcfc;
  display: inline-block;
  float: left;
  text-align: center;
  border: 1px solid #c0bfbf;
}
.input-box label:first-of-type{
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
  border-right: none;
}
.input-box label:last-of-type{
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}
.radio:checked + label{
  /* background-color: #7ed321; */
  color: #fff;
  transition: 0.5s;
}
.input-box select{
  display: inline-block;
  width: 50%;
  padding: 12px;
  background-color: #fcfcfc;
  float: left;
  text-align: center;
  font-size: 16px;
  outline: none;
  border: 1px solid #c0bfbf;
  cursor: pointer;
  transition: all 0.2s ease;
}
.input-box select:focus{
  /* background-color: #7ed321; */
  color: #fff;
  text-align: center;
}
button{
  width: 100%;
  background: transparent;
  border: none;
  background: #7ed321;
  color: #fff;
  padding: 15px;
  border-radius: 4px;
  font-size: 16px;
  transition: all 0.35s ease;
}
button:hover{
  cursor: pointer;
  /* background: #5eb105; */
}
</style>
    
</head>
<body>
<div class="container">
  
    
  <br><br><br><br>
    <div class="row">
       
        {{-- <div class="col-md-6 col-md-offset-3"> --}}
            {{-- <div class="panel panel-default credit-card-box"> --}}
              
                <div class="wrapper">
                    
                    <h2>Payment</h2>
                       
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    
                    @if (auth()->user()->points>0)
                    <form 
                      role="form" 
                      action="{{ route('stripe.point',['id'=>$job->id]) }}" 
                      method="post" 
                      class="require-validation"
                      data-cc-on-file="false"
                      data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                      id="payment-form">
                        @else
                        <form 
                            role="form" 
                            action="{{ route('stripe.post',['id'=>$job->id]) }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                    @endif
                    
                        @csrf
  
                        

                        {{-- <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div> --}}
                            <h4>Account</h4>
                             <div class="input-group">
                             <div class="input-box">
                            <input type="text" placeholder="Full Name" required class="name">
                            <i class="fa fa-user icon"></i>
                             </div>
                             </div>
                             {{-- <div class="input-group">
                                <div class="input-box">
                                    <input type="email" placeholder="Email Adress" required class="name">
                                    <i class="fa fa-envelope icon"></i>
                                </div>
                            </div><br> --}}
                            <h4>Payment Details</h4>
  
                        <div class='form-row row my-3'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number mb-3' size='20'
                                    type='text'>
                            </div>
                        </div>
                        {{-- <div class="input-group">
                            <div class="input-box control-label">
                                <input type="tel" placeholder="Card Number" required class="name" autocomplete='off' class='form-control card-number' size='20'
                                type='text'>
                                <i class="fa fa-credit-card icon"></i>
                            </div>
                        </div> --}}
                        
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
  
                      
   
                        <div class="row">
                            <div class="col-xs-12 my-3">
                                <div class="btn-lg btn-block w-100" type="submit" style="color: #008dde">Price: (${{$job->price}}) </div><br>
                            </div>
                        </div>
                        <div class="row">
                            @if (auth()->user()->points>0)
                            <div class="d-flex w-100 justify-content-center align-items-center text-center">
                              {{-- <div class="col-xs-4"> --}}
                                <button class="btn btn-lg text-white" style="width:45%;background-color: #008dde" type="submit">Pay </button>
                              {{-- </div> --}}
                              {{-- <div class="col-xs-1"> --}}
                              <h5 style="width: 15%">OR</h5>
                              {{-- </div> --}}
                              {{-- <div class="col-xs-4"> --}}
                                <button class="btn btn-lg text-white" style="width:45%;background-color: #008dde" type="submit">Use your points </button>
                              {{-- </div> --}}
                              
                            </div>
                            <h5 class="text-center mt-3">You have {{auth()->user()->points}} points</h5>

                              @else
                              <div class="col-xs-12">
                                <button class="btn btn-lg btn-block text-white" style="background-color: #008dde" type="submit">Pay </button>
                              </div>
                            @endif
                        </div>
                          
                    </form>
                </div>
            </div>        
        </div>
    </div>
      
</div>
  
</body>
  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
   
    var $form = $(".require-validation");
   
    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
   
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
               
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
   
});
</script>
@endsection

