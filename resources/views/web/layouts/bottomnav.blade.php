<link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">


<nav class="mobile-bottom-nav">
    <div class="mobile-bottom-nav__item mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content mobile-bottom-nav__item-content--active">
            <a href="{{url('/')}}">
            <i class="material-icons-outlined">home</i>
            </a>
        </div>
    </div>
    <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
            <a href="{{url('catalog')}}">
            <i class="material-icons-outlined">shopping_bag</i>
            </a>
        </div>
    </div>
    <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
            <a href="{{url('sell-book-index')}}">
            <i class="material-icons-outlined">sell</i>
            </a>
        </div>
    </div>
    <div class="mobile-bottom-nav__item dropup">
        <div class="mobile-bottom-nav__item-content ">
            <a href="#">
                <i class="material-icons-outlined">person</i>
            </a>
            <div class="dropup-content">
                <a href="{{url("login")}}">SIGN IN</a>
                <a href="{{url("register/customer")}}">SIGN UP</a>
            </div>
        </div>
    </div>
</nav>


<script>

    var navItems = document.querySelectorAll(".mobile-bottom-nav__item-content");
    navItems.forEach(function(e, i) {
        e.addEventListener("click", function(e) {
            navItems.forEach(function(e2, i2) {
                e2.classList.remove("mobile-bottom-nav__item-content--active");
            });
            this.classList.add("mobile-bottom-nav__item-content--active");
        });
    });
</script>
