<html>
<head>
    <link rel = "icon" href ="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" type = "image/x-icon">
    <title>{{getSiteSetting('site_title') != null? getSiteSetting('site_title'): ''}} | {{ isset($pageContent->meta_link)?$pageContent->meta_link:""}}</title>
    <meta charset="utf-8">
    <meta name="description" content="`{{isset($pageContent->meta_description)?$pageContent->meta_description:""}}`">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .orderConfirmation{
            background-color: #eeeeee;
            margin: 40px !important;
        }
        .orderSummery{
            background-color: white;
            border-radius: 10px;
            text-align: center!important;
            margin: 20px;
            float: left;
            width: 55%;
        }
        .header-area{
            text-align: center;
        }
        .Details-column{
            text-align: center;
            width: 40%;
            float: left;
        }
    </style>
</head>
<body>

    <div class="container-fluid orderConfirmation" >
        <div class="header-area text-center">
            <img src="https://images.vexels.com/media/users/3/157931/isolated/preview/604a0cadf94914c7ee6c6e552e9b4487-curved-check-mark-circle-icon-by-vexels.png" height="100" width="100">
            <h2>WE HAVE RECEIVED YOUR ORDER !!</h2>
            <strong>Order No: #0007777{{$order->id}} </strong>
            <p>Please check your email from a copy of your invoice. Thank you for <strong>ORDERING!</strong> </p>
        </div>
        <hr>
        <div class="row">
            <div class="col-5 Details-column text-center">
                <h2>Delivery Details</h2>
                <p><strong>Delivery Name :{{$order->name}}</strong></p>
                <p><strong>Delivery Contact Number : {{$order->phone_number}}</strong></p>

                <h2>Payment Method</h2>
                @if($order->payment_method=="cash_on_delivery")
                    <p><strong>Cash On Delivery </strong></p>
                @else
                    <p><strong>ESEWA</strong></p>
                @endif
                <h2>Delivery Address</h2>
                <p><strong>{{$order->address}} </strong></p>
                <h2>Payment Status</h2>
                <p><strong class="text-uppercase">{{$order->payment_status}} </strong></p>
            </div>
            <div class="col-6 orderSummery ">

                <div class="cart-items-wrap">
                    <table class="cart-items text-center">
                        <h3>Order Summary</h3>
                        <thead>

                        <tr>
                            <td class="cart-ttl"><span style="color: black !important; font-weight: bold">Book Name</span></td>
                            <td class="cart-price"><span style="color: black !important; font-weight: bold">Price</span></td>
                            <td class="cart-quantity"><span style="color: black !important; font-weight: bold">Quantity</span></td>
                            <td class="cart-quantity"><span style="color: black !important; font-weight: bold">Total Amount</span></td>
                        </tr>
                        </thead>
                        <tbody>
                        @include('web.pages.flash-message')
                        @foreach($orderlist as $item)

                            <tr style="text-align: center;">

                                <td class="cart-img">
                                    {{ $item->product->name}}
                                </td>
                                <td class="cart-price">
                                    <b style="color: black !important;">Rs {{ round($item->price, 2) }}</b>
                                </td>
                                <td class="cart-quantity">
                                    <p class="cart-qnt" >
                                        <b style="color: black !important;">{{ $item->quantity }} pcs</b>
                                    </p>
                                </td>
                                <td class="cart-quantity">
                                    <p class="cart-qnt" >
                                        <b style="color: black !important;">Rs {{getProductPrice($item->price,$item->quantity )}}</b>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <strong>
                    <br><br>
                    Thank you!
                    <br>

                    With Best Regards,<br>
                    <img src="http://houseofbooks.com.np/storage/logo_image/Prw3mhhR9aEVYC0SFNmgU9CZGSoHSoipUErXIPNC.png" height="100" width="100"/>
                    Sales and Marketing Department<br>
                    House of Books Pvt. Ltd.<br>
                    Shankhamul, Ward No 31, Kathmandu, Nepal<br>
                    Contact No: +977-9845769203/ 9848788289<br>
                    Email: houseofbooksnepal@gmail.com, info@houseofbooks.com.np<br>
                    Website: www.houseofbooks.com.np<br>
                </strong>
            </div>
        </div>
    </div>

</body>
</html>
