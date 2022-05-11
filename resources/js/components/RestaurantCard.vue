<template>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{utenti.restaurant_name}}</h5>
                <p class="card-text">{{utenti.restaurant_address}}</p>
                <p>{{utenti.email}}</p>
                <p>{{utenti.category}}</p>

                <div v-for="risposta in risp" :key="risposta.id">
                    {{risposta.name}}
                </div>
                <router-link class="nav-link btn btn-primary" :to="{name: 'Dishes', params:{risposta:filtraggio}}">Vedi piatti</router-link>
            </div>
        </div>
</template>

<script>
export default {
    name: 'RestaurantCard',

    props:{
        'utenti': Object,
        'risp': Array
    },

    data(){
        return{
            filtraggio: []
        }
    },

    methods: {
    
        filtra(){
 
            for (let i=0; i<this.risp.length; i++){

                if (this.utenti.id == this.risp[i].user_id) {
                
                    this.filtraggio.push(this.risp[i]);
                }
            }    
        }
    },

    mounted(){
        this.filtra();
    }
}
</script>

<style>

</style>