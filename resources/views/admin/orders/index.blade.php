@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div id="tabellaOrdini" class="col-md-12">

                <table id="tabella-table" class="table">
                    <thead id="thead">
                      <tr>
                        <th class="text-nowrap d-lg-table-cell" scope="col">ID</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Nome cliente</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Indirizzo email</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Numero di telefono</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Indirizzo di consegna</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Totale</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Data ed orario ordine</th>
                        <th class="text-nowrap d-lg-table-cell" scope="col">Riepilogo dell'ordine</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">

                        @foreach ($data as $item)
                        
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->customer_name}}</td>
                                <td>{{$item->customer_email}}</td>
                                <td>{{$item->customer_telephone}}</td>
                                <td>{{$item->customer_address}}</td>
                                <td>{{$item->total}}€</td>
                                <td>{{$item->created_at}}</td>

                                <td class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Visualizza l'ordine
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach(json_decode($item->cart, true) as $value)
                                            
                                            <h6 class="text-nowrap dropdown-item"><b>Piatto:</b> {{ $value['name'] }}</h6>  
                                            <h6 class="text-nowrap dropdown-item"><b>Prezzo:</b> {{ $value['price'] }}€</h6>  
                                            <h6 class="text-nowrap dropdown-item"><b>Quantità:</b> {{ $value['quantity'] }}</h6> 
                                            <div class="break-cart-items"></div>
                                            
                                        @endforeach
                                    </div>                                        
                                </td>
                               
                            </tr>

                        @endforeach
                           
                    </tbody>
                </table>    

            </div>
        </div>
    </div>

    {{-- Statistiche --}}
    {{-- Visualizzazione del grafico --}}
    <div class="container">
        <div>
            Prezzi €
            <canvas id="myChart"></canvas>
            Data Ordine
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <?php
    //ciclo per visualizzare il giorno di arrivo degli ordini
    $giorno= array();
    foreach ($data as $item){
        
        $created_at=$item->created_at;
        array_push($giorno,  $created_at);
    };  

    $strGiorno=implode(" ",$giorno);

    //ciclo per vedere il totale dell'ordine
    $totale= array();
    foreach ($data as $item){

        $total=$item->total;
        if($item->created_at=$item->total){
            
        }
        array_push($totale,  $total);
    };   
    $strTotal=implode(" ",$totale);

    ?>


    <script>
        //recupero la variabile dei giorni da php e la importo in js
        let created_at = '<?= $strGiorno?>';
    
        //ciclo l'array per tenere traccia solo dei giorni e non delle ore
    let giorni=created_at.split(" ");
        let chartGiorni=[];
    for(i=0; i<giorni.length;i++){
            if([i] % 2==0){

                chartGiorni.push('Giorno '+ giorni[i]);
            }
        }

        
        //Uso la reverse per inserire i giorni in modo crescente
        chartGiorni.reverse()
        
        console.log(chartGiorni)
        
        //recupero la variabile del totale da php e la importo in js
        let total='<?=$strTotal?>';

        let totale=total.split(" ");
        totale.reverse()
        console.log(totale)
    
        
        
    
        //regole per stilizzazione del grafico
        const data = {
        labels:chartGiorni,
        datasets: [{
            label: 'Prezzo ordine €',
            backgroundColor: 'rgb(2, 117, 216)',
            borderColor: 'rgb(2, 117, 216)',
            data: totale,
        }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script>
@endsection