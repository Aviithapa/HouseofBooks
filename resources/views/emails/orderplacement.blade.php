<!DOCTYPE html>
<html >
<head>
    <link rel = "icon" href ="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" type = "image/x-icon">
    <title>{{getSiteSetting('site_title') != null? getSiteSetting('site_title'): ''}} | {{ isset($pageContent->meta_link)?$pageContent->meta_link:""}}</title>
    <meta charset="utf-8">
    <meta name="description" content="`{{isset($pageContent->meta_description)?$pageContent->meta_description:""}}`">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .body{
            background-color: #eeeeee;
            padding: 30px;
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
    </style>
</head>
<body>


<div class="body">
    Hello <strong>House of Books</strong>,

    <p>You got a order from {{$name}}</p>

    <table id="customers">
        <tr>
            <th>Product</th>
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
    <p>Please Confirm The Order</p>

</div>
</body>
</html>



