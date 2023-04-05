
@extends("layout.master")
@extends('layout.navbar.admin_navbar')
@section('navbar')
    
@endsection
@section("main-content")
  
    <h1 class="pheading">ADMIN</h1>
    <table>
        <tr>
            <a href="{{ route("show.add.product") }}" style="margin-left: 15px;"> <input type="submit" name="" value="Add Product" class="btn btn-success btn-lg mb-1"></a>
            <a href="{{ route("index.category") }}"> <input type="submit" name="" value="Add Category" class="btn btn-primary btn-lg"></a>
        </tr>
    </table>


    <div class="col-3" style="margin-left:75%;">
        <form  action="{{ route('search.admin.products') }}" method="GET" class="d-flex">
            @csrf
            <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
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
                        <th scope="col">Slika</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Kolicina</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Uredi</th>
                        <th scope="col">Izbrisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $products as $key=> $product)
                        {{-- <form action="" method="POST"> --}}
                            
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td><img src="{{ asset("storage/img/$product->image") }}" alt="" width="150"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}$</td>
                                <td>{{ $product->total_quantity }}</td>
                                <td>{{ $product->description }}</td>
                                 <td><a href="{{ route("admin.edit",$product->id) }}" class="btn btn-info">Edit</a></td>
                                  {{-- </form> --}}
                                 <td>
                                    <form action="{{ route("admin.delete.product",$product->id) }}" method="POST">
                                        @csrf
                                        @method("delete")
                                        <input type="submit" class="btn btn-danger" name="deleteProduct" value="Delete" ></td>
                                    </form>
                                   
                            </tr>
                      
                    @endforeach
                    </tr>
                </tbody>
            </table>
            <!-- End Card -->

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
