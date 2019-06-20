<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Stripe Payment Gateway</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center"> <img id="header-logo" src="{{ asset('images/logo.png') }}"/> </div>
    <div class="row">
        <div class="col-lg-12 mt40">
            <div class="text-center">
                <h2>Simple Stripe Payment Gateway</h2>
                <br>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <form accept-charset="UTF-8" action="{{ route('payment')}} " class="require-validation"
                  data-cc-on-file="false"
                  data-stripe-publishable-key="test_public_key"
                  id="payment-stripe" method="post">
                {{ csrf_field() }}
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <label class='control-label'>Name on Card</label> <input
                                class='form-control' size='4' type='text' name="name">
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <label class='control-label'>Email Address</label> <input
                                autocomplete='off' class='form-control' size='20'
                                type='email' name="receipt_email">
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <label class='control-label'>Products</label> <select
                                autocomplete='off' class='form-control select-css js-multiple' size='20'
                                name="product[]" data-name="prod" id="myMulti" multiple="multiple">
                            <optgroup label="Group A">
                            <option value="Example 1">Example 1</option>
                            <option value="Example 2">Example 2</option>
                            <option value="Example 3">Example 3</option>
                            </optgroup>
                            <optgroup label="Group B">
                            <option value="Example 4">Example 4</option>
                            <option value="Example 5">Example 5</option>
                            <option value="Example 6">Example 6</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <label class='control-label'>Card Number</label> <input
                                autocomplete='off' class='form-control' size='20'
                                type='text' name="card_no">
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-4 form-group'>
                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                        class='form-control' placeholder='ex. 311' size='3'
                                                                        class='form-control' placeholder='ex. 311' size='3'
                                                                        type='text' name="cvc">
                    </div>
                    <div class='col-xs-4 form-group'>
                        <label class='control-label'>Expiration</label> <input
                                class='form-control' placeholder='MM' size='2'
                                type='text' name="expiry_month">
                    </div>
                    <div class='col-xs-4 form-group'>
                        <label class='control-label'> </label> <input
                                class='form-control' placeholder='YYYY' size='4'
                                type='text' name="expiry_year">
                    </div>
                </div>
                <div class='row'>
                    <div class="col-md-3">
                        <select autocomplete='off' class='form-control'
                                name="currency" data-name="prod" id="currency">
                            <option selected="selected" value="USD" data-text="$" data-img_src="{{ asset('images/United-States.ico') }}"></option>
                            <option value="GBP" data-text="£" data-img_src="{{ asset('images/United-Kingdom.ico') }}"></option>
                        </select>
                    </div>
                    <div class='col-md-9'>
                        <input
                                autocomplete='off' class='form-control' placeholder="Amount" size='20'
                                type='text' name="amount">
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12 form-group'>
                        <button class='form-control diagonal submit-button'
                                type='submit' style="margin-top: 10px;">Pay »</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.js-multiple').select2();
            $('#currency').select2(options);
            $(' .select2-selection--single').css({'height': '37px'});
        });
        function custom_template(obj){
            var data = $(obj.element).data();
            //var text = $(obj.element).text();
            if(data && data['img_src'] && data['text']){
                img_src = data['img_src'];
                text = data['text'];
                template = $("<div><img src=\"" + img_src + "\" style=\"width:40%;height:33px;\"/><p style=\"font-weight: 500;font-size:10pt;text-align:center;\">" + "</p></div>");
                return template;
            }
        }
        var options = {
            'templateSelection': custom_template,
            'templateResult': custom_template,
            'minimumResultsForSearch': 20,
            'closeOnSelect': true,
        }



    </script>

</body>
</html>