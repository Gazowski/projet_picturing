"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.requeteAjax = void 0;

/**
 * requeteAjax execue les call ajax
 * @param {array} data : contient les éléments de la requête ajax 
 * @param {function} callback : fonction(s) à éxécuter si la requete ajax est exécutée. lors de l'appel la fonction est passé dans une fonction anomyme
 */
var requeteAjax = function requeteAjax(data, callback) {
  // déclaration de l'objet XMLHttpRequest
  var xhr;
  xhr = new XMLHttpRequest(); // initialisation de la requête

  if (xhr) {
    xhr.open(data.method, data.action);

    if (data.method == "POST") {
      if (data.json) {
        xhr.setRequestHeader("Content-Type", "application/json");
      } else xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    } //2ème étape - spécifier la fonction de callback


    xhr.addEventListener("readystatechange", function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          //les données ont été reçues
          callback(xhr.responseText);
        } else if (xhr.status === 404) {
          //la page demandée n'existe pas
          console.log('erreur');
        }
      }
    }); //3ème étape - envoi de la requête

    var ajax_data = "";

    if (data.data_to_send) {
      ajax_data = JSON.stringify(data.data_to_send);
      ajax_data = encodeURIComponent(ajax_data);
      console.log(ajax_data);
    }

    xhr.send(ajax_data);
  }
};

exports.requeteAjax = requeteAjax;