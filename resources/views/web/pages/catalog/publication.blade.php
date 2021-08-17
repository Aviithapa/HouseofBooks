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
            <!-- Catalog Sidebar - start -->
            <div class="section-sb">
                <div class="section-filter">
                    <div class="section-filter-cont">
                        <div class="section-filter-price">
                            <div class="range-slider section-filter-price" data-min="0" data-max="1000" data-from="200" data-to="800" data-prefix="$" data-grid="false"></div>
                        </div>
                        <div class="section-filter-item opened">
                            <span class="section-filter-ttl">Apply Filter</span>

                            <form method="GET" id="carform">
                                {{csrf_field() }}
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <strong>University</strong>
                                        <select class="form-control" name="university" id="university">
                                            <option class="form-control" value="TU">Tribhuwan University</option>
                                            <option class="form-control" value="PU">Pokhara University</option>
                                            <option class="form-control" value="PBU">Purbanchal University</option>
                                        </select>
                                    </div>
{{--                                    <div class="col-lg-12 mt-3">--}}
{{--                                        <strong>Publication</strong>--}}
{{--                                        <select class="form-control"  name="publication">--}}
{{--                                            <option class="form-control" value="asmita">Asmita</option>--}}
{{--                                            <option class="form-control" value="saraswati">Saraswati</option>--}}
{{--                                            <option class="form-control" value="samiksya">Samiksya</option>--}}
{{--                                            <option class="form-control" value="mk_publication">MK</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
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
                <div class="prod-items section-items" id="product_display">
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
                                    <a style="color: black !important;" href="{{url('productDetails/'.$product->id)}}">{{ str_limit($product->name, 30) }}</a>
                                </h3>
                                <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.8;">{{$product->publication}} </p>
                                <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.8;">{{$product->faculty}} </p>
                                <p class="prod-i-price">
                                    <button class="btn btn-primary btn-round-sm btn-sm price" style=" width:70px; font-size: 10px;background-color:#25a521 !important; border-color:#25a521 !important; margin-right:3px; font-weight: 700 !important;">RS {{$product->getDicountedPrice()}}</button><a href="{{url('add/to/cart/'.$product->id)}}"><button class="btn btn-primary btn-round-sm btn-sm cart-button" style="font-size: 10px; font-weight: 600;">ADD TO CART</button></a>
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
        function change(slug) {
            var base = 'http://houseofbooks.com.np/catalog/nobel/' + slug ;
            window.location.href=base
        }
    </script>
    <script>

{{--        $(document).ready(function () {--}}
{{--            // keyup function looks at the keys typed on the search box--}}
{{--            $('#set_filter').on('click', function () {--}}
{{--                // the text typed in the input field is assigned to a variable--}}
{{--                var university = document.getElementById("university").value;--}}
{{--                var course = document.getElementById("course").value;--}}

{{--                    // call to an ajax function--}}
{{--                    $.ajax({--}}
{{--                        url: "{{ route('publication.data') }}",--}}
{{--                        type: "GET",--}}
{{--                        data: {'university': university, 'course' : course},--}}
{{--                        success: function (data) {--}}
{{--                                $('#product_display').html(data);--}}
{{--                        }--}}
{{--                    })--}}

{{--            });--}}
{{--        })--}}
    </script>
@endpush
