
@extends("layout.master")
@extends('layout.navbar.navbar')
@section('navbar')
    
@endsection
@section("main-content")
@php
    use App\Http\Controllers\CartController;
    $cartController = new CartController();
    $totalPrice = $cartController->totalSum(session("cartItems"));
  
@endphp

<h1 class="pheading">SHOPING CART</h1>



<div class="container">
    <h2>Moja korpa</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Slika</th>
          <th scope="col">Naziv</th>
          <th scope="col">Cena</th>
          <th scope="col">Količina</th>
          <th scope="col">Ukupna cena</th>
          <th scope="col">Opcije</th>
        </tr>
      </thead>
      <tbody>
        @if (session("cartItems"))

        @foreach ( session("cartItems") as $id=>$item )
      
            <tr>
          <td><img src="{{ asset('storage/img/' . $item['image']) }}" class="img-thumbnail" alt="Proizvod 1"></td>
          <td>{{ $item['name'] }}</td>
          <td>${{ $item['price'] }}</td>
          <td>{{ $item['quantity'] }}</td>
          <td>${{$item['price']* $item['quantity'] }}</td>
          <td><a href="{{ route('delete.cart',$id) }}"class="btn btn-danger">Izbriši</a></td>
        </tr>
        @endforeach
       
        <tr>
          <td colspan="4" class="text-right">Ukupno:</td>
          <td>${{$totalPrice }}</td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <div class="text-right">
      {{-- <a href="{{ route('delete.cart.all') }}" class="btn btn-danger">Izbriši celu korpu</a> --}}
      <form action="{{ route('store.buy.product') }}">
        <button class="btn btn-primary">Sačuvaj kupovinu</button>
      </form>
    </div>
  </div>

  @else
  <td align="left" colspan="3">
      <p class="font-bold text-l text-black py-6 px-4">
          Shopping cart is empty.
      </p>
  </td>
@endif
  
    @endsection
