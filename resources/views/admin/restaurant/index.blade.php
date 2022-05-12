@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('admin.restaurants.create')}}" class="btn btn-primary">Crea un piatto</a>

                {{-- <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-secondary">Modifica</a> --}}

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Ingredienti</th>
                        <th scope="col">Disponibilità</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($dishes as $dish)
                        @if ($userId== $dish->user_id)
                            <tr>
                                <td>{{$dish->name}}</td>
                                <td>{{$dish->price}}</td>
                                <td>{{substr($dish->ingredients, 0, 30) . "..."}}</td>
                                <td>
                                    @if ($dish->available == 1)
                                        <span>Disponibile</span>                                  
                                    @else
                                        <span>Non Disponibile</span>
                                    @endif
                                </td>
                                
                                <td class="d-flex">

                                    <a href="{{route('admin.restaurants.show', $dish->id)}}" class="btn btn-primary">Mostra</a>

                                   <a href="{{route('admin.restaurants.edit', $dish->id)}}" class="btn mx-2 btn-warning">Modifica</a>

                                    <form method="POST" action="{{route('admin.restaurants.destroy', $dish->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Sei sicuro di volerlo eliminare?')" type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
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