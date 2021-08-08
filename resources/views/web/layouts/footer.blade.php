


<footer class="section footer-classic context-dark bg-image" style="background-color: #303030;;">
    <div class="container-fluid">
        <div class="row row-30">
            <div class="col-md-4 col-xl-5" style="text-align:center;">
                <div class="pr-xl-4"><a class="brand" href="{{url("/")}}">
                        <div class="logo-holder mt-5 center-block">
                            <img src="{{getSiteSetting('logo_image') != null? getSiteSetting('logo_image'): ''}}" width="140px" height="140px" class="mt-4">
                        </div>
                    </a>
                    <h2 style="font-weight: bold">HOUSE OF BOOKS PVT. LTD</h2>
                    <p style="margin-top: 10px; font-weight: 600; font-size: 16px;">We are the group of young motivated individuals devoted toward providing a platform for selling and buying second  hand books as well as first hand books.</p>
                    <!-- Rights-->
                </div>
            </div>
            <div class="col-md-2">
                <h3 style="font-weight: bold; color:#FF8800 !important;">CONTACT</h3>
                <dl class="contact-list">
                    <h3 style="font-size: 16px !important;"><dt>Address:</dt></h3>
                    <dd style=" font-size: 16px;">Shankmul Ward no 31
                        Kathmandu, Nepal</dd>
                </dl>
                <dl class="contact-list">
                    <h3 style="font-size: 16px !important;" ><dt>Email:</dt></h3>
                    <dd style="font-size: 16px;"><a href="mailto:#">houseofbooksnepal@gmail.com</a></dd>
                </dl>
                <dl class="contact-list">
                    <h3 style="font-size: 16px !important;"><dt>Phone:</dt></h3>
                    <dd style="font-size: 16px;"><a href="tel:#">+977-{{getSiteSetting('social_phone') != null? getSiteSetting('social_phone'): ''}}</a> <br> <a href="tel:#">+977-9848788289</a>
                    </dd>
                </dl>
            </div>
            <div class="col-md-2 col-xl-3" style="margin-left: 60px;">
                <h3 style="font-weight: bold; color: #FF8800 !important;">QUICK LINKS</h3>
                <ul class="nav-list" style=" font-weight: 600; font-size: 16px;">
                    <li><a href="{{url('about')}}">About</a></li>
                    <li><a href="{{url('privacy')}}">Privacy</a></li>
                    <li><a href="{{url('termsandcondition')}}">Terms and Condition</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-xl-3">
                <h3 style="font-weight: bold; color: #FF8800 !important;">Payment Options</h3>
                    <div id="eSewaLogoSection" class="mt-2"></div>
                    <div class="cod mt-2"><img src="/storage/banner/tKb1b8o0M29h3stTXagYFqxlB8gBj0ZkAEiQq8Be.png" alt="House of books" width="150px"></div>
            </div>
        </div>
    </div>
</footer>
<div class="loader">
    <div class="container-fluid">
        <p class="rights pt-4" style=" margin-left: 10px; font-weight: 600; font-size: 16px;">©2021 House of Books. All Rights Reserved.</p>
    </div>
</div>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>

<script id="1" language="JavaScript" type="text/javascript" src="https://cdn.esewa.com.np/ui/js/eSewa_logo/script.js" data-width="150px" data-elementId="eSewaLogoSection" data-type="LIGHT"></script>
<script>

    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution="install_email"
     page_id="102149221951042">
</div>
<!-- Load Facebook SDK for JavaScript -->
