export class Alert {
    constructor(el) {
        // déclaration des variables
        this._el = el

        // initialise les comportements
        this.init();
    }

    init(e){
        this._el.addEventListener('click', () => {
            this._el.innerHTML = ''
        })
    }
}