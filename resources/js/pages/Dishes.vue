<template>
    <div class="container">
        LISTA DEI PIATTI

        <div v-for="risp in risposta" :key="risp.id">
            <div>Il nome del piatto è: {{risp.name}}</div>
            <div>Gli ingredienti sono: {{risp.ingredients}}</div>
            <div>Il prezzo del piatto è: {{risp.price}} €</div>
        </div>
        
    </div>
</template>

<script>
import router from '../router';
export default {
    name: 'Dishes',

    data(){
        return{
            risposta: []
        }
    },

    created(){
       this.risposta = this.$route.params.risposta;
       console.log(this.risposta);
    },

}
</script>

<style>

</style>