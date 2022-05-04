@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <h1>Modifica piatto</h1>

                <form method="POST" action={{route('admin.restaurants.update', $restaurant->id)}} >

                    @csrf
                    @method('PUT')

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
                        <input type="radio" id="disponibile" name="available" value="1">
                        <label for="html">Disponibile</label><br>
                        <input type="radio" id="non-disponibile" name="available" value="0">
                        <label for="css">Non disponibile</label><br>
                    </div>
    
                    <div class="form-group">
                        <label for="food_type">Tipo di piatto</label>
                        <select class="form-control" id="food_type" name="food_type">
    
                            <option value="">Nessuna categoria</option>

                            <option value="vegetariano">Vegetariano</option>
                            <option value="vegano">Vegano</option>
                            <option value="carne">Carne</option>
                            <option value="pesce">Pesce</option>

            
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label for="category">Categoria piatto</label>
                        <select class="form-control" id="category" name="category">
    
                            <option value="">Nessuna categoria</option>
                            
                            <option value="antipasto">Antipasto</option>
                            <option value="primo">Primo</option>
                            <option value="secondo">Secondo</option>
                            <option value="contorno">Contorno</option>
                            <option value="dolce">Dolce</option>
    
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Salva</button>

                  </form>

            </div>
        </div>
    </div>
@endsection