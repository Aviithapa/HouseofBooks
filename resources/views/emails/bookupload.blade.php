<!DOCTYPE html>
<html >
<head>
    <link rel = "icon" href ="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" type = "image/x-icon">
    <title>{{getSiteSetting('site_title') != null? getSiteSetting('site_title'): ''}} | {{ isset($pageContent->meta_link)?$pageContent->meta_link:""}}</title>
    <meta charset="utf-8">
    <meta name="description" content="`{{isset($pageContent->meta_description)?$pageContent->meta_description:""}}`">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div class="body">
    Hello <strong>House of Books</strong>,

    <p>You got a second hand book from {{$name}}</p>
    <p>Please Verify the book </p>

</div>
</body>
</html>



