const bottone = document.getElementById('bottone');

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

        //Prezzo del piatto
        let price = document.getElementById('price');

        if(price.value <= 1 || price.value >= 1000){
            price.setCustomValidity('Il prezzo selezionato non è valido, min-1/ max-999');
        }else{
            price.setCustomValidity('');
        }

        //Controllo lunghezza lista dei piatti
        let description = document.getElementById('description');
        if(description.value.length < 1){
            
            description.setCustomValidity('La descrizione deve essere lunga almeno 20 caratteri');
        }else{
            description.setCustomValidity('');
        }

        //Controllo lista ingredienti
        let ingredients = document.getElementById('ingredients');
        if(ingredients.value.length < 5){
            ingredients.setCustomValidity('La lista deve essere più lunga di 5 caratteri');
            
        }else{
            ingredients.setCustomValidity('');
        }

        //Controlli select Food type
        let food_type = document.getElementById('food_type')
        if(food_type.value == ''){
            food_type.setCustomValidity('Scegli il tipo di piatto');
        }else{
            food_type.setCustomValidity('');
        }

        //Controlli select categoria
        let category = document.getElementById('category')
        if(category.value == ''){
           
            category.setCustomValidity('Scegli una categoria');
        }else{
            category.setCustomValidity('');
        }
        
    })
}