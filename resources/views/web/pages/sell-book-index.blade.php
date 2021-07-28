@extends('web.layouts.app')
@section('content')


            <div class="fh5co-parallax" style="background-image: url({{$sell_book_banner->getImage()}});  box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.4);" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-sm-offset-0 col-xs-12  text-center fh5co-table">
                            <div class="fh5co-intro fh5co-table-cell animate-box">
                                <h1 class="text-center text-uppercase" style="color: white !important;">Start Selling your used books <br>with us in simple steps</h1>
                                <h3 class="text-uppercase" style="color: white !important; margin-top: -10px; line-height: 1.2;">Be a part of sustainable economy of Nepal <br> with house of books</h3>
                                <a  href="#"><button id="myBtn" type="button" class="start-selling btn  btn-primary btn-round-sm btn-sm float-right">Start Selling</button></a>
{{--                                <p style="margin-top: 10px;">Already a seller? <a href="{{route('dashboard.products.index')}}" style="color: orange">Login Now</a> </p>--}}


                            <!-- Modal Structure -->
                                <!-- The Modal -->
                                <div id="myModal" class="modal">

                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2>House of Books Pvt Ltd</h2>
                                            <span class="close">&times;</span>
                                        </div>
                                        <div class="modal-body">
                                            <p>Hello and  welcome from House of book</p>

                                        </div>
                                        <div class="modal-footer">
                                            @if(\Illuminate\Support\Facades\Auth::user())
                                                    @if(\Illuminate\Support\Facades\Auth::user()->mainRole()->name == "customer" || \Illuminate\Support\Facades\Auth::user()->mainRole()->name == "finance" )
                                                    <a  href="{{route('user.role')}}"><button type="button" class="start-selling btn  btn-primary btn-round-sm btn-sm float-right">Agree</button></a>
                                                    <button id="close" type="button" class="start-selling btn  btn-primary btn-round-sm btn-sm float-right">Disagree</button>
                                                    @elseif(\Illuminate\Support\Facades\Auth::user()->mainRole()->name == "seller")
                                                    <a  href="{{url('/dashboard')}}"><button type="button" class="start-selling btn  btn-primary btn-round-sm btn-sm float-right">Ok</button></a>
                                                    @endif
                                            @else
                                                <a  href="{{url('/register/seller')}}"><button type="button" class="start-selling btn  btn-primary btn-round-sm btn-sm float-right">Agree</button></a>
                                               <button id="close" type="button" class="start-selling btn  btn-primary btn-round-sm btn-sm float-right">Disagree</button>
                                            @endif
                                        </div>
                                    </div>

                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="width: 100%; margin-top: 50px !important;">
                 <img src="{{$learn_more_banner->getImage()}}" alt="houseofbooks" class="learn_more_image" style="width: 100%;">
{{--                 <img src="{{$learn_more_btn->getImage()}}" alt="" class="learn_more_btn">--}}
            </div>

            <div class="working-step mt-5 mb-5" style="margin-top: 50px !important;">
                <div class="mt-5" >
                    <h1 class="text-uppercase text-center" style="color: #25a521 !important; font-size: 30px !important; line-height: 0.5">Become a successful seller in four step</h1>
                    <p class="text-center" style="font-weight: 600 !important; font-size: 23px !important;">We are registering seller from Kathmandu valley, Lalitpur, Bhaktapur at the moment </p>
                </div>
                <div class="container" style="margin-top: 45px !important;">
                    <img src="{{$work_banner->getImage()}}" alt="houseofbooks" height="300">
                </div>
            </div>

    @endsection
@push('scripts')

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        var close=document.getElementById("close");
        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        close.onclick = function() {
            modal.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    @endpush
