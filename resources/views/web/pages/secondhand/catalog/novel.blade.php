@extends('web.layouts.app')
@section('content')
    <!-- Main Content - start -->
    <main>
        <section class="container">

            <h2 class="main-ttl"><span> Category</span></h2>
            <div class="section-sb">
                <div class="section-sb-current">
                    <ul class="section-sb-list" id="section-sb-list">
                        <li class="categ-1">
                            <a href="{{url('/secondhand/catalog/nobel')}}">
                                <span class="categ-1-label">Nobel</span>
                            </a>
                        </li>
                        <li class="categ-1">
                            <a href="{{url('/secondhand/catalog/coursebook')}}">
                                <span class="categ-1-label">Coursebook</span>
                            </a>
                        </li>
                        <li class="categ-1 has_child">
                            <a href="{{url('/secondhand/catalog/question-bank-and-solution')}}">
                                <span class="categ-1-label">Question bank and Solution</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- Catalog Items | Gallery V1 - start -->
            <div class="section-cont">

                <!-- Catalog Topbar - start -->
                <div class="section-top">

                    <!-- View Mode -->
                    <ul class="section-mode">
                        <li class="section-mode-gallery active"><a title="View mode: Gallery" href="{{url('catalog')}}"></a></li>
                        <li class="section-mode-list"><a title="View mode: List" href="{{url('catalog')}}"></a></li>
                        <li class="section-mode-table"><a title="View mode: Table" href="{{url('catalog')}}"></a></li>
                    </ul>

                    <!-- Sorting -->
                    <!-- Count per page -->
                    <div class="section-count">
                        <p>12</p>
                        <ul>
                            <li><a href="#">12</a></li>
                            <li><a href="#">24</a></li>
                            <li><a href="#">48</a></li>
                        </ul>
                    </div>

                </div>
                <!-- Catalog Topbar - end -->
                <div class="prod-items section-items">
                    @include('web.pages.flash-message')
                    @foreach($products as $product)

                            <div class="prod-i">
                                <div class="prod-i-top">
                                    <a href="{{url('productDetails/'.$product->id)}}" class="prod-i-img"><!-- NO SPACE --><img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}"><!-- NO SPACE --></a>
                                    <p class="{{url('productDetails/'.$product->id)}}"><i class="fa fa-info"></i></p>
                                </div>
                                <div class="prod-sticker" >
                                    <p class="prod-sticker-3" style="background-color: #FF8800 !important;">-{{$product->discount}}%</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
                                </div>
                                <h3>
                                    <a style="color: black !important;" href="{{url('productDetails/'.$product->id)}}">{{ str_limit($product->name, 28) }}</a>
                                </h3>
                                @if($product->sub_category=="novel")
                                <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.9;">{{$product->nobel_category}} </p>
                                @else
                                    @endif
                                <p class="prod-i-price">
                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                    <button onclick="addtoCart({{ $product->id }})" class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button>
                                </p>
                                <div class="prod-i-skuwrapcolor">
                                </div>
                            </div>
                    @endforeach
                </div>

                <!-- Pagination - start -->

{{--            {{$products->links( "pagination::bootstrap-4") }}--}}
            <!-- Pagination - end -->
            </div>
            <!-- Catalog Items | Gallery V1 - end -->

        </section>
    </main>
    <!-- Main Content - end -->
@endsection

@push('scripts')
<script>
    function addtoCart(id) {
        var product_id = id;
        var url = "add/to/cart/" +product_id;
        $.ajax({
            url: url,
            type: "GET",
            success: function (data) {
                var tr_str = "<div id='alertmsg' class='alert alert-success alert-block'>" +
                    "<strong>" + data[0] + "</strong>" +
                    "<div class='loader__element'></div>" +
                    "</div>";
                $("#msg").append(tr_str);
                setTimeout(function(){
                    $("#alertmsg").remove();
                }, 3000 ); // 3 secs
            }
        })
    }
</script>

@endpush
