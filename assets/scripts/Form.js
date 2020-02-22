import { requeteAjax } from './ajax.js'

export class Form {
    constructor(el) {
        // déclaration des variables
        this._el = el
        this._elInputs = this._el.querySelectorAll('[data-js-input]');

        // initialise les comportements
        this.init();
    }

    init = (e) => {
        let select_category = '';
        for(let input of this._elInputs){
            if(input.dataset.jsInput == 'category'){
                select_category = input
            }            

            if(input.dataset.jsInput == 'type'){
                input.addEventListener('change',()=>{
                    let paramAjax = {
                        method : "POST",
                        json : true,
                        action : "index.php/ajax_controller/get_category_name",
                        data_to_send : input.options[input.selectedIndex].value
                    }
                    requeteAjax(paramAjax, (reponse_ajax) => {
                        select_category.innerHTML = reponse_ajax
                    })

                })
            }
        }
    }
}
