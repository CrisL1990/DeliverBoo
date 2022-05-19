<template>
        <div class="card" style="width: 18rem;">
            <div class="card-body ms_bg-card">

                    <h5 class="card-title">{{utenti.restaurant_name}}</h5>
                <p class="card-text">{{utenti.restaurant_address}}</p>
                <p>{{utenti.category}}</p>

                <router-link class="nav-link btn btn-danger" :to="{name: 'Dishes', params: {slug: utenti.slug}}">Vedi piatti</router-link>

                
            </div>
        </div>
</template>

<script>
export default {
    name: 'RestaurantCard',

    props:{
        'utenti': Object,
    },

   /*  data(){
        return{
            slug: ""
        }
    },

    methods: {
        makeSlug(){
            this.slug = this.utenti.slug;
        }
    },

    created(){
        this.makeSlug();
    } */
}
</script>

<style scoped lang='scss'>

.card{
    background-color: rgba(255,157, 0, 0.8)!important;
    border: none!important;
}

</style>