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
                <button class="tablinks" onclick="openNobels(event, 'Frictional')">Fictional</button>
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
                                    <button id="cartBtn" onclick="addtoCart({{ $product->id }})"  data-id="{{ $product->id }}" class="btn btn-primary btn-round-sm btn-sm" style="font-size: 12px; font-weight: 700 !important;">ADD TO CART</button></p>
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
                                    <button id="cartBtn" onclick="addtoCart({{ $product->id }})"  class="btn btn-primary btn-round-sm btn-sm" style="font-size: 12px; font-weight: 700 !important;">ADD TO CART</button></p>
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
                                    <button id="cartBtn" onclick="addtoCart({{ $product->id }})"  class="btn btn-primary btn-round-sm btn-sm" style="font-size: 12px; font-weight: 700 !important;">ADD TO CART</button></p>
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
                                  <button id="cartBtn" onclick="addtoCart({{ $product->id }})"  class="btn btn-primary btn-round-sm btn-sm" style="font-size: 12px; font-weight: 700 !important;">ADD TO CART</button></p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

<div class="add">
    <div class="row" style="margin-top: 20px; padding:20px;">
        <div class="col-sm-4 col-md-4">
            <a href="{{url('publication/saraswati')}}">
              <img src="{{url("/asset/img/Adspace-1.jpg")}}" style="border-radius: 15px; border: 2px solid #000;">
            </a>
        </div>
        <div class="col-sm-4 col-md-4">
            <img class='image' src="{{url("/asset/img/Adspace-2.png")}}" style="border-radius: 15px;">
        </div>
        <div class="col-sm-4 col-md-4">
            <img class='image' src="{{url("/asset/img/Adspace-3.png")}}" style="border-radius: 15px;" >
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
                                <h4 class="glow">Book Packs</h4>
                            </div>
                            <p class="viewallbtn" style="float: right; margin-top: -60px; margin-right: 70px;"><a href="{{url('catelog/sub_category/Rakshya')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>
                        </div>
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($Rakshya as $rakshya)
                                        <div class="owl-item">
                                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center"  style="border-radius: 20px; ">
                                                <a href="{{url("productDetails/".$rakshya->id)}}">
                                                    <div class="bbb_viewed_image rakshya" style="width: 200px ; height: 230px ;">
                                                        <img src="{{$rakshya->getImage()}}" oncontextmenu="return false;" alt="{{$rakshya->name}}"></div>
                                                </a>
                                                <div class="bbb_viewed_content text-center" style="margin-top: -5px;">
                                                    <h5 style="font-size:14px !important;font-weight: bold; color: black !important; margin-bottom: 1px !important;line-height: 20px;">{{ str_limit($rakshya->name, 18) }} </h5>
                                                    <p class="mt-3">
                                                        <button class="btn btn-primary btn-round-sm btn-sm price">RS {{$rakshya->getDicountedPrice()}}</button>
                                                            <button onclick="addtoCart({{ $rakshya->id }})"  class="btn btn-primary btn-round-sm btn-sm cart-button" >ADD TO CART</button>
                                                    </p>

                                                    <!-- <div class="bbb_viewed_name"><a href="#">Alkatel Phone</a></div> -->
                                                </div>
                                                <ul class="item_marks">
{{--                                                    <div class="prod-sticker">--}}
{{--                                                        <p class="prod-sticker-3" style="background-color: #FF8800 !important;">Rakshya Bandhan Special </p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>--}}
{{--                                                    </div>--}}
{{--                                                    <li class="item_mark item_discount">-{{$rakshya->discount}} %</li>--}}
                                                    <li class="item_mark item_new">new</li>
                                                </ul>
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

    <div class="bbb_viewed mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="bbb_main_container">
                        <div class="bbb_viewed_title_container" style="margin-top: -50px">
                            <h3 class="bbb_viewed_title">
                                <div class="title" >
                                    <h4>नेपाली उपन्यास</h4>
                                </div>
                                <p class="viewallbtn" style="float: right; margin-top: -60px; margin-right: 70px;"><a href="{{url('catelog/sub_category/nepali_novel')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>

                            </h3>

                        </div>
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($nepali_novel as $coursework)
                                    @if($coursework->status=='active')
                                        <div class="owl-item">
                                            <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center" style="border-radius: 20px;background:whitesmoke;">
                                                <div class="bbb_viewed_image" style="width: 230px !important; height: 230px !important;">
                                                    <a href="{{url("productDetails/".$coursework->id)}}">
                                                        <img src="{{$coursework->getImage()}}" oncontextmenu="return false;" alt="{{$coursework->name}}" style="height: 250px;">
                                                    </a>
                                                </div>
                                                <div class="bbb_viewed_content text-center book" style="margin-top: -10px">
                                                    <h5 style="font-size:14px !important;font-weight: bold; color: black !important; margin-bottom: 1px !important;line-height: 20px;">{{ str_limit($coursework->name, 20) }} </h5>
                                                    <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase;">{{$coursework->author}}  </p>
                                                    <p class="mt-3"><button class="btn btn-primary btn-round-sm btn-sm price" >RS {{$coursework->getDicountedPrice()}}</button>
                                                       <button onclick="addtoCart({{ $coursework->id }})"  class="btn btn-primary btn-round-sm btn-sm cart-button">ADD TO CART</button></p>

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
                    <div class="bbb_main_container" style="background-color: whitesmoke !important;">
                        <div class="bbb_viewed_title_container">
                            <div class="title" >
                                <h4>Question Bank and Solution</h4>
                            </div>
                            <p class="viewallbtn" style="float: right; margin-top: -60px; margin-right: 70px;"><a href="{{url('catelog/sub_category/question-bank-and-solution')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>
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
                                                    <button onclick="addtoCart({{ $questionbankandsolution->id }})" class="btn btn-primary btn-round-sm btn-sm cart-button" >ADD TO CART</button>
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


    <div class="bbb_viewed mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="bbb_main_container">
                        <div class="bbb_viewed_title_container" style="margin-top: -50px">
                            <h3 class="bbb_viewed_title">
                                <div class="title" >
                                    <h4>Course Books</h4>
                                </div>
                                <p class="viewallbtn" style="float: right; margin-top: -60px; margin-right: 70px;"><a href="{{url('catelog/sub_category/coursebook')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>

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
                                                 <button onclick="addtoCart({{ $coursework->id }})" class="btn btn-primary btn-round-sm btn-sm cart-button">ADD TO CART</button></p>

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


    <div class="bbb_viewed mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="bbb_main_container">
                        <div class="bbb_viewed_title_container" style="margin-top: -50px">
                            <h3 class="bbb_viewed_title">
                                <div class="title" >
                                    <h4>Loksewa Books</h4>
                                </div>
                                <p class="viewallbtn" style="float: right; margin-top: -60px; margin-right: 70px;"><a href="{{url('catelog/sub_category/loksewa-examination')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>

                            </h3>

                        </div>
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($loksewas as $coursework)
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
                                                    <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase;">{{$coursework->publication}} </p>
                                                    <p class="mt-3"><button class="btn btn-primary btn-round-sm btn-sm price" >RS {{$coursework->getDicountedPrice()}}</button>
                                                       <button onclick="addtoCart({{ $coursework->id }})" class="btn btn-primary btn-round-sm btn-sm cart-button">ADD TO CART</button></p>

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
                            <p class="viewallbtn" style="float: right; margin-top: -60px; margin-right: 70px;"><a href="{{url('catelog/sub_category/medical-examination')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>
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
                                              <button onclick="addtoCart({{ $loksewa->id }})" class="btn btn-primary btn-round-sm btn-sm cart-button">ADD TO CART</button></p>

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

