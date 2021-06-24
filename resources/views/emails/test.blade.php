<style>
    .body{
        background-color: #eeeeee;
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
<p>Please ensure the order</p>

</div>
