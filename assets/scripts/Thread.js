import { requeteAjax } from './ajax.js'

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
        this._messages = this._el.querySelectorAll('[data-msg]')
        
        this.init()
    }

    init = () =>{
        for(let msg of this._messages){
            this._conversation_field = this._el.querySelector('[data-conversation]')
            msg.addEventListener('click',this.open_conversation)
        }
    }

    // On va chercher les données pour la vue par une requête AJAX
    open_conversation = () => {
        this._msg = this._el.querySelector('[data-msg]')
        this._msg.removeEventListener('click',this.open_conversation)

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
    
    // On insère les données dans la vue
    display_conversation = (conversation) =>{

        conversation = JSON.parse(conversation)
        //console.log(conversation)

        let emptyTest = conversation.length;
        //console.log(emptyTest);

        for(let message of conversation){
            console.log(message.thread_id)
            this._conversation_field.innerHTML += `
                <i>le ${message.cdate}</i> message de <b><a href='${document.baseURI}/member/${message.sender_id}'>${message.user_name}</a></b>
                <p>${message.body}</p>
                <div class="line_n"></div>
            `
        }

        this._conversation_field.innerHTML += `
        <form method="POST" action="index.php/message/reply">
        <textarea name="answer" rows="3" cols="33"></textarea>
        <input type="hidden" name="id_msg" value="${conversation[0].id}">
        <input class="button" type="submit" value="repondre">
      
        </form>
        `

        this._msg.addEventListener('click',this.toggle_conversation)
    }

    toggle_conversation = () => {
        this._conversation_field.classList.toggle('display_none')
    }
}