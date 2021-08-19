@extends('web.layouts.app')

@section('content')
    <main>
        <section class="container mt-2" >


            <h2><span>{{$product->name}}</span></h2>
            <!-- Single Product - start -->
            <div class="prod-wrap">

                <!-- Product Images -->
                @if($product->category=="second-hand")
                    <div class="prod-slider-wrap">
                        <div class="prod-slider">
                            <ul class="prod-slider-car">
                                <?php $picture = explode(",", $product->image);
                                for($i=0;$i<count($picture);$i++) {?>
                                    <li>
                                        <a data-fancybox-group="product" class="fancy-img" href="{{ asset('/storage/product_image/'.$picture[$i]) }}">
                                            <img src="{{ asset('/storage/product_image/'.$picture[$i]) }}" alt="{{$product->name}}" onclick="onClick(this)" class="modal-hover-opacity">
                                        </a>
                                    </li>
                                <?php }?>
                            </ul>
                        </div>
                        <div class="prod-thumbs">
                            <ul class="prod-thumbs-car">
                                <?php $picture = explode(",", $product->image);
                                for($i=0;$i<count($picture);$i++) {?>
                                    <li>
                                        <a data-slide-index="{{$i}}" href="#">
                                            <img src="{{ asset('/storage/product_image/'.$picture[$i]) }}" alt="">
                                        </a>
                                    </li>
                                 <?php }?>
                            </ul>
                        </div>
                    </div>

                    @else
                    <div class="prod-slider-wrap">
                        <div class="prod-slider">
                            <ul class="prod-slider-car">
                                <li>
                                    <a data-fancybox-group="product" class="fancy-img" href="{{$product->getImage()}}">
                                        <img src="{{$product->getImage()}}" alt="{{$product->name}}" oncontextmenu="return false;">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif



                <!-- Product Description/Info -->
                <div class="prod-cont">
                    <p class="prod-actions">
                    </p>
                    <div class="prod-info">
                        <p class="prod-price">
                           <h3> <b class="item_current_price" style="color:#25a521 !important;">Rs. {{$product->getDicountedPrice()}}</b></h3>
                        </p>
{{--                        <form  method="post" action="{{url('add/to/cart/'.$product->id)}}">--}}
{{--                            {{csrf_field() }}--}}
{{--                        <div class="quantity">--}}
{{--                           Quantity : <input type="number" name="quantity" min="1" value="1">--}}
{{--                        </div>--}}
                        <p class="prod-addwrap" >
                            <a href="{{url('add/to/cart/'.$product->id)}}" class="prod-add buttonfont" style="background-color: #FF8800 !important;" rel="nofollow">Add to cart</a>
                        </p>
{{--                        </form>--}}
                    </div>
                    @if($product->sub_category=="novel")
                        <ul class="prod-i-props">
                            <li>
                                <b>Author</b>: {{$product->author}}
                            </li>

                            <li>
                                <h3><span>Short Description</span></h3><br>
                                {!!html_entity_decode($product->excerpt)!!}
                            </li>

                        </ul>
                        @else
                        <ul class="prod-i-props">
                            <li>
                                <b>Faculty</b> : {{$product->faculty}}
                            </li>
                            <li>
                                <b>Semester</b> :  {{$product->semester}}
                            </li>
                            <li>
                                <b>Publication</b>: <strong class="text-uppercase">{{$product->publication}}</strong>
                            </li>
                            <li>
                                <b>Edition</b>: {{$product->edition}}
                            </li>
                            <li>
                                <b>Author</b>: <strong class="text-capitalize">{{$product->author}}</strong>
                            </li>
                            @if($product->excerpt)
                            <li>
                                <h3><span>Short Description</span></h3>
                                <p style="text-align: justify;">{!!html_entity_decode($product->excerpt)!!}</p>
                            </li>
                            @endif
                        </ul>
                        @endif

                </div>
                <div class="prod-tabs-wrap">
                    <ul class="prod-tabs">
                        <li><a data-prodtab-num="1" class="active buttonfont" href="#" data-prodtab="#prod-tab-1">Description</a></li>
                        <li><a data-prodtab-num="3"  class="buttonfont" href="#" data-prodtab="#prod-tab-3">Video</a></li>
                    </ul>
                    <div class="prod-tab-cont">
                        <p data-prodtab-num="1" class="prod-tab-mob active" data-prodtab="#prod-tab-1">Description</p>
                        <div class="prod-tab stylization" id="prod-tab-1">
                            {!!html_entity_decode($product->description)!!}
                        </div>
                        <p data-prodtab-num="3" class="prod-tab-mob" data-prodtab="#prod-tab-3">Video</p>
                        <div class="prod-tab prod-tab-video" id="prod-tab-3">
                            @if(!$product->youtube_link)
                                @else
                            <iframe width="853" height="480" src="{{$product->youtube_link}}?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                                @endif
                        </div>
                    </div>
                </div>

            </div>
            <!-- Single Product - end -->

            <!-- Related Products - start -->
            <div class="prod-related">
                <h2><span>Related products</span></h2>
                <div class="prod-related-car" id="prod-related-car">
                    <ul class="slides">
                        <li class="prod-rel-wrap">
                            @foreach($related_product as $related_product)
                            <div class="prod-rel">
                                <a href="{{url('productDetails/'.$related_product->id)}}" class="prod-rel-img">
                                    <img src="{{$related_product->getImage()}}" oncontextmenu="return false;" alt="{{$related_product->name}}">
                                </a>
                                <div class="prod-rel-cont">
                                    <p><a href="{{url('productDetails/'.$related_product->id)}}" style="color: black !important;">{{$related_product->name}}</a></p>
                                    <p style="color:#25a521 !important;">Rs: {{$related_product->getDicountedPrice()}}</p> <a href="{{url('add/to/cart/'.$product->id)}}" style="color:#FF8800 !important;"> <i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            @endforeach

                        </li>
                    </ul>
                </div>
            </div>
            <!-- Related Products - end -->

        </section>
    </main>
    <!-- Main Content - end -->
@endsection
@push('scripts')
    @endpush
