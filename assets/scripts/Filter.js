import { requeteAjax } from './ajax.js'

export class Filter {
    constructor(el) {
        // declaration des variables 
        this._el = el,
        this._elFilter = this._el.querySelector('select');
        console.log(this._el);

        // initialise les comportements
        this.init();
    }

    init = (e) => {

        this._elFilter.addEventListener('change',()=>{
            let paramAjax = {
                method : "POST",
                json : true,
                action : "index.php/ajax_controller/get_ads",
                data_to_send : this._elFilter.options[this._elFilter.selectedIndex].value
            }
            
            requeteAjax(paramAjax, (reponse_ajax) => {
                console.log(this._el.nextSibling)
                this._el.nextElementSibling.innerHTML = reponse_ajax
            })
        })

    }
}