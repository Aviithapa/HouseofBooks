<html>
<head>
    <link rel = "icon" href ="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" type = "image/x-icon">
    <title>{{getSiteSetting('site_title') != null? getSiteSetting('site_title'): ''}} | {{ isset($pageContent->meta_link)?$pageContent->meta_link:""}}</title>
    <meta charset="utf-8">
    <meta name="description" content="`{{isset($pageContent->meta_description)?$pageContent->meta_description:""}}`">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <section class="invoice" id="printable">
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <img src="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" width="150" height="100">
                        </div>
                        <div class="vl" style="border-left: 6px solid green;height: auto;"></div>
                        <div class="col-4">
                            <h1>House of Books Nepal </h1>
                            <h5>Shankmul Ward no 31 Kathmandu, Nepal</h5>
                            <h5>Contact Details :9845769230 <br>9848788289</h5>
                            <h5>Email:houseofbooksnepal@gmail.com</h5>
                            <h5>Website:http://houseofbooks.com.np</h5>
                        </div>
                    </div>

                    <div class="row mb-4 mt-5">
                        <div class="col-6">
                            <h2 class="page-header bold"><i class="fa fa-globe"></i> Order Id: {{ $order->id }}</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right bold">Date: {{ $order->created_at->toFormattedDateString() }}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-4">Placed By
                            <address><strong class="bold">{{ $order->name }}</strong><br>Email: {{ $order->email }}</address>
                        </div>
                        <div class="col-4">Ship To
                            <address><strong class="bold">{{ $order->name }}</strong><br>{{ $order->address }}<br>{{ $order->collage_name }}, {{ $order->collage_address }} <br>{{ $order->phone_number }}<br></address>
                        </div>
                        <div class="col-4">
                            <b>Order ID:</b> {{ $order->id }}<br>
                            <b>Amount:</b> {{ round($order->grand_total, 2) }}<br>
                            <b>Order Status:</b> {{ $order->status }}<br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Book</th>
                                    <th>Category</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderlist as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->product->category }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>Rs. {{ round($item->price, 2) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

</body>
</html>
