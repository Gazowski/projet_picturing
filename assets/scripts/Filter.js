import { requeteAjax } from './ajax.js'
import { Ad } from './Ad.js';

export class Filter {
    constructor(el) {
        // declaration des variables 
        this._el = el,
        this._elFilter = this._el.querySelector('select');
        console.log(this._el);
        this._ad = document.querySelector('[data-component="Ad"]')

        // initialise les comportements
        this.init();
    }

    init = (e) => {
        let method = this._ad ? 'get_ads' : ''

        this._elFilter.addEventListener('change',()=>{
            let paramAjax = {
                method : "POST",
                json : true,
                action : `index.php/ajax_controller/${method}`,
                data_to_send : this._elFilter.options[this._elFilter.selectedIndex].value
            }
            
            requeteAjax(paramAjax, (reponse_ajax) => {
                console.log(this._el.nextSibling)
                this._el.nextElementSibling.innerHTML = reponse_ajax
                let liste = document.querySelector('[data-component="Ad"]')
                new Ad(liste)
            })
        })

    }
}