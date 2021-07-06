<html>
<head>
    <style>
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

<div class="container">

    <p class="invoice" style=" text-align: center; justify-content: center;">
        <img src="http://houseofbooks.com.np/storage/logo_image/Prw3mhhR9aEVYC0SFNmgU9CZGSoHSoipUErXIPNC.png" width="100" height="75">
    <h1>House of Books Nepal</h1>
    Shankmul Ward no 31 Kathmandu, Nepal<br>
    Contact Details :9845769230 9848788289<br>
    Email:houseofbooksnepal@gmail.com<br>
    Website:http://houseofbooks.com.np<br>
    Order Id: {{ $order->id }}
    </p>

    <span class="row invoice-info" style="left:auto;">
                      Placed By
                              <address><strong class="bold">{{ $order->name }}</strong><br>Email: {{ $order->email }}</address>
                        <p class="col">Ship To
                            <address><strong class="bold">{{ $order->name }}</strong><br>{{ $order->address }}<br>{{ $order->collage_name }}, {{ $order->collage_address }} <br>{{ $order->phone_number }}<br></address>
        </p>
        <p>
                            <b>Order ID:</b> {{ $order->id }}<br>
                            <b>Amount:</b> {{ round($order->grand_total, 2) }}<br>
                            <b>Delivery Charge:</b> {{ $order->delivery_charge }}<br>
                            <b>Total Amount:</b> {{ round($order->grand_total, 2) + $order->delivery_charge}}<br>
                            <b>Order Status:</b> {{ $order->status }}<br>
                        </p>
                    </span>
    <div class="table-responsive">
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
        </table>
    </div>
    <div class="total" style="height: 100px ; width: 100%;">
        <div class="jst">
            <b>Amount:</b>RS  {{ round($order->grand_total, 2) }}<br>
            <b>Delivery Charge:</b>RS {{ $order->delivery_charge }}<br>
            <b>Total Amount: </b> RS {{ round($order->grand_total, 2) + $order->delivery_charge}}<br>
        </div>
    </div>
    </section>
</div>
</div>
</div>

<strong>
    <br><br>
    Thank you!
    <br>
    With Best Regards,<br>
    <img src="http://houseofbooks.com.np/storage/logo_image/Prw3mhhR9aEVYC0SFNmgU9CZGSoHSoipUErXIPNC.png" height="100" width="125"/><br>
    Sales and Marketing Department<br>
    House of Books Pvt. Ltd.<br>
    Shankhamul, Ward No 31, Kathmandu, Nepal<br>
    Contact No: +977-9845769203/ 9848788289<br>
    Email: houseofbooksnepal@gmail.com, info@houseofbooks.com.np<br>
    Website: www.houseofbooks.com.np<br>
</strong>
</div>

</body>
</html>
