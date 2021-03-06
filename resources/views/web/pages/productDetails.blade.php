@extends('web.layouts.app')

@section('content')

    <style>
        .image-gallery {
            margin: 10px;
            display: table;
            width: 50%;
            float: left;
        }

        .primary,
        .thumbnails {
            display: table-cell;
        }
        /*.thumbnails {*/
        /*    !*width: 150px;*!*/
        /*}*/

        .primary {
            width: 100%;
            height: 100%;
            padding: 20px;
            background-color: #cccccc;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .thumbnail:hover .thumbnail-image, .selected .thumbnail-image {
            border: 4px solid red;
        }

        .thumbnail-image {
            width: 100px;
            height: 100px;
            margin: 20px auto;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            border: 4px solid transparent;
        }
    </style>
    <main>
        <section class="container mt-2" >


            <h2><span>{{$product->name}}</span></h2>
            <!-- Single Product - start -->
            <div class="prod-wrap">

                <!-- Product Images -->
                @if($product->category=="second-hand")
                    <div class="image-gallery">
                        <aside class="thumbnails">
                            <a href="#" class="selected thumbnail" data-big="{{$product->getImage()}}">
                                <div class="thumbnail-image" style="background-image: url({{$product->getImage()}})"></div>
                            </a>
                            <a href="#" class="thumbnail" data-big="{{$product->getMiddleImage()}}">
                                <div class="thumbnail-image" style="background-image: url({{$product->getMiddleImage()}})"></div>
                            </a>
                            <a href="#" class="thumbnail" data-big="{{$product->getlastImage()}}">
                                <div class="thumbnail-image" style="background-image: url({{$product->getlastImage()}})"></div>
                            </a>
                        </aside>

                        <main class="primary" style="background-image: url({{$product->getImage()}});"></main>
                    </div>





{{--                    <div class="prod-slider-wrap">--}}
{{--                        <div class="prod-slider">--}}
{{--                            <ul class="prod-slider-car">--}}
{{--                                <li>--}}
{{--                                    <a data-fancybox-group="product" class="fancy-img" href="{{$product->getImage()}}">--}}
{{--                                        <img src="{{$product->getImage()}}" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a data-fancybox-group="product" class="fancy-img" href="{{$product->getMiddleImage()}}">--}}
{{--                                        <img src="{{$product->getMiddleImage()}}" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a data-fancybox-group="product" class="fancy-img" href="{{$product->getlastImage()}}">--}}
{{--                                        <img src="{{$product->getlastImage()}}" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="prod-thumbs">--}}
{{--                            <ul class="prod-thumbs-car">--}}
{{--                                <li>--}}
{{--                                    <a data-slide-index="0" href="#">--}}
{{--                                        <img src="{{$product->getImage()}}" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a data-slide-index="1" href="#">--}}
{{--                                        <img src="{{$product->getMiddleImage()}}" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a data-slide-index="2" href="#">--}}
{{--                                        <img src="{{$product->getlastImage()}}" alt="">--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}

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
                           <h3> <del style="color:red !important;">Rs. {{$product->price}}</del><br>
                            <b class="item_current_price" style="color:#25a521 !important; margin-top: 10px !important; font-weight: 800 !important;">Rs. {{$product->getDicountedPrice()}}</b></h3>
                        </p>
{{--                        <form  method="post" action="{{url('add/to/cart/'.$product->id)}}">--}}
{{--                            {{csrf_field() }}--}}
{{--                        <div class="quantity">--}}
{{--                           Quantity : <input type="number" name="quantity" min="1" value="1">--}}
{{--                        </div>--}}
                        <p class="prod-addwrap" >
                            <a href="#" onclick="addtoCart({{ $product->id }})" class="prod-add buttonfont" style="background-color: #FF8800 !important;" rel="nofollow">Add to cart</a>
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
                        @elseif($product->sub_category=="coursebook" || $product->sub_category=="question-bank-and-solution")
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
                        @elseif($product->sub_category=="loksewa-examination" || $product->sub_category=="medical-examination")
                        <ul class="prod-i-props">
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
                    @elseif($product->sub_category=="Rakshya")
                        <ul class="prod-i-props">
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
                            @if($related_products)
                            @foreach($related_products as $related_product)
                            <div class="prod-rel">
                                <a href="{{url('productDetails/'.$related_product->id)}}" class="prod-rel-img">
                                    <img src="{{$related_product->getSecondHandFrontImage()}}" oncontextmenu="return false;" alt="{{$related_product->name}}">
                                </a>
                                <div class="prod-rel-cont">
                                    <p><a href="{{url('productDetails/'.$related_product->id)}}" style="color: black !important;">{{$related_product->name}}</a></p>
                                    <p style="color:#25a521 !important;">Rs: {{$related_product->getDicountedPrice()}}</p>  <i  onclick="addtoCart({{ $product->id }})" class="fa fa-shopping-cart"></i>
                                </div>
                            </div>
                            @endforeach
                                @endif

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
    <script>
        function addtoCart(id) {
            var product_id = id;
            var url = "/add/to/cart/" +product_id;
            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    console.log("here");
                    var tr_str = "<div id='alertmsg' class='alert alert-success alert-block'>" +
                        "<div class='col-md-2 col-sm-2 col-lg-2'><i class='fa fa-check-circle-o fa-2x' style='color: #fff !important'></i> </div>" +
                        "<div class='col-md-10 col-sm-10 col-lg-10'><strong>" + "Success !" + "</strong>" +
                            "<p>" + data[0] + "</p>" +
                        "</div>" +
                        "<div class='bottom'> <div class='loader__element'></div></div>" +
                        "</div>";
                    $("#msg").append(tr_str);
                    var value=$("#cart").val();
                    $("#cartValue").text(value++);
                    console.log(value++);
                    setTimeout(function(){
                        $("#alertmsg").remove();
                    }, 5000 ); // 3 secs
                },
                error: function(xhr) {
                    if (xhr.status==401){
                        location.replace(window.location.href+"login")
                    }else{
                        var tr_str = "<div style='background-color: red;' id='alertmsg' class='alert alert-danger alert-block'>" +
                            "<strong>" + "Internal Server Error" + "</strong>" +
                            "<div class='loader__element'></div>" +
                            "</div>";
                        $("#msg").append(tr_str);
                        setTimeout(function(){
                            $("#alertmsg").remove();
                        }, 3000 ); // 3 secs
                    }
                }
            })
        }

        $(document).ready(function() {
            if ($('.prod-slider-car').length > 0) {
                $('.prod-slider-car').each(function () {
                    $(this).bxSlider({
                        pagerCustom: $(this).parents('.prod-slider-wrap').find('.prod-thumbs-car'),
                        adaptiveHeight: true,
                        infiniteLoop: false,
                    });
                    $(this).parents('.prod-slider-wrap').find('.prod-thumbs-car').bxSlider({
                        slideWidth: 5000,
                        slideMargin: 8,
                        moveSlides: 1,
                        infiniteLoop: false,
                        minSlides: 5,
                        maxSlides: 5,
                        pager: false,
                    });
                });
            }
        });

        $('.thumbnail').on('click', function() {
            var clicked = $(this);
            var newSelection = clicked.data('big');
            var $img = $('.primary').css("background-image","url(" + newSelection + ")");
            clicked.parent().find('.thumbnail').removeClass('selected');
            clicked.addClass('selected');
            $('.primary').empty().append($img.hide().fadeIn('slow'));
        });
    </script>
    @endpush
