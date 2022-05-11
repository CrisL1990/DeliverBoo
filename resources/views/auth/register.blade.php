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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name*') }}</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="es. Germano" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required="true"/>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <!--fine inserisci nome-->

                        <!--inserisci vat-->
                        <div class="form-group row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">{{ __('Vat Number*') }}</label>

                            <div class="col-md-6">
                                <input id="vat" placeholder="es. 86741598325" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" required autocomplete="vat" autofocus required="true">

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                            <div class="col-md-6">
                                <input required id="email" placeholder="es. germano@gmail.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                
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
                            <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Name*') }}</label>

                            <div class="col-md-6">
                                <input required id="restaurant_name" placeholder="es. Mio Ristorante" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="restaurant_name" autofocus>

                                @error('restaurant_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <!--fine inserisci nome ristorante-->
                        
                        <!--inserisci categoria-->                        

                            <div class="dropdown form-group" id="dropdown-category">
                                <button class="btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                  Seleziona una categoria
                                </button>
                                <div class="dropdown-menu" >
                                    @foreach ($categories as $category)
                                        <div class="custom-control custom-checkbox">

                                            <label for="{{$category->name}}"> {{$category->name}}
                                                <input {{(old('category') == $category->name) ? 'checked' : ''}} type="checkbox" id="{{$category->name}}" name="category[]" value="{{$category->name}}">
                                            </label>
                                            
                                        </div>
                                    @endforeach
                                </div>
                                <h6 id="alertCheck" class="d-none">Attenzione seleziona una o più categorie!</h6>
                              </div>

                        <!--fine inserisci categoria-->
                        <!--Inserisci indirizzo ristorante-->
                        <div class="form-group row">
                            <label for="restaurant_address" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant Address*') }}</label>

                            <div class="col-md-6">
                                <input required id="restaurant_address" placeholder="es. via del Corso 23 " type="text" class="form-control @error('restaurant_address') is-invalid @enderror" name="restaurant_address" value="{{old('restaurant_address') }}" autocomplete="restaurant_address" autofocus>

                                @error('restaurant_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--fine inserisci indirizzo ristorante-->


                        <!--inserisci password-->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                            <div class="col-md-6">
                                <input required id="password" placeholder="Crea nuova password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                            <div class="col-md-6">
                                <input required id="password-confirm" placeholder="Conferma password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!--fine inserisci conferma password-->
                        <div class="form-group row ">
                            <div class="col-md-6 offset-md-1 mt-2">
                                <h6><mark>Tutti i campi con (*) sono obbligatori</mark></h6>
                            </div>
                        </div>
                        <!--button-->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
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