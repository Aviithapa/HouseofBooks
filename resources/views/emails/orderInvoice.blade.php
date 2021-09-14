<html>
<head>
    <style>
        .logo{

            float: left;
        }
        .logos{
            margin: auto;
            width: 80%;
        }
        .vl {
            border-left: 6px solid green;
            height: 125px;
            float: left;
            margin-left: 20px;
            margin-right: 20px;
        }
        .invoice{
            width: 100%;
            margin-bottom: 10px;
            height: 120px;
        }
        .col{
            width: 50%;
            float: left;
        }
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        .invoice{
            width: 100%;
        }


    </style>
</head>
<body>

<div class="container" style="margin-top: 20px;">

    <div class="logos">

        <img src="http://houseofbooks.com.np/storage/logo_image/Prw3mhhR9aEVYC0SFNmgU9CZGSoHSoipUErXIPNC.png" class="logo" width="150" height="125">
        <div class="vl"></div>
        <span style="font-size:30px; font-weight: bold; margin-top: 10px; color: #FF8800;">House of Books Pvt. Ltd.</span><br>
        Shankhamul Ward no 31 Kathmandu, Nepal<br>
        Contact Details :9845769230 9848788289<br>
        Email:houseofbooksnepal@gmail.com<br>
        Website:http://houseofbooks.com.np<br>

    </div>
    <h1 style="margin-top: 20px;">Order Id: {{ $order->id }}</h1>
    <div class="invoice">
        <div class="col">
            <address>Placed By : <br><strong class="bold">{{ $order->name }}</strong><br>Email: {{ $order->email }}<br>Phone: {{ $order->phone_number }}</address>
        </div>
        <div class="col">
            <address>Ship To : <br><strong class="bold">{{ $order->name }}</strong><br>Address: {{ $order->address }}<br> Status: {{$order->status}}</address>
        </div>

    </div>


    <table class="table table-striped" id="customers">
        <tr>
            <th>Book</th>
            <th>Category</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
        @foreach($orderlist as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->category }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rs. {{ round($item->price, 2) }}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td>Amount:</td>
            <td>RS {{ round($order->grand_total, 2) }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Delivery Charge:</td>
            <td>RS {{ $order->delivery_charge }}</td>
        </tr>
        @if($order->coupons_total)
            <tr>
                <td></td>
                <td></td>
                <td>Discount Amount With Coupon:</td>
                <td> RS {{ round($order->coupons_total, 2)}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Total Amount:</td>
                <td> RS {{ round($order->coupons_total, 2) + $order->delivery_charge}}</td>
            </tr>
        @else
            <tr>
                <td></td>
                <td></td>
                <td>Total Amount:</td>
                <td> RS {{ round($order->grand_total, 2) + $order->delivery_charge}}</td>
            </tr>
        @endif

    </table>


    </section>

</body>
</html>
