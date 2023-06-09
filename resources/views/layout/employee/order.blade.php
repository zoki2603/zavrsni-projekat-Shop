@extends("layout.master")
@extends('layout.navbar.admin_navbar')
@section('navbar')
    
@endsection
@section("main-content")
    <h1 class="pheading">ORDERS</h1>

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
          @foreach ($orders as $key=> $order )
          <form action="{{ route("send.order.employee",$order->id_order) }}" method="POST">
            @csrf
                  @method("PATCH")
    {{-- @dump($order) --}}
              <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $order->first_name. ' '.$order->last_name }}</td>
                <td>{{ $order->city }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->total_quantity }}</td>
                <td>{{ $order->price}}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->date }}</td>
                <td>{{ $order->status }}</td>
            
               @endforeach
                <td>   
                 
                  
                  <input type="hidden" name="order_id" value="{{ $order->id_product }}">
                  <button type="submit" class="btn btn-warning"{{ $order->status === "ready" || $order->status === "send" ? 'disabled' : " " }}>
                    <i class="fas fa-truck"></i> Send
                  </button>
                    </form>
                </td>
              </tr>

    </sectoin>



    @endsection
