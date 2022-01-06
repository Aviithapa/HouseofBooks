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
            <form action="{{route('orderConfirmation')}}" method="POST" role="form" id="form" name="form">
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
                            <strong>District</strong>
                            <select class="form-control"   onchange="addressFunction()" id="mySelect" required>
                                <option value="">None</option>
                                <option class="form-control" value="kathmandu">Kathmandu</option>
                                <option class="form-control" value="lalitpur">Lalitpur</option>
                                <option class="form-control" value="bhaktpur">Bhaktpur</option>
                            </select>
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
                                    <select class="form-control" onchange="paymentFunction()" name="payment_method" id="payment">
                                        <option class="form-control" value="cash_on_delivery">Cash On Delivery</option>
                                        <option class="form-control" value="ESEWA">ESEWA</option>
                                        <option class="form-control" value="KHALTI">Pay With Khalti</option>
                                    </select>
                                </div>
                        <input value="{{getdisCartTotalPrice()}}" id="amt" name="tAmt" type="hidden">
                        <input value="{{getCartTotalPrice()}}"  name="amt" type="hidden">
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
                                            Amount:<b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;"> RS. {{getdisCartTotalPrice()}} </b><br>
                                            Delivery : <b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;" id="delivery_charge"></b> <br>
                                            @if($isCoupon)
                                                Coupon Discount : <b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;">{{$isCoupon}} %</b> <br>
                                                Total Amount: <b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;"> RS. {{getCartWithCouponDiscount(getdisCartTotalPrice(),$isCoupon)}} </b>
                                                @else
                                                <hr style="height: 5px; !important;" id="districts">  <br>
                                                Total Amount: <b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;"> RS. {{getCartWithCouponDiscount(getdisCartTotalPrice(),$isCoupon)}} </b>
                                            @endif

                                        </dl>
                                    </article>

                                    <div class="col-md-12 mt-4">
                                        <button type="submit" id="payment-button" style="background-color: #25a521 !important; border: none !important; color: white !important;" class="subscribe btn btn-round-sm btn-lg btn-block">Checkout</button>
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
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
<script>
    function paymentFunction() {
        var paymentMethod = document.getElementById("payment").value;
            var amt = document.getElementById("amt").value + document.getElementById("delivery_charge");
            var amts = Number(amt)
            console.log(typeof amt)
            console.log(amts)
            switch (paymentMethod) {
                case "ESEWA":
                    document.form.action = "https://esewa.com.np/epay/main";
                    console.log("ESEWA");
                    break;
                case "KHALTI":
                    console.log("Khalti");
                                var config = {
                                        // replace the publicKey with yours
                                        "publicKey": "live_public_key_29c9afa4510e4fc49c1ee731e846c3c5",
                                        "productIdentity": "1234567890",
                                        "productName": "Dragon",
                                        "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
                                        "paymentPreference": [
                                            "KHALTI",
                                            "EBANKING",
                                            "MOBILE_BANKING",
                                            "CONNECT_IPS",
                                            "SCT",
                                        ],
                                        "eventHandler": {
                                            onSuccess(payload) {
                                                // hit merchant api for initiating verfication
                                                $.ajax({
                                                    type: 'GET',
                                                    url: "{{ route('khalti.verifyPayment') }}",
                                                    data: {
                                                        token: payload.token,
                                                        amount: payload.amount,
                                                        "_token": "{{ csrf_token() }}"
                                                    },
                                                    success: function (res) {
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "{{ route('khalti.storePayment') }}",
                                                            data: {
                                                                response: res,
                                                                "_token": "{{ csrf_token() }}"
                                                            },
                                                            success: function (res) {

                                                                document.form.action = "{{url('/orderConfirmation')}}";
                                                                console.log(res);
                                                                {{--window.location.replace({{route('orderConfirmation')}});--}}
                                                                var tr_str = "<div id='alertmsg' class='alert alert-success alert-block'>" +
                                                                    "<div class='col-md-2 col-sm-2 col-lg-2'><i class='fa fa-check-circle-o fa-2x' style='color: #fff !important'></i> </div>" +
                                                                    "<div class='col-md-10 col-sm-10 col-lg-10'><strong>" + "Success !" + "</strong>" +
                                                                    "<p>" + " Your order has been placed with khalti checkout for invoice" + "</p>" +
                                                                    "</div>" +
                                                                    "<div class='bottom'> <div class='loader__element'></div></div>" +
                                                                    "</div>";
                                                                $("#msg").append(tr_str);
                                                            }
                                                        });
                                                    }
                                                });
                                            },
                                            onError(error) {
                                                console.log(error);
                                            },
                                            onClose() {
                                                console.log('widget is closing');
                                            }
                                        }
                                    };
                                    var checkout = new KhaltiCheckout(config);
                                    checkout.show({amount: amt * 100});
                    break;
                default:
                    document.form.action = "{{route('orderConfirmation')}}";
                    console.log("By default")
                break;

            }

}



</script>

<script>
    function addressFunction() {
        var x = document.getElementById("mySelect").value;
        switch (x) {
             case 'lalitpur':
                 document.getElementById("delivery_charge").innerHTML = "Rs 70";
                 break;
                 case 'bhaktpur':
                     document.getElementById("delivery_charge").innerHTML = "Rs 80" ;
                     break;
                     case 'kathmandu':
                         document.getElementById("delivery_charge").innerHTML = "Rs 60" ;
                         break;
                         default:
                             break;
        }
    }
    $( document ).ready(function() {
        var x = document.getElementById("mySelect").value;

        switch (x) {
            case 'lalitpur':
                document.getElementById("delivery_charge").innerHTML = "Rs 70";
                break;
            case 'bhaktpur':
                document.getElementById("delivery_charge").innerHTML = "Rs 80" ;
                break;
            case 'kathmandu':
                document.getElementById("delivery_charge").innerHTML = "Rs 60" ;
                break;
            default:
                break;
        }
    });
</script>

@endpush
