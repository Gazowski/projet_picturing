export let display_alert = (message) => {
    let alert = document.querySelector('[data-alert]')
    alert.innerHTML = `
    <div class='wrapper_alert'>
    <div class="alert">
    <p>${message}</p>
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
        return true 
    })
    button_cancel.addEventListener('click', () => { 
        alert.innerHTML = ''
        return false 
    })
}

