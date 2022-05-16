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
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <div class="col py-3" v-for='(card, index) in cards' :key="index">
                        <img class="w-100 ms_img rounded" :src='card.thumb' alt="">
                        <p class="pt-3 ms_p-home">{{card.paragrafh}}</p>
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
      data (){

    return{
        cards: [
        {
            "thumb": "images/hamburger.jpg",
            "paragrafh": "I tuoi hamburger preferiti",
        },
        {
            "thumb": "images/sushi.jpg",
            "paragrafh": "Il sushi migliore",
        },
        {
            "thumb": "images/pizza.jpg",
            "paragrafh": "Le migliori pizze",
        },
        {
            "thumb": "images/poke.jpg",
            "paragrafh": "I tuoi poke",
        },
        {
            "thumb": "images/piadina.jpg",
            "paragrafh": "La piadineria",
        },
        {
            "thumb": "images/gelato.jpg",
            "paragrafh": "Il tuo gelato",
        },
        {
            "thumb": "images/pasta.jpg",
            "paragrafh": "I migliori piatti di pasta",
        },
        {
            "thumb": "images/bistecca.jpg",
            "paragrafh": "Le migliori bistecche",
        },
        {
            "thumb": "images/street-food.jpg",
            "paragrafh": "Street Food Napoletano",
        },
        {
            "thumb": "images/noodles.jpg",
            "paragrafh": "I noodles",
        },
        {
            "thumb": "images/vegano.jpg",
            "paragrafh": "I migliori piatti vegetariani",
        },
        {
            "thumb": "images/senza-glutine.jpg",
            "paragrafh": "I migliori piatti senza glutine",
        }
        ]
      }

  }



}
</script>

<style >

</style>