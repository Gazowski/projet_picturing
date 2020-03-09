import { requeteAjax } from './ajax.js'
import { display_alert } from './display_alert.js'

export class Detail {
    constructor(el) {
        // declaration des variables 
        console.log(el);
        this._el = el
        this._id_elt = this._el.querySelector('[data-id-elt]')
        this._btn_modif = this._el.querySelector('[data-btn-modif]')
        this._data = this._el.querySelectorAll('li span')
        this._editable_data = this._el.querySelectorAll('[data-editable]')
        this._btn_bid = this._el.querySelector('[data-btn-bid]')
        this._btn_owner = this._el.querySelector('[data-btn-owner]')
        this._btn_delete = this._el.querySelector('[data-btn-delete]')
        this._btn_supervisor = this._el.querySelector('[data-active]')
        this._rating = this._el.querySelector('[data-rating]')
        this._stars = this._el.querySelectorAll('[data-star]')

        this.ajax_data = {}

        // initialise les comportements
        this.init()
    }

    init = (e) =>{
        if(this._btn_supervisor){
            this.add_name_to_btn_supervisor()
            this.add_action_to_btn_supervisor() 
        }
        if(this._btn_bid) this.display_btn_bid()
        if(this._btn_owner) this.display_btn_owner()
        if(this._rating) this.display_rating()
        if(this._btn_modif) this._btn_modif.addEventListener('click',this.modify_data) // pas de fonction fleché car l'évènement doit être supprimer
        if (this._btn_delete) this._btn_delete.addEventListener('click',()=>{ display_alert('confirmez la suppression',this.delete_data) })
        for(let star of this._stars){
            star.addEventListener('click',()=>{this.rate_user(star)})
        }
    }

    add_name_to_btn_supervisor = () =>{
        let name = this._btn_supervisor.dataset.active == 1 ? 'Bannir' : 'Activer'
        this._btn_supervisor.innerHTML = name
    }
    
    add_action_to_btn_supervisor = () =>{
        this._btn_supervisor.addEventListener('click',()=>{
            display_alert('Voulez-vous activez ce membre ?',this.activate_elt)
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
            action : `index.php/ajax_controller/activate_member`,
            data_to_send : this._el.dataset.idElt
        }
        requeteAjax(paramAjax, (reponse_ajax) => {
            console.log(reponse_ajax)
            if(reponse_ajax == 1){
                display_alert('le membre à été activé');
                window.setTimeout(()=>{
                    window.location = document.referrer
                }, 1500);
            }
        })
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

    display_rating = () => {
        if(this._el.dataset.user != 0 && this._el.dataset.user != this._el.dataset.owner){
            this._rating.classList.remove('display_none')
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
            }
            else { 
                data.contentEditable = false
                data.classList.remove('editable')
            }
        }       
    }

    store_new_data = () => {
        this.prepare_data()
        display_alert( 'valider les modifications',this.send_data_to_db)
        this.toggle_btn()
        this.toggle_editable_data()
    }
    
    prepare_data = () =>{
        for(let data of this._editable_data){
            this.ajax_data[data.id] = data.innerHTML
        }
    }

    /**
     * envoi des données ajax pour le membre ou un annonce
     * l'id n'est pas envoyé directement. Pour éviter le piratage elle gérer en PHP dans une variable session
     * aussi bien pour le membre que l'annonce
     */
    send_data_to_db = () =>{
        let paramAjax = {
            method : "POST",
            json : true,
            action : `index.php/ajax_controller/update_${this._el.dataset.table}`,
            data_to_send : this.ajax_data
        }
        requeteAjax(paramAjax, (reponse_ajax) => {
            console.log(reponse_ajax)
            if(reponse_ajax == 1){
                display_alert('les modifications ont été enregistrées')
            }
        })
    }


    /**
     * envoi des données ajax pour noter un user
     */
    rate_user = (star) =>{
        console.log(star.dataset.star)
        let ajax_data = {
            'rated_user' : this._el.dataset.owner,
            'rating' : star.dataset.star
        }
        let paramAjax = {
            method : "POST",
            json : true,
            action : `index.php/ajax_controller/rate_user`,
            data_to_send : ajax_data,                       
        }
        requeteAjax(paramAjax, (reponse_ajax) => {
            console.log(reponse_ajax)
            if(reponse_ajax){
                display_alert('la note a été enregistrée')
            }
        })
    }

    /**
     * suppression annonce ou compte
     * l'id usager ou l'id annonce est stocké en variable session et traité du coté PHP
     */
    delete_data = () => {
        let paramAjax = {
            method : "POST",
            json : true,
            action : `index.php/ajax_controller/delete_${this._el.dataset.table}`,
            data_to_send : this.ajax_data
        }
        requeteAjax(paramAjax, (reponse_ajax) => {
            console.log(reponse_ajax)
            if(reponse_ajax == 1){                
                display_alert('suppression effectuée')
                let new_url = this._el.dataset.table == 'ad' ? document.referrer : `${document.baseURI}/auth/logout`
                setTimeout(location.href = new_url,2500)
            }
        })
    }
}