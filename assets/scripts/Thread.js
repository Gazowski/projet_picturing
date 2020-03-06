import { requeteAjax } from './ajax.js'
import { Detail } from './Detail.js';

export class Thread {
    constructor(el) {
        // declaration des variables 
        this._el = el,
        this._threads = this._el.querySelectorAll('[data-thread]')
        console.log(this._el)

        // initialise les comportements
        this.init();
    }

    init = (e) => {
        console.log(this._threads)
        for(this.thread of this._threads){
            this.thread.addEventListener('click',this.open_thread)
        }
    }

    open_thread = () =>{
        this.thread.removeEventListener('click',this.open_thread)
        console.log("zone messages = " + this.thread.querySelector('[data-conversation]'))
        
        let paramAjax = {
            method : "POST",
            json : true,
            action : "index.php/ajax_controller/messages_thread",
            data_to_send : this.thread.dataset.thread
        }
        requeteAjax(paramAjax,(reponse_ajax) => {
            this.display_conversation(reponse_ajax)
        })
    }
    
    display_conversation = (conversation) =>{
        conversation = JSON.parse(conversation)
        let conversation_field = this.thread.querySelector('[data-conversation]')
        for(let message of conversation){
            console.log(message)
            conversation_field.innerHTML += `
                <i>le ${message.cdate}</i> message de <b>${message.user_name}</b>
                <p>${message.body}</p>
            `
        }
        conversation_field.innerHTML += `
            <form method="POST" action="index.php/message/reply">
                <textarea name="answer" rows="3" cols="33"></textarea>
                <input type="hidden" name="id_msg" value="${conversation[0].id}">
                <input class="button" type="submit" value="repondre">
            </form>
        `

    }
}