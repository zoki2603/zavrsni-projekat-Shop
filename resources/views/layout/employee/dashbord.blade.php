@extends("layout.master")
@extends('layout.navbar.admin_navbar')
@section('navbar')
    
@endsection
@section("main-content")
    <h1 class="pheading">DASHBORD</h1>

    <sectoin class="sec">
        <div class="products">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ime i Prezime Kupca</th>
                        <th scope="col">Datum Kupovine</th>
                        <th scope="col">Vidi Detalje Kupovine</th>
                    </tr>
                </thead>
                <tbody>

                     @foreach ($orders as $key => $order) 
            
                        <tr>
                            <th scope="row">{{ $key +1 }}</th>
                            <td>{{ $order->first_name. ' '. $order->last_name }}</td>
                            <td>{{ $order->date }}</td>
                           
                            <td>
                                <a href="{{ route("order",$order->id_order) }}"> <input type="submit" name="onePurchase" class="btn btn-info" value="View Purchase"></a>
                                
                            </td>
                        </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </sectoin>

    <footer>
        <p>Copyrights at <a href="">Shop</a></p>
    </footer>

    @endsection

