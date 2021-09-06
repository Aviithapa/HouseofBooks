@extends('web.layouts.app')
@section('content')
    <!-- Main Content - start -->
    <main>
        <section class="secondhandsection container-fluid">
            <h1 style="font-weight: 800;">Second Hand Books</h1>
            <h3>"PROMOTING SUSTAINABILITY THROUGH REUSE OF BOOKS"</h3>
            <div class="container">
                <hr>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <img src="{{$banner->getImage()}}" alt="{{$banner->title}}" width="300" height="300">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <p class="contentSecondhandBooks">
                        Around 80-90 per cent of books in Nepal are imported, and most of it from India.
                        Now the students, including those in Classes 10 and 11, are not getting text books on time.
                        According to the fiscal data of 2076/77, 3,642,405 printed books were imported which showed a huge amount of quantity.
                        We find the books thrown away or used for unnecessary purpose. House of Books brings a solution to this problem by providing
                        a platform to sell your second hand books.
                    </p>
                </div>
            </div>
                <hr>
            </div>
            <div class="tab-1">
            <h3 class="bbb_viewed_title secondhand">
                <div class="title" >
                    <h4>Novels and Literatures</h4>
                </div>
                <p class="viewallbtn" style="float: right; margin-top: -40px; margin-right: 70px;"><a href="{{url('/secondhand/catalog/nobel')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>
            </h3>
            <div class="container">
            <hr>
                <div class="tab">
                    <button class="tablinks active" onclick="openNobels(event, 'Motivational')" id="defaultOpen">Motivational </button>
                    <button class="tablinks" onclick="openNobels(event, 'Knowledge')">Skills and Knowledge</button>
                    <button class="tablinks" onclick="openNobels(event, 'Frictional')">Frictional</button>
                    <button class="tablinks" onclick="openNobels(event, 'Biographies')">Biographies</button>
                </div>
            </div>
                <div id="Motivational" class="tabcontent"  style="margin: 0px 50px 0px 50px; display: block;">
                    @if(getNovelsCount($motivational,"motivational") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($motivational as $product)
                                    @if($product->nobel_category=="motivational")
                                        <div class="owl-item cardsecondhand">
                                            <a href="{{url("productDetails/".$product->id)}}">
                                                <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                            </a>
                                            <input type="hidden" value="{{$product->id}}" id="pro_id">
                                            <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                            <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->author}}</p>
                                            <p class="prod-i-price">
                                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                            </p>
                                            <ul class="item_marks">
                                                <li class="item_mark item_discount">-{{$product->discount}}%</li>
                                                <li class="item_mark item_new">new</li>
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand" >
                            <div class="row">
                                @foreach($motivational as $product)
                                        @if($product->nobel_category=="motivational")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->author}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm car" style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div id="Knowledge" class="tabcontent"  style="margin: 0px 50px 0px 50px; display: none;">
                    @if(getNovelsCount($motivational,"skills-knowledge") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($motivational as $product)
                                    @if($product->nobel_category=="skills-knowledge")
                                        <div class="owl-item cardsecondhand">
                                            <a href="{{url("productDetails/".$product->id)}}">
                                                <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                            </a>
                                            <input type="hidden" value="{{$product->id}}" id="pro_id">
                                            <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                            <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->author}}</p>
                                            <p class="prod-i-price">
                                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand">
                            <div class="row">
                                @foreach($motivational as $product)
                                    @if($product->nobel_category=="skills-knowledge")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->author}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div id="Frictional" class="tabcontent"  style="margin: 0px 50px 0px 50px; display: none;">
                    @if(getNovelsCount($motivational,"frictional") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($motivational as $product)
                                    @if($product->nobel_category=="frictional")
                                            <div class="owl-item cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand">
                            <div class="row">
                                @foreach($motivational as $product)
                                    @if($product->nobel_category=="frictional")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div id="Biographies" class="tabcontent"  style="margin: 0px 50px 0px 50px; display: none;">
                    @if(getNovelsCount($motivational,"biographies") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($motivational as $product)
                                        @if($product->nobel_category=="biographies")
                                            <div class="owl-item cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand"  >
                            <div class="row">
                                @foreach($motivational as $product)
                                    @if($product->nobel_category=="biographies")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

            </div>
            <div class="clearfix"></div>
            <div class="tab-2">
            <h3 class="bbb_viewed_title">
                <div class="title" >
                    <h4>Course Books</h4>
                </div>
                <p class="viewallbtn" style="float: right; margin-top: -40px; margin-right: 70px;"><a href="{{url('/secondhand/catalog/coursebook')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>
            </h3>
            <div class="container">
            <hr>
                <div class="tab">
                    <button class="tablink active" onclick="openCourseBooks(event, 'bachelor')" id="defaultCourseOpen">Bachelor</button>
                    <button class="tablink" onclick="openCourseBooks(event, 'master')">Master</button>
                    <button class="tablink" onclick="openCourseBooks(event, '+2')">+2 level</button>
                    <button class="tablink" onclick="openCourseBooks(event, '10')">Class 10</button>
                    <button class="tablink" onclick="openCourseBooks(event, 'foreign')">Foreign Writer </button>
                </div>
            </div>

                <div id="bachelor" class="tabcontents"  style="margin: 0px 50px 0px 50px; display: block;">
                            @if(getCoursebookCount($books,"bachelor") > 4)
                            <div class="bbb_viewed_slider_container book">
                                <div class="owl-carousel owl-theme bbb_viewed_slider">
                                    @foreach($books as $product)
                                        @if($product["level"]=="bachelor")
                                               <div class="owl-item cardsecondhand">
                                                   <a href="{{url("productDetails/".$product->id)}}">
                                                       <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                   </a>
                                                   <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                   <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                   <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                   <p class="prod-i-price">
                                                       <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                       <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                   </p>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @else
                          <div class="contentsecondhand">
                            <div class="row">
                                @foreach($books as $product)
                                    @if($product['level']=="bachelor")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})"class="btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                          </div>
                            @endif
                </div>
                <div id="master" class="tabcontents"  style="margin: 0px 50px 0px 50px; display: none;">
                    @if(getCoursebookCount($books,"master") > 4)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($books as $product)
                                    @if($product["level"]=="master")
                                        <div class="owl-item cardsecondhand">
                                            <a href="{{url("productDetails/".$product->id)}}">
                                                <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                            </a>
                                            <input type="hidden" value="{{$product->id}}" id="pro_id">
                                            <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                            <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                            <p class="prod-i-price">
                                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand" >
                            <div class="row">
                                @foreach($books as $product)
                                    @if($product["level"]=="master")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div id="+2" class="tabcontents"  style="margin: 0px 50px 0px 50px; display: none;">
                    @if(getCoursebookCount($books,"+2") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($books as $product)
                                    @if($product["level"]=="+2")
                                        <div class="owl-item cardsecondhand">
                                            <a href="{{url("productDetails/".$product->id)}}">
                                                <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                            </a>
                                            <input type="hidden" value="{{$product->id}}" id="pro_id">
                                            <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                            <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                            <p class="prod-i-price">
                                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                <button  onclick="addtoCart({{ $product->id }})" class="car  btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                            </p>
                                            <ul class="item_marks">
                                                <li class="item_mark item_discount">-{{$product->discount}}%</li>
                                                <li class="item_mark item_new">new</li>
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand" >
                            <div class="row">
                                @foreach($books as $product)
                                    @if($product["level"]=="+2")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                   <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div id="10" class="tabcontents"  style="margin: 0px 50px 0px 50px; display: none;">
                    @if(getCoursebookCount($books,"+2") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($books as $product)
                                    @if($product["level"]=="+2")
                                        <div class="owl-item cardsecondhand">
                                            <a href="{{url("productDetails/".$product->id)}}">
                                                <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                            </a>
                                            <input type="hidden" value="{{$product->id}}" id="pro_id">
                                            <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                            <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                            <p class="prod-i-price">
                                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand" >
                            <div class="row">
                                @foreach($books as $product)
                                    @if($product["level"]=="+2")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div id="foreign" class="tabcontents"  style="margin: 0px 50px 0px 50px; display: none;">
                    @if(getCoursebookCount($books,"foreign") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($books as $product)
                                    @if($product["level"]=="foreign")
                                        <div class="owl-item cardsecondhand">
                                            <a href="{{url("productDetails/".$product->id)}}">
                                                <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                            </a>
                                            <input type="hidden" value="{{$product->id}}" id="pro_id">
                                            <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                            <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                            <p class="prod-i-price">
                                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand" >
                            <div class="row">
                                @foreach($books as $product)
                                    @if($product["level"]=="foreign")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="tab-2">
                <h3 class="bbb_viewed_title">
                    <div class="title" >
                        <h4>Question Bank and Solution</h4>
                    </div>
                    <p class="viewallbtn" style="float: right; margin-top: -40px; margin-right: 70px;"><a href="{{url('/secondhand/catalog/question-bank-and-solution')}}"><button class="btn btn-primary btn-round-sm btn-sm">View All</button></a></p>
                </h3>
                <div class="container">
                    <hr>
                    <div class="tab">
                        <button class="tablinkes active" onclick="openQuestionBank(event, 'bachelors')" id="defaultCourseOpen">Bachelor</button>
                        <button class="tablinkes" onclick="openQuestionBank(event, 'masters')">Master</button>
                        <button class="tablinkes" onclick="openQuestionBank(event, 'two')">+2 level</button>
                        <button class="tablinkes" onclick="openQuestionBank(event, 'ten')">Class 10</button>
                        <button class="tablinkes" onclick="openQuestionBank(event, 'foreigns')">Foreign Writer </button>
                    </div>
                </div>
                <div id="bachelors" class="tabcontentes"  style="margin: 0px 50px 0px 50px; display: block;">
                    @if(getCoursebookCount($question,"bachelor") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($question as $product)
                                    @if($product["level"]=="bachelor")
                                        <div class="owl-item cardsecondhand">
                                            <a href="{{url("productDetails/".$product->id)}}">
                                                <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                            </a>
                                            <input type="hidden" value="{{$product->id}}" id="pro_id">
                                            <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                            <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                            <p class="prod-i-price">
                                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand" >
                            <div class="row">
                                @foreach($question as $product)
                                    @if($product["level"]=="bachelor")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div id="masters" class="tabcontentes"  style="margin: 0px 50px 0px 50px; display: none;">
                    @if(getCoursebookCount($question,"master") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($question as $product)
                                    @if($product["level"]=="master")
                                        <div class="owl-item cardsecondhand">
                                            <a href="{{url("productDetails/".$product->id)}}">
                                                <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                            </a>
                                            <input type="hidden" value="{{$product->id}}" id="pro_id">
                                            <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                            <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                            <p class="prod-i-price">
                                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                          <button   onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand" >
                            <div class="row">
                                @foreach($question as $product)
                                    @if($product["level"]=="master")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div id="two" class="tabcontentes"  style="margin: 0px 50px 0px 50px; display: none;">
                    @if(getCoursebookCount($question,"+2") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($question as $product)
                                    @if($product["level"]=="+2")
                                        <div class="owl-item cardsecondhand">
                                            <a href="{{url("productDetails/".$product->id)}}">
                                                <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                            </a>
                                            <input type="hidden" value="{{$product->id}}" id="pro_id">
                                            <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                            <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                            <p class="prod-i-price">
                                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                <button   onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand" >
                            <div class="row">
                                @foreach($question as $product)
                                    @if($product["level"]=="+2")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                   <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div id="ten" class="tabcontentes"  style="margin: 0px 50px 0px 50px; display: none;">
                    @if(getCoursebookCount($question,"+2") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($question as $product)
                                    @if($product["level"]=="+2")
                                        <div class="owl-item cardsecondhand">
                                            <a href="{{url("productDetails/".$product->id)}}">
                                                <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                            </a>
                                            <input type="hidden" value="{{$product->id}}" id="pro_id">
                                            <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                            <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                            <p class="prod-i-price">
                                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand" >
                            <div class="row">
                                @foreach($question as $product)
                                    @if($product["level"]=="+2")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div id="foreigns" class="tabcontentes"  style="margin: 0px 50px 0px 50px; display: none;">
                    @if(getCoursebookCount($question,"foreign") > 5)
                        <div class="bbb_viewed_slider_container book">
                            <div class="owl-carousel owl-theme bbb_viewed_slider">
                                @foreach($question as $product)
                                    @if($product["level"]=="foreign")
                                        <div class="owl-item cardsecondhand">
                                            <a href="{{url("productDetails/".$product->id)}}">
                                                <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                            </a>
                                            <input type="hidden" value="{{$product->id}}" id="pro_id">
                                            <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                            <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                            <p class="prod-i-price">
                                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                               <button  onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm " style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                            </p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="contentsecondhand" >
                            <div class="row">
                                @foreach($question as $product)
                                    @if($product["level"]=="foreign")
                                        <div class="columns">
                                            <div class="cardsecondhand">
                                                <a href="{{url("productDetails/".$product->id)}}">
                                                    <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}" style="width:250px; height:250px;">
                                                </a>
                                                <input type="hidden" value="{{$product->id}}" id="pro_id">
                                                <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                                <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                                <p class="prod-i-price">
                                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>
                                                    <button onclick="addtoCart({{ $product->id }})" class="car btn btn-primary btn-round-sm btn-sm" style="font-size: 12px; font-weight: 600;">ADD TO CART</button>
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </section>
    </main>
        <!-- Main Content - end -->
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
        // Get the element with id="defaultOpen" and click on it

        function openCourseBooks(evt, courseBook) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontents");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(courseBook).style.display = "block";
            evt.currentTarget.className += " active";
        }


        function openQuestionBank(evt, courseBook) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontentes");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinkes");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(courseBook).style.display = "block";
            evt.currentTarget.className += " active";
        }

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
                        location.replace("https://houseofbooks.com.np/login")
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
    </script>

@endpush
