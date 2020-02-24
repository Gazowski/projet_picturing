import { requeteAjax } from './ajax.js'

export class Ad {
    constructor(el) {
        // declaration des variables 
        this._el = el,
        this._elTiles = this._el.querySelectorAll('[data-js-tile]');
        console.log(this._elTiles);

        // initialise les comportements
        this.init();
    }

    init = (e) => {
        for(let tile of this._elTiles){
            tile.addEventListener('click',()=>{
                console.log('click');
                /*
                let paramAjax = {
                    method : "POST",
                    json : true,
                    action : "index.php/ad/display_ad",
                    data_to_send : .value
                }
                
                requeteAjax(paramAjax, (reponse_ajax) => {
                    .innerHTML = reponse_ajax
                })*/
            })
        }
    }
}