import { requeteAjax } from './ajax.js'

document.addEventListener("DOMContentLoaded", function() {
    let inputs = document.querySelectorAll('[data-js-input]')

    if(inputs){
        for(let input of inputs){
            if(input.dataset.jsInput == 'type'){
                input.addEventListener('change',()=>{
                    console.log(input.selectedIndex.innerHTML)
                    // let paramAjax = {
                    //     methode : "POST",
                    //     json : true,
                    //     action : "get_category_name",
                    //     donnees_a_envoyer : input.selectedIndex.text
                    // }
                    // requeteAjax(paramAjax, (reponse_ajax) => {
                    //     console.log('liste des sous categories')
                    // })

                })

            }
        }
    }

});
