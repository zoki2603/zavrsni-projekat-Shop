<nav class="navbar">
    <div class="logo">
        <h1>SHOP</h1>
    </div>
    <ul class="menu">
        @auth("admin")
        <li><a href="{{ route("admin.index") }}">Admin</a></li>
        <li><a href="{{ route("all.purchases") }}">Purchase</a></li>
        <li><a href="{{ route("employee.show.register") }}">Register Employee</a></li>
        <li>
            <form action="{{ route("admin.logout") }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light">Logout</button>
            </form>
        </li>
        @endauth
        @auth("employee")
               <li>
            <form action="{{ route("employee.logout") }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light">Logout</button>
            </form>
        </li>
        @endauth
     
       

</nav>