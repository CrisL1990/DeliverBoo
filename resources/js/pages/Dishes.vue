<template>
 <div>
    <div class="container d-flex justify-content-center">

        <!-- <div class="card w-50">
            <div class="card-body">

                <h3>{{risposta[0].user.restaurant_name}}</h3>
                <h5>{{risposta[0].user.category}}</h5>
                <h6>{{risposta[0].user.restaurant_address}}</h6>
            </div>
        </div> -->
    </div>
    
    <div class="container">
        <h5 class="my-2 text-center mt-3">MENÙ</h5>

        <div class="row row-cols-1 row-cols-md-4 row-cols-lg-4 row-cols-xl-3">

            <div v-for="risp in risposta" :key="risp.id" class="card col my-3">

                <div class="card-body">

                    <h5 class="card-title"><span class="font-weight-light text-secondary">Nome: </span><br>{{risp.name}}</h5>
                    <p class="card-text"><span class="font-weight-light text-secondary">Ingredienti: </span><br>{{risp.ingredients}}</p>
                    <p><span class="font-weight-light text-secondary">Prezzo: </span><br>{{risp.price}}€</p>

                    <button type="button" class="btn btn-danger">-</button>
                    <button @click="addDish(risp)" type="button" class="btn btn-success">+</button>
                    

                </div>

            </div>

        </div>

        <div v-if="carrelloPieno" class="carrello">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="(ordine, key) in carrello" :key="key">
                        <th scope="row">-</th>
                        <td>{{ordine.name}}</td>
                        <td>{{ordine.price}}</td>
                    </tr>
                    
                </tbody>
            </table>

        </div>
        
    </div>
</div>
</template>

<script>
//import router from '../router';

export default {
    name: 'Dishes',

    data(){
        return{
            risposta: [],
            carrello: [],
            piattiPresenti: [],
            carrelloPieno: false
        }
    },

    methods: {

        addDish(valore){

            let name = valore.name;
            let price = valore.price;

            localStorage.setItem('name', name); 
            localStorage.setItem('price', price); 

            name = localStorage.getItem('name');
            price = localStorage.getItem('price');

            let ordine = {'name': name, 'price': price};

            this.carrello.push(ordine);
            this.piattiPresenti.push(ordine.name);

            this.carrelloPieno = true;

           
        },

        getPost() {

            const slug = this.$route.params.slug;
            
            axios.get('/api/restaurants/' + slug)
                .then(response => {

                this.risposta = response.data.result;
                
                console.log(response);
                
            });
        }
    },

    mounted() {
        this.getPost();
    }
}
</script>

<style>

</style>