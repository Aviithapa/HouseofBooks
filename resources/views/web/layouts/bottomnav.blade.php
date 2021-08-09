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
            <a href="#" id="myBtn">
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
                <a href="{{url("login")}}" class="material-icons-outlined">login LOGIN</a>
                <a href="{{url("register/customer")}}" class="material-icons-outlined">person_add SIGNUP</a>
            </div>
        </div>
    </div>
</nav>
<span class="popuptext" id="myPopup">Start Selling</span>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2>House of Books Pvt Ltd</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            {!!html_entity_decode($terms->content)!!}
        </div>
        <div class="modal-footer">
            @if(\Illuminate\Support\Facades\Auth::user())
                @if(\Illuminate\Support\Facades\Auth::user()->mainRole()->name == "customer" || \Illuminate\Support\Facades\Auth::user()->mainRole()->name == "finance" )
                    <a  href="{{route('user.role')}}"><button type="button" class="start-selling btn  btn-primary btn-round-sm btn-sm float-right">Agree</button></a>
                    <button id="close" type="button" class="start-selling btn  btn-primary btn-round-sm btn-sm float-right">Disagree</button>
                @elseif(\Illuminate\Support\Facades\Auth::user()->mainRole()->name == "seller")
                    <a  href="{{url('/dashboard')}}"><button type="button" class="start-selling btn  btn-primary btn-round-sm btn-sm float-right">Ok</button></a>
                @endif
            @else
                <a  href="{{url('/register/seller')}}"><button type="button" class="start-selling btn  btn-primary btn-round-sm btn-sm float-right">Agree</button></a>
                <button id="close" type="button" class="start-selling btn  btn-primary btn-round-sm btn-sm float-right">Disagree</button>
            @endif
        </div>
    </div>

</div>
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
<script>
    // When the user clicks on div, open the popup
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    var close=document.getElementById("close");
    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    close.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
