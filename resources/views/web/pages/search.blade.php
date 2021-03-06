@extends('web.layouts.app')
@section('content')
    <style>
        .form-control {
            border: none !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            border-bottom: 2px solid #eee !important;
            padding-left: 0;
            font-weight: normal;
            background: transparent;
        }
        .modal-content {
            font-weight: bold;
        }
    </style>
    <!-- Main Content - start -->
    <main>
        <section class="container">
            <h2 class="main-ttl"><span> Category</span></h2>
            <!-- Catalog Sidebar - start -->
            <div class="section-sb">
                <div class="section-sb-current">
                    <ul class="section-sb-list" id="section-sb-list">
                        <li class="categ-1">
                            <a href="{{url('/catalog/sub_category/nobel')}}">
                                <span class="categ-1-label">Novel</span>
                            </a>
                        </li>
                        <li class="categ-1">
                            <a href="{{url('/catalog/sub_category/coursebook')}}">
                                <span class="categ-1-label">Coursebook</span>
                            </a>
                        </li>
                        <li class="categ-1 has_child">
                            <a href="{{url('/catalog/sub_category/medical-examination')}}">
                                <span class="categ-1-label">Medical Examination</span>
                            </a>
                        </li>
                        <li class="categ-1 has_child">
                            <a href="{{url("catalog/sub_category/loksewa-examination")}}">
                                <span class="categ-1-label">Loksewa Examination</span>
                            </a>
                        </li>
                        <li class="categ-1">
                            <a href="{{url("catalog/sub_category/entrance-examination")}}">
                                <span class="categ-1-label">Entrance Examination</span>
                            </a>
                        </li>
                        <li class="categ-1">
                            <a href="{{url("catalog/sub_category/question-bank-and-solution")}}">
                                <span class="categ-1-label">Question bank and Solution</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="section-filter">
                    <div class="section-filter-cont">
                        <div class="section-filter-price">
                            <div class="range-slider section-filter-price" data-min="0" data-max="1000" data-from="200" data-to="800" data-prefix="$" data-grid="false"></div>
                        </div>
                        <div class="section-filter-item opened">
                            <span class="section-filter-ttl">Apply Filter</span>

                            <form  action="{{url('filter')}}" method="POST" id="carform">
                                {{csrf_field() }}
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <strong>University</strong>
                                        <select class="form-control" name="university">
                                            <option class="form-control" value="TU">Tribhuwan University</option>
                                            <option class="form-control" value="PU">Pokhara University</option>
                                            <option class="form-control" value="PBU">Purbanchal University</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <strong>Publication</strong>
                                        <select class="form-control"  name="publication">
                                            <option class="form-control" value="asmita">Asmita</option>
                                            <option class="form-control" value="saraswati">Saraswati</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <strong>Course</strong>
                                        <select class="form-control" name="course" onchange="run()" id="course">
                                            <option class="form-control" value="BBA">BBA</option>
                                            <option class="form-control" value="BBS">BBS</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 mt-3 mb-5" id="semester">
                                        <strong>Semester/ Year</strong>
                                        <select class="form-control" name="semester" >
                                            <option class="form-control" value="First Semester">First Semester</option>
                                            <option class="form-control" value="Second Semester">Second Semester</option>
                                            <option class="form-control" value="Third Semester">Third Semester</option>
                                            <option class="form-control" value="Fourth Semester">Fourth Semester</option>
                                            <option class="form-control" value="Fifth Semester">Fifth Semester</option>
                                            <option class="form-control" value="Sixth Semester">Sixth Semester</option>
                                            <option class="form-control" value="Seven Semester">Seven Semester</option>
                                            <option class="form-control" value="Eight Semester">Eight Semester</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 mt-3 mb-5" id="year">
                                        <strong>Semester/ Year</strong>
                                        <select class="form-control" name="semesters" >
                                            <option class="form-control" value="1_year">1 year</option>
                                            <option class="form-control" value="2_year">2 Year</option>
                                            <option class="form-control" value="3_year">3 year</option>
                                            <option class="form-control" value="4_year">4 Year</option>
                                        </select>
                                    </div>
                                    <div class="section-filter-buttons" style="margin-top: 10px">
                                        <input class="btn btn-primary btn-round-sm btn-sm" id="set_filter"  type="submit"  name="set_filter" value="Apply filter">
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

            </div>
            <!-- Catalog Sidebar - end -->
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
                    @if(getQuantity($products)==0)
                        <p  style="font-size: 20px;  text-align: center; text-transform: capitalize">We cannot find the Book you are looking for. <a  class="login-trigger" href="#" data-target="#request" data-toggle="modal" style="color: #ff682c !important;"> Click Here</a> to request the book</a> </p>
                        <img src="{{$notfound->getImage()}}" alt="House of books" height="600" width="600" class="center">


                        <div id="request" class= "modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button data-dismiss="modal" class="close">&times;</button>
                                        <h3>Request For Book</h3>
                                        <form  method="post" action="{{url('request')}}">
                                            {{csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="number" name="phoneNumber" class="form-control" placeholder="Your Number  *" value="" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="bookName" class="form-control" placeholder="Book Name *" value="" required  />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="faculty" class="form-control" placeholder="Book Faculty *" value="" required  />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" name="publication" class="form-control" placeholder="Book Publication *" value="" required  />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea  name="message" class="form-control Message" placeholder="Furthermore *" style="width: 100%; height: 200px; padding: 20px" required ></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col" style="text-align: center; font-size: 20px !important;">
                                                        <button class="btn btn-primary btn-round-sm btn-sm"  style="   font-size: 20px;
                            width: 350px !important; border-radius: 10px  !important; height: 50px !important; margin-bottom: 20px !important;">Send The Request</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    @foreach($products as $product)
                        <div class="prod-i">
                            <div class="prod-i-top">
                                <a href="{{url('productDetails/'.$product->id)}}" class="prod-i-img"><!-- NO SPACE --><img src="{{$product->getImage()}}" oncontextmenu="return false;" alt="{{$product->name}}"><!-- NO SPACE --></a>
                                <p class="{{url('productDetails/'.$product->id)}}"><i class="fa fa-info"></i></p>
                            </div>
                            <div class="prod-sticker">
                                <p class="prod-sticker-3" style="background-color: #FF8800 !important;">-{{$product->discount}}%</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
                            </div>
                            <h3>
                                <a style="color: black !important;" href="{{url('productDetails/'.$product->id)}}">{{ str_limit($product->name, 20) }}</a>
                            </h3>
                            @if($product->sub_category=="novel")
                                <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.7;">{{$product->author}} </p>
                           @else
                            <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.7;">{{$product->faculty}} </p>
                            <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.7;">{{$product->semester}} </p>
                            @endif
{{--                            @endif--}}
                            <p class="prod-i-price">
                                <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
                            </p>
                            <div class="prod-i-skuwrapcolor">
                            </div>
                        </div>
                    @endforeach

                        @endif
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
        $( document ).ready(function() {
            $("#year").hide();
            $("#semester").show();
        });
        $( document ).ready(function() {
            var sub_category=document.getElementById("course").value;
            if(sub_category==="BBS"){
                $("#year").show();
                $("#semester").hide();
            }else
            {
                $("#year").hide();
                $("#semester").show();
            }
        });
        function run() {
            var sub_category=document.getElementById("course").value;
            if(sub_category==="BBS"){
                $("#year").show();
                $("#semester").hide();
            }else
            {
                $("#year").hide();
                $("#semester").show();
            }
        }
    </script>

@endpush
