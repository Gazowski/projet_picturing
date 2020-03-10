"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.display_alert = void 0;

/**
 * affiche un message à l'utilisateur avec un choix de réponse ok ou cancel
 * le paramètre @param {objet} param contient ces 3 propriétés: 
 * @param { string } message : message a afficher
 * @param { function } action : fonction qui va être déclencher si appui sur ok
 */
var display_alert = function display_alert(message) {
  var action = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
  var alert = document.querySelector('[data-alert]');

  if (action) {
    alert.innerHTML = "\n    <div class='wrapper_alert'>\n    <div class=\"alert\">\n    <p>".concat(message, "</p>\n    <button data-ok><i class=\"fas fa-check-circle\"></i></button>\n    <button data-cancel><i class=\"fas fa-times-circle\"></i></button>\n    </div>\n    </div>\n    ");
  } else {
    alert.innerHTML = "\n        <div class='wrapper_alert'>\n        <div class=\"alert\">\n        <p>".concat(message, "</p>\n        <button data-cancel><i class=\"fas fa-times-circle\"></i></button>\n        </div>\n        </div>\n        ");
  }

  var button_ok = document.querySelector('[data-ok]');
  var button_cancel = document.querySelector('[data-cancel]');

  if (button_ok) {
    button_ok.addEventListener('click', function () {
      alert.innerHTML = '';
      action();
    });
  }

  button_cancel.addEventListener('click', function () {
    alert.innerHTML = '';
  });
};

exports.display_alert = display_alert;