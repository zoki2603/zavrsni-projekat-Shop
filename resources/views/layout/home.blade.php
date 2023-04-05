

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

    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('search.products') }}" method="GET" class="d-flex">
          @csrf
          <input type="text" name="search" class="form-control me-2" placeholder="Pretraži proizvode">
          <button type="submit" class="btn btn-primary">Pretraži</button>
        </form>
      
        <form action="{{ route('sort.products') }}" method="GET" class="d-flex">
          @csrf
          <select name="sort_by" class="form-select me-2" onchange="this.form.submit()">
            <option value="">Sortiraj po:</option>
            <option value="name_asc">Naziv proizvoda (A-Z)</option>
            <option value="name_desc">Naziv proizvoda (Z-A)</option>
            <option value="price_asc">Cena (najniža prvo)</option>
            <option value="price_desc">Cena (najviša prvo)</option>
          </select>
        </form>
      </div>
    
    <sectoin class="sec">
        <div class="products">
            <!-- Start Card -->
           
           
           @foreach ($products as $product) 
          
                <div  class="card ">
                    <div class="img"><img style="width: 100%;" src="{{ asset("storage/img/$product->image") }}" alt=""></div>

                    <div class="title">{{ $product->name }}</div>
                    <div class="box">
                        <div class="price">{{ $product->price }}$</div>
                        @auth
                            <a href="{{ route("show.single.product",$product) }}"<button class="btn" name="buy-now">Buy Now</button></a>
                       @endauth
                    </div>
                </div>

           @endforeach
            
        </div>
    </sectoin>

    <span style="margin-left: 50%" class="text-center"> {{ $products->links() }}</span>
    <style>
     .w-5{
         display: none;
     }
    </style>


    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>


   
@endsection