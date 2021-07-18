<header>
    <div class="header">
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
                <div class="col-lg-5 col-md-10 col-sm-12 col-xs-13 form-search overflow-stick" style="margin-top: 25px;">
                    <form action="{{url("search")}}" method="GET" role="search">
                        {{csrf_field()}}
                        <div class="input-group" style="position: unset !important;">
                            <input class="form-control" placeholder="Search . . ." name="search" value="{{old('search')}}" id='books' type="text" style="position: unset !important; font-size: 16px;">
                            <div class="input-group-btn">
                                <button type="submit" id="searchbtn">search</button>
                            </div>
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


        <div class="col-md-12 col-sm-12 cart-details">
                <div class="column">
                    <li> <a href="{{url("cart")}}" style="position: absolute;"><i class="fa fa-shopping-cart fa-icon-2x" style="margin-right: 10px;"></i>@if(\Illuminate\Support\Facades\Auth::user())
                                    {{getCartAmount()}}
                                @else
                                    0
                                @endif</a></li>
                </div>
                <div class="column">
                    <span id="main-menu" onclick="openNav()">&#9776;</span>
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
<div class="social-fix">
    <ul class="list-unstyled mb-0">
        <a href="{{url('/dashboard')}}"> <li><i class="fa fa-home fa-2x">
                </i> Dashboard</li></a>
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
    </script>


    @endpush
