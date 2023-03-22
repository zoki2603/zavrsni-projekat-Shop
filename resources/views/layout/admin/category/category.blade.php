

@extends("layout.master")
@extends('layout.navbar.admin_navbar')
@section('navbar')
    
@endsection
@section("main-content")
    <section class="col-6 ">
        <div class="container text-center  mt-3 pt-5">
            <h2 class="form-weight-bold">Add Category Name</h2>
            <hr class="hr">
        </div>
        <div class="container text-center row justify-content-md-center">
            <form action="{{ route("addCategory") }}" class="row justify-content-md-center" method="post">
                @csrf
                <div class="mb-3">
                    <label for="categoryName" class="form-label">Category Name</label>
                    <input type="text" class="form-control" name="name" id="categoryName" placeholder="Category Name">
                </div>
                <input type="submit" class="btn btn-success" name="addCategory" id="login-btn" value="Add Category">
        </div>
        </form>
        </div>
    </section>



    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>

    @endsection
