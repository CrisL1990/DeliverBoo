<template>
    <div class="container d-flex flex-column align-items-center">

        <div v-if="loading" class="card m-1">
            <div class="card-body">
                <h1>Caricamento pagina</h1>
            </div>
        </div>

        <!-- <Transition name="slide-right-centered">
            <aside :key="carrelloPieno">

            </aside>
        </Transition> -->
       
        <div v-if="ristoratore" class="card m-1">
            <div class="card-body">

                <h3>{{risposta[0].user.restaurant_name}}</h3>
                <h5>{{risposta[0].user.category}}</h5>
                <h6>{{risposta[0].user.restaurant_address}}</h6>

            </div>
        </div>
        <div v-if="showError" class="card m-1">
            <div class="card-body">
                <h1>Nessun prodotto da mostrare</h1>
            </div>
        </div>

        <h5 v-if="ristoratore" class="my-2">MENÙ</h5>

        <div class="d-flex flex-wrap justify-content-center">

            <div v-for="piatto in risposta" :key="piatto.id" class="card m-1" style="width: 18rem;">

                <div class="card-body">

                    <h5 class="card-title"><span class="font-weight-light text-secondary">Nome: </span><br>{{piatto.name}}</h5>
                    <p class="card-text"><span class="font-weight-light text-secondary">Ingredienti: </span><br>{{piatto.ingredients}}</p>
                    <p><span class="font-weight-light text-secondary">Prezzo: </span><br>{{piatto.price}}€</p>

                    <button @click="addDish(piatto)" type="button" class="btn btn-success">Aggiungi</button>
                    <button @click="deleteDish(piatto)" type="button" class="btn btn-warning">Elimina</button>

                </div>

            </div>

        </div>
       
  
        <Transition name="slide-left-centered">
            <div v-show="carrelloPieno" class="carrello">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col">Quantità</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="(ordine, key) in carrello" :key="key">
                            <td>{{ordine.name}}</td>
                            <td>{{ordine.price}}€</td>
                            <td>{{ordine.quantity}}</td>
                        </tr>
                        
                    </tbody>
                </table>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Totale:</th>
                            <th scope="col">{{totale}}€</th>
                        </tr>
                    </thead>
                </table>

                <div class="d-flex justify-content-center">
                    <router-link class="ordine btn mb-1 mx-1" @click="pay()" :to="{name: 'Home'}">Checkout</router-link>
                    <button @click="deleteCart()" type="button" class="btn mx-1 mb-1 empty-cart">Svuota</button>
                </div>
                
            </div>
        </Transition>
        
    </div>
</template>

<script>
export default {
    name: 'Dishes',

    data(){
        return{
            risposta: [],
            carrello: [],
            totale: null,
            carrelloPieno: false,
            ristoratore: false,
            showError: false,
            loading: true,
            xValue: 0            
        }
    },

    methods: {

        addDish(piatto){ //funzione per prendere le info del piatto aggiunto
            
            let oggetto = {'id': piatto.id, 'name': piatto.name, 'price': piatto.price, 'quantity': 1} //creo un oggetto dai valori derivati dall'argomento e ci aggiungo la quantità 1

            let found = this.carrello.find(product => product.id == oggetto.id) //vedo se ci sono corrispondenze di ID dentro l'array carrello con l'oggetto nuovo

            if (found) { //se c'è corrispondenza, prendo quell'oggetto e incremento la sua quantità
                found.quantity++;
            } else {
                this.carrello.push(oggetto); //altrimenti aggiungo l'intero piatto come oggetto all'array carrello
            }

            this.updateCart();

            this.carrelloPieno = true;
        },

        deleteDish(piatto){ //funzione per eliminare un piatto dall'ordine

            if (this.carrello.length > 0) { //controllo che nel carrello ci siano prodotti

                let found = this.carrello.find(product => product.id == piatto.id) //vedo se ci sono corrispondenze di ID dentro l'array carrello con il piatto

                if (found) { //se c'è corrispondenza

                    found.quantity-- //prendo quell'oggetto e decremento la sua quantità

                    if (found.quantity == 0){ //se dopo il decremento la quantità è uguale a 0

                        let index = this.carrello.findIndex(element => element.id === piatto.id); /* trovo l'indice del piatto nel carrello che ha lo stesso ID con il piatto da eliminare */

                        this.carrello.splice(index, 1); /* elimino l'elemento partendo dal suo indice nel carrello */
        
                        if (this.carrello.length == 0){ /* se il carrello è vuoto non lo mostro più */

                            this.carrelloPieno = false;
                        }
                    }

                }  

                this.updateCart(); /* aggiorno l'ordine */
            }
        },

        deleteCart(){ /* funzione per svuotare il carrello */

            this.carrello = [];
            this.carrelloPieno = false;

            this.updateCart();
        },

        updateCart(){ //funzione per aggiornare il totale del carrello

            this.totale = this.carrello.reduce((valorePrecedente, oggetto) => { //uso la reduce per sovrascrivere di volta in volta il valore corrente con le aggiunte delle quantità * prezzo

                return valorePrecedente + (oggetto.price * oggetto.quantity); 
            },0)    //lascio 0 come fallback

            this.pay();
        },

        pay(){
            //aggiorno su localStorage il carrello con gli ordini ed il totale da pagare, salvando il tutto come un JSON
            if (typeof(Storage) !== "undefined") { //controllo il supporto browser per localStorage
                
                let carrello = JSON.stringify(this.carrello);
                localStorage.setItem('carrello', carrello);
                
                let totale = JSON.stringify(this.totale);
                localStorage.setItem('totale', totale);

            } else {

                alert("Il browser non supporta web storage");
            }
        },

        getPost() { /* chiamata axios per recuperare lo slug del ristorante e ottenere i piatti filtrati per user_id */

            const slug = this.$route.params.slug; /* prendo lo slug ricevuto dalla restaurant card tramite la show del controller */
            
            axios.get('/api/restaurants/' + slug)
                .then(response => {

                this.risposta = response.data.result;
                
                if (this.risposta.length > 0) { //controllo che il ristorante abbia dei piatti nel menù

                    this.loading = false;
                    this.ristoratore = true;
                } else {
                    this.loading = false;
                    this.showError = true;
                }          
            });
        }
    },

    mounted() {
        this.getPost();

    }
}
</script>

<style lang="scss" scoped>
.container {
    position: relative;
    .carrello {
        position: fixed;
        left: 10px;
        top: 10%;
        background-color: white;
        border: 1px solid black;
        border-radius: 10px;
    }
    /* Transizione per carrello checkout */
    .slide-left-centered-enter,
    .slide-left-centered-leave-to {
        transition: transform 1000ms ease; 
        transform: translateX(-100%);
    }

    .slide-left-centered-enter-active {
        transition: all 1s ease;
    }

    .slide-left-centered-leave-active {
        transition: all 1s ease-out;
    }

    /* Bottoni */
    .ordine {
        background-color: rgb(64, 162, 81);
        color: white;
        border-radius: 5px;
    }
    .empty-cart {
        background-color: rgb(247, 202, 0);
        border-radius: 5px;
    }
}

</style>

