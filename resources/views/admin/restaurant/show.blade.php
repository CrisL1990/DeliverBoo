@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Visualizza piatto</h1>

                <div><strong>Nome: </strong> {{$restaurant->name}}</div>
                <div><strong>Ingredienti: </strong> {{ $restaurant->ingredients }}</div>
                <div><strong>Prezzo: </strong> {{$restaurant->price}}</div>
                <div><strong>Available: </strong> {{$restaurant->available}}</div>

                <a href="{{ url()->previous() }}" class="btn btn-primary">Torna indietro</a>
            </div>
        </div>
    </div>
@endsection