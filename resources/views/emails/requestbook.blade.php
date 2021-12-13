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

    <p>You got a book request from  {!!html_entity_decode($name)!!}</p>
    <p>Please Check it and Verify the book </p>
    <a href="https://houseofbooks.com.np/dashboard">Go to Dashboard</a>
    <strong>
        <br><br>
        Thank you!
        <br>
        With Best Regards,<br>
        <img src="http://houseofbooks.com.np/storage/logo_image/Prw3mhhR9aEVYC0SFNmgU9CZGSoHSoipUErXIPNC.png" height="100" width="125"/><br>
        Sales and Marketing Department<br>
        House of Books Pvt. Ltd.<br>
        Shankhamul, Ward No 31, Kathmandu, Nepal<br>
        Contact No: +977-9845769203/ 9848788289<br>
        Email: houseofbooksnepal@gmail.com, info@houseofbooks.com.np<br>
        Website: www.houseofbooks.com.np<br>
    </strong>
</div>
</body>
</html>
