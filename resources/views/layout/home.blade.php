

@extends("layout.master")
@extends('layout.navbar.navbar')

@section('navbar')
    
@endsection

@section("main-content")


    <section class="content">
        <h1>The Best Shop </h1>
        <p>The Best Prices </p>
        <!-- <button>Shop</button> -->
    </section>

    <h1 class="pheading">All Products</h1>
    <div class="container  ">
        <div class="row justify-content-center align-items-center g-2 ">
            <div class="col">
                <form method="GET" action="home.php">
                    <select class="form-select form-select-sm" name="sort-option" aria-label=".form-select-sm example">
                        <option selected>Izaberi</option>
                        <option value="ASC">Uzlazno</option>
                        <option value="DESC">Silazno</option>
                    </select>
                    <div>
                        <input type="submit" name="sort" style="margin-left: 100%;" class="btn btn-outline-primary" value="Sortiraj">
                    </div>
                </form>
            </div>
        </div>


        <div class="col-3" style="margin-left: 65%;">
            <form method="GET" action="home.php" class="d-flex">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <sectoin class="sec">
        <div class="products">
            <!-- Start Card -->

           
           @foreach ($products as $product) 
          
                <div class="card">
                    <div class="img"><img style="width: 100%;" src="..//img/<?php// echo $product["image"] ?>" alt=""></div>

                    <div class="title">{{ $product->name }}</div>
                    <div class="box">
                        <div class="price">{{ $product->price }}$</div>
                        @auth
                            <a href="singleProduct.php?id=<?php //echo $product["id"] ?>"><button class="btn" name="buy-now">Buy Now</button></a>
                       @endauth
                    </div>
                </div>

           @endforeach
            
        </div>
    </sectoin>
    <span class="text-center"> {{ $products->links() }}</span>
    <style>
     .w-5{
         display: none;
     }
    </style>
    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>



@endsection