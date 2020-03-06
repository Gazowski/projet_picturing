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
        for(let thread of this._threads){
            new Conversation(thread)
            //this.thread.addEventListener('click', (e)=>this.open_thread)
        }
    }
}

class Conversation{
    constructor(el){
        this._el = el

        this.init()
    }

    init = () =>{
        this._el.addEventListener('click',this.open_conversation)
    }

    open_conversation = () => {
        this._el.removeEventListener('click',this.open_conversation)
        console.log(this._el.dataset.thread)

        console.log("zone messages = " + this._el.querySelector('[data-conversation]'))
        
        let paramAjax = {
            method : "POST",
            json : true,
            action : "index.php/ajax_controller/messages_thread",
            data_to_send : this._el.dataset.thread
        }
        requeteAjax(paramAjax,(reponse_ajax) => {
            this.display_conversation(reponse_ajax)
        })
    }
    
    display_conversation = (conversation) =>{
        conversation = JSON.parse(conversation)
        console.log(conversation)
        let conversation_field = this._el.querySelector('[data-conversation]')
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
                <input type="hidden" name="id_msg" value="${conversation.id}">
                <input class="button" type="submit" value="repondre">
            </form>
        `

    }
}