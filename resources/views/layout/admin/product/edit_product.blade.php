@extends("layout.master")
@extends('layout.navbar.admin_navbar')
@section('navbar')
    
@endsection
@section("main-content")


    <section class="col-6 ">
        <div class="container text-center  mt-3 pt-5">
            <h2 class="form-weight-bold">Update Product</h2>
            <hr class="hr">
        </div>
        <div class="container text-center row justify-content-md-center">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        

                    <form action="{{ route("admin.update",$product->id) }}" class="row justify-content-md-center" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="image" value="{{ $product->image }}">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $product->quantity }}">
                        </div>
                        <div class="mb-3">
                            <label class="" for="category">Category</label>
                            <select class="form-select" name="category_id" id="category">

                                @foreach ($categories as $cat )

                                    <option {{ $cat->id == $product->category_id}} ? "selected" : ""; value="{{ $cat->id }}">{{ $cat->name }}</option>

                                @endforeach


                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"> <?php echo $product["description"] ?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $product["id"] ?>">
                        <input type="submit" class="btn btn-success" name="updateProduct" id="login-btn" value="Update Product">
        </div>
        </form>

        


</div>
    </section>



    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>


    @endsection
