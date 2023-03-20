
@extends("layout.master")
@extends('layout.navbar.admin_navbar')
@section('navbar')
    
@endsection
@section("main-content")
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Admin Login</h2>
            <hr class="hr">
        </div>
        <div class="mx-auto container">
            <form action="../controler/loginController.php" id="login-form" method="post">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password">
                </div>
                <div class="form-group">

                    <input type="submit" class="btn" name="submit" id="login-btn" value="Login">
                </div>
            </form>
        </div>
    </section>



    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>


    @endsection
