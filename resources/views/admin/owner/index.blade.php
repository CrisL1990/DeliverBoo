@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('admin.posts.create')}}" class="btn btn-success mb-3">Crea un nuovo post</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Titolo del post</th>
                        <th scope="col">Contenuto del post</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Categoria</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        <h1>Ciao</h1>
                    </tbody>
                  </table>
            </div>
        </div>
        <h2>Alla fine del mese mancano: {{$diffInDays}} giorni</h2>
    </div>
@endsection