<template>
<div class="container">
    <div class="card-body" v-for="ordine in ordine" :key="ordine.id">
                <h3>Prodotto: {{ordine.id}}</h3>
                <h3>Nome: {{ordine.name}}</h3>
                <h3>Indirizzo: {{ordine.price}}</h3>
                <h3> Quantità selezionata: {{ordine.quantity}}</h3>
                
    </div>
    <h1>
        articolo acquistato con successo
    </h1>

</div>
  
</template>

<script>
export default {
    name:'PaidOrder',
    data(){
        return{
            risposta:null,
            ordine:[],
        }
    },
    methods:{
        getResult(){
             axios.get('/api/orders') //aggiungo lo slug all'URL per visualizzare il nome del ristorante
                .then(response => {

                    console.log(response)
                this.risposta = response.data.result; //salvo la risposta dentro una variabile
                
                
            });
        }
    }
}
</script>


<style>

</style>