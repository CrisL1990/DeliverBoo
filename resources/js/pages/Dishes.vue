<template>
    <div class="container d-flex flex-column align-items-center">

        <div v-if="ristoratore" class="card m-1">
            <div class="card-body">

                <h3>{{risposta[0].user.restaurant_name}}</h3>
                <h5>{{risposta[0].user.category}}</h5>
                <h6>{{risposta[0].user.restaurant_address}}</h6>

            </div>
        </div>

        <h5 class="my-2">MENÙ</h5>

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

        <button @click="deleteCart()" type="button" class="btn btn-danger">Svuota Carrello</button>

        <div v-if="carrelloPieno" class="carrello">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Quantità</th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="(ordine, key) in carrello" :key="key">
                        <th scope="row">-</th>
                        <td>{{ordine.name}}</td>
                        <td>{{ordine.price}}</td>
                        <td>{{ordine.quantity}}</td>
                    </tr>
                    
                </tbody>
            </table>

        </div>
        
    </div>
</template>

<script>
export default {
    name: 'Dishes',

    data(){
        return{
            risposta: [],
            carrello: [],
            piattiPresenti: [],
            carrelloPieno: false,
            ristoratore: false
        }
    },

    methods: {

        addDish(piatto){ //funzione per prendere le info del piatto aggiunto
            
            let oggetto = {'id': piatto.id, 'name': piatto.name, 'price': piatto.price, 'quantity': 1}

            this.carrello.push(oggetto); //aggiungo il piatto come oggetto all'array carrello

            console.log(this.carrello);

            localStorage.setItem('carrello', JSON.stringify(this.carrello));

            this.updateCart();

            this.carrelloPieno = true;
        },

        deleteDish(piatto){ //funzione per eliminare un piatto dall'ordine

            if (this.carrello.length > 0) {

                let index = this.carrello.findIndex(element => element.id === piatto.id); /* trovo l'indice del piatto nel carrello che ha lo stesso ID con il piatto eliminato */

                this.carrello.splice(index, 1); /* elimino un elemento partendo dal suo indice nel carrello */
 
                if (this.carrello.length == 0){ /* se il carrello è vuoto non lo mostro più */

                    this.carrelloPieno = false;
                }

                this.updateCart(); /* aggiorno l'ordine */
            }

            localStorage.setItem('carrello', JSON.stringify(this.carrello));
        },

        deleteCart(){ /* funzione per svuotare il carrello */

            this.carrello = [];
            this.carrelloPieno = false;

            localStorage.setItem('carrello', JSON.stringify(this.carrello));

            this.updateCart();
        },

        updateCart(){

            //console.log(this.carrello);

            /* let count = this.carrello.filter(item => item.name.includes(piatto.name)); //filtro in una variabile gli elementi nel carrello che hanno lo stesso nome dell'elemento cliccato su aggiungi o elimina

            let conteggio = count.length; //conto la lunghezza dell'array

            let totaleItems = [];

            totaleItems.push({'name': piatto.name,  //pusho in una variabile l'oggetto da filtrare successivamente
                                'price': piatto.price, 
                                'quantity': conteggio
                                });
            
            this.total.forEach(element => {
                
                if (element.name === piatto.name) {

                    totaleItems.reduce((array, o) => {              

                            if(!array.some(obj => obj.label === o.name)) {
                                
                                array.push(o);
                            }

                            return array;
                        },[]);
                } else {

                    this.total.push(piatto);
                }
            })

            let single = totaleItems.reduce((array, o) => {              

                            if(!array.some(obj => obj.label === o.name)) {
                                
                                array.push(o);
                            }

                            return array;
                        },[]); 

            if (this.total.length > 0) { //se l'array è popolato

                this.total.forEach(element => { //per ogni elemento nell'array total

                    let index = this.carrello.findIndex(element => element.name === piatto.name); //prendo l'index dell'elemento con nome uguale a quello passato
                    
                    if (element.name === piatto.name) { //controllo se il suo nome corrisponde a quello dell'elemento nell'array single

                        this.total.splice(index, 1); //se si' allora lo tolgo e ripusho quello nuovo
                        this.total.push(piatto);

                    } else { 

                        this.total.push(piatto);  //se non è presente lo aggiungo soltanto senza cancellare niente
                    }
                });

            } else {

                this.total.push(piatto);
            }

            console.log(this.total); */

        },

        getPost() { /* chiamata axios per recuperare lo slug del ristorante e ottenere i piatti filtrati per user_id */

            const slug = this.$route.params.slug; /* prendo lo slug ricevuto dalla restaurant card tramite la show del controller */
            
            axios.get('/api/restaurants/' + slug)
                .then(response => {

                this.risposta = response.data.result;

                this.ristoratore = true;
                
            });
        }
    },

    mounted() {
        this.getPost();
    }
}
</script>

<style lang="scss" scoped>


</style>

