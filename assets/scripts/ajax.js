/**
 * requeteAjax execue les call ajax
 * @param {array} data : contient les éléments de la requête ajax 
 * @param {function} callback : fonction(s) à éxécuter si la requete ajax est exécutée. lors de l'appel la fonction est passé dans une fonction anomyme
 */

export let requeteAjax = (data,callback) => {

    // déclaration de l'objet XMLHttpRequest
    var xhr;
    xhr = new XMLHttpRequest();
    // initialisation de la requête

    if(xhr) {	

        xhr.open(data.methode, data.action);
        if(data.methode == "POST"){
            if(data.json){
                xhr.setRequestHeader("Content-Type", "application/json")
            }
            else
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        }

        //2ème étape - spécifier la fonction de callback
        xhr.addEventListener("readystatechange", () => {

            if(xhr.readyState === 4) {							
                if(xhr.status === 200) {
                    //les données ont été reçues
                    callback(xhr.responseText)

                } else if (xhr.status === 404) {
                    //la page demandée n'existe pas
                    console.log('erreur')
                }
            }
        });
        //3ème étape - envoi de la requête
        let donnees = ""
        if(data.donnees_a_envoyer){
            donnees = JSON.stringify(data.donnees_a_envoyer)
            donnees = encodeURIComponent(donnees)
            //console.log(donnees)
        }
        xhr.send(donnees)
    }
}