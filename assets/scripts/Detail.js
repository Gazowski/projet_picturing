import { requeteAjax } from './ajax.js'
import { display_alert } from './display_alert.js'

export class Detail {
    constructor(el) {
        // declaration des variables 
        this._el = el
        this._btn_modif = this._el.querySelector('[data-btn-modif]')
        this._data = this._el.querySelectorAll('li span')
        this._editable_data = this._el.querySelectorAll('[data-editable]')

        this.new_data = {}

        // initialise les comportements
        this.init()
    }

    init = (e) =>{
        this._btn_modif.addEventListener('click',this.modify_data)
    }
    
    modify_data = () =>{
        console.log('modifier')
        this.toggle_editable_data()
        this.toggle_btn()
    }

    toggle_btn = () =>{
        console.log(this._btn_modif)
        let new_action = '',
            old_action = ''
        if(this._btn_modif.innerHTML == 'valider'){
            this._btn_modif.innerHTML = 'modifier'
            old_action = this.store_new_data
            new_action = this.modify_data
         } else {
            this._btn_modif.innerHTML = 'valider'
            old_action = this.modify_data
            new_action = this.store_new_data
        }
        this._btn_modif.removeEventListener('click',old_action)
        this._btn_modif.addEventListener('click',new_action)
    }

    toggle_editable_data = () => {
        for(let data of this._data){
            if(!data.hasAttribute('data-editable')){
                if (!data.classList.contains('grey')) {data.classList.add('grey')}
                else {data.classList.remove('grey')}
            }
        }
        for(let data of this._editable_data){
            console.log(data.contentEditable)
            if(data.contentEditable == 'false') { data.contentEditable = true }
            else { data.contentEditable = false }
        }       
    }

    store_new_data = () => {
        this.prepare_data()
        this.ask_confirmation()
        this.toggle_btn()
        this.toggle_editable_data()
    }
    
    prepare_data = () =>{
        for(let data of this._editable_data){
            this.new_data[data.id] = data.innerHTML
        }
    }
    
    ask_confirmation = () =>{
        let param_alert = {
            'message' : 'valider les modifications',
            'action' :  this.send_data_to_db,
        }
        display_alert(param_alert)
    }
    
    send_data_to_db = () =>{
        console.log(this.new_data)
        let paramAjax = {
            method : "POST",
            json : true,
            action : `index.php/ajax_controller/update_member`,
            data_to_send : this.new_data
        }
        requeteAjax(paramAjax, (reponse_ajax) => {
            console.log(reponse_ajax)
            if(reponse_ajax == 1){
                let param_alert = {
                    'message' : 'les modifications ont été enregistrées',
                }
                display_alert(param_alert)
            }
        })
    }
}