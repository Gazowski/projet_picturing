/**
 * affiche un message à l'utilisateur avec un choix de réponse ok ou cancel
 * le paramètre @param {objet} param contient ces 3 propriétés: 
 * @param { string } message : message a afficher
 * @param { function } action : fonction qui va être déclencher si appui sur ok
 */

export let display_alert = (message,action = 0) => {
    let alert = document.querySelector('[data-alert]')
    if(action){
    alert.innerHTML = `
    <div class='wrapper_alert'>
    <div class="alert">
    <p>${message}</p>
    <button data-ok><i class="fas fa-check-circle"></i></button>
    <button data-cancel><i class="fas fa-times-circle"></i></button>
    </div>
    </div>
    `} else {
        alert.innerHTML = `
        <div class='wrapper_alert'>
        <div class="alert">
        <p>${message}</p>
        <button data-cancel><i class="fas fa-times-circle"></i></button>
        </div>
        </div>
        `
    }
    let button_ok = document.querySelector('[data-ok]')
    let button_cancel = document.querySelector('[data-cancel]')

    if(button_ok){
        button_ok.addEventListener('click', () => {
            alert.innerHTML = ''
            action()
        })
    }
    button_cancel.addEventListener('click', () => { 
        alert.innerHTML = ''
    })
}

