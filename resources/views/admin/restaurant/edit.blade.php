@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                

                @if($userId== $restaurant->user_id)
                <h1>Modifica piatto</h1>
                <form method="POST" action={{route('admin.restaurants.update', $restaurant->id)}} >

                    @csrf
                    @method('PUT')
                    <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label for="name">Nome piatto</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $restaurant->name) }}">
                    </div>
    
                    <div class="form-group">
                        <label for="price">Prezzo</label>
                        <input type="number" step=".01" class="form-control" id="price" name="price" value="{{ old('price', $restaurant->price) }}">
                    </div>
    
                    <div class="form-group">
                        <label for="description">Descrizione del piatto</label>
                        <textarea class="form-control" id="description" rows="10" name="description">{{ old('description', $restaurant->description) }}</textarea>
                    </div>
    
                    <div class="form-group">
                        <label for="ingredients">Ingredienti del piatto</label>
                        <textarea class="form-control" id="ingredients" rows="10" name="ingredients">{{ old('ingredients', $restaurant->ingredients) }}</textarea>
                    </div>
    
                    <div class="form-group">

                        <input type="radio" name="available" id="disponibile" value="1" {{(old('available', $restaurant->available) == '1') ? 'checked' : ''}}>
                        <label for="available">Disponibile</label><br>

                        <input type="radio" name="available" id="non-disponibile" value="0" {{(old('available', $restaurant->available) == '0') ? 'checked' : ''}}>
                        <label for="available">Non Disponibile</label><br>
                    </div>
    
                    <div class="form-group">
                        <label for="food_type">Tipo di piatto</label>
                        <select class="form-control" id="food_type" name="food_type">
    
                            <option value="">Nessuna categoria</option>

                            @foreach ($types as $key => $name)

                                <option {{ old('name', $restaurant->food_type) == $key ? 'selected' : '' }} value="{{ $key }}">{{ $name }}</option>

                            @endforeach

                                                                
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label for="category">Categoria piatto</label>
                        <select class="form-control" id="category" name="category">
    
                            <option value="">Nessuna categoria</option>
                            
                            @foreach ($categories as $key => $name)

                                <option {{ old('name', $restaurant->category) == $key ? 'selected' : '' }} value="{{ $key }}">{{ $name }}</option>

                            @endforeach
    
                        </select>
                    </div>

                    <button id="bottone" type="submit" class="btn btn-primary">Salva</button>

                  </form>
                  <a href="{{ url()->previous() }}" class="btn btn-success">Torna alla pagina precedente</a>
                  @else
                  <h1>Piatto non disponibile, torna indietro</h1>
                  <a href="{{ url()->previous() }}" class="btn btn-primary">Torna indietro</a>
                  @endif
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin/edit.js') }}" defer></script>
@endsection