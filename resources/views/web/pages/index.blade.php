@extends('web.layouts.app')

@section('content')
    <div>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner overflow-hidden">
                <div class="item active">
                    <img src="{{$banner->getImage()}}" alt="House of Books"  oncontextmenu="return false;">
                </div>
                @foreach($banners as $banners)
                <div class="item">
                    <img src="{{$banners->getImage()}}" alt="House of Books"  oncontextmenu="return false;">
                </div>
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class=" carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control" href="#myCarousel" data-slide="next" style="    right: 0;left: auto;">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="overwrite container">
                <div class="colam">
                    <div class="icons">
                        <span><img src="{{$question->getPostImage()}}" oncontextmenu="return false;" height="80px" width="80px"></span>
                    </div>
                    <h5 style="line-height: 1.4 !important;">QUESTION BANK <br>
                        AND SOLUTION SETS  <br>
                        FOR DIFFERENT COURSE</h5>
                </div>
                <div class="colam vl">
                    <div class="icons">
                        <span><img src="{{$course->getPostImage()}}" oncontextmenu="return false;" height="80px" width="80px"></span>
                    </div>
                    <h5 style="line-height: 1.4 !important;">COURSE BOOKS<br>
                        Available FROM <br>
                        VARIOUS PUBLICATION</h5>
                </div>
                <div class="colam vl">
                    <div class="icons">
                        <span><img src="{{$entrance->getPostImage()}}" oncontextmenu="return false;" height="80px" width="80px"></span>

                    </div>
                    <h5 style="line-height: 1.4 !important;">ENTRANCE EXAM <br>
                        PREPARATION BOOKS <br>
                        FOR DIFFERENT LEVELS</h5>
                </div>
                <div class="colam vl" >
                    <div class="icons">
                        <span><img src="{{$second->getPostImage()}}" oncontextmenu="return false;" height="80px" width="80px"></span>
                    </div>
                    <h5 style="line-height: 1.4 !important;">SECOND HAND <br>
                        BOOK SELLING AND <br>
                        BUYING PLATFORM</h5>
                </div>
    </div>

    <div class="mt-5">
            <div class="add">
                <img src="{{$add->getImage()}}" oncontextmenu="return false;" alt="houseofbooks" width="100%">
            </div>
{{--        <div class="col-lg-6 col-md-6 col-sm-12 add2">--}}
{{--            <div class="add">--}}
{{--                <img src="{{$add1->getImage()}}" oncontextmenu="return false;" alt="houseofbooks" width="90%">--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    @include('web.pages.flash-message')
    <div class="container-fluid mt-5" >
        <div class="bbb_viewed_title_container">
            <div class="title" >
                <h4>Best Selling Product</h4>
            </div>
            <p class="viewallbtn" style="float: right; margin-top: -60px; margin-right: 70px;"><a href="{{url('catalog')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>
        </div>
        <div class="container">
            <div class="tab">
                <button class="tablinks active" onclick="openNobels(event, 'Motivational')" id="defaultOpen">Motivational </button>
                <button class="tablinks" onclick="openNobels(event, 'Knowledge')">Skills and Knowledge</button>
                <button class="tablinks" onclick="openNobels(event, 'Frictional')">Frictional</button>
                <button class="tablinks" onclick="openNobels(event, 'Biographies')">Biographies</button>
            </div>
        </div>
        <div class="contentsecondhand tabcontent" id="Motivational" style="margin: 0px 150px 0px 150px; display:block;">
            <div class="row">
                @foreach($motivational as $product)
                    @if($product->status=='active' && $product->best_selling=="yes"  && $product->category != 'second-hand')
                        <div class="columns bestSelling" style="width: 18%;">
                            <div class="card">
                                <a href="{{url("productDetails/".$product->id)}}">
                                    <img src="{{$product->getImage()}}" oncontextmenu="return false;" alt="{{$product->name}}">
                                </a>
                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; line-height: 20px;">{{ str_limit($product->name, 14) }} </h5>
                                <p style="font-style: italic; font-size: 12px;">{{$product->author}}</p>
                                <p style="text-align: center; margin-bottom: -15px !important;"><button class="btn btn-primary btn-round-sm btn-sm" style="font-size: 14px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                    <a href="{{url('add/to/cart/'.$product->id)}}"><button id="cartBtn"  class="btn btn-primary btn-round-sm btn-sm" style="font-size: 12px; font-weight: 700 !important;">ADD TO CART</button></a></p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="contentsecondhand tabcontent" id="Knowledge" style="margin: 0px 150px 0px 150px">
            <div class="row">
                @foreach($knowledge as $product)
                    @if($product->status=='active' && $product->best_selling=="yes" && $product->category != 'second-hand')
                    <div class="columns bestSelling" style="width: 18%;">
                            <div class="card">
                                <a href="{{url("productDetails/".$product->id)}}">
                                    <img src="{{$product->getImage()}}" oncontextmenu="return false;" alt="{{$product->name}}">
                                </a>
                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; line-height: 20px;">{{ str_limit($product->name, 14) }} </h5>
                                <p style="font-style: italic; font-size: 12px;">{{$product->author}}</p>
                                <p style="text-align: center; margin-bottom: -15px !important;"><button class="btn btn-primary btn-round-sm btn-sm" style="font-size: 14px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                    <a href="{{url('add/to/cart/'.$product->id)}}"><button id="cartBtn"  class="btn btn-primary btn-round-sm btn-sm" style="font-size: 12px; font-weight: 700 !important;">ADD TO CART</button></a></p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="contentsecondhand tabcontent" id="Frictional" style="margin: 0px 150px 0px 150px">
            <div class="row">
                @foreach($frictionals as $product)
                    @if($product->status=='active' && $product->best_selling=="yes" && $product->category != 'second-hand')
                        <div class="columns bestSelling" style="width: 18%;">
                            <div class="card">
                                <a href="{{url("productDetails/".$product->id)}}">
                                    <img src="{{$product->getImage()}}" oncontextmenu="return false;" alt="{{$product->name}}">
                                </a>
                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; line-height: 20px;">{{ str_limit($product->name, 14) }} </h5>
                                <p style="font-style: italic; font-size: 12px;">{{$product->author}}</p>
                                <p style="text-align: center; margin-bottom: -15px !important;"><button class="btn btn-primary btn-round-sm btn-sm" style="font-size: 14px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                    <a href="{{url('add/to/cart/'.$product->id)}}"><button id="cartBtn"  class="btn btn-primary btn-round-sm btn-sm" style="font-size: 12px; font-weight: 700 !important;">ADD TO CART</button></a></p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="contentsecondhand tabcontent" id="Biographies" style="margin: 0px 150px 0px 150px">
            <div class="row">
                @foreach($biographies as $product)
                    @if($product->status=='active' && $product->best_selling=="yes"  && $product->category != 'second-hand')
                    <div class="columns bestSelling" style="width: 18%;">
                            <div class="card">
                                <a href="{{url("productDetails/".$product->id)}}">
                                    <img src="{{$product->getImage()}}" oncontextmenu="return false;" alt="{{$product->name}}">
                                </a>
                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; line-height: 20px;">{{ str_limit($product->name, 14) }} </h5>
                                <p style="font-style: italic; font-size: 12px;">{{$product->author}}</p>
                                <p style="text-align: center; margin-bottom: -15px !important;"><button class="btn btn-primary btn-round-sm btn-sm" style="font-size: 14px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                    <a href="{{url('add/to/cart/'.$product->id)}}"><button id="cartBtn"  class="btn btn-primary btn-round-sm btn-sm" style="font-size: 12px; font-weight: 700 !important;">ADD TO CART</button></a></p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="bbb_viewed" style="background-color: whitesmoke !important;">
        <div class="container-fluid">
           <div class="row">
                <div class="col">
                    <div class="bbb_main_container" style="background-color: whitesmoke !important;">
                        <div class="bbb_viewed_title_container">
                            <div class="title" >
                                <h4>Question Bank and Solution</h4>
                            </div>
                            <p class="viewallbtn" style="float: right; margin-top: -60px; margin-right: 70px;"><a href="{{url('catalog/sub_category/question-bank-and-solution')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>
                        </div>
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($questionbankandsolution as $questionbankandsolution)
                                    @if($questionbankandsolution->status=='active')
                                <div class="owl-item">
                                    <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center"  style="border-radius: 20px; ">
                                        <a href="{{url("productDetails/".$questionbankandsolution->id)}}">
                                        <div class="bbb_viewed_image" style="width: 220px !important; height: 220px !important;"><img src="{{$questionbankandsolution->getImage()}}" oncontextmenu="return false;" alt="{{$questionbankandsolution->name}}"></div>
                                        </a>
                                        <div class="bbb_viewed_content text-center" style="margin-top: -5px;">
                                            <h5 style="font-size:14px !important;font-weight: bold; color: black !important; margin-bottom: 1px !important;line-height: 20px;">{{ str_limit($questionbankandsolution->name, 18) }} </h5>
                                            <p style="color:black; font-style: italic; font-size: 12px; text-transform: capitalize;">{{$questionbankandsolution->publication}} Publication</p>
                                            <p class="mt-3">
                                                <button class="btn btn-primary btn-round-sm btn-sm price">RS {{$questionbankandsolution->getDicountedPrice()}}</button>
                                                <a href="{{url('add/to/cart/'.$questionbankandsolution->id)}}">
                                                    <button class="btn btn-primary btn-round-sm btn-sm cart-button" >ADD TO CART</button>
                                                </a>
                                            </p>

                                            <!-- <div class="bbb_viewed_name"><a href="#">Alkatel Phone</a></div> -->
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-{{$questionbankandsolution->discount}} %</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="bbb_viewed">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="bbb_main_container">
                        <div class="bbb_viewed_title_container" style="margin-top: -50px">
                            <h3 class="bbb_viewed_title">
                                <div class="title" >
                                    <h4>Course Books</h4>
                                </div>
                                <p class="viewallbtn" style="float: right; margin-top: -60px; margin-right: 70px;"><a href="{{url('catalog/sub_category/coursebook')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>

                            </h3>

                        </div>
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($coursebook as $coursework)
                                    @if($coursework->status=='active')
                                    <div class="owl-item">
                                        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center" style="border-radius: 20px;background:whitesmoke;">
                                            <div class="bbb_viewed_image" style="width: 230px !important; height: 230px !important;">
                                                <a href="{{url("productDetails/".$coursework->id)}}">
                                                <img src="{{$coursework->getImage()}}" oncontextmenu="return false;" alt="{{$coursework->name}}">
                                                </a>
                                            </div>
                                            <div class="bbb_viewed_content text-center book" style="margin-top: -10px">
                                                <h5 style="font-size:14px !important;font-weight: bold; color: black !important; margin-bottom: 1px !important;line-height: 20px;">{{ str_limit($coursework->name, 20) }} </h5>
                                                <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase;">{{$coursework->faculty}} </p>
                                                <p class="mt-3"><button class="btn btn-primary btn-round-sm btn-sm price" >RS {{$coursework->getDicountedPrice()}}</button>
                                                    <a href="{{url('add/to/cart/'.$coursework->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button">ADD TO CART</button></a></p>

                                                <!-- <div class="bbb_viewed_name"><a href="#">Alkatel Phone</a></div> -->
                                            </div>
                                            <ul class="item_marks">
                                                <li class="item_mark item_discount">-{{$coursework->discount}}%</li>
                                                <li class="item_mark item_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bbb_viewed" style="background-color: whitesmoke !important;">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="bbb_main_container" style="background-color: whitesmoke !important; margin-top: -50px">
                        <div class="bbb_viewed_title_container">
                            <h3 class="bbb_viewed_title">
                                <div class="title">
                                    <h4>Medical Examination Books</h4>
                                </div>
                            </h3>
                            <p class="viewallbtn" style="float: right; margin-top: -60px; margin-right: 70px;"><a href="{{url('catalog/sub_category/medical-examination')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>
                        </div>
                        <div class="bbb_viewed_slider_container">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($loksewa as $loksewa)
                                    @if($loksewa->status=='active')
                                    <div class="owl-item">
                                        <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center" style="border-radius: 20px;">
                                            <div class="bbb_viewed_image" style="width: 230px !important; height: 230px !important;">
                                                <a href="{{url("productDetails/".$loksewa->id)}}">
                                                    <img src="{{$loksewa->getImage()}}" oncontextmenu="return false;" alt="{{$loksewa->name}}">
                                                </a>
                                            </div>
                                            <div class="bbb_viewed_content text-center book">
                                                <h5 style="font-size:14px !important;font-weight: bold; color: black !important; margin-bottom: 1px !important;line-height: 20px;">{{ str_limit($loksewa->name, 20) }} </h5>
                                                <p style="color:black; font-style: italic; font-size: 15px; text-transform: capitalize;">{{$loksewa->publication}} Publication</p>
                                                <p class="mt-3"><button class="btn btn-primary btn-round-sm btn-sm price">RS {{$loksewa->getDicountedPrice()}}</button>
                                                    <a href="{{url('add/to/cart/'.$loksewa->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button">ADD TO CART</button></a></p>

                                                <!-- <div class="bbb_viewed_name"><a href="#">Alkatel Phone</a></div> -->
                                            </div>
                                            <ul class="item_marks">
                                                <li class="item_mark item_discount">-{{$loksewa->discount}}% off</li>
                                                <li class="item_mark item_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bbb_viewed">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="bbb_main_container">
                        <div class="bbb_viewed_title_container" style="margin-top: -50px">
                            <h3 class="bbb_viewed_title">
                                <div class="title" >
                                    <h4>Testimonials</h4>
                                </div>
                            </h3>
                        </div>
                        <div class="testimonials-carousel-wrap">
{{--                            <div class="listing-carousel-button listing-carousel-button-next"><i class="fa fa-caret-right" style="color: #fff"></i></div>--}}
{{--                            <div class="listing-carousel-button listing-carousel-button-prev"><i class="fa fa-caret-left" style="color: #fff"></i></div>--}}
                            <div class="testimonials-carousel">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">

                                        @foreach($testimonial as $testimonial)
                                        <div class="swiper-slide">
                                            <div class="testi-item">
                                                <div class="testi-avatar"><img src="{{$testimonial->getTestimonialImage()}}" oncontextmenu="return false;" alt="Houseofbooks"></div>
                                                <div class="testimonials-text-before"><i class="fa fa-quote-right"></i></div>
                                                <div class="testimonials-text">
                                                    <div class="listing-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p>{{$testimonial->content}}</p>
                                                    <a href="#" class="text-link"></a>
                                                    <div class="testimonials-avatar">
                                                        <h3>{{$testimonial->title}}</h3>
                                                        <h4>{{$testimonial->excerpt}}</h4>
                                                    </div>
                                                </div>
                                                <div class="testimonials-text-after"><i class="fa fa-quote-left"></i></div>
                                            </div>
                                        </div>
                                    @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



    @endsection
@push('scripts')
            <script>
                function openNobels(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }

            </script>
@endpush

