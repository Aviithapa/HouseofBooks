@extends('web.layouts.app')

@section('content')


    <div class="prod-items section-items container mt-5" style="padding-left:200px; padding-right: 200px; margin-bottom: 30px;">

    @foreach($products as $product)
                <div class="prod-i">
                    <div class="prod-i-top">
                        <a href="#" class="prod-i-img"><!-- NO SPACE --><img src="http://127.0.0.1:8000/storage/product_image/d9DvQKJiWb5mzziajlV9mR6x3mY1HJLQhCKa5uxc.png" oncontextmenu="return false;" alt="#"><!-- NO SPACE --></a>
                        <p class="#"></p>
                    </div>
                    <div class="prod-sticker">
                        <p class="prod-sticker-3">Hot Give Away</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
                    </div>
                    <h3>
                        <a style="color: black !important;" href="#">{{$product->name}}</a>
                    </h3>
                    <p class="prod-i-price">
                        <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->price}}</button><a href="#"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                    </p>
                    <div class="prod-i-skuwrapcolor">
                    </div>
                </div>
       @endforeach

    </div>
@endsection
@push('scripts')

@endpush
