@extends("layout.master")
@extends('layout.navbar.navbar')
@section('navbar')
    
@endsection
@section("main-content")

    <section class="my-5 py-5">
        <div class="container text-center  mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="hr">
        </div>
        @if (session('message'))
        <div class="alert alert-danger" role="alert">
           {{ session('message') }}
          </div>
            
        @endif
        </div>
        <div class="mx-auto container ">
            <form action="{{ route('user.register') }}" id="login-form" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="name" name="first_name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Lastname">
                </div>
                <div class="form-group">
                    <label for="">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="City">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="emil" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password">
                </div>
                <div class="form-group">

                    <input type="submit" class="btn" name="submit" id="login-btn" value="Register">
                </div>
            </form>
        </div>
    </section>



    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>


    @endsection