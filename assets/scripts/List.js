import { requeteAjax } from './ajax.js'
import { display_alert } from './display_alert.js'

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
        this.id = this._row.id
        this.table = this._row.dataset.row
        this.message = ''

        this.init()
    }

    init = () =>{
        this.init_message()
        if(this._button) this.add_name_to_button()
        if(this._button) this.add_action_to_button()
    }

    init_message = () =>{
        if(this.table == 'member')
            this.message = 'Voulez-vous activez ce membre ?'
        else
            this.message = 'voulez-vous activez cette annonce ?'
    }

    add_name_to_button = () =>{
        let name = this._button.dataset.active == 1 ? 'Bannir' : 'Activer'
        this._button.innerHTML = name
    }
    
    add_action_to_button = () =>{
        this._button.addEventListener('click',()=>{
            display_alert(this.message,this.activate_elt)
        })
    }

    banish_user = () =>{
        // utiliser le tag <base> pour mémoriser l'url de base 
        // https://developer.mozilla.org/fr/docs/Web/HTML/Element/base
    }

    activate_elt = () =>{
        let paramAjax = {
            method : "POST",
            json : true,
            action : `index.php/ajax_controller/activate_${this.table}`,
            data_to_send : this.id
        }
        requeteAjax(paramAjax, (reponse_ajax) => {
            console.log(reponse_ajax)
            if(reponse_ajax == 1)
                this._row.remove()
        })
    }
}
    
