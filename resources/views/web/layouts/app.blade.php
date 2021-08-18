<!DOCTYPE html>
<html>
<head>
    <link rel = "icon" href ="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" type = "image/x-icon">
    <title>{{getSiteSetting('site_title') != null? getSiteSetting('site_title'): ''}} | {{ isset($pageContent->meta_link)?$pageContent->meta_link:""}}</title>
    <meta charset="utf-8">
    <meta name="description" content="{{ isset($pageContent->meta_description)?$pageContent->meta_description:""}} {{ isset($product->description)?$product->description:""}}">
    <meta name="keywords" content="{{ isset($product->name)?$product->name:""}}">
    <meta name="keywords" content="buy books online in nepal,online bookstore nepal,buy books nepal,buy nepali books online,online bookshop nepal,buy books online nepal,buy used books in nepal,buy second hand books nepal,buy used books in nepal,used books nepal, sell second hand book nepal, sell used book nepal, used book, used books">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.layouts.style')
    @stack('styles')
  </head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<div id="preloader" scroll="no"></div>

@include('web.pages.flash-message')
@include('web.layouts.header')
<!-- BEGIN CONTAINER -->

@yield('content')
<!-- END CONTAINER -->
@include('web.layouts.footer')
@include('web.layouts.script')
@stack('scripts')
<script>
    var preloader=document.getElementById("preloader");
    setTimeout(function(){
        preloader.style.display="none";
        }, 3000);
   //  window.addEventListener("load",function () {
   // preloader.style.display="none";
   //
   //  })
</script>
</body>
</html>
