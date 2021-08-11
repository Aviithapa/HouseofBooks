<header id="web-view" >
    <div class="header" >
        <div class="top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <span><i class="fa fa-book fa-2x"></i> Welcome to house of Books!!</span>
                        @if(\Illuminate\Support\Facades\Auth::user())
                        <img class="authUser" src="{{Auth::user()->getImage()}}" alt="{{Auth::user()->name}}"/>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZ4DiWF1rfHjxVUbCFw6kwPer7-oOLxy6pNboJmUHnFEenXKXRQpe01qKqGSAQNH6Hql0&usqp=CAU" height="30" width="30">
                                                                </a>
                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    {{ csrf_field() }}
                                                                </form>
                        @else
                        <a href="{{url("login")}}"><button type="button" class="btn btn-primary btn-round-sm btn-sm float-right " >Login</button></a>
                        <a href="{{url("register/customer")}}"><button type="button" class="btn btn-primary btn-round-sm btn-sm register">Register</button></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="header-logo row">
                <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12  logo mt-3">
                   <a href="{{url('/')}}"><img src="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" alt="House of Books" width="150" height="150"></a>
                </div>
                <div class="col-lg-5 col-md-10 col-sm-12 col-xs-13 form-search overflow-stick" id="form" style="margin-top: 25px;">
                    <form action="{{url("search")}}" method="GET" role="search">
                        {{csrf_field()}}
                        <div class="input-group" style="position: unset !important;">
                            <input class="form-control" placeholder="Search . . ." name="book" value="{{old('search')}}" id='book' type="text" style="position: unset !important; font-size: 16px;">

                            <div class="input-group-btn">
                                <button type="submit" id="searchbtn">search</button>
                            </div>

                        </div>
                        <div id="bookList">
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 social-details">
                    <div class="social mt-4">
                        <div class="column">
                            <div class="column">
                                <i class="fa fa-home fa-3x"></i>
                            </div>
                            <div class="column">
                                <p>Shankmul Ward no 31<br>Kathmandu, Nepal</p>
                            </div>
                        </div>

                        <div class="column">
                            <div class="column">
                                <i class="fa fa-phone fa-3x"></i>
                            </div>
                            <div class="column">
                                <p>+977-{{getSiteSetting('social_phone') != null? getSiteSetting('social_phone'): ''}}
                                    <br> +977-9848788289</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="column" >
                                <i class="fa fa-envelope-open fa-3x"></i>
                            </div>
                            <div class="column">
                                <p>info@houseofbooks.com.np <br>houseofbooksnepal@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>


    </div>
    <div class="nav">
        <div class="container-fluid">
                    <nav class="topmenu">
                        <!-- Catalog menu - start -->
                        <div class="topcatalog">
                            <a class="topcatalog-btn" href="#">BROWSE CATEGORIES</a>
                            <ul class="topcatalog-list">
                                <li>
                                    <a href="{{url('/catelog/sub_category/novel')}}">
                                        Novel
                                    </a>
                                    <i class="fa fa-angle-right"></i>
                                    <ul>
                                        <li>
                                            <a href="{{url('novel/motivational')}}">
                                                Motivational
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('novel/skills-knowledge')}}">
                                                Skills and Knowledge
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('novel/fictional')}}">
                                                Fictional
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('novel/biography')}}">
                                                Biography
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('/catelog/sub_category/coursebook')}}">
                                        Coursebook
                                    </a>
                                    <i class="fa fa-angle-right"></i>
                                    <ul>
                                        <li>
                                            <a href="{{url('/catalog/coursebook/TU')}}">
                                                Tribhuwan University
                                            </a>
                                            <i class="fa fa-angle-right"></i>
                                            <ul>
                                                <li>
                                                    <a href="{{url('/catalog/coursebook/TU/BBA')}}">
                                                        BBA
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{url('/catalog/coursebook/TU/BBS')}}">
                                                        BBS
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{url('/catalog/coursebook/TU/MBS')}}">
                                                        MBS
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{url('/catalog/coursebook/TU/MBA')}}">
                                                        MBA
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{url('/catalog/coursebook/PU')}}">
                                                Pokhara University
                                            </a>
                                            <i class="fa fa-angle-right"></i>
                                            <ul>
                                                <li>
                                                    <a href="{{url('/catalog/coursebook/PU/BBA')}}">
                                                        BBA
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{url('/catalog/coursebook/PU/MBA')}}">
                                                        MBA
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{url('/catalog/coursebook/PBU')}}">
                                                Purbanchal University
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url("catelog/sub_category/medical-examination")}}">
                                        Medical Examination
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("catalog/sub_category/loksewa-examination")}}">
                                        Loksewa Examination
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("catelog/sub_category/entrance-examination")}}">
                                        Entrance Examination
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("catelog/sub_category/question-bank-and-solution")}}">
                                        Question Bank and Solution
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Catalog menu - end -->


                        <span id="main-menu" onclick="openNav()">&#9776;</span>
                        <ul class="mainmenu" id="mySidenav">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('about')}}">Who we are</a></li>
                            <li><a href="{{url('secondhandbookcatalog')}}">Second hand books</a></li>
                            <li><a href="{{url('sell-book-index')}}">Sell Books</a></li>
                            <li><a href="{{url('blog')}}">Blog</a></li>
                            <li><a href="{{url('contact')}}">Contact Us</a></li>
                            <li><a href="{{url('give-away')}}">Give Away</a></li>
                            <a href="javascript:void(0)" class="closebtn"  id="closebtn" onclick="closeNav()" style="display: none;">&times;</a>
                            @if(\Illuminate\Support\Facades\Auth::user())
                                @if(\Illuminate\Support\Facades\Auth::user()->mainRole()->name ==='customer')
                                    <li><a href="{{url('profile')}}">My Profile</a></li>
                                @endif
                            @endif

                        </ul>
                        <!-- Main menu - end -->
                    </nav>
                </div>
        <li id="cart"> <a href="{{url("cart")}}" style="position: absolute; right: 0; text-decoration: none !important;"><button class="btn btn-primary btn-round-sm btn-sm"><i class="fa fa-shopping-cart" style="margin-right: 10px;"></i>@if(\Illuminate\Support\Facades\Auth::user())
                        {{getCartAmount()}}
                    @else
                        0
                    @endif Cart</button></a></li>
     </div>


        </div>

    </div>
    <div class="bottom-nav">
    </div>
