@extends("layout.master")
@extends('layout.navbar.admin_navbar')
@section('navbar')
    
@endsection
@section("main-content")
    <section class="col-6 ">
        <div class="container text-center  mt-3 pt-5">
            <h2 class="form-weight-bold">Add Product</h2>
            <hr class="hr">
        </div>
        <div class="container text-center row justify-content-md-center">
            <form action="../controler/AdminController.php" class="row justify-content-md-center" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Product name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Price">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                </div>
                <div class="mb-3">
                    <label for="quantety" class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantety" placeholder="Quantity">
                </div>
                <div class="mb-3">
                    <label class="" for="category">Category</label>
                    <select class="form-select" name="category_id" id="category">

                        <?php
                        foreach ($categorys as $cat) { ?>
                            <option value="<?php echo $cat["id"] ?>"><?php echo $cat["name"] ?></option>

                        <?php } ?>


                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descritipon "></textarea>
                </div>

                <input type="submit" class="btn btn-success" name="add" id="login-btn" value="Add">
        </div>
        </form>
        </div>
    </section>



    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>

    @endsection
