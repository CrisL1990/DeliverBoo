
const bottone = document.getElementById('bottone');
console.log('cjcjc')
if (bottone) {

    bottone.addEventListener('click', 
    function() {
        /* NOME */
        let nome = document.getElementById('name');

        if (nome.value.length < 5) {
            
            alert('Il nome è troppo corto');
        }

        let price = document.getElementById('price');

        if(price.value <= 1 || price.value >= 1000){
            alert('Prezzo non valido');
        }

        let description = document.getElementById('description');
        if(description.value.length > 0 && description.value.length < 21){
            alert('La descrizione deve essere lunga almeno 20 caratteri')
        }

        let ingredients = document.getElementById('ingredients');
        if(ingredients.value.length < 5){
            alert('Inserire almeno 5 caratteri')
        }

        let food_type = document.getElementById('food_type')
        let category = document.getElementById('category')

        if(food_type.value == ''){
            alert('Scegli il tipo di piatto');
        }else if(category.value == ''){
            alert('Scegli una categoria');
        }
    })
}