@extends('web.layouts.app')

@section('content')

    <style>
        .give-away{
            width: 45%;
            float: left;
            justify-content: center;
            margin-left: 20px;
            text-align: center;
        }
        .give-away img{
            width: 50%;
        }
        .book{
            display: grid;
         justify-items: center;
        }
    </style>
            <div class="book">
                <div class="container">
                            <div class="give-away">
                        <a href="#">
                            <img src="https://houseofbooks.com.np/storage/product_image/d9DvQKJiWb5mzziajlV9mR6x3mY1HJLQhCKa5uxc.png" alt="">
                        </a>
                        <input type="hidden" value="" id="pro_id">
                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">BAC</h5>
                        <p style="color: black!important;  font-style: italic; font-size: 12px;">ABjc</p>
                        <p class="prod-i-price">
                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS </button>
                            <a href="#"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                        </p>
                    </div>

                    <div class="give-away">
                        <a href="#">
                            <img src="https://houseofbooks.com.np/storage/product_image/d9DvQKJiWb5mzziajlV9mR6x3mY1HJLQhCKa5uxc.png" alt="">
                        </a>
                        <input type="hidden" value="" id="pro_id">
                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">BAC</h5>
                        <p style="color: black!important;  font-style: italic; font-size: 12px;">ABjc</p>
                        <p class="prod-i-price">
                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS </button>
                            <a href="#"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                        </p>
                    </div>
                </div>
            </div>

@endsection
@push('scripts')

@endpush
