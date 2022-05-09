@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!--Inserisci nome-->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input required id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Il nome va inserito</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <!--fine inserisci nome-->

                        <!--inserisci vat-->
                         <div class="form-group row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">{{ __('Vat Number') }}</label>

                            <div class="col-md-6">
                                <input required id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" required autocomplete="vat" autofocus>

                                @error('vat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--fine inserisci vat-->

                        <!--Inserisci mail-->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input required id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--fine inserisci mail-->


                        <!--Inserisci nome ristorante-->
                        <div class="form-group row">
                            <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Name') }}</label>

                            <div class="col-md-6">
                                <input required id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="restaurant_name" autofocus>

                                @error('restaurant_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <!--fine inserisci nome ristorante-->

                        <!--Inserisci indirizzo ristorante-->
                        <div class="form-group row">
                            <label for="restaurant_address" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Address') }}</label>

                            <div class="col-md-6">
                                <input required id="restaurant_address" type="text" class="form-control @error('restaurant_address') is-invalid @enderror" name="restaurant_address" value="{{old('restaurant_address') }}" required autocomplete="restaurant_address" autofocus>

                                @error('restaurant_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--fine inserisci indirizzo ristorante-->

                        <!--inserisci categoria-->
                        
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="category">Categoria</label>
                                <select name="category" class="form-control col-md-6" id="category">
                                    <option value="">Scegli una categoria</option>
                                    <option {{(old('category') == 'Italiano') ? 'selected' : ''}} value="Italiano">Italiano</option>
                                    <option {{(old('category') == 'Giapponese') ? 'selected' : ''}} value="Giapponese">Giapponese</option>
                                    <option {{(old('category') == 'Indiano') ? 'selected' : ''}} value="Indiano">Indiano</option>
                                    <option {{(old('category') == 'Cinese') ? 'selected' : ''}} value="Cinese">Cinese</option>
                                    <option {{(old('category') == 'Greco') ? 'selected' : ''}} value="Greco">Greco</option>
                                    <option {{(old('category') == 'Messicano') ? 'selected' : ''}} value="Messicano">Messicano</option>
                                    <option {{(old('category') == 'Americano') ? 'selected' : ''}} value="Americano">Americano</option>
                                    <option {{(old('category') == 'Thailandese') ? 'selected' : ''}} value="Thailandese">Thailandese</option>
                                    <option {{(old('category') == 'Francese') ? 'selected' : ''}} value="Francese">Francese</option>
                                    <option {{(old('category') == 'Spagnolo') ? 'selected' : ''}} value="Spagnolo">Spagnolo</option>
            
                                </select>
                            </div>
                        <!--fine inserisci categoria-->

                        <!--inserisci password-->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input required id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--fine inserisci password-->

                        <!--inserisci conferma password-->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input required id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!--fine inserisci conferma password-->

                        <!--button-->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="bottone" type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <!--fine button-->
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/register.js') }}" defer></script>

@endsection
