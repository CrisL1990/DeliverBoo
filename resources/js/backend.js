const { isNumber } = require("lodash");

const bottone = document.getElementById('bottone');

if (bottone) {

    bottone.addEventListener('click', 
    function() {

        /* NOME */
        let nome = document.getElementById('name');

        if (nome.value.length < 5) {
            
            alert('Il nome è troppo corto');
        }

        /* VAT */
        let vat = document.getElementById('vat');

        if (vat.value.length != 11 && !isNumber(vat.value)) {
            
            alert('Partita Iva non corretta');
        }

        /* EMAIL */
        let email = document.getElementById('email');

        if (!email.value.includes("@") || !email.value.includes(".")) 
        {
            
            alert('Email non corretta');
        }

        /* NOME RISTORANTE */ 
        let restaurant_name = document.getElementById('restaurant_name');

        if (restaurant_name.value.length < 3) {
            
            alert('Il nome del ristorante è troppo corto');
        }

        /* INDIRIZZO RISTORANTE */ 
        let restaurant_address = document.getElementById('restaurant_address');

        let indirizzi = ['via', 'piazza', 'vicolo', 'vico', 'borgo', 'corso', 'viale', 'riva', 'rio'];

        let boolean = false;
            
        for (let i=0; i < indirizzi.length; i++){

            if (restaurant_address.value.includes(indirizzi[i]) && endsWithNumber(restaurant_address.value)) {

                boolean = true;
            } 
        }

        if (boolean == false || restaurant_address.value.length <= 5) {
            alert('L\'indirizzo del ristorante non è valido');
        }
        
    }
)
}
function endsWithNumber(str) {
    return /[0-9]+$/.test(str);
  }