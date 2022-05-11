<template>
    <div class="container d-flex flex-column align-items-center">

        <div class="card m-1">
            <div class="card-body">

                <h3>{{risposta[0].user.restaurant_name}}</h3>
                <h5>{{risposta[0].user.category}}</h5>
                <h6>{{risposta[0].user.restaurant_address}}</h6>

            </div>
        </div>

        <h5 class="my-2">MENÙ</h5>

        <div class="d-flex flex-wrap justify-content-center">

            <div v-for="risp in risposta" :key="risp.id" class="card m-1" style="width: 18rem;">

                <div class="card-body">

                    <h5 class="card-title"><span class="font-weight-light text-secondary">Nome: </span><br>{{risp.name}}</h5>
                    <p class="card-text"><span class="font-weight-light text-secondary">Ingredienti: </span><br>{{risp.ingredients}}</p>
                    <p><span class="font-weight-light text-secondary">Prezzo: </span><br>{{risp.price}}€</p>

                </div>

            </div>

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