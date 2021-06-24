@extends('web.layouts.app')
@section('content')

    <div class="container-fluid aboutbanner">
        <img src="{{$contactBanner->getImage()}}" oncontextmenu="return false;" alt="{{$contactBanner->title}}">
    </div>

    <div class="container-fluid about">

        <h1 style="font-size: 50px;text-transform: uppercase;">Request Now</h1>
        @include('web.pages.flash-message')
        <div class="container">
            <p style="text-align: center; font-weight: 600;">Email us with any question or inquiries or call us at +977-9845769203/ 9848788289. We would love to
                answer your questions and set up a meeting with you</p>

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
                            width: 500px !important; border-radius: 10px  !important; height: 50px !important; margin-bottom: 20px !important;">Send The Request</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
