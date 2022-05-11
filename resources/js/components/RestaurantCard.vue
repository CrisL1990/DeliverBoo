<template>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{utenti.restaurant_name}}</h5>
                <p class="card-text">{{utenti.restaurant_address}}</p>
                <p>{{utenti.email}}</p>
                <p>{{utenti.category}}</p>
                <router-link class="nav-link btn btn-primary" v-on:click="$emit('invio', 'utenti')" :to="{name: 'Dishes'}">Vedi piatti</router-link>
            </div>
        </div>
</template>

<script>
export default {
    name: 'RestaurantCard',

    props:{
        'utenti': Object
    },
}
</script>

<style>

</style>