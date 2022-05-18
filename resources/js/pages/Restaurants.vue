<template>
    <div class="restaurants-bg ">
        <div class="container">
            <h1 class="pt-4 mb-3 text-light">Ricerca ristoratori</h1>
            <h5 class="text-light">Seleziona una o più categorie disponibili:</h5>
            <nav class="navbar navbar-light">
                <form class="form-inline w-100 d-flex justify-content-around">
                    <div class="form-group row">
                        <label class="col-form-label" for="category">Categoria</label>
                        <form @submit.prevent="getRestaurant" class="container my-bg-categories">

                            <div class="cat-container mx-2 col-2" v-for="categoria in categories" :key="categoria.id">
                                <label :for="categoria.name">
                                    {{categoria.name}}
                                    <input class="mx-1" type="checkbox" v-model="valoriRicercati" :id="categoria.name" :name="categoria.name" :value="categoria.name">
                                </label><br>
                            </div>
                            
                        </form>
                    </div>
                </form>
            </nav>

            <div>
                <button @click="getRestaurant()" class="btn my-2 my-sm-0 btn-danger ms_btn-restaurants" type="submit">Cerca</button>
            </div>
            
            <div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5" v-if="risultato">
                    <div class="col mx-2 my-3 " v-for="utente in utenti" :key="utente.id">
                        <RestaurantCard :utenti="utente"></RestaurantCard>
                    </div>
                    <div v-if="utenti.length == 0">
                        <h1>Nessun ristorante trovato</h1>
                    </div>
                </div>        
            </div>
        </div>
    </div>

</template>

<script>
import RestaurantCard from '../components/RestaurantCard.vue';
export default {
    name:'Restaurants',

    components:{
        RestaurantCard
    },

    data (){
        return {
            risultato: false,
            valoriRicercati: [],
            utenti: [],
            categories:[]
           
    
        }
    },

    methods:{
       
        getRestaurant() {

            axios.get('api/users')            
                .then((risposta) => {

                    this.utenti = risposta.data.results.filter(item => item.category.includes(this.valoriRicercati));

                    this.risultato = true; 
                    
                }
            )
        },

        getCategories() {

            axios.get('api/categories')            
                .then((value) => {
                this.categories=value.data.results;  
                 
                
                }
            );
        },

    },

    created(){
        this.getCategories();
    }
   
  }
</script>

<style lang='scss' scoped>
.restaurants-bg{
    
    background-image: url("/images/sfondo-restaurants.jpg");
    background-repeat: no-repeat;
    background-position:center;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    background-size: cover;
    min-height: 100vh;
    height: calc(100% - 250px);
     
}
.ms_btn-restaurants{
    padding: 12px 50px!important;
}
</style>