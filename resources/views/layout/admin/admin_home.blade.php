
@extends("layout.master")
@extends('layout.navbar.admin_navbar')
@section('navbar')
    
@endsection
@section("main-content")
  
    <h1 class="pheading">ADMIN</h1>
    <table>
        <tr>
            <a href="addProduct.php" style="margin-left: 15px;"> <input type="submit" name="" value="Add Product" class="btn btn-success btn-lg mb-1"></a>
            <a href="addCategory.php"> <input type="submit" name="" value="Add Category" class="btn btn-primary btn-lg"></a>
        </tr>
    </table>


    <div class="col-3" style="margin-left:75%;">
        <form method="GET" action="admin.php" class="d-flex">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

    <sectoin class="sec">

        <div class="products">
            <!-- Start Card -->

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Slika</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Kolicina</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Uredi</th>
                        <th scope="col">Izbrisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php //foreach ($products as $key => $product) { ?>

                        <form action="../controler/AdminController.php" method="POST">
                            <tr>
                                <th scope="row"><?php //echo $key + 1 ?></th>
                                <td><?php// echo $product["name"] ?></td>
                                <td><img src="../img/<?php// echo $product["image"] ?>" alt="" width="150"></td>
                                <td><?php //echo $product["price"] ?>$</td>
                                <td><?php// echo $product["quantity"] ?></td>
                                <td><?php //echo $product["description"] ?></td>
                                <td><a href="updateProduct.php?id=<?php //echo $product["id"] ?>" class="btn btn-info">Edit</a></td>
                                <td><input type="submit" name="deleteProduct" value="Delete" class="btn btn-danger"></td>
                                <input type="hidden" name="id" value="<?php //echo $product["id"] ?>" class="btn btn-info">
                            </tr>
                        </form>

                    {{-- <?php// } ?> --}}


                    </tr>
                </tbody>
            </table>
            <!-- End Card -->

        </div>
    </sectoin>

    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>
    @endsection
