

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

    <h1 class="pheading">Comming Soon</h1>

    <div class="container">
      <h1 class="mb-5">Proizvodi</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($products["products"] as $product)
          <div class="col">
            <div class="card h-100">
              <img src="{{  $product['images'][0]  }}" class="card-img-top" alt="{{ $product['title'] }}">
              <div class="card-body">
                <h5 class="card-title">{{ $product['title']}}</h5>
                <p class="card-text">{{ $product['description'] }}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Cena: ${{ $product['price'] }}</li>
                <li class="list-group-item">Brend: {{ $product['brand'] }}</li>
              </ul>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    
    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>


   
@endsection