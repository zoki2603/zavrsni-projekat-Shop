@extends("layout.master")
@extends('layout.navbar.admin_navbar')
@section('navbar')
    
@endsection
@section("main-content")
    <h1 class="pheading">Purchase Product</h1>

    <sectoin class="sec">


        <table class="table table-hover table-bordered">
            <thead class="table-primary">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Ime i Prezime Kupca</th>
                <th scope="col">Grad</th>
                <th scope="col">Adresa Stanovanja</th>
                <th scope="col">Ime Proizvoda</th>
                <th scope="col">Količina kupljenog proizvoda</th>
                <th scope="col">Trenutna količina na stanju</th>
                <th scope="col">Cena Proizvoda</th>
                <th scope="col">Ukupna Cena Proizvoda</th>
                <th scope="col">Datum Porudžbine</th>
                <th scope="col">Status</th>
                <th scope="col">Opcije</th>
              </tr>
            </thead>
            <tbody>
          {{-- @dump($singel_purchase) --}}
          @foreach ($purchases as $key=> $purchase )
          <form action="{{ route("send.order.mail",$purchase->id_order) }}" method="POST">

            @csrf
            {{-- @dump($purchase) --}}
    
              <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $purchase->first_name. ' '.$purchase->last_name }}</td>
                <td>{{ $purchase->city }}</td>
                <td>{{ $purchase->address }}</td>
                <td>{{ $purchase->name }}</td>
                <td>{{ $purchase->quantity }}</td>
                <td>{{ $purchase->total_quantity }}</td>
                <td>{{ $purchase->price}}</td>
                <td>{{ $purchase->total_price }}</td>
                <td>{{ $purchase->date }}</td>
                <td>{{ $purchase->status }}</td>
              
               @endforeach
                <td>   
                  <button type="submit" class="btn btn-success" {{ $purchase->status === "processing" ? 'disabled' : " " }} {{ $purchase->status === "send" ? 'disabled' : " " }}>
                    <i class="fas fa-check"></i> Verifikuj
                  </button>
                </td>
              </tr>
                   
          </form>
    </sectoin>



    @endsection
