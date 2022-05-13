@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">

                <a href="{{route('admin.restaurants.create')}}" class="btn btn-primary mb-4">Crea un piatto</a>

                {{-- <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-secondary">Modifica</a> --}}

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nome</th>
                        <th class="d-none d-lg-table-cell" scope="col">Prezzo</th>
                        <th class="d-none d-lg-table-cell" scope="col">Ingredienti</th>
                        <th scope="col">Disponibilità</th>
                        <th class="ms_azioni" scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($dishes as $dish)
                        @if ($userId== $dish->user_id)
                            <tr>
                                <td>{{substr($dish->name, 0, 8) . "..."}}</td>
                                <td class="d-none d-lg-table-cell">{{$dish->price}}</td>
                                <td class="d-none d-lg-table-cell">{{substr($dish->ingredients, 0, 30) . "..."}}</td>
                                <td>
                                    @if ($dish->available == 1)
                                        <span>Disponibile</span>                                  
                                    @else
                                        <span>Non Disponibile</span>
                                    @endif
                                </td>
                                
                                <td>
                                    <div class="container d-flex">

                                        <a href="{{route('admin.restaurants.show', $dish->id)}}" class="btn btn-primary btn-sm">Mostra</a>

                                        <a href="{{route('admin.restaurants.edit', $dish->id)}}" class="btn mx-2 btn-warning btn-sm">Modifica</a>

                                        <form method="POST" action="{{route('admin.restaurants.destroy', $dish->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Sei sicuro di volerlo eliminare?')" type="submit" class="btn btn-danger btn-sm">Elimina</button>
                                        </form>

                                    </div>                                    
                                </td>

                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                  </table>
              
            </div>
        </div>
    </div>
@endsection