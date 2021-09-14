@extends('web.layouts.app')
@section('content')
    <style>
        strong{
            font-size: 20px !important;
        }
        .form-control{
            border-radius: 0 !important;
            font-size: 20px !important;
            height: 50px !important;
        }

    </style>
    <section class="container mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 style="align-content: center" ><span>BILLING DETAILS</span></h1>
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <form action="/" method="POST" role="form" id="form" name="form">
                {{csrf_field() }}
                <div class="row">
                    <div class="col-md-8">
                                <div class="form-row">
                                    <div class="form-group">
                                        <strong>Billing Name</strong>
                                        <input type="text" class="form-control" value="{{ auth()->user()->name }}" name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <strong>Billing Address</strong>
                                    <input type="text" class="form-control" value="{{ auth()->user()->address }}" name="address">
                                </div>
                        <div class="form-group">
                            <strong>Email Address</strong>
                            <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" disabled>
                            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                                    <div class="form-group">
                                        <strong>Phone Number</strong>
                                        <input type="text" class="form-control" value="{{ auth()->user()->phone_number }}"name="phone_number">
                                    </div>

                        <h3 class="text-center">Payment Method</h3>
                                <div class="form-group">
                                    <strong>Payment Option</strong>
                                    <select class="form-control" onchange="run()" name="payment_method" id="payment">
                                        <option class="form-control" value="cash_on_delivery">Cash On Delivery</option>
                                        <option class="form-control" value="ESEWA">ESEWA</option>
                                    </select>
                                </div>
                        <input value="{{getCartTotalPrice()}}" name="tAmt" type="hidden">
                        <input value="{{getCartTotalPrice()}}" name="amt" type="hidden">
                        <input value="0" name="txAmt" type="hidden">
                        <input value="0" name="psc" type="hidden">
                        <input value="0" name="pdc" type="hidden">
                        <input value="NP-ES-HOUSE" name="scd" type="hidden">
                        <input value="{{time()}}" name="pid" type="hidden">
                        <input value="{{route('esewa.success')}}" type="hidden" name="su">
                        <input value="{{route('esewa.fail')}}" type="hidden" name="fu">

                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="border:none !important;  background-color: #e5e5e5 !important;">
                                    <h4 class="card-title mt-2" style="color: black !important; font-weight: bold; font-size: 30px">Order Summary</h4>
                                    <article class="card-body">
                                        <dl class="dlist-align" style="text-align: justify !important ;color: black !important; font-weight: bold; font-size: 16px;" >
                                            Quantity:<b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;">{{getCartAmount()}}</b>  <br>
                                            Amount:<b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;"> RS. {{getCartTotalPrice()}} </b><br>
                                            Delivery : <b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;">Considered as address</b> <br>
                                            @if($isCoupon)
                                                Coupon Discount : <b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;">{{$isCoupon}}</b> <br>
                                            @endif
                                            <hr style="height: 5px; !important;"> <br>
                                            Total Amount: <b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;"> RS. {{getCartWithCouponDiscount(getCartTotalPrice(),$couponsDiscount)}} </b>
                                        </dl>
                                    </article>

                                    <div class="col-md-12 mt-4">
                                        <button type="submit" style="background-color: #25a521 !important; border: none !important; color: white !important;" class="subscribe btn btn-round-sm btn-lg btn-block">Checkout</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        document.form.action = "https://houseofbooks.com.np/order_confirmation";
        function run() {
          var paymentMethod =document.getElementById("payment").value;
            if( paymentMethod==="ESEWA" ) {
                document.form.action = "https://esewa.com.np/epay/main";
            }
            else if( paymentMethod === "cash_on_delivery")  {
                document.form.action = "https://houseofbooks.com.np/order_confirmation";
            }
        }
    </script>
    @endpush
