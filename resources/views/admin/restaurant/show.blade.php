@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                

                @if($userId== $restaurant->user_id)

                <h1 class="text-center mb-4">Ecco il piatto che volevi visualizzare</h1>
                <div class="container d-flex justify-content-center ">
                    <div class="card" style="width: 35rem;">
                        <div class="card-body">
                        <h5 class="card-title"><strong>Nome: </strong> {{$restaurant->name}}</h5>
                        <p><strong>Ingredienti: </strong> {{ $restaurant->ingredients }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Prezzo: </strong> {{$restaurant->price}}</li>
                        <li class="list-group-item"><strong>Disponibilità: </strong> 
                            @if ($restaurant->available == 1)
                                <span>Disponibile</span>                                  
                            @else
                                <span>Non Disponibile</span>
                            @endif</li>
                        </ul>
                    </div>

                </div>
                

                @else
                    <h1>Piatto non trovato, torna indietro</h1>
                @endif

                <div class="container d-flex justify-content-center">

                    <a href="{{ url()->previous() }}" class="btn btn-success mt-4" style="width: 18rem;">Torna alla pagina precedente</a>

                </div>

                
            </div>
        </div>
    </div>
@endsection