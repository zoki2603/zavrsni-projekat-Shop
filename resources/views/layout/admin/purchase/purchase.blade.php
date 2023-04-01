@extends("layout.master")
@extends('layout.navbar.admin_navbar')
@section('navbar')
    
@endsection
@section("main-content")
    <h1 class="pheading">ORDERS</h1>

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

                     @foreach ($purchases as $key => $purchase) 
            {{-- @dump($purchase) --}}
                        <tr>
                            <th scope="row">{{ $key +1 }}</th>
                            <td>{{ $purchase->first_name. ' '. $purchase->last_name }}</td>
                            <td>{{ $purchase->date }}</td>
                           
                            <td>
                                <a href="{{ route("single.purchase",$purchase->id_order) }}"> <input type="submit" name="onePurchase" class="btn btn-info" value="View Purchase"></a>
                                @if($purchase->status === 'ready')
                                    <span class="badge bg-warning text-dark">1</span>
                                @endif
                                @if($purchase->status === 'send')
                                <span class="badge bg-success">send</span>
                            @endif
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

