<html>
<head>
    <link rel = "icon" href ="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" type = "image/x-icon">
    <title>{{getSiteSetting('site_title') != null? getSiteSetting('site_title'): ''}} | {{ isset($pageContent->meta_link)?$pageContent->meta_link:""}}</title>
    <meta charset="utf-8">
    <meta name="description" content="`{{isset($pageContent->meta_description)?$pageContent->meta_description:""}}`">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .row{
            width: 100%;

        }
        .col-3{
            width: 25%;
            float: left;
        }
        .col-4{
            width: 70%;
            float: left;
        }
        .col-6{
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
        .order_id{
            width: 100%;
            height: 30px;
        }
        .order{
            left: 0;
            position:absolute;
        }
        .date{
            right: 0;
            position:absolute;
        }
        .invoice-info{
            margin-top: 30px;
        }
        .col{
            height: fit-content;
            margin: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice">
                    <div class="row justify-content-center" style=" text-align: center;">
                        <div class="title">
                            <img src="http://houseofbooks.com.np/storage/logo_image/Prw3mhhR9aEVYC0SFNmgU9CZGSoHSoipUErXIPNC.png" width="100" height="75">
                            <h1>House of Books Nepal</h1>
                            Shankmul Ward no 31 Kathmandu, Nepal<br>
                            Contact Details :9845769230 9848788289<br>
                            Email:houseofbooksnepal@gmail.com<br>
                            Website:http://houseofbooks.com.np<br>
                        </div>
                    </div>

                    <div class="order_id">
                        <div class="order">
                            <h2 class="page-header bold"><i class="fa fa-globe"></i> Order Id: {{ $order->id }}</h2>
                        </div>
                        <div class="col-6 date">
                            <h5 class="text-right bold">Date: {{ $order->created_at->toFormattedDateString() }}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col">Placed By
                            <address><strong class="bold">{{ $order->name }}</strong><br>Email: {{ $order->email }}</address>
                        </div>
                        <div class="col">Ship To
                            <address><strong class="bold">{{ $order->name }}</strong><br>{{ $order->address }}<br>{{ $order->collage_name }}, {{ $order->collage_address }} <br>{{ $order->phone_number }}<br></address>
                        </div>
                        <div class="col">
                            <b>Order ID:</b> {{ $order->id }}<br>
                            <b>Amount:</b> {{ round($order->grand_total, 2) }}<br>
                            <b>Delivery Charge:</b> {{ $order->delivery_charge }}<br>
                            <b>Total Amount:</b> {{ round($order->grand_total, 2) + $order->delivery_charge}}<br>
                            <b>Order Status:</b> {{ $order->status }}<br>
                        </div>
                    </div>
                    <div class="row">
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
                            <div class="jst" style="right: 0; bottom: 0; position: absolute; margin-right: 120px; height: 100px ">
                                <b>Amount:</b>RS  {{ round($order->grand_total, 2) }}<br>
                                <b>Delivery Charge:</b>RS {{ $order->delivery_charge }}<br>
                                <b>Total Amount: </b> RS {{ round($order->grand_total, 2) + $order->delivery_charge}}<br>
                            </div>
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
