<nav class="navbar">
    <div class="logo">
        <h1>SHOP</h1>
    </div>
    <ul class="menu">
        @auth
        <li><a href="purchase.php">Purchase</a></li>
        <li><a href="adminRegister.php">Registar</a></li>
        <li><a href="{{ route("admin.index") }}">Admin</a></li>
        <li>
            <form action="{{ route("admin.logout") }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light">Logout</button>
            </form>
        </li>
        @endauth
       

</nav>