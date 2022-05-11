<template>
    <div class="container">

        <div class="d-none">
            <RestaurantCard @invio="ricezioneDati"/>
        </div>
        
    </div>
</template>

<script>
import RestaurantCard from '../components/RestaurantCard.vue';

export default {
    name: 'Dishes',

    components:{
        RestaurantCard
    },

    methods: {

        ricezioneDati(){

        }
    }
}
</script>

<style>

</style>