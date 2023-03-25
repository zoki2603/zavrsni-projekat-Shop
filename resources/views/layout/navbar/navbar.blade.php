<nav class="navbar">
    <div class="logo">
       <a style="text-decoration: none" href="{{ route('home') }}"><h1>SHOP</h1></a>
    </div>
    <ul class="menu">
            @guest
            <li><a href="{{ route("user.show.login") }}">Login</a></li>
            <li><a href="{{ route("user.show.register") }}">Registar</a></li>
            @endguest
            
            @auth
            <li><a href="{{ route("home") }}">Home</a></li>
            <li>
                <form action="{{ route("user.logout") }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </li>
            <li><a href="{{ route("index.cart") }}"><span></span><i class="fas fa-shopping-cart"></i></a></li>
            @endauth
        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div>
</nav>

