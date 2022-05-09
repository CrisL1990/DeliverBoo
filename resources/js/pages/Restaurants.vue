<template>
<div>
    <h1>Ricerca ristoratori</h1>
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="category">Categoria</label>
                <form @submit.prevent="getRestaurant" class="container d-flex flex-column">

                    <div class="d-flex" v-for="categoria in categorie" :key="categoria.id">

                        <input type="checkbox" :id="categoria.nome" :name="categoria.nome" :value="categoria.nome">
                        <label :for="categoria.nome">{{categoria.nome}}</label><br>

                    </div>

                    <!-- <div class="d-flex" v-for="categoria in categorie" :key="categoria.id">

                        <input type="checkbox" :id="categoria.nome" name="categorie[]" :value="categoria.nome">
                        <label :for="categoria.nome">{{categoria.nome}}</label><br>

                    </div> -->

                    <!-- <div class="custom-control custom-checkbox">
                        <input name="tags[]" type="checkbox" class="custom-control-input" id="tag_{{$tag->name}}" value="{{$tag->id}}" {{in_array($tag->id, old('tags', []))?'checked':''}}>
                        <label class="custom-control-label" for="tag_{{$tag->name}}">{{$tag->name}}</label>
                    </div> -->
                            
                    <!-- <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Submit"> -->
                    <button @click="getRestaurant()" class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
                    
                </form>
            </div>
 
        </form>
    </nav>

    <div v-if="risultato">

        <div v-for="restaurant in restaurants" :key="restaurant.id">
            <h1>{{restaurant.name}}</h1>
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
            restaurants: null,
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
                    
                    console.log(risposta);

                    this.restaurants = risposta.data.results;

                    this.risultato = true;
                    
            })
        }
    },
    computed:{
        filteredSearch(){

            return this.valoriRicercati.filter(disc=>{
                return disc.genre==this.valoriRicercati;
            });
            
        }
    },  
  }
</script>

<style>

</style>