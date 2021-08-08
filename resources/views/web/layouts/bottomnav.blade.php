<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<nav class="mobile-bottom-nav">
    <div class="mobile-bottom-nav__item mobile-bottom-nav__item--active">
        <div class="mobile-bottom-nav__item-content">
            <i class="fa fa-home fa-2x"></i>
        </div>
    </div>
    <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
            <i class="material-icons">mail</i>
        </div>
    </div>
    <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
            <i class="material-icons">person</i>
        </div>
    </div>

    <div class="mobile-bottom-nav__item">
        <div class="mobile-bottom-nav__item-content">
            <i class="material-icons drop_up">person</i>

        </div>
    </div>
</nav>


<script>
    var navItems = document.querySelectorAll(".mobile-bottom-nav__item");
    navItems.forEach(function(e, i) {
        e.addEventListener("click", function(e) {
            navItems.forEach(function(e2, i2) {
                e2.classList.remove("mobile-bottom-nav__item--active");
            });
            this.classList.add("mobile-bottom-nav__item--active");
        });
    });
</script>
