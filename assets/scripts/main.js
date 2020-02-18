import { requeteAjax } from './ajax.js'

document.addEventListener("DOMContentLoaded", function() {
    let inputs = document.querySelectorAll('[data-js-input]'),
    select_category

    if(inputs){
        for(let input of inputs){
            if(input.dataset.jsInput == 'category') select_category = input
            if(input.dataset.jsInput == 'type'){
                input.addEventListener('change',()=>{
                    console.log(input.options[input.selectedIndex].value)
                    let paramAjax = {
                        methode : "POST",
                        json : true,
                        action : "get_category_name",
                        donnees_a_envoyer : input.options[input.selectedIndex].value
                    }
                    requeteAjax(paramAjax, (reponse_ajax) => {
                    
                        console.log(reponse_ajax)
                        select_category.innerHTML = reponse_ajax
                    })

                })

            }
        }
    }

});
