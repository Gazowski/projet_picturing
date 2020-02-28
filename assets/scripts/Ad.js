import { requeteAjax } from './ajax.js'
import { Detail } from './Detail.js';

export class Ad {
    constructor(el) {
        // declaration des variables 
        this._el = el,
        this._elTiles = this._el.querySelectorAll('[data-js-tile]');
    

        // initialise les comportements
        this.init();
    }

    init = (e) => {
        for(let tile of this._elTiles){
            tile.addEventListener('click',()=>{
                console.log('click');
                console.log(tile.dataset.jsTile);

                sessionStorage.setItem('id_ad', tile.dataset.jsTile);

                let paramAjax = {
                    method : "GET",
                    action : "index.php/ajax_controller/display_ad/"+tile.dataset.jsTile,
                }
                
                requeteAjax(paramAjax, (reponse_ajax) => {
                   this._el.classList.remove('parent')
                    this._el.innerHTML = reponse_ajax
                    let new_el = document.querySelector('[data-component="detail"]')
                    new Detail(new_el)
                })
            })
        }
    }

}