@extends('web.layouts.app')
@section('content')
    <style>
        .form-control{
            border-radius: 0px !important;
        }
    </style>
    <!-- Main Content - start -->
    <main>
        <section class="container">


            <h2 class="main-ttl"><span> Category</span></h2>

            <div class="section-sb">
                @if($product == "novel")
                    <div class="section-filter">
                        <div class="section-filter-cont">
                            <div class="section-filter-price">
                                <div class="range-slider section-filter-price" data-min="0" data-max="1000" data-from="200" data-to="800" data-prefix="$" data-grid="false"></div>
                            </div>
                            <div class="section-filter-item opened" id="nobel">
                                <p class="section-filter-ttl">Novel</p>
                                <div class="section-filter-fields">
                                    <p class="section-filter-field">
                                        <input id="section-filter-checkbox3-5" value="on" type="checkbox" onclick="change('frictional')">
                                        <label class="section-filter-checkbox" for="section-filter-checkbox3-5">Fictional</label>
                                    </p>
                                    <p class="section-filter-field">
                                        <input id="section-filter-checkbox3-2" value="on" type="checkbox" onclick="change('skills-knowledge')">
                                        <label class="section-filter-checkbox" for="section-filter-checkbox3-2">Skill and Knowledge</label>
                                    </p>
                                    <p class="section-filter-field">
                                        <input id="section-filter-checkbox3-3" value="on" type="checkbox" onclick="change('motivational')">
                                        <label class="section-filter-checkbox" for="section-filter-checkbox3-3">Motivation</label>
                                    </p>
                                    <p class="section-filter-field">
                                        <input id="section-filter-checkbox3-4" value="on" type="checkbox" onclick="change('biographies')">
                                        <label class="section-filter-checkbox" for="section-filter-checkbox3-4">Biographies</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-sb-current">
                        <ul class="section-sb-list" id="section-sb-list">
                            <li class="categ-1">
                                <a href="{{url('/catelog/sub_category/novel')}}">
                                    <span class="categ-1-label">Novel</span>
                                </a>
                            </li>
                            <li class="categ-1">
                                <a href="{{url('/catelog/sub_category/coursebook')}}">
                                    <span class="categ-1-label">Coursebook</span>
                                </a>
                            </li>
                            <li class="categ-1 has_child">
                                <a href="{{url('/catelog/sub_category/medical-examination')}}">
                                    <span class="categ-1-label">Medical Examination</span>
                                </a>
                            </li>
                            <li class="categ-1 has_child">
                                <a href="{{url("catelog/sub_category/loksewa-examination")}}">
                                    <span class="categ-1-label">Loksewa Examination</span>
                                </a>
                            </li>
                            <li class="categ-1">
                                <a href="{{url("catelog/sub_category/entrance-examination")}}">
                                    <span class="categ-1-label">Entrance Examination</span>
                                </a>
                            </li>
                            <li class="categ-1">
                                <a href="{{url("catelog/sub_category/question-bank-and-solution")}}">
                                    <span class="categ-1-label">Question bank and Solution</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @else

                    <div class="section-filter">
                        <div class="section-filter-cont">
                            <div class="section-filter-price">
                                <div class="range-slider section-filter-price" data-min="0" data-max="1000" data-from="200" data-to="800" data-prefix="$" data-grid="false"></div>
                            </div>
                            <div class="section-filter-item opened">
                                <span class="section-filter-ttl">Apply Filter</span>

                                <form action="{{url('filter')}}" method="POST" id="carform">
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
                                                <option class="form-control" value="saraswati">Saraswati </option>
                                                <option class="form-control" value="samiksya">Samiksya</option>
                                                <option class="form-control" value="mk_publication">MK</option>
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

                        <div class="section-sb-current">
                        <ul class="section-sb-list" id="section-sb-list">
                            <li class="categ-1">
                                <a href="{{url('/catelog/sub_category/novel')}}">
                                    <span class="categ-1-label">Novel</span>
                                </a>
                            </li>
                            <li class="categ-1">
                                <a href="{{url('/catelog/sub_category/coursebook')}}">
                                    <span class="categ-1-label">Coursebook</span>
                                </a>
                            </li>
                            <li class="categ-1 has_child">
                                <a href="{{url('/catelog/sub_category/medical-examination')}}">
                                    <span class="categ-1-label">Medical Examination</span>
                                </a>
                            </li>
                            <li class="categ-1 has_child">
                                <a href="{{url("catelog/sub_category/loksewa-examination")}}">
                                    <span class="categ-1-label">Loksewa Examination</span>
                                </a>
                            </li>
                            <li class="categ-1">
                                <a href="{{url("catelog/sub_category/entrance-examination")}}">
                                    <span class="categ-1-label">Entrance Examination</span>
                                </a>
                            </li>
                            <li class="categ-1">
                                <a href="{{url("catelog/sub_category/question-bank-and-solution")}}">
                                    <span class="categ-1-label">Question bank and Solution</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif
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
                        @if($product->status=='active' && $product->category != "second-hand")

                            <div class="prod-i">
                                <div class="prod-i-top">
                                    <a href="{{url('productDetails/'.$product->id)}}" class="prod-i-img"><!-- NO SPACE --><img src="{{$product->getImage()}}" alt="{{$product->name}}"><!-- NO SPACE --></a>
                                    <p class="{{url('productDetails/'.$product->id)}}"></p>
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
                                <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.8;">{{$product->faculty}} </p>
                                <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.8;">{{$product->semester}} </p>
                                @endif
                                <p class="prod-i-price">
                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button>

                                    <button  onclick="addtoCart({{ $product->id }})" class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button>
                                </p>
                                <div class="prod-i-skuwrapcolor">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Pagination - start -->

            {{$products->links( "pagination::bootstrap-4") }}
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
            var url = "/add/to/cart/" +product_id;
            $.ajax({
                url: url,
                type: "GET",
                success: function (data) {
                    console.log("here");
                    var tr_str = "<div id='alertmsg' class='alert alert-success alert-block'>" +
                        "<strong>" + data[0] + "</strong>" +
                        "<div class='loader__element'></div>" +
                        "</div>";
                    $("#msg").append(tr_str);
                    setTimeout(function(){
                        $("#alertmsg").remove();
                    }, 3000 ); // 3 secs
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
