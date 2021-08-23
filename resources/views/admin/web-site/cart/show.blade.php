@extends('admin.layout.app')

@section('content')
    @include('admin.partials.common.page-title', ['page_title' => 'Cart View'])
    <div class="container" style="margin-top: 30px">
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-body ">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h3><span>Book Name : {{$request->product_name}}</span></h3>
                                <h3><span>Price : {{$request->product_price}}</span></h3>
                                <h3> <span>Quantity :{{$request->quantity}}</span></h3>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h1>User Details</h1>
                                <h3><span>{{$user->name}}</span><br></h3>
                                <h3><span>{{$user->phoneNumber}}</span><br></h3>
                                <h3> <span>{{$user->email}}</span><br></h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')


@endpush
