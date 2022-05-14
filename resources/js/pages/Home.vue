<template>
    <div>
        <!-- inizio jumbotron -->
        <section class="jumbotron">
            <div class="container ms_padding-150">
                <div class="row">
                    <div class="col-6 ">
                        <div class="card text-ligth border-0 bg-transparent ms-height-100">
                            <div class="card-body">
                              <h2 class="card-title">Deliverboo</h2>      
                              <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit officia adipisci quia, modi quaerat voluptate! Culpa omnis aliquam aliquid ab doloremque debitis, quo possimus repellat ipsum aperiam maiores assumenda placeat.</p>
                              <button type="button" class="btn btn-danger ms_btn-radius"><router-link class="text-white" :to="{name: 'Restaurants'}">Vedi Ristoranti</router-link></button>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </section> 
        <!-- fine jumbotron -->
        <!-- inizio incipit -->
        <div class="container">
            <h2 class="display-4 text-center">I piatti che ami a domicilio</h2>
            <p class="ms_style-p">Potrai scegliere tra una vasta gamma di ristoranti all'interno della città di roma
                in modo da avere sempre il tuo piatto preferito a disposizione. La nostra selezione
                consente una rapida scelta tra le varie categorie per semplificare la tua ricerca, per 
                esempio potrai scegliere tra piatti della specialità italiana, oppure di quella spagnola,
                e se per una sera vorrai del sushi da degli autentici ristoranti giapponesi, noi siamo qui.
            </p>
        </div>
        <!-- fine incipit -->
        <!-- inizio immagini piatti -->
        <section class="ms_dishes">
            <div class="container py-3">
                <div class="row">
                    <div class="col-12 ">
                        <h2 class="display-4 text-center">I tuoi piatti preferiti, consegnati da noi.</h2>
                    </div>
                </div>
                <!-- fare ciclo per immagini e piccolo paragrafo sotto -->
                <div class="row row-cols-1 row-cols-lg-3">
                    <div class="col py-3">
                        <img class="w-100 ms_img" src="" alt="">
                    </div>
                </div>
            </div>
        </section> 

        <!-- fine immagini piatti -->
    </div>
  
</template>

<script>
export default {
    name:'Home',  
    
    data(){
        return{
            ordine: null,
            totale: null,
        }
    },

    methods: {
        getOrder(){

            if (typeof(Storage) !== "undefined") {

                try {
                    let getCart = localStorage.getItem('carrello');
                    let cart = JSON.parse(getCart);
                    this.ordine = cart;
                    console.log(this.ordine);

                    let getTotal = localStorage.getItem('totale');
                    let total = JSON.parse(getTotal);
                    this.totale = total;
                    console.log(this.totale);

                } catch (err) { 
                    console.log(err.message);
                }     
            } else {
                alert("Il browser non supporta web storage");
            }
        }
    },

    created() {

        this.getOrder();        
    }
}
</script>

<style>

</style>