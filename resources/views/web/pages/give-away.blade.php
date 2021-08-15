@extends('web.layouts.app')

@section('content')


    <div class="prod-items give-away section-items container mt-5" style=" margin-left: auto;
    margin-right: auto;
    padding-left: 70px !important;
    width:60%; margin-bottom: 30px;">

    @foreach($products as $product)
            <div class="prod-i">
                <div class="prod-i-top">
                    <a href="{{url('productDetails/'.$product->id)}}" class="prod-i-img"><!-- NO SPACE --><img src="{{$product->getImage()}}" alt="{{$product->name}}"><!-- NO SPACE --></a>
                    <p class="{{url('productDetails/'.$product->id)}}"></p>
                </div>
                <div class="prod-sticker">
                    <p class="prod-sticker-3" style="background-color: #FF8800 !important;">HOT GIVE AWAY SALE</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
                </div>
                <h3>
                    <a style="color: black !important;" href="{{url('productDetails/'.$product->id)}}">{{ str_limit($product->name, 28) }}</a>
                </h3>
                <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.9;">{{$product->author}} </p>
                <p class="prod-i-price">
                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                </p>
                <div class="prod-i-skuwrapcolor">
                </div>
            </div>
            <div class="prod-i">
                <div class="prod-i-top">
                    <a href="{{url('productDetails/'.$product->id)}}" class="prod-i-img"><!-- NO SPACE --><img src="{{$product->getImage()}}" alt="{{$product->name}}"><!-- NO SPACE --></a>
                    <p class="{{url('productDetails/'.$product->id)}}"></p>
                </div>
                <div class="prod-sticker">
                    <p class="prod-sticker-3" style="background-color: #FF8800 !important;">HOT GIVE AWAY SALE</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
                </div>
                <h3>
                    <a style="color: black !important;" href="{{url('productDetails/'.$product->id)}}">{{ str_limit($product->name, 28) }}</a>
                </h3>
                <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.9;">{{$product->author}} </p>
                <p class="prod-i-price">
                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                </p>
                <div class="prod-i-skuwrapcolor">
                </div>
            </div>
       @endforeach

    </div>
@endsection
@push('scripts')

@endpush
