<template>

<header>
    <h1>Ricerca ristoratori</h1>
    <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" v-model="category" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>

</header>
  
</template>

<script>
export default {
    name:'Header',
    data (){

        return {
            category: '',
            restaurant: null,-
        }

    },
    methods:{
        getRestaurant(apiPage) {

            //effettuo una chiamata all'url indicato dalla variabile endpoint
            axios.get('api/restaurants', {
                'params' : {
                    'page' : apiPage,
                    }
            })
            
                .then((risposta) => {

                    //inserisco i dati dell'array nella variabile vuota albums
                    this.restaurant = risposta.data.response;
            })
        },
        
     },
     mounted(){

          this.getRestaurant();
        }
  }
</script>

<style>

</style>