import { requeteAjax } from './ajax.js'
import { Detail } from './Detail.js';

export class Ad {
    constructor(el) {
        // declaration des variables 
        this._el = el,
        this._elTiles = this._el.querySelectorAll('[data-js-Tile]');
        //this._elTiles = this._el.querySelectorAll('[data-js-owner]');
        console.log(this._el);

        // initialise les comportements
        this.init();
    }

    init = (e) => {
        for(let tile of this._elTiles){
            tile.addEventListener('click',()=>{
                sessionStorage.setItem('id_ad', tile.dataset.jsTile);
                //sessionStorage.setItem('owner', tile.dataset.jsOwner);

                let paramAjax = {
                    method : "GET",
                    action : "index.php/ajax_controller/display_ad/"+tile.dataset.jsTile,
                }
                
                requeteAjax(paramAjax, (reponse_ajax) => {
                    this._el.classList.remove('parent')
                    this._el.innerHTML = reponse_ajax
                    let filter = document.querySelector('[data-component="filter"]'),
                        new_el = document.querySelector('[data-component="detail"]')
                    filter.remove()
                    new Detail(new_el)
                })
            })
        }
    }
}