
export class List {
    constructor(el) {
        // déclaration des variables
        this._el = el
        this._rows = this._el.querySelectorAll('tr')

        // initialise les comportements
        this.init();
    }

    init = (e) => {
        for(let row in this._rows){
            let button_action = row.querySelector('a')
            console.log(button_action)
        }

    }
}