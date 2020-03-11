"use strict";

var _class_mapping = require("./class_mapping.js");

document.addEventListener("DOMContentLoaded", function () {
  // pour chaque data-component dans le DOM, instancie la classe JS nommée comme valeur de l'attribut
  var components = document.querySelectorAll('[data-component]');

  for (var i = 0, l = components.length; i < l; i++) {
    var componentDataSet = components[i].dataset.component;
    var componentElement = components[i];

    for (var _i = 0, _Object$keys = Object.keys(_class_mapping.class_mapping); _i < _Object$keys.length; _i++) {
      var key = _Object$keys[_i];
      //console.log(`${key}`);
      var classInMap = "".concat(key); //console.log(classInMap);

      if (componentDataSet == classInMap) new _class_mapping.class_mapping[componentDataSet](componentElement);
    }
  }
});