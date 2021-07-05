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
            <div class="contentsecondhand tabcontent" id="Motivational" style="margin: 0px 50px 0px 50px; display:block;">
                <div class="row">
                    @foreach($products as $product)
                        @if($product->status=='active' && $product->nobel_category=='motivational' && $product->category=='second-hand')
                            <div class="columns">
                                <div class="cardsecondhand">
                                    <a href="{{url("productDetails/".$product->id)}}">
                                        <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                    </a>
                                    <input type="hidden" value="{{$product->id}}" id="pro_id">
                                    <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                    <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                    <p class="prod-i-price">
                                        <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
                <div class="contentsecondhand tabcontent" id="Knowledge" style="margin: 0px 50px 0px 50px">
                    <div class="row">
                        @foreach($products as $product)
                            @if($product->status=='active' && $product->nobel_category=='skills-knowledge' && $product->category=='second-hand')
                                <div class="columns">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="contentsecondhand tabcontent" id="Frictional" style="margin: 0px 50px 0px 50px">
                    <div class="row">
                        @foreach($products as $product)
                            @if($product->status=='active' && $product->nobel_category=='frictional' && $product->category=='second-hand')
                                <div class="columns">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="contentsecondhand tabcontent" id="Biographies" style="margin: 0px 50px 0px 50px">
                    <div class="row">
                        @foreach($products as $product)
                            @if($product->status=='active' && $product->nobel_category=='biographies' && $product->category=='second-hand')
                                <div class="columns">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
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
                            @if(count($books) > 5)
                            <div class="bbb_viewed_slider_container book">
                                <div class="owl-carousel owl-theme bbb_viewed_slider">
                                    @foreach($books as $product)
                               <div class="owl-item cardsecondhand">
                                   <a href="{{url("productDetails/".$product->id)}}">
                                       <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                   </a>
                                   <input type="hidden" value="{{$product->id}}" id="pro_id">
                                   <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                   <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                   <p class="prod-i-price">
                                       <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                   </p>
                            </div>
                                    @endforeach


                                </div>
                            </div>
                            @else
                          <div class="contentsecondhand tabcontents"  style="margin: 0px 50px 0px 50px; display: block;">
                            <div class="row">
                                @foreach($books as $product)
                            <div class="columns">
                                <div class="cardsecondhand">
                                    <a href="{{url("productDetails/".$product->id)}}">
                                        <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                    </a>
                                    <input type="hidden" value="{{$product->id}}" id="pro_id">
                                    <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                    <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                    <p class="prod-i-price">
                                        <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                    </p>
                                </div>
                            </div>
                                @endforeach
                            </div>
                          </div>
                            @endif
                </div>
                <div class="contentsecondhand tabcontents" id="master" style="margin: 0px 50px 0px 50px; display: none;">
                    <div class="row">
                        @foreach($products as $product)
                            @if($product->status=='active' && $product->category=='second-hand' && $product->level=="master" && $product->sub_category=="coursebook")
                                <div class="columns">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="contentsecondhand tabcontents" id="+2" style="margin: 0px 50px 0px 50px; display: none;">
                    <div class="row">
                        @foreach($products as $product)
                            @if($product->status=='active' && $product->category=='second-hand' && $product->level=="+2" && $product->sub_category=="coursebook")
                                <div class="columns">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="contentsecondhand tabcontents" id="10" style="margin: 0px 50px 0px 50px; display: none;">
                    <div class="row">
                        @foreach($products as $product)
                            @if($product->status=='active' && $product->category=='second-hand' && $product->level=="10" && $product->sub_category=="coursebook")
                                <div class="columns">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="contentsecondhand tabcontents" id="foreign" style="margin: 0px 50px 0px 50px; display: none;">
                    <div class="row">
                        @foreach($products as $product)
                            @if($product->status=='active' && $product->category=='second-hand' && $product->level=="foreign_writer" && $product->sub_category=="coursebook")
                                <div class="columns">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
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
                <div class="contentsecondhand tabcontentes" id="bachelors" style="margin: 0px 50px 0px 50px; display: block;">
                    <div class="row">
                        @foreach($books as $product)
                            @if($product->status=='active' && $product->level=="bachelor" && $product->sub_category=="question-bank-and-solution" )
                                <div class="columns">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="contentsecondhand tabcontentes" id="masters" style="margin: 0px 50px 0px 50px; display: none;">
                    <div class="row">
                        @foreach($products as $product)
                            @if($product->status=='active' && $product->category=='second-hand' && $product->level=="master" && $product->sub_category=="question-bank-and-solution" )
                                <div class="columns">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="contentsecondhand tabcontentes" id="two" style="margin: 0px 50px 0px 50px; display: none;">
                    <div class="row">
                        @foreach($products as $product)
                            @if($product->status=='active' && $product->category=='second-hand' && $product->level=="+2" && $product->sub_category=="question-bank-and-solution" )
                                <div class="columns">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="contentsecondhand tabcontentes" id="ten" style="margin: 0px 50px 0px 50px; display: none;">
                    <div class="row">
                        @foreach($products as $product)
                            @if($product->status=='active' && $product->category=='second-hand' && $product->level=="10" && $product->sub_category=="question-bank-and-solution" )
                                <div class="columns">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="contentsecondhand tabcontentes" id="foreigns" style="margin: 0px 50px 0px 50px; display: none;">
                    <div class="row carousel-showmanymoveone" id="itemslider">
                        @foreach($products as $product)
                            @if($product->status=='active' && $product->category=='second-hand' && $product->level=="foreign_writer" && $product->sub_category=="question-bank-and-solution"  )
                                <div class="columns item">
                                    <div class="cardsecondhand">
                                        <a href="{{url("productDetails/".$product->id)}}">
                                            <img src="{{$product->getSecondHandFrontImage()}}" alt="{{$product->name}}">
                                        </a>
                                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                                        <h5 style="font-weight: bold;  margin-bottom: 1px !important; color: black!important; font-size: 14px !important;"  style="line-height: 20px;">{{ str_limit($product->name, 20) }} </h5>
                                        <p style="color: black!important;  font-style: italic; font-size: 12px;">{{$product->faculty}}</p>
                                        <p class="prod-i-price">
                                            <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
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
    </script>

@endpush
