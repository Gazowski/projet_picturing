import { requeteAjax } from './ajax.js'

export class List {
    constructor(el) {
        // déclaration des variables
        this._el = el
        this._rows = this._el.querySelectorAll('[data-row]')

        // initialise les comportements
        this.init();
    }

    init(e){
        for(let row of this._rows){
            new Row(row)
        }   
    }
}

class Row{
    constructor(row){
        this._row = row
        this._button = this._row.querySelector('button')
        this.user = this._row.id

        this.init()
    }

    init(){
        this.add_name_to_button()
        this.add_action_to_button()
    }

    add_name_to_button(){
        let name = this._button.dataset.active == 1 ? 'Bannir' : 'Activer'
        this._button.innerHTML = name
    }
    
    add_action_to_button(){
        this._button.addEventListener('click',()=>{
            let action = this._button.dataset.active == 1 ? this.banish_user() : this.activate_user()
        })
    }

    banish_user(){
        // utiliser le tag <base> pour mémoriser l'url de base 
        // https://developer.mozilla.org/fr/docs/Web/HTML/Element/base
    }

    activate_user(){
        let paramAjax = {
            method : "POST",
            json : true,
            action : "index.php/ajax_controller/activate_member",
            data_to_send : this.user
        }
        requeteAjax(paramAjax, (reponse_ajax) => {
            console.log(reponse_ajax)
            if(reponse_ajax == 1)
                this._button.innerHTML = 'Bannir'
        })
    }
}
    
