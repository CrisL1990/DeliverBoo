<template>
<div>
    <h1>Ricerca ristoratori</h1>
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="category">Categoria</label>
                <form @submit.prevent="getRestaurant" class="container d-flex flex-column">

                    <div class="d-flex" v-for="categoria in categorie" :key="categoria.id">

                        <label :for="categoria.nome">
                            {{categoria.nome}}
                            <input type="checkbox" v-model="valoriRicercati" :id="categoria.nome" :name="categoria.nome" :value="categoria.nome">
                        </label><br>

                    </div>

                    <button @click="getRestaurant()" class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
                    
                </form>
            </div>
 
        </form>
    </nav>

    <div v-if="risultato">

        <div v-for="restaurant in valoriRicercati" :key="restaurant.id">
            <h3>{{restaurant}}</h3>
        </div>

    </div> 

</div>
</template>

<script>
export default {
    name:'Restaurants',
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
            valoriRicercati: []
        }

    },
    methods:{
        getRestaurant() {

            axios.get('api/restaurants')            
                .then((risposta) => {
                
                    let dataAxios = risposta.data.results;

                    let data2 = dataAxios.filter(item => item.user.category.includes(this.valoriRicercati));

                    data2.forEach(element => {

                        //console.log(data2);
                        console.log(element);

                        for (let key in element) {

                            if(this.valoriRicercati.indexOf(element.user.restaurant_name) === -1) {

                                //console.log(element.user.restaurant_name);

                                this.valoriRicercati.push(element.user.restaurant_name);
                            }
                        }
                        
                    });

                    this.risultato = true;

                    console.log(this.valoriRicercati);
                }
            )
        }
    }
  }
</script>

<style>

</style>