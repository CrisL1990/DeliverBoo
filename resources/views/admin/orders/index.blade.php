@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div id="tabellaOrdini" class="col-md-12">

                <table id="tabella-table" class="table">
                    <thead id="thead">
                      <tr>
                        <th class="text-nowrap d-lg-table-cell" scope="col">ID</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Nome cliente</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Indirizzo email</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Numero di telefono</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Indirizzo di consegna</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Totale</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Data ed orario ordine</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Riepilogo dell'ordine</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">

                        @foreach ($data as $item)
                        
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->customer_name}}</td>
                                <td>{{$item->customer_email}}</td>
                                <td>{{$item->customer_telephone}}</td>
                                <td>{{$item->customer_address}}</td>
                                <td>{{$item->total}}€</td>
                                <td>{{$item->created_at}}</td>

                                <td class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Visualizza l'ordine
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach(json_decode($item->cart, true) as $value)
                                            
                                            <h6 class="text-nowrap dropdown-item"><b>Piatto:</b> {{ $value['name'] }}</h6>  
                                            <h6 class="text-nowrap dropdown-item"><b>Prezzo:</b> {{ $value['price'] }}€</h6>  
                                            <h6 class="text-nowrap dropdown-item"><b>Quantità:</b> {{ $value['quantity'] }}</h6> 
                                            <div class="break-cart-items"></div>
                                            
                                        @endforeach
                                    </div>                                        
                                </td>
                               
                            </tr>

                        @endforeach
                           
                    </tbody>
                </table>    

            </div>
        </div>
    </div>
@endsection