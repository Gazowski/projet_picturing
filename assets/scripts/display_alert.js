/**
 * affiche un message à l'utilisateur avec un choix de réponse ok ou cancel
 * le paramètre @param {objet} param contient ces 3 propriétés: 
 * @param { string } message : message a afficher
 * @param { function } action : fonction qui va être déclencher si appui sur ok
 * @param { objet } elt : élément sur lequel on va agir 
 */

export let display_alert = (param) => {
    let alert = document.querySelector('[data-alert]')
    alert.innerHTML = `
    <div class='wrapper_alert'>
    <div class="alert">
    <p>${param.message}</p>
    <button data-ok><i class="fas fa-check-circle"></i></button>
    <button data-cancel><i class="fas fa-times-circle"></i></button>
    </div>
    </div>
    `
    console.log(alert)
    let button_ok = document.querySelector('[data-ok]')
    let button_cancel = document.querySelector('[data-cancel]')

    button_ok.addEventListener('click', () => {
        alert.innerHTML = ''
        param.action(param.elt)
    })
    button_cancel.addEventListener('click', () => { 
        alert.innerHTML = ''
    })
}

