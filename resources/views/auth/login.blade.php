@extends('web.layouts.app')

@section('content')
    <style>
        .pwd{
            position: relative;
            width: 100%;
            margin-left: -20px !important;
        }
    </style>
    <div class="container login" id="container">
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}


                <input type="email"  id="login_username" name="user_name" value="{{ old('user_name')}}" placeholder="Email" required/>
                <div class="pwd">
                    <input type="password" id="login_pass" name="password" required placeholder="Password" />
                    <i class="fa fa-eye" id="togglePassword" style=" cursor: pointer; z-index: 9999;
                position: absolute;
                top: 40%;
                right: 5px;"></i>
                </div>


            @if ($errors->has('active'))
                    <span class="help-block text-danger">
                                    <strong>{{ $errors->first('active') }}</strong>
                    </span>
                @endif
                @if ($errors->has('credentials'))
                    <span class="help-block text-danger">
                                    <strong>{{ $errors->first('credentials') }}</strong>
                                </span>
                @endif
                <a href="{{ route('password.request') }}" style="color: black !important; margin-left: 180px;  margin-bottom: 10px;">Forgot your password?</a>
                <button type="submit" class="block"  value="Login" name="submit">Sign In</button>

            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <div class="logo-holder">
                        <img src="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" width="140px" height="140px" class="mt-4">
                    </div>
                    <h2 style="text-transform: uppercase; font-weight: bold; font-size: 33px;">Welcome Back To <br> House of Books</h2>
                    <p style="font-size: 20px;">Enter your personal details and start shopping now</p>
                    <p style="font-size: 20px;">Not a member yet? </p>

                   <a href="{{url("register/customer")}}"> <button class="ghost" id="signUp">Sign Up</button></a>
                </div>
            </div>
        </div>
    </div>


    @stack('styles')

    @include('partials.modal.register')

    @push('scripts')
        @if(request()->has('register'))
            <script>
                $('#js-register-button').trigger('click');
            </script>
        @endif


        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#login_pass');

            togglePassword.addEventListener('click', function (e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('fa-eye-slash');
            });
        </script>
        @stack('scripts')
    @endpush

@endsection
