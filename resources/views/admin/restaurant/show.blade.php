@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                

                @if($userId== $restaurant->user_id)
                    <h1>Visualizza piatto</h1>
                    <div><strong>Nome: </strong> {{$restaurant->name}}</div>
                    <div><strong>Ingredienti: </strong> {{ $restaurant->ingredients }}</div>
                    <div><strong>Prezzo: </strong> {{$restaurant->price}}</div>
                    <div><strong>Disponibilità: </strong> 
                        @if ($restaurant->available == 1)
                            <span>Disponibile</span>                                  
                        @else
                            <span>Non Disponibile</span>
                        @endif
                    </div>
                @else
                    <h1>Piatto non disponibile, torna indietro</h1>
                @endif

                <a href="{{ url()->previous() }}" class="btn btn-primary">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection