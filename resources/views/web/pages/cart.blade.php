@extends('web.layouts.app')
@section('content')

    <!-- Main Content - start -->
    <main>
        <section class="container stylization maincont mt-5">

            <h1 style="align-content: center" ><span>Shopping Cart</span></h1>

            <!-- Cart Items - start -->
            <div class="row">
                <div class="col-lg-8 col-md-12">
            <form action="#" style="color: black !important;">
                <div class="cart-items-wrap">
                    <table class="cart-items">
                        <thead>
                        <tr>
                            <td class="cart-ttl"><h4 style="color: black !important; font-weight: bold">Book Name</h4></td>
                            <td class="cart-price"><h4 style="color: black !important; font-weight: bold">Price</h4></td>
                            <td class="cart-quantity"><h4 style="color: black !important; font-weight: bold">Quantity</h4></td>
                            <td class="cart-quantity"><h4 style="color: black !important; font-weight: bold">Total Amount</h4></td>
                            <td class="cart-del">&nbsp;</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $carts)

                        <tr style="text-align: center;">

                            <td class="cart-img">
                               <a href="{{url('productDetails/'.$carts->product_id)}}"><b style="color: black !important;">  <img src="{{$carts->getImage()}}" alt="House of Books" oncontextmenu="return false;" width="100px" height="100px"> <br>{{$carts->product_name}}</b></a>
                            </td>
                            <td class="cart-price">
                                <b style="color: black !important;">Rs {{$carts->product_price}}</b>
                            </td>
                            <td class="cart-quantity">
                                <p class="cart-qnt" >
                                    <b style="color: black !important;">{{$carts->quantity}} pcs</b>
                                </p>
                            </td>
                            <td class="cart-quantity">
                                <p class="cart-qnt" >
                                    <b style="color: black !important;">Rs {{getProductPrice($carts->product_price,$carts->quantity)}}</b>
                                </p>
                            </td>

                            <td class="cart-del">
                                <a data-toggle="modal" href="#modal-delete-{{ $carts->id }}" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <div class="modal fade modal-mini modal-primary" id="modal-delete-{{ $carts->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <br>
                                                <i class="fa fa-trash fa-3x"></i>
                                            </div>
                                            <div class="modal-body text-center" style="height: 50px !important;">
                                                <p>
                                                    Are you sure want to delete this data?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{url("cart/delete/".$carts->id)}}">
                                                    <span class="btn btn-primary " style="width: 100px; height: 40px; color: white !important; background: #ff682c;">Yes</span>
                                                </a>
                                                <button class="btn btn-danger"  style="margin-top: 10px; background: red !important;" data-dismiss="modal">
                                                  No
                                                </button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                             </td>
                        </tr>
                            @endforeach
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <strong>Coupon Code</strong>--}}
{{--                                        <input type="text" class="form-control"  name="coupon">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </td>--}}
{{--                        </tr>--}}
                        </tbody>
                    </table>
                </div>
                <ul class="cart-total">
                    <li class="cart-summ">TOTAL: <b>{{getCartTotalPrice()}}</b></li>
                </ul>
            </form>
                </div>
                <!-- Cart Items - end -->
                <div class="col-lg-4 col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="border:none !important;  background-color: #e5e5e5 !important;">
                                    <h4 class="card-title mt-2" style="color: black !important; font-weight: bold; font-size: 30px">Order Summary</h4>
                                <article class="card-body">
                                    <dl class="dlist-align" style="text-align: justify !important ;color: black !important; font-weight: bold; font-size: 16px;" >
                                        Quantity:<b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;">{{getCartAmount()}}</b>  <br>
                                        Amount:<b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;"> RS. {{getCartTotalPrice()}} </b><br>
                                        Delivery : <b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;">Considered as address</b> <br>
                                        <hr style="height: 5px; !important;"> <br>
                                        Total Amount: <b style="position: absolute; right: 0; margin-right: 30px ;color: black !important;"> RS. {{getCartTotalPrice()}} </b>
                                    </dl>
                                </article>

                                <div class="col-md-12 mt-4">
                                    @if( getCartAmount() == 0)
                                    <a href="{{url('/')}}"> <button type="submit" style="background-color: #25a521 !important;" class="subscribe btn btn-round-sm btn-lg btn-block">Start Shopping Now</button></a>
                                     @else
                                        <a href="{{url('checkout')}}"> <button type="submit" style="background-color: #25a521 !important;" class="subscribe btn btn-round-sm btn-lg btn-block">Checkout</button></a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Main Content - end -->

@endsection