</header>

<header id="mobile-view" style="display: none"  >
    <div class="header" >
        <div class="top">
            <div class="col-sm-12 col-xs-12">
                <li>
{{--                    <img src="http://dandelihomestay.com/wp-content/uploads/2020/10/special-offer-Recovered_gif1.gif" width="400px" height="50">--}}
                </li>
            </div>
{{--            <div class="col-sm-4 col-xs-4 a">--}}
{{--                <li><a href="#home" >CONTACT US</a></li>--}}
{{--            </div>--}}
{{--            <div class="col-sm-4 col-xs-4 a">--}}
{{--                <li ><a href="#home">SIGN IN</a></li>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="mob-header">
        <div class="col-sm-4 col-xs-4 ">
            <p id="main-menu" onclick="openMobileNav()"><i class="fa fa-bars fa-2x"></i></p>
        </div>
        <div class="col-sm-4 col-xs-4 ">
            <a href="{{url('/')}}"><img src="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" alt="House of Books" width="75" height="75"></a>
        </div>
        <div class="col-sm-4 col-xs-4 ">
            <a href="{{url("cart")}}" id="carts"><i class="fa fa-shopping-bag fa-2x"></i>@if(\Illuminate\Support\Facades\Auth::user())
                    {{getCartAmount()}}
                @else
                    0
                @endif</a>
        </div>
    </div>
    <div class="nav">
        <form action="{{url("search")}}" method="GET" role="search" style="width: 100%">
            {{csrf_field()}}
        <div class="search mt-2">
            <input type="text" class="searchTerm" name="book" value="{{old('search')}}" id='books' placeholder="What are you looking for?">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </div>
        <div id="bookLists">
        </div>
        </form>
    </div>
        <div class="mobilesidenav" id="mobileSidenav">
            <header class="mobile-header">
                <a href="javascript:void(0)" class="mobileclosebtn"  id="mobileclosebtn" onclick="closeMobileNav()" style="display: none;">&times; QUICK NAVIGATION</a>
            </header>

            <div class="menutab">
                <button class="menutablinks active" onclick="openMenu(event, 'MobileMenu')">Menu</button>
                <button class="menutablinks" onclick="openMenu(event, 'Category')">Category</button>
            </div>

            <div id="MobileMenu" class="mobiletabcontent" style="display: block;padding: 0 !important;">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('about')}}">Who we are</a></li>
                    <li><a href="{{url('secondhandbookcatalog')}}">Second hand books</a></li>
                    <li><a href="{{url('sell-book-index')}}">Sell Books</a></li>
                    <li><a href="{{url('blog')}}">Blog</a></li>
                    <li><a href="{{url('contact')}}">Contact Us</a></li>
                    <li>
                        <a href="#">
                            My Account
                        </a>
                        <i class="dropdown-btn fa fa-plus"></i>
                        <ul class="dropdown-container">
                            <li>
                                <a href="{{url("login")}}">
                                    Login
                                </a>
                            </li>
                            <li>
                                <a href="{{url("register/customer")}}">
                                    Register
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li><a href="{{url('give-away')}}">Give Away</a></li>
                    @if(\Illuminate\Support\Facades\Auth::user())
                        @if(\Illuminate\Support\Facades\Auth::user()->mainRole()->name ==='customer')
                            <li><a href="{{url('profile')}}">My Profile</a></li>
                        @endif
                    @endif
                </ul>
            </div>

            <div id="Category" class="mobiletabcontent" style="display:none; padding: 0 !important;">
                <ul>
                    <li>
                        <a href="{{url('/catelog/sub_category/novel')}}">
                            Novel
                        </a>
                        <i class="dropdown-btn fa fa-angle-down"></i>
                        <ul class="dropdown-container">
                            <li>
                                <a href="{{url('novel/motivational')}}">
                                    Motivational
                                </a>
                            </li>
                            <li>
                                <a href="{{url('novel/skills-knowledge')}}">
                                    Skills and Knowledge
                                </a>
                            </li>
                            <li>
                                <a href="{{url('novel/fictional')}}">
                                    Fictional
                                </a>
                            </li>
                            <li>
                                <a href="{{url('novel/biography')}}">
                                    Biography
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('/catelog/sub_category/coursebook')}}">
                            Coursebook
                        </a>
                        <i class="dropdown-btn fa fa-angle-down"></i>
                        <ul class="dropdown-container sub-container">
                            <li>
                                <a href="{{url('/catalog/coursebook/TU')}}">
                                    Tribhuwan University
                                </a>
                                <i class="dropdown-btn fa fa-angle-down"></i>
                                <ul class="dropdown-container sub-container-sub">
                                    <li>
                                        <a href="{{url('/catalog/coursebook/TU/BBA')}}">
                                            BBA
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catalog/coursebook/TU/BBS')}}">
                                            BBS
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catalog/coursebook/TU/MBS')}}">
                                            MBS
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catalog/coursebook/TU/MBA')}}">
                                            MBA
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('/catalog/coursebook/PU')}}">
                                    Pokhara University
                                </a>
                                <i class="dropdown-btn fa fa-angle-down"></i>
                                <ul class="dropdown-container">
                                    <li>
                                        <a href="{{url('/catalog/coursebook/PU/BBA')}}">
                                            BBA
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/catalog/coursebook/PU/MBA')}}">
                                            MBA
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('/catalog/coursebook/PBU')}}">
                                    Purbanchal University
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url("catelog/sub_category/medical-examination")}}">
                            Medical Examination
                        </a>
                    </li>
                    <li>
                        <a href="{{url("catalog/sub_category/loksewa-examination")}}">
                            Loksewa Examination
                        </a>
                    </li>
                    <li>
                        <a href="{{url("catelog/sub_category/entrance-examination")}}">
                            Entrance Examination
                        </a>
                    </li>
                    <li>
                        <a href="{{url("catelog/sub_category/question-bank-and-solution")}}">
                            Question Bank and Solution
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    @include('web.layouts.bottomnav')
</header>


