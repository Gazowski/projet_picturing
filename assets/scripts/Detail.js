import { requeteAjax } from './ajax.js'
import { display_alert } from './display_alert.js'

export class Detail {
    constructor(el) {
        // declaration des variables 
        this._el = el
        this._btn_modif = this._el.querySelector('[data-btn-modif]')
        this._data = this._el.querySelectorAll('li span')
        this._editable_data = this._el.querySelectorAll('[data-editable]')
        this._btn_bid = this._el.querySelector('[data-btn-bid]')
        this._btn_owner = this._el.querySelector('[data-btn-owner]')

        this.new_data = {}

        // initialise les comportements
        this.init()
    }

    init = (e) =>{
        this.display_btn_bid()
        this.display_btn_owner()
        this._btn_modif.addEventListener('click',this.modify_data)
    }

    display_btn_bid = () =>{
        if(this._el.dataset.user != this._el.dataset.owner){
            this._btn_bid.classList.remove('display_none')
        }
    }

    display_btn_owner = () => {
        if(this._el.dataset.user != 0 && this._el.dataset.user == this._el.dataset.owner){
            this._btn_owner.classList.remove('display_none')
        }
    }
    
    modify_data = () =>{
        this.toggle_editable_data()
        this.toggle_btn()
    }

    toggle_btn = () =>{
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
            if(data.contentEditable == 'false') { 
                data.contentEditable = true
                data.classList.add('editable') 
            } else { 
                data.contentEditable = false
                data.classList.remove('editable') 
            }
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
            action : `index.php/ajax_controller/update_${this._el.dataset.table}`,
            data_to_send : this.new_data
        }
        requeteAjax(paramAjax, (reponse_ajax) => {
            console.log(reponse_ajax)
            if(reponse_ajax == 1){
                let param_alert = {
                    'message' : 'les modifications ont été enregistrées',
                }
                window.location.href = `${document.baseURI}/ad/member_ads`
                display_alert(param_alert)
            }
        })
    }
}


