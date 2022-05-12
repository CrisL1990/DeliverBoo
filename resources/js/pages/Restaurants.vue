<template>
<div class="container">
    <h1>Ricerca ristoratori</h1>
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline w-100 d-flex justify-content-around">
            <div class="form-group row">
                <label class="col-form-label" for="category">Categoria</label>
                <form @submit.prevent="getRestaurant" class="container">

                    <div class="cat-container mx-2" v-for="categoria in categories" :key="categoria.id">
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
        <button @click="getRestaurant()" class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
    </div>
    
    <div>
        <div class="row row-cols-3 py-3" v-if="risultato">
            <div class="col" v-for="utente in utenti" :key="utente.id">
                <RestaurantCard :utenti="utente"></RestaurantCard>
            </div>
            <div v-if="utenti.length == 0">
                <h1>Nessun ristorante trovato</h1>
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
             )
         }
    },
     created(){
          this.getCategories();
     }
   
  }
</script>

<style lang='scss' scoped>

</style>