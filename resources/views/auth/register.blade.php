@extends('web.layouts.app')

@section('content')
    <style>
        /* The Modal (background) */
        .w3-modal {
            display: block; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 20px; /* Location of the box */
            left: 0;
            top: 0;
            width : 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: hidden; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .w3-modal-content {
            background-color: #fefefe;
            margin: auto;
            border: 1px solid #888;
            width: 20%;
        }

        /* The Close Button */
        .w3-button {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .w3-button:hover,
        .w3-button:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        span:hover{
            cursor: pointer;
        }



        /* Add Animation */
        @-webkit-keyframes slideIn {
            from {bottom: -300px; opacity: 0}
            to {bottom: 0; opacity: 1}
        }

        @keyframes slideIn {
            from {bottom: -300px; opacity: 0}
            to {bottom: 0; opacity: 1}
        }

        @-webkit-keyframes fadeIn {
            from {opacity: 0}
            to {opacity: 1}
        }

        @keyframes fadeIn {
            from {opacity: 0}
            to {opacity: 1}
        }
        .pip {
            display: inline-block;
            position: relative;
        }
        .remove {
            position: absolute;
            top: 0;
            color: red;
        }
    </style>


    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <div id="id01" class="w3-modal">
                    <div class="w3-modal-content">
                        <div class="w3-container">
                            <div class="modal-header">
                                <h2 style="color: #ff682c">{{ $msg }}</h2>
                                <span class="w3-button w3-display-topright"  onclick="document.getElementById('id01').style.display='none'" >&times;</span>
                            </div>
                            <div class="modal-body">
                                {{ Session::get('alert-' . $msg) }}
                            </div>
                        </div>
                    </div>
                </div>
{{--                 <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>--}}
            @endif
        @endforeach
    </div>
    <div class="container login" id="container" style="min-height: 600px">
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('register',[$role]) }}">
                {{ csrf_field() }}
                <h2>Create Account</h2>
                <input id="name" placeholder="Name" type="text"  name="name" value="{{ old('name') }}" required autofocus />
               <span>{{ $errors->has('name') ? ' has-error' : '' }}</span>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->has('name') ? ' has-error' : '' }}</strong>
                    </span>
                @endif

                <input id="email" placeholder="Email" type="email"  name="email" value="{{ old('email') }}" required/>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

                        <input id="address" placeholder="Address" type="text"  name="address" value="{{ old('address') }}" required>
                        <span>{{ $errors->has('address') ? ' has-error' : '' }}</span>

                        <input id="phone_number"placeholder="Phone Number"  pattern="{10}"  type="number"  name="phone_number" value="{{ old('phone_number') }}" required/>
                        <span>{{ $errors->has('phone_number') ? ' has-error' : '' }}</span>

                        <input id="password" placeholder="Password" type="password"  name="password" required/>
                        @if ($errors->has('password'))
                            <p class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                          </p>
                        @endif

                        <input id="password-confirm" placeholder="Confirm Password" type="password"  name="password_confirmation" required>

                <label style="display: flex;text-align: left !important; align-items: unset !important; padding: 0px !important; ">
                    <input type="checkbox" style="width: unset !important; margin-top: 2px !important;" required> I agree with the <a style="color: #FF8800 !important;" href="{{url('/termsandcondition')}}" target="_blank"> terms and condition</a>
                </label>
                                <button type="submit">Register</button>
            </form>
        </div>


        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <div class="logo-holder">
                        <img src="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" width="140px" height="140px" class="mt-4">
                    </div>
                    <h2 style="text-transform: uppercase; font-weight: bold; font-size: 33px;">Welcome  To <br> House of Books</h2>
                    <p>To keep connected with us please login with your personal info</p>
                    <a href="{{url("login")}}"><button class="ghost" id="signIn">Sign In</button></a>
                </div>

            </div>
        </div>
    </div>

@endsection
@push('scripts')

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    @endpush
