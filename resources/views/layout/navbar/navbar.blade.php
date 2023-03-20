<nav class="navbar">
    <div class="logo">
       <a style="text-decoration: none" href="{{ route('home') }}"><h1>SHOP</h1></a>
    </div>
    <ul class="menu">
        <?php
        if (!isset($_SESSION["user"])) { ?>
            <li><a href="{{ route("user.show.login") }}">Login</a></li>
            <li><a href="{{ route("user.show.register") }}">Registar</a></li>
        <?php } else { ?>
            <li><a href="">Logout</a></li>
            <li><a href="">Home</a></li>
            <li><a href=""><span></span><i class="fas fa-shopping-cart"></i></a></li>
        <?php } ?>
        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div>
</nav>