{{--    <div class="container-fluid">--}}
{{--        <div class="bbb_viewed" style="background-color: whitesmoke !important;">--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <div class="bbb_main_container" style="background-color: whitesmoke !important; margin-top: -50px">--}}
{{--                            <div class="bbb_viewed_title_container">--}}
{{--                                <h3 class="bbb_viewed_title">--}}
{{--                                    <div class="title">--}}
{{--                                        <h4>Our Partners</h4>--}}
{{--                                    </div>--}}
{{--                                </h3>--}}
{{--                            </div>--}}
{{--                            <div class="bbb_viewed_slider_container">--}}
{{--                                <div class="owl-carousel owl-theme bbb_viewed_slider">--}}
{{--                                            <div class="owl-item">--}}
{{--                                                <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center" style="border-radius: 20px;">--}}
{{--                                                    <div class="bbb_viewed_image" style="width: 50px !important; height: 50px !important;">--}}
{{--                                                            <img src="" oncontextmenu="return false;" alt="">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div id="myModal" class="modal">--}}

{{--        <!-- Modal content -->--}}
{{--        <div class="modal-content">--}}
{{--                <!-- Modal content-->--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <span class="close" id="close">&times;</span>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <img src="{{$popup->getImage()}}">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--        </div>--}}
{{--        </div>--}}
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


    <script>
        $(document).ready(function() {
            $('#cartBtn').on('click', function () {


            });
        });






        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

@endpush

