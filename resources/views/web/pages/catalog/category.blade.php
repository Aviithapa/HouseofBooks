@extends('web.layouts.app')
@section('content')
    <!-- Main Content - start -->
    <main>
        <section class="container">


            <h2 class="main-ttl"><span> Category</span></h2>

            <div class="section-sb">
                @if($product == "nobel")
                    <div class="section-filter">
                        <div class="section-filter-cont">
                            <div class="section-filter-price">
                                <div class="range-slider section-filter-price" data-min="0" data-max="1000" data-from="200" data-to="800" data-prefix="$" data-grid="false"></div>
                            </div>
                            <div class="section-filter-item opened" id="nobel">
                                <p class="section-filter-ttl">Nobel</p>
                                <div class="section-filter-fields">
                                    <p class="section-filter-field">
                                        <input id="section-filter-checkbox3-5" value="on" type="checkbox" onclick="change('frictional')">
                                        <label class="section-filter-checkbox" for="section-filter-checkbox3-5">Frictional</label>
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
                                <a href="{{url('/catalog/sub_category/nobel')}}">
                                    <span class="categ-1-label">Nobel</span>
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
                    @else

                    <div class="section-filter">
                        <div class="section-filter-cont">
                            <div class="section-filter-price">
                                <div class="range-slider section-filter-price" data-min="0" data-max="1000" data-from="200" data-to="800" data-prefix="$" data-grid="false"></div>
                            </div>
                            <div class="section-filter-item opened" id="university">
                                <p class="section-filter-ttl">University</p>
                                <div class="section-filter-fields">
                                    <p class="section-filter-field">
                                        <input id="section-filter-checkbox4-1" value="on" type="checkbox" onclick="university('TU')">
                                        <label class="section-filter-checkbox" for="section-filter-checkbox4-1" >Tribhuwan University</label>
                                    </p>
                                    <p class="section-filter-field">
                                        <input id="section-filter-checkbox4-2" value="on" type="checkbox" onclick="university('PU')">
                                        <label class="section-filter-checkbox" for="section-filter-checkbox4-2">Pokhara University</label>
                                    </p>
                                    <p class="section-filter-field">
                                        <input id="section-filter-checkbox4-3" value="on" type="checkbox" onclick="university('PBU')">
                                        <label class="section-filter-checkbox" for="section-filter-checkbox4-3">Purbanchal University</label>
                                    </p>
                                    <p class="section-filter-field">
                                        <input id="section-filter-checkbox4-4" value="on" type="checkbox" onclick="university('KU')">
                                        <label class="section-filter-checkbox" for="section-filter-checkbox4-4">Kathmandu University</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-sb-current">
                        <ul class="section-sb-list" id="section-sb-list">
                            <li class="categ-1">
                                <a href="{{url('/catalog/sub_category/nobel')}}">
                                    <span class="categ-1-label">Nobel</span>
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
                                    <p class="{{url('productDetails/'.$product->id)}}"><i class="fa fa-info"></i></p>
                                </div>
                                <div class="prod-sticker">
                                    <p class="prod-sticker-3" style="background-color: #FF8800 !important;">-{{$product->discount}}%</p><p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
                                </div>
                                <h3>
                                    <a style="color: black !important;" href="{{url('productDetails/'.$product->id)}}">{{ str_limit($product->name, 20) }}</a>
                                </h3>
                                <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.8;">{{$product->faculty}} </p>
                                <p style="color:black; font-style: italic; font-size: 15px; text-transform: uppercase; text-align: center; line-height: 0.8;">{{$product->semester}} </p>
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
        function university(slug) {
            var base = 'http://houseofbooks.com.np/catalog/university/' + slug ;
            window.location.href=base
        }
        function faculty(slug) {
            var base = 'http://houseofbooks.com.np/catalog/faculty/' + slug ;
            window.location.href=base
        }
    </script>
@endpush
