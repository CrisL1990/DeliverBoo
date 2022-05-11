<template>
<div class="container">
    <h1>Ricerca ristoratori</h1>
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline w-100 d-flex justify-content-around">
            <div class="form-group row">
                <label class="col-form-label" for="category">Categoria</label>
                <form @submit.prevent="getRestaurant" class="container">

                    <div class="cat-container mx-2" v-for="categoria in categorie" :key="categoria.id">
                        <label :for="categoria.nome">
                            {{categoria.nome}}
                            <input class="mx-1" type="checkbox" v-model="valoriRicercati" :id="categoria.nome" :name="categoria.nome" :value="categoria.nome">
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
                <RestaurantCard :utenti="utente" :piatti="piatti"></RestaurantCard>
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
            category: '',
            categorie: [
                {
                    id: 0,
                    nome: 'Italiano'
                },
                {
                    id: 1,
                    nome: 'Giapponese'
                },
                {
                    id: 2,
                    nome: 'Indiano'
                },
                {
                    id: 3,
                    nome: 'Cinese'
                },
                {
                    id: 4,
                    nome: 'Greco'
                },
                {
                    id: 5,
                    nome: 'Messicano'
                },
                {
                    id: 6,
                    nome: 'Americano'
                },
                {
                    id: 7,
                    nome: 'Thailandese'
                },
                {
                    id: 8,
                    nome: 'Francese'
                },
                {
                    id: 9,
                    nome: 'Spagnolo'
                }
            ],
            risultato: false,
            valoriRicercati: [],
            ristoranti: [],
            utenti: [],
            piatti: [],
            controllo: false
        }
    },

    methods:{
        getRestaurant() {

            axios.get('api/restaurants')            
                .then((risposta) => {
                
                    let dataAxios = risposta.data.results;

                    let data2 = dataAxios.filter(item => item.user.category.includes(this.valoriRicercati));

                    data2.forEach(element => {

                        for (let key in element) {

                            if(this.ristoranti.indexOf(element.user.restaurant_name) === -1) {

                                this.ristoranti.push(element.user.restaurant_name);
                                this.utenti.push(element.user);                      

                            }
                
                        }

                        this.piatti.push(element);
                        
                    });

                    console.log(this.piatti);

                    this.risultato = true;
                }
            )
        }
    }
  }
</script>

<style lang='scss' scoped>

</style>