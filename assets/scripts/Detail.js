import { requeteAjax } from './ajax.js'

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

    init(e){
        this._btn_modif.addEventListener('click',()=>{
            this.modify_data()
        })
    }

    modify_data(){
        this.get_editable_data()
        this.toggle_btn()
    }

    toggle_btn(){
        if(this._btn_modif.innerHTML == 'valider'){
            this._btn_modif.innerHTML = 'modifier'
            this.btn_action = this.store_new_data
         } else {
            this._btn_modif.innerHTML = 'valider'
            this.btn_action = this.modify_data
        }
        this._btn_modif.addEventListener('click',()=>{ this.btn_action() })
    }

    get_editable_data(){
        for(let data of this._data){
            if(!data.hasAttribute('data-editable')){
                data.classList.add('grey')
            }
        }
        for(let data of this._editable_data){
            data.contentEditable = true
        }       
    }

    store_new_data(){
        console.log(this)
        this.prepare_data()
        this.send_data_to_db()
        this.toggle_btn()
    }

    prepare_data(){
        for(let data of this._editable_data){
            this.new_data[data.id] = data.innerHTML
        }
    }
    
    send_data_to_db(){
        console.log(this.new_data)
    }
}