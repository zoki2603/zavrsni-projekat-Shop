<nav class="navbar">
    <div class="logo">
       <a style="text-decoration: none" href="{{ route('home') }}"><h1>SHOP</h1></a>
    </div>
    <ul class="menu">
            @guest
            <li><a style="color:rgb(81, 58, 212);" href="https://documenter.getpostman.com/view/25274927/2s93RZMpc8" target="_blank">Postman API documentation</a></li>
            <li><a style="color:rgb(81, 58, 212);"  href="https://github.com/zoki2603/zavrsni-projekat-Shop">My GitHub</a></li>
            <li><a style="color:rgb(81, 58, 212);" href="{{ route('project.documentation') }}">Download documentation</a></li>
            <li><a href="{{ route("user.show.login") }}">Login</a></li>
            <li><a href="{{ route("user.show.register") }}">Registar</a></li>
            @endguest
            
            @auth
            <li><a href="{{ route("home") }}">Home</a></li>
            <li><a href="{{ route("coming.soon") }}">Coming soon</a></li>
            <li>
                <form action="{{ route("user.logout") }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </li>
            <li><a href="{{ route("cart.index") }}"><span></span><i class="fas fa-shopping-cart"></i></a></li>
            @endauth
        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div>
</nav

