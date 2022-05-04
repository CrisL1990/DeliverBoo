@extends('admin.layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>Crea un nuovo piatto</h1>

            <form method="POST" action={{ route('admin.restaurants.store') }} >

                @csrf

                <div class="form-group">
                    <label for="name">Nome piatto</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="price">Prezzo</label>
                    <input type="number" step=".01" class="form-control" id="price" name="price" value="{{ old('price') }}">
                </div>

                <div class="form-group">
                    <label for="description">Descrizione del piatto</label>
                    <textarea class="form-control" id="description" rows="10" name="description">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="ingredients">Ingredienti del piatto</label>
                    <textarea class="form-control" id="ingredients" rows="10" name="ingredients">{{ old('ingredients') }}</textarea>
                </div>

                <div class="form-group">

                    <input type="radio" name="available" id="disponibile" value="1" {{(old('available') == '1') ? 'checked' : ''}}>
                    <label for="available">Disponibile</label><br>

                    <input type="radio" name="available" id="non-disponibile" value="0" {{(old('available') == '0') ? 'checked' : ''}}>
                    <label for="available">Non Disponibile</label><br>

                </div>

                <div class="form-group">
                    <label for="food_type">Tipo di piatto</label>
                    <select class="form-control" id="food_type" name="food_type">

                        <option {{(old('food_type') == 'vegetariano') ? 'selected' : ''}} value="vegetariano">Vegetariano</option>
                        <option {{(old('food_type') == 'vegano') ? 'selected' : ''}} value="vegano">Vegano</option>
                        <option {{(old('food_type') == 'carne') ? 'selected' : ''}} value="carne">Carne</option>
                        <option {{(old('food_type') == 'pesce') ? 'selected' : ''}} value="pesce">Pesce</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="category">Categoria piatto</label>
                    <select class="form-control" id="category" name="category">
                        
                        <option {{(old('category') == 'antipasto') ? 'selected' : ''}} value="antipasto">Antipasto</option>
                        <option {{(old('category') == 'primo') ? 'selected' : ''}} value="primo">Primo</option>
                        <option {{(old('category') == 'secondo') ? 'selected' : ''}} value="secondo">Secondo</option>
                        <option {{(old('category') == 'contorno') ? 'selected' : ''}} value="contorno">Contorno</option>
                        <option {{(old('category') == 'dolce') ? 'selected' : ''}} value="dolce">Dolce</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Salva</button>

            </form>

        </div>
    </div>
</div>
@endsection