<div class="social-fix">
    <ul class="list-unstyled mb-0">
        @if(\Illuminate\Support\Facades\Auth::user())
            @if(\Illuminate\Support\Facades\Auth::user()->mainRole()->name == "customer")

            @else
                    <a href="{{url('/dashboard')}}"> <li><i class="fa fa-home fa-2x">
                    </i> Dashboard</li></a>
            @endif
        @endif
    </ul>
</div>
@push('scripts')
    <script>
        function openNav() {
            document.getElementById("closebtn").style.display = "block";
            document.getElementById("mySidenav").style.display = "block";
        }
        function closeNav() {
            document.getElementById("mySidenav").style.display = "none";
        }

        function openMobileNav() {
            document.getElementById("mobileclosebtn").style.display = "block";
            document.getElementById("mobileSidenav").style.display = "block";
        }
        function closeMobileNav() {
            document.getElementById("mobileSidenav").style.display = "none";
        }
        var x = window.matchMedia("(max-width: 1000px)");
        myFunction(x);// Call listener function at run time
        x.addListener(myFunction);
        function myFunction(x) {
            if (x.matches) { // If media query matches
                document.getElementById("main-menu").style.display = "block";
                var element = document.getElementById("mySidenav");
                document.getElementById("mySidenav").style.display = "none";
                element.classList.add("sidenav");
                element.classList.remove("mainmenu");
            } else {
                document.getElementById("main-menu").style.display = "none";
                document.getElementById("mySidenav").style.display = "block";
                document.getElementById("closebtn").style.display = "none";
                var element = document.getElementById("mySidenav");
                element.classList.remove("sidenav");
                element.classList.add("mainmenu");
            }

        }
        var y= window.matchMedia("(max-width:500px)");
        mobileResponsive(y);// Call listener function at run time
        y.addListener(mobileResponsive);
        function mobileResponsive(y) {
            if (y.matches) { // If media query matches
                document.getElementById("mobile-view").style.display = "block";
                document.getElementById("web-view").style.display = "none";
            } else {
                document.getElementById("mobile-view").style.display = "none";
                document.getElementById("web-view").style.display = "block";
            }
        }

        $(document).ready(function () {
            // keyup function looks at the keys typed on the search box
            $('#book').on('keyup',function() {
                // the text typed in the input field is assigned to a variable
                var book= document.getElementById("book");

                if(book !=null){
                    var query = $(this).val();
                    // call to an ajax function
                    $.ajax({
                        url:"{{ route('autocomplete.fetch') }}",
                        type:"GET",
                        data:{'product':query},
                        success:function (data) {
                            if (!query){
                                $('#bookList').hide();
                            }else if (query){
                                $('#bookList').show();
                                $('#bookList').html(data);
                            }
                        }
                    })
                }

            });

            var container = document.getElementsByClassName('form-search')[0];
            document.addEventListener('click', function( event ) {
                if (container !== event.target && !container.contains(event.target)) {
                    $('#bookList').hide();
                }
            });
            var bookList = document.getElementsByClassName("search-item");
            window.onclick = function(event) {
                if (event.target == bookList) {
                    document.getElementById('bookList').style.display = "none";

                }
            }
            var CSRF_TOKEN = $('input[name="_token"]').attr('value');
            $(document).on('click', '.search-item', function(){
                var value = $(this).val();
                var text = $(this).text();
                var base = 'https://houseofbooks.com.np/productDetails/' + value ;
                window.location.href=base;
                $('#book').val(text);
            });

        });

        $(document).ready(function () {
            // keyup function looks at the keys typed on the search box
            $('#books').on('keyup',function() {
                // the text typed in the input field is assigned to a variable
                var book= document.getElementById("books");
                if(book !=null){
                    var query = $(this).val();
                    // call to an ajax function
                    $.ajax({
                        url:"{{ route('autocomplete.fetch') }}",
                        type:"GET",
                        data:{'product':query},
                        success:function (data) {
                            if (!query){
                                $('#bookLists').hide();
                            }else if (query){
                                $('#bookLists').show();
                                $('#bookLists').html(data);
                            }
                        }
                    })
                }

            });

            var container = document.getElementsByClassName('form-search')[0];
            document.addEventListener('click', function( event ) {
                if (container !== event.target && !container.contains(event.target)) {
                    $('#bookList').hide();
                }
            });
            var bookList = document.getElementsByClassName("search-item");
            window.onclick = function(event) {
                if (event.target == bookList) {
                    document.getElementById('bookLists').style.display = "none";
                }
            }
            var CSRF_TOKEN = $('input[name="_token"]').attr('value');
            $(document).on('click', '.search-item', function(){
                var value = $(this).val();
                var text = $(this).text();
                var base = 'https://houseofbooks.com.np/productDetails/' + value ;
                window.location.href=base;
                $('#book').val(text);
            });

        });

        function openMenu(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("mobiletabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("menutablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                this.classList.toggle("fa-minus");
                this.classList.toggle("fa-angle-up");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }

    </script>
    @endpush
