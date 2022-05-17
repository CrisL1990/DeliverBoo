@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                @foreach ($data as $item)
                    
                    <h3>{{$item->customer_name}}</h3>
                    <h3>{{$item->customer_address}}</h3>
                    <h3>{{$item->customer_telephone}}</h3>
                    <h3>{{$item->customer_email}}</h3>
                    <h3>{{$item->total}}</h3>
                    <h3>{{$item->created_at}}</h3>

                    @foreach(json_decode($item->cart, true) as $value)
                        <h3>{{ $value['name'] }}</h3>  
                        <h3>{{ $value['price'] }}</h3>  
                        <h3>{{ $value['quantity'] }}</h3>  
                    @endforeach

                @endforeach                
                
                

            </div>
        </div>
    </div>
@endsection