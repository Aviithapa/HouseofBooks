@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
        <div class="loader__element"></div>
    </div>

@endif


@if ($message = Session::get('error'))

    <div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        Please check the form below for errors
    </div>
@endif

@push('scripts')

    <script>
        $("document").ready(function(){
            setTimeout(function(){
                $("div.alert").remove();
            }, 3000 ); // 5 secs

        });
    </script>
    @endpush
