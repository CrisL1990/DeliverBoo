<template>
        <div class="card" style="width: 18rem;">
            <div class="card-body">

                <h5 class="card-title">{{utenti.restaurant_name}}</h5>
                <p class="card-text">{{utenti.restaurant_address}}</p>
                <p>{{utenti.category}}</p>

                <router-link class="nav-link btn btn-primary" :to="{name: 'Dishes', params: {slug: slug}}">Vedi piatti</router-link>
            </div>
        </div>
</template>

<script>
export default {
    name: 'RestaurantCard',

    props:{
        'utenti': Object,
    },

    data(){
        return{
            slug: ""
        }
    },

    methods: {
        makeSlug(){
            this.slug = this.utenti.id;
        }
    },

    created(){
        this.makeSlug();
    }
}
</script>

<style>

</style>