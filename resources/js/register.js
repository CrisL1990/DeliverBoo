const { isNumber } = require("lodash");

const bottone = document.getElementById('bottone');
const categoria = document.getElementById('category');

// /REGISTRAZIONE/
if (bottone) {

    bottone.addEventListener('click', 
    function() {

        /* NOME */
        let nome = document.getElementById('name');

        if (nome.value.length < 5) {
              
            nome.setCustomValidity('Il nome deve essere più lungo di 5 caratteri');
        }else{
            nome.setCustomValidity('');
        }

        /* VAT */
        let vat = document.getElementById('vat');

        if (vat.value.length != 11) {

            vat.setCustomValidity('La partita iva deve contenere "11" caratteri');
            
        }else if(isNaN(vat.value)){
            vat.setCustomValidity('La partita iva deve contenere solo caratteri numerici');
        }
        else{
            vat.setCustomValidity('');
        }

        /* EMAIL */
        let email = document.getElementById('email');

        if (validaEmail(email.value)) {
            email.setCustomValidity("");
          
        }else{
            email.setCustomValidity("indirizzo non valido");
        }

        /* NOME RISTORANTE */ 
        let restaurant_name = document.getElementById('restaurant_name');

        if (restaurant_name.value.length < 3) {
              
            restaurant_name.setCustomValidity('Il Nome del ristorante deve essere più lungo di 3 caratteri');
        }else{
            restaurant_name.setCustomValidity('');
        }

       /* INDIRIZZO RISTORANTE */ 
       let restaurant_address = document.getElementById('restaurant_address');

       let indirizzi = ['via', 'piazza', 'vicolo', 'vico', 'borgo', 'corso', 'viale', 'riva', 'rio'];

       let boolean = false;
           
       for (let i=0; i < indirizzi.length; i++){

           if (restaurant_address.value.includes(indirizzi[i]) && endsWithNumber(restaurant_address.value)) {

               boolean = true;
               restaurant_address.setCustomValidity("");
           } 
       }

       if (boolean == false || restaurant_address.value.length <= 5) {
            restaurant_address.setCustomValidity("L'indirizzo del ristorante non è valido");
       }

       //VALIDAZIONE PASSWORD
       let psw1 = document.getElementById('password');
       let psw2 = document.getElementById('password-confirm');
        if(psw1.value != psw2.value){
            psw2.setCustomValidity("La password non corrisponde");
        }else if(psw1.value.length <= 8){
            psw1.setCustomValidity("La password deve essere almeno di otto caratteri");
        }else{
            psw2.setCustomValidity("");
        }
    }
)
}
/* /Funzioni/

/Funzione utilizzata nel indirizzo ristorante/ */
function endsWithNumber(str) {
    return /[0-9]+$/.test(str);
}




// Funzione Valida Email 

function validaEmail(str) { 
    var lastAtPos = str.lastIndexOf('@');
    var lastDotPos = str.lastIndexOf('.'); 
    return (lastAtPos < lastDotPos && lastAtPos > 0 && str.indexOf('@@') == -1 && lastDotPos > 2 && (str.length - lastDotPos) > 2);
}