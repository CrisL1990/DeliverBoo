<template>
<div>
     <div class="container" v-for="order in orders" :key="order.id">
        <div class="card">
             Riepilogo dell'ordine
             <div class="card-header">
                <h1>Riepilogo ordine:</h1>
            </div>
             Contenuto ordine
             <div class="card-body">
                <h3>Nome: {{order.customer_name}}</h3>
                <h3>Indirizzo: {{order.customer_address}}</h3>
                <h3> Contatto telefonico: {{order.customer_telephone}}</h3>
                <h3>Ordinato il giorno: {{order.date}}</h3>
                <h3>Totale speso:{{order.total}}</h3>
            </div>
        </div>
    </div>
     <!-- Credenziali  -->
   <div class="container">
       <form >

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
                                            <label for="name">Nome proprietario*</label>
                                            <input class="form-control" id="name" type="text" v-model="name" placeholder="Inserisci il tuo nome">
                                        </div>
                                    </div>
                                </div>

                                <!-- Inserisci il tuo indirizzo -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Inserisci il tuo indirizzo*</label>
                                            <input class="form-control" id="name" type="text" v-model="name" placeholder="es. via Del Corso 23">
                                        </div>
                                    </div>
                                </div>

                                <!-- Inserisci il tuo contatto telefonico -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">Inserisci il tuo numero di telefono*</label>
                                            <input class="form-control" id="name" type="text" v-model="name" placeholder="000 111111">
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

                                            <!-- Inserisci il tuo nome -->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="name">Nome proprietario*</label>
                                                        <input class="form-control" id="name" type="text" v-model="name" placeholder="Inserisci il tuo nome">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Inserisci numero carta di credito -->
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="ccnumber">Numero Carta di Credito*</label>
                                                        <div class="input-group">
                                                            <input class="form-control" type="text" v-model="creditNumber" placeholder="0000 0000 0000 0000" autocomplete="email">
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
                                                    <select class="form-control" id="ccmonth">
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
                                                    <select class="form-control" id="ccyear">
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
                                                        <input class="form-control" id="cvv" type="text" placeholder="123">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <!-- Pulsante per continuare -->
                                            <button class="btn btn-sm btn-success float-right" type="submit" @click="goPay()">
                                            <i class="mdi mdi-gamepad-circle"></i> Continue</button>
                                            <!-- Pulsante per resettare dati -->
                                            <button class="btn btn-sm btn-danger" type="reset">
                                            <i class="mdi mdi-lock-reset"></i> Reset</button>
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
             orders:[],
             name:null,
             creditNumber:null,
         }
     },
     methods:{
        getOrder() {

            axios.get('api/orders')            
                .then((value) => {
                    this.orders=value.data.results;  
                
                }
             );
        },
        // goPay(){
        //     this.validtyName();
        //     this.validtyCreditNumber();
        // },
        // //Validazione nome
        // validtyName(){
        //     if (this.name.length < 5) {
              
        //         this.name.setCustomValidity('Il nome deve essere più lungo di 5 caratteri');
        //     }else{
        //         this.name.setCustomValidity('');
        //     }
        // },

         //Validazione numero della carta di credito
        // validtyCreditNumber(){
        //      if (this.creditNumber.length != 12) {

        //     this.creditNumber.setCustomValidity('Il numero della carta di credito deve contenere "12" caratteri');
            
        // }else if(isNaN(this.creditNumber)){
        //     this.creditNumber.setCustomValidity('Il numero della carta di credito deve contenere solo caratteri numerici');
        // }
        // else{
        //     this.creditNumber.setCustomValidity('');
        // }
        //}

       
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