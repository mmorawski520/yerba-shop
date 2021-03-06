@extends('layouts.app')
@section('content')



    <div class="container text-center my-5 main">
         <h1>Basic data form</h1>
        <div class="alert alert-danger">

        </div>
        <div>
            <div class="form-group">
                <h4>Select delivery option</h4>
                <div class="form-check form-check">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label" for="inlineRadio1">option 1</label>
                </div>
                <div class="form-check form-check">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option2">
                    <label class="form-check-label" for="inlineRadio1">option 2</label>
                </div>
            </div>
            <div class="form-row">
                <div class="col-7">
                    <input id="city" type="text" class="form-control" placeholder="City">
                </div>
                <div class="col">
                    <input id="state" type="text" class="form-control" placeholder="State">
                </div>
                <div class="col">
                    <input id="zip" type="text" class="form-control" placeholder="Zip">
                </div>
            </div>
            <div class="form-row my-2">
                <div class="col-6">
                    <input id="street"type="text" class="form-control" placeholder="Street">
                </div>
                <div class="col-6">
                    <input id="house" type="text" class="form-control" placeholder="House">
                </div>

            </div>
        </div>
        <button class="btn btn-success btn-lg" id="payment-btn">Pay</button>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{asset('js/payment/payment.js')}}">

    </script>
@endpush
