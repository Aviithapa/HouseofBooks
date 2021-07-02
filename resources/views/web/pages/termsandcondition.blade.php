@extends('web.layouts.app')

@section('content')

    <h1 class="mt-5">Terms and Condition</h1>
    <div class="container">

        {!!html_entity_decode($terms->content)!!}
    </div>
@endsection
