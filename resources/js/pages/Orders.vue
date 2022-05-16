<template>
<div>
     <div class="container">
        <div v-if="success" class="alert alert-success">
            Email inviata con successo!!
        </div>

        <div class="card">
             Riepilogo dell'ordine
             <div class="card-header">
                <h1>Riepilogo ordine:</h1>
            </div>
             
            <div class="card-body" v-for="ordine in ordine" :key="ordine.id">
               
                <h3>Nome: {{ordine.name}}</h3>
                <h3> Totale piatti: {{ordine.quantity}}</h3>
                <h3>Prezzo: {{ordine.price}}€</h3>
                
            </div>
            <h1 :v-bind="totale">Totale: {{totale}}€</h1>
        </div>
    </div>
     <!-- Credenziali  -->
   <div class="container">
       <form method="POST" @submit.prevent="handleSubmit">

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        
                        <div class="card-header">
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
                        <div class="container">                   
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Credit Card</strong>
                                            <small>enter your card details</small>
                                        </div>
                                        <div class="card-body">

                                            <!-- Inserisci numero carta di credito -->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="ccnumber">Numero Carta di Credito*</label>
                                                        <div class="input-group">
                                                            <input  class="form-control" type="text" placeholder="0000 0000 0000 0000" autocomplete="email">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="mdi mdi-credit-card"></i>
                                                                </span>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Inserisci mese  -->
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="ccmonth">Mese*</label>
                                                    <select  class="form-control" id="ccmonth">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="ccyear">Anno*</label>
                                                    <select  class="form-control" id="ccyear">
                                                        <option>2022</option>
                                                        <option>2023</option>
                                                        <option>2024</option>
                                                        <option>2025</option>
                                                        <option>2026</option>
                                                        <option>2027</option>
                                                        <option>2028</option>
                                                        <option>2029</option>
                                                        <option>2030</option>
                                                        <option>2031</option>
                                                        <option>2032</option>
                                                        <option>2033</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="cvv">CVV/CVC*</label>
                                                        <input  class="form-control" id="cvv" type="text" placeholder="123">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <!-- Pulsante per continuare -->
                        
                                            <button class="btn btn-sm btn-success float-right" type="submit">
                                            <i class="mdi mdi-gamepad-circle"></i> {{sendingInProgress?'Invio in corso...':'Continua'}}</button>
                                            <!-- Pulsante per resettare dati -->
                                            <button class="btn btn-sm btn-danger" type="reset">
                                            <i class="mdi mdi-lock-reset"></i> Resetta</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


</div>
</template>

<script>
export default {
    name:'Orders',

     data(){
         return{
            ordine: null,
            totale: null,
            nome: "",
            indirizzo: "",
            tel: "",
            email:"",
            message:"",
            sendingInProgress: false,
            errors: {},
            success: false,

         }
     },
     methods:{
        getOrder(){

            if (typeof(Storage) !== "undefined") {

                try {
                    let getCart = localStorage.getItem('carrello');
                    let cart = JSON.parse(getCart);
                    this.ordine = cart;
                    console.log(this.ordine);

                    let getTotal = localStorage.getItem('totale');
                    let total = JSON.parse(getTotal);
                    this.totale = total;
                    console.log(this.totale);


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
                    // 'ordine': this.ordine,
                    // 'totale': this.totale
                })
                .then((response) => {
                  
                    this.sendingInProgress = false;
                if (response.data.errors) {
                    this.errors = response.data.errors;
                   
                    this.success = false;
                } else {
                    this.success = true;
                    this.nome = '';
                    this.tel= "",
                    this.email = '';
                    this.indirizzo= "",
                    this.errors = {};
                    }
            });
               
    },


        

       
     },

     created(){
        this.getOrder();
    }
    
}
</script>

<style  lang='scss' scoped>

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