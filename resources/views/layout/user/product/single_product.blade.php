
@extends("layout.master")
@extends('layout.navbar.navbar')
@section('navbar')
    
@endsection
@section("main-content")

<div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <img src="{{ asset("storage/img/$product->image") }}" class="img-fluid" alt="Proizvod">
      </div>
      <div class="col-md-8">
        <h2>{{ $product->name }}</h2>
        <h3>Cena: ${{ $product->price }}</h3>
        <p>
          {{ $product->description }}
        </p>
        <form action="{{ route('add.to.cart', $product->id) }}" method="POST">
          @csrf
          @method('POST')
          <div class="form-group">
            <label for="quantity">Količina:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="10" value="1">
          </div>
          <input type="hidden" name="id" value="{{ $product->id }}">
          <input type="hidden" name="category_id" value="{{ $product->category_id }}">
          <button type="submit" class="btn btn-primary">Dodaj u korpu</button>
        </form>
      </div>
    </div>
  </div>
  
@endsection
  