<template>
<div class=" order-box">
   <div focus v-if="success" class="text-center alert alert-success confirmPayment pt-5 ">
            Grazie per averci scelto<br>
            Il tuo ordine é avvenuto con successo<br>
            Clicca il link per tornare alla<router-link class="ordine  mb-1 mx-1" :to="{name: 'Home'}">Home</router-link>
    </div>
     <!-- Credenziali  -->
    <div  v-if="unsuccess" class="d-block d-flex">
        <div class="container">
            <form method="POST" @submit.prevent="handleSubmit">

                <div class="row">
                    <div class="col-10">
                        <div class="card mt-3">
                            
                            <div class="card-header ">
                                <strong>Deliverboo</strong>
                                <small>Compila i campi</small>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <!-- Inserisci il tuo nome -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_name">Nome proprietario*</label>
                                                <input v-model="nome"  class="form-control" :class="{'is-invalid':errors.customer_name}" id="customer_name" type="text"  placeholder="Inserisci il tuo nome">
                                                <p v-for="(error, index) in errors.customer_name" :key="index" class="invalid-feedback">
                                                    {{error}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Inserisci il tuo indirizzo -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_address">Inserisci il tuo indirizzo*</label>
                                                <input v-model="indirizzo"  class="form-control" :class="{'is-invalid':errors.customer_address}" id="customer_address" type="text"  placeholder="es. via Del Corso 23">
                                                <p v-for="(error, index) in errors.customer_address" :key="index" class="invalid-feedback">
                                                    {{error}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Inserisci il tuo contatto telefonico -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_telephone">Inserisci il tuo numero di telefono*</label>
                                                <input v-model="tel" :class="{'is-invalid':errors.customer_telephone}"  class="form-control" id="customer_telephone" type="text"  placeholder="000 111111">
                                                <p v-for="(error, index) in errors.customer_telephone" :key="index" class="invalid-feedback">
                                                    {{error}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Inserisci il tuo contatto telefonico -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="customer_email">Inserisci la tua mail*</label>
                                                <input v-model="email" :class="{'is-invalid':errors.customer_email}"  class="form-control" id="customer_email" type="text"  placeholder="es. franco@gmail.com">
                                                <p v-for="(error, index) in errors.customer_email" :key="index" class="invalid-feedback">
                                                    {{error}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        
                                <!-- Card carta di credito -->
                            <div class="col-8 offset-2">
                                <div class="card bg-light">
                                    <div class="card-header">Payment Information</div>
                                    <div class="card-body">
                                        <div class="alert alert-success" v-if="nonce">
                                            Successfully generated nonce.
                                        </div>
                                        <div class="alert alert-danger" v-if="error">
                                            {{ error }}
                                        </div>
                                        <form>
                                            <div class="form-group">
                                                <label for="amount">Amount</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text">€</span></div>
                                                    <div id="amount" class="form-control">{{totale}}</div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="form-group">
                                                <label>Credit Card Number</label>
                                                <div id="creditCardNumber" class="form-control"></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label>Expire Date</label>
                                                        <div id="expireDate" class="form-control"></div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label>CVV</label>
                                                        <div id="cvv" class="form-control"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-block" @click.prevent="payWithCreditCard">Pay with Credit Card</button>
                                            <hr />
                                            <div id="paypalButton"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
   
        <!-- Riepilogo ordine -->
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card mt-3">
                
                        <div class="card-header">
                            <h1>Riepilogo ordine:</h1>
                        </div>
                        
                        <div class="card-body" v-for="ordine in ordine" :key="ordine.id">
                        
                            <h3>Nome: {{ordine.name}}</h3>
                            <h3> Totale piatti: {{ordine.quantity}}</h3>
                            <h3>Prezzo: {{ordine.price}}€</h3>
                            
                        </div>
                        <div class="card-body">
                            <h1 class="ms-mark" :v-bind="totale">Totale: {{totale}}€ </h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
</template>

<script>
import braintree from 'braintree-web';
import paypal from 'paypal-checkout';

export default {
    name:'Orders',

     data(){
         return{
            ordine: null,
            cart: null,
            totale: null,
            nome: "",
            indirizzo: "",
            tel: "",
            email:"",
            message:"",
            sendingInProgress: false,
            errors: {},
            success: false,
            unsuccess:true,
            hostedFieldInstance: false,
            nonce: "",
            error: "",
            rinvio: true,
            carrelloVuoto: []
         }
     },
     methods:{

        payWithCreditCard() {

            this.handleSubmit();

            if(this.hostedFieldInstance){
                this.error = "";
                this.nonce = "";

                this.hostedFieldInstance.tokenize().then(payload => {
                    console.log(payload);
                    this.nonce = payload.nonce;
                },).catch(err => {
                    console.error(err);
                    this.error = err.message;
                    this.unsuccess = true
                    this.success = false
                });

                this.unsuccess=false;
                this.success = true;
                
            } else {
                this.unsuccess = true
                this.success = false
            }
        },

        getOrder(){

            if (typeof(Storage) !== "undefined") {

                try {
                    let getCart = localStorage.getItem('carrello');
                    let cart = JSON.parse(getCart);
                    this.ordine = cart;
                    console.log(this.ordine);
                    this.cart = JSON.stringify(this.ordine);

                    let getTotal = localStorage.getItem('totale');
                    let total = JSON.parse(getTotal);
                    this.totale = total;

                } catch (err) { 
                    console.log(err.message);
                }     
            } else {
                alert("Il browser non supporta web storage");
            }
        },
        
        handleSubmit() {
             
            this.sendingInProgress = true;
            axios
                .post("/api/orders", {
                    'customer_name': this.nome,
                    'customer_address': this.indirizzo,
                    'customer_telephone': this.tel,
                    'customer_email': this.email,
                    'user_id': this.ordine[0].user_id,
                    'cart': this.cart,
                    'total': this.totale
                })
                .then((response) => {
                   
                    this.sendingInProgress = true;
                if (response.data.errors) {
                    this.errors = response.data.errors;
                   
                    this.success = false;
                   
                } else {
                    this.nome = '';
                    this.tel= "",
                    this.email = '';
                    this.indirizzo= "",
                    this.errors = {};
                    let carrello = JSON.stringify(this.carrelloVuoto); //svuoto il carrello nel localStorage
                    localStorage.setItem('carrello', carrello); 
                    }
            });
               
    },


        

       
     },

    mounted() {
        braintree.client.create({
            authorization: "sandbox_93smtrz3_bbgx4xf7h8bx24xg"
        })
        .then(clientInstance => {
            let options = {
                client: clientInstance,
                styles: {
                    input: {
                        'font-size': '14px',
                        'font-family': 'Open Sans'
                    }
                },
                fields: {
                    number: {
                        selector: '#creditCardNumber',
                        placeholder: 'Enter Credit Card'
                    },
                    cvv: {
                        selector: '#cvv',
                        placeholder: 'Enter CVV'
                    },
                    expirationDate: {
                        selector: '#expireDate',
                        placeholder: '00 / 0000'
                    }
                }
            }
            return Promise.all([
                braintree.hostedFields.create(options),
                braintree.paypalCheckout.create({ client: clientInstance })
            ])
        })
        .then(instances => {
            const hostedFieldInstance    = instances[0];
            const paypalCheckoutInstance = instances[1];
            // Use hostedFieldInstance to send data to Braintree
            this.hostedFieldInstance = hostedFieldInstance;
            // Setup PayPal Button
                return paypal.Button.render({
                    env: 'sandbox',
                    style: {
                        label: 'paypal',
                        size: 'responsive',
                        shape: 'rect'
                    },
                    payment: () => {
                        return paypalCheckoutInstance.createPayment({
                                flow: 'checkout',
                                intent: 'sale',
                                amount: parseFloat(this.amount) > 0 ? this.amount : 10,
                                displayName: 'Braintree Testing',
                                currency: 'USD'
                        })
                    },
                    onAuthorize: (data, options) => {
                        return paypalCheckoutInstance.tokenizePayment(data).then(payload => {
                            console.log(payload);
                            this.error = "";
                            this.nonce = payload.nonce;
                        })
                    },
                    onCancel: (data) => {
                        console.log(data);
                        console.log("Payment Cancelled");
                    },
                    onError: (err) => {
                        console.error(err);
                        this.error = "An error occurred while processing the paypal payment.";
                    }
                }, '#paypalButton')
        })
        .catch(err => {
        });
    },

     created(){
        this.getOrder();
    }
    
}
</script>

<style  lang='scss' scoped>

.confirmPayment {

    transform: translateY(120%);
    height: 150px;
    opacity: 0.9;
}
.order-box{
    background-image: url("/images/backgrpund-order.jpg");
    background-repeat: no-repeat;
    background-repeat: no-repeat;
    background-position:center;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    background-size: cover;
    height: 100%;
    min-height: 80vh;
     
}
.ms-mark{
    background-color: green;
    color: #fff;
    padding: 10px;
    border-radius: 20px;
}

.card {
    margin-bottom: 1.5rem;
} 

.card {
    position: relative;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #c8ced3;
    border-radius: .25rem;
}

.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: #f0f3f5;
    border-bottom: 1px solid #c8ced3;
}

.card-body {
    flex: 1 1 auto;
    padding: 1.25rem;
}

.form-control:focus {
    color: #5c6873;
    background-color: #fff;
    border-color: #c8ced3 !important;
    outline: 0;
    box-shadow: 0 0 0 #F44336;
}
</style>