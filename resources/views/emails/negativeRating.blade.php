<!DOCTYPE html>
<html >
<head>
    <link rel = "icon" href ="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" type = "image/x-icon">
    <title>{{getSiteSetting('site_title') != null? getSiteSetting('site_title'): ''}} | {{ isset($pageContent->meta_link)?$pageContent->meta_link:""}}</title>
    <meta charset="utf-8">
    <meta name="description" content="`{{isset($pageContent->meta_description)?$pageContent->meta_description:""}}`">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .body{
            background-color: #eeeeee;
            padding: 30px;
        }
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        .invoice{
            width: 100%;
        }
        .order_id{
            width: 100%;
            height: 30px;
        }
        .order{
            left: 0;
            position:absolute;
        }
        .date{
            right: 0;
            position:absolute;
        }
        .invoice-info{
            margin-top: 30px;
        }
        .row{
            text-align: center;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>


<div class="body">
    <div class="row justify-content-center">
        <div class="title">
            <img src="http://houseofbooks.com.np/storage/logo_image/Prw3mhhR9aEVYC0SFNmgU9CZGSoHSoipUErXIPNC.png" width="100" height="75">
            <h1>House of Books Nepal</h1>
            Shankmul Ward no 31 Kathmandu, Nepal<br>
            Contact Details :9845769230 9848788289<br>
            Email:houseofbooksnepal@gmail.com<br>
            Website:http://houseofbooks.com.np<br>
        </div>
    </div>
    Hi <strong>{{ $name }}</strong>,
    <p>You got a negative marking please verify the message or contact to houseofbooksnepal for further information</p>
    <p>{{(string)$message}}</p>
    <strong>
        <br><br>
        Thank you!
        <br>

        With Best Regards,<br>
        <img src="http://houseofbooks.com.np/storage/logo_image/Prw3mhhR9aEVYC0SFNmgU9CZGSoHSoipUErXIPNC.png" height="100" width="150"/><br>
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



