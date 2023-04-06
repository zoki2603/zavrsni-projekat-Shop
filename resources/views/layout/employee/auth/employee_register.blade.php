@extends("layout.master")
@extends('layout.navbar.admin_navbar')
@section('navbar')
    
@endsection
@section("main-content")

    <section class="my-5 py-5">
        <div class="container text-center  mt-3 pt-5">
            <h2 class="form-weight-bold">Register Employee</h2>
            <hr class="hr">
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
@endif
        </div>
        <div class="mx-auto container ">
            <form action="{{ route('employee.register') }}" id="login-form" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="name" name="first_name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Lastname">
            
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