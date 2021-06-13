@extends('web.layouts.app')

@section('content')
    <div class="container">

        @if( session('success_message'))
            <div class="alert alert-success">
                {{session('success_message')}}
            </div>
        @endif


        @if( session('error_message'))
            <div class="alert alert-danger">
                {{session('error_message')}}
            </div>
        @endif
    </div>


    @endsection
