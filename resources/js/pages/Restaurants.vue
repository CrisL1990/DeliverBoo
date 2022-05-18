<template>
    <div class="restaurants-bg ">
        <div class="container">
            <h1 class="pt-4 mb-3 text-light">Ricerca ristoratori</h1>
            <h5 class="text-light">Seleziona una o più categorie disponibili:</h5>
            <nav class="navbar navbar-light">
                <form class="form-inline w-100 d-flex justify-content-around">
                    <div class="form-group row">
                        <label class="col-form-label" for="category"></label>
                        <form @submit.prevent="getRestaurant" class="container my-bg-categories">

                            <div class="cat-container">

                                <ul class="ks-cboxtags w-100">
                                    <div class="container">
                                        <div class="row row-cols-1 row-cols-md-4 row-cols-lg-6">
                                            <li class="w-100" v-for="categoria in categories" :key="categoria.id">

                                                <input class="mx-1 w-100 " type="checkbox" v-model="valoriRicercati" :id="categoria.name" :name="categoria.name" :value="categoria.name">
                                                <label class="w-100 text-center" :for="categoria.name">
                                                    {{categoria.name}}
                                                </label>
                
                                            </li>
                                        </div>

                                    </div>

                                </ul>

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
    .cat-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 13px;

        ul.ks-cboxtags {
            list-style: none;
            padding: 20px;
            display: flex;
            background-color: rgba(255, 255, 255, 0);;
        }
        ul.ks-cboxtags li{
        display: inline;
        margin: 0 15px;
        }
        ul.ks-cboxtags li label{
            background-color: rgba(255, 255, 255, .9);
            border: 2px solid rgba(139, 139, 139, .3);
            color: #adadad;
            border-radius: 25px;
            white-space: nowrap;
            margin: 3px 0px;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: transparent;
            transition: all .2s;
        }

        ul.ks-cboxtags li label {
            padding: 8px 12px;
            cursor: pointer;
        }

        ul.ks-cboxtags li input[type="checkbox"]:checked + label {
            border: 2px solid #1bdbf8;
            background-color: #12bbd4;
            color: #fff;
            transition: all .2s;
        }

        ul.ks-cboxtags li input[type="checkbox"] {
        display: absolute;
        }
        ul.ks-cboxtags li input[type="checkbox"] {
        position: absolute;
        opacity: 0;
        }
        ul.ks-cboxtags li input[type="checkbox"]:focus + label {
        border: 2px solid #e9a1ff;
        }
    }
}


.ms_btn-restaurants{
    padding: 12px 50px!important;
}
</